/**
 * this is a helper class; you can assume "unix" is a valid timestamp;
 * you can also use the date_iso8601 format if you are familiar with it
 * todo : nothing
 */
const doc = document;
const jQuery = $;
const modalID = "#testPlanCase";
class TestCase {

    modal: any;
    timer: Timer;
    projectID: number;
    testPlanSprintID: number;
    testPlanSprintCaseID: number;
    testCaseID: number;
    testerID: number;
    testCaseRunID: number;
    isAjax: boolean = false;
    statuses: any;
    forceStatus: any;
    issue: any;

    /* we set unix in contructor */
    constructor(testPlanSprintCaseID: number, testPlanSprintID: number, testCaseID: number, testerID: number, projectID: number, statuses: any) {
        this.projectID = projectID;
        this.testPlanSprintCaseID = testPlanSprintCaseID;
        this.testPlanSprintID = testPlanSprintID;
        this.testCaseID = testCaseID;
        this.testerID = testerID;
        this.modal = jQuery(modalID);
        this.statuses = statuses;
        this.init();
    }
    
    public init() {
        this.disableTesting();
        this.modal.modal();
        let testCase = this;
        this.setSelectBoxValues(function() {
            testCase.timer = new Timer(testCase, function() {
                testCase.forceStatus = new ForceStatus(testCase, function() {
                    testCase.issue = new Issue(testCase, function() {
                        testCase.registerEvents();
                    });
                });
            });
        });
    }

    /* This function enable testing by allowing us to manipulate with HTML objects */
    public enableTesting() {
        let selects = doc.getElementsByClassName("statusSelect");
        for (var i = 0; i < selects.length; i++) {
            selects.item(i).classList.remove("disabledButton");
        }
    }
    
    /* This function disable testing by not allowing us to manipulate with HTML objects */
    public disableTesting() {
        
        let selects = doc.getElementsByClassName("statusSelect");
        let saveButtons = doc.getElementsByClassName("saveButtonWrapper");
        for (var i = 0; i < selects.length; i++) {
            selects.item(i).className += " disabledButton";
            saveButtons.item(i).style.display = "none";
        }
    }
    
    public statusTheRow(key: string, value: any) {
        let newClass = Functions.getStatusClassByID(value);
        let tr = document.querySelector("tr[data-teststepid='" + key + "']");
        let select = document.querySelector("tr[data-teststepid='" + key + "'] select");
        
        let button = jQuery(select).parent().find(".saveButtonWrapper");
        let showAddNewIssue = jQuery(select).closest("td").find(".showAddNewIssue");


        // if value is failed, enable to add bug
        if (value > 2) {
            showAddNewIssue.show();
        } else {
            showAddNewIssue.hide();
        }
        
        select.value = value;
        select.dataset.currentvalue = value;
        tr.className = newClass;
        button.fadeOut();
    }
    
    public isSomethingNotSaved() {
        var buttons = jQuery(".saveButtonWrapper");
        var returner = false;
        jQuery.each(buttons, function() {
            var dis = jQuery(this);
            if (dis.is(":visible")) {
                returner = true;
                return false;
            }
        });
        return returner;
    }
    
    /* This function inserts text execution into database */
    public executeTest(button: any) {
        
        let testCase = this;
        var dis = jQuery(button);
        var select = dis.parent().parent().find("select");
        var status = select.val();
        var testStepID = dis.data("teststepid");

        jQuery.nette.ajax({
            url: Functions.getLink("insertTestExecutionLink"),
            data: {
                creatorID: testCase.testerID,
                statusID: status,
                testPlanSprintCaseID: testCase.testPlanSprintCaseID,
                testStepID: testStepID
            },
            start: function() {
                testCase.ajax(true);
            },
            success: function(payload) {
                var success = payload.success;

                if (success > 0) {
                    dis.closest("td").find(".showAddNewIssue").data("teststepexecutionid", payload.success);
                    testCase.statusTheRow(testStepID, status);
                    testCase.refreshDatagrid();
                }
                testCase.ajax(false);
            }
        });
        
    }
    
    public showHistoryModal(payload: any) {
        
        var table = jQuery(".historyteststeptable");
        let data = JSON.parse(payload.data);
        let testCase = this;
        table.find("tbody tr").remove();

        /** HISTORY STATUSES */
        if (data.length > 0) {
            jQuery.each(data, function() {
                var val = jQuery(this);
                var newClass = Functions.getStatusClassByID(val[0].status.toString());

                let issue = "";
                let issueId = val[0].issueId;
                if (issueId > 0) {
                    issue = " <span class='fa fa-bug showIssueInModal marg-10-left' title='Zobraziť issue' data-issueid='" + issueId + "'></span><small>#" + issueId + "</small>";
                } else {
                    issue = "";
                }

                var tr = "<tr class='"+ newClass+" nowrap'>"
                        +"<td>"+ val[0].user +"</td>"
                        +"<td>"+ testCase.statuses[val[0].status] + issue + "</td>"
                        +"<td>"+ val[0].create_date +"</td>" 
                        +"</tr>";

                table.find("tbody").append(tr);
            });
        } else {
            var noRecordsTr = "<tr><td colspan='3'>Neexistujú zatiaľ žiadne záznamy</td></tr>";
            table.find("tbody").append(noRecordsTr);
        }

        var tableissues = jQuery(".historyissuetable");
        let dataissues = JSON.parse(payload.dataissues);
        tableissues.find("tbody tr").remove();

        /** HISTORY ISSUES */
        if (dataissues.length > 0) {
            jQuery.each(dataissues, function() {
                var val = jQuery(this);

                let issue = " <span class='fa fa-bug marg-10-left showIssueInModal' title='Zobraziť issue' data-issueid='" + val[0].issueId + "'></span>";

                var tr = "<tr class='danger nowrap'>"
                    +"<td>"+ val[0].issueId +"</td>"
                    +"<td>"+ val[0].user +"</td>"
                    +"<td>"+ val[0].create_date + issue +"</td>"
                    +"</tr>";

                tableissues.find("tbody").append(tr);
            });
        } else {
            var noRecordsTr = "<tr><td colspan='2'>Neexistujú zatiaľ žiadne záznamy</td></tr>";
            tableissues.find("tbody").append(noRecordsTr);
        }




        var historyModal = jQuery("#historyModal");
        historyModal.modal();
        centerModals(historyModal);
    }
    
    public shouldCloseWithForce() {
        jQuery("#stopTimerWithForce").modal();
    }
    
    /* This functions register events that can happen in test case */
    public registerEvents() {
        let testCase = this;
        
        let submitButtons = doc.querySelectorAll(".submittestexecution");
        for (var i = 0; i < submitButtons.length; i++) {
            submitButtons[i].addEventListener("click", function() {
                if (!testCase.isAjaxGoing()) {
                    testCase.executeTest(this);
                }
            });
        }
        
        jQuery(document).on("click", ".showTestStepHistory", function() {

            var dis = jQuery(this);
            var testStepID = dis.data("teststepid");
            jQuery.nette.ajax({
                url: Functions.getLink("getTestStepHistoryLink"),
                data: {
                    testStepID: testStepID,
                    testPlanSprintCaseID: testCase.testPlanSprintCaseID
                },
                start: function() {
                    testCase.ajax(true);
                },
                success: function(payload) {
                    testCase.ajax(false);
                    testCase.showHistoryModal(payload);
                }
            });

        });
        
        jQuery(document).on("click", ".closeTestPlanCase", function() {
            
            // is something not saved?
            if (testCase.isSomethingNotSaved()) {
                jQuery("#closeEverything").modal();
            // if nothing was changed, we can close it
            } else {
                jQuery("#testPlanCase").modal("hide");
            }            
            
        });
        
        jQuery(document).on("click", ".closeEverythingButton", function() {
            jQuery("#closeEverything").modal("hide");
            jQuery("#testPlanCase").modal("hide");
        });
        
        jQuery(document).on("click", ".closeEverythingWithForceButton", function() {
            testCase.setSelectBoxValues(function() {
                jQuery("#stopTimerWithForce").modal("hide");
            });
        });
        
        let statusSelects = doc.getElementsByClassName("statusSelect");
        for (var i = 0; i < statusSelects.length; i++) {
            statusSelects[i].addEventListener('change', function(event) {
                
                let target = event.target;
                let inputGroupBtn = target.nextElementSibling;
                var currentValue = target.dataset.currentvalue;
                var newValue = target.value;
                
                if (currentValue == newValue) {
                    inputGroupBtn.style.display = "none";
                } else {
                    inputGroupBtn.style.display = "inline-block";
                }
            });
        }
    }
    
    /** This functions refresh datagrid items */
    public refreshDatagrid() {
        let testCase = this;
        jQuery.nette.ajax({
            url: Functions.getLink("redrawDatagridLink"),
            start: function() {
                testCase.ajax(true);
            },
            success: function() {
                testCase.ajax(false);
            }
        });
    }
    
    public setSelectBoxValues(onDone: Function) {

        var testCase = this;
        jQuery.nette.ajax({
            url: Functions.getLink("getTestedTestStepsLink"),
            data: {
                testPlanSprintCaseID: testCase.testPlanSprintCaseID
            },
            start: function() {
                testCase.ajax(true);
            },
            success: function(payload) {
                testCase.ajax(false);
                var data = JSON.parse(payload.data);
                for (var key in data) {
                    testCase.statusTheRow(key.toString(), data[key].toString());
                }
                onDone();
            }
        });
    }
    
    public ajax(val: boolean) {
        this.isAjax = val;
    }
    
    public isAjaxGoing():boolean {
        return this.isAjax;
    }
}