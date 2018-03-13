/**
 * this is a helper class; you can assume "unix" is a valid timestamp;
 * you can also use the date_iso8601 format if you are familiar with it
 * todo : nothing
 */
var doc = document;
var jQuery = $;
var modalID = "#testPlanCase";
var TestCase = (function () {
    /* we set unix in contructor */
    function TestCase(testPlanSprintCaseID, testPlanSprintID, testCaseID, testerID, projectID, statuses) {
        this.isAjax = false;
        this.projectID = projectID;
        this.testPlanSprintCaseID = testPlanSprintCaseID;
        this.testPlanSprintID = testPlanSprintID;
        this.testCaseID = testCaseID;
        this.testerID = testerID;
        this.modal = jQuery(modalID);
        this.statuses = statuses;
        this.init();
    }
    TestCase.prototype.init = function () {
        this.disableTesting();
        this.modal.modal();
        var testCase = this;
        this.setSelectBoxValues(function () {
            testCase.timer = new Timer(testCase, function () {
                testCase.forceStatus = new ForceStatus(testCase, function () {
                    testCase.issue = new Issue(testCase, function () {
                        testCase.registerEvents();
                    });
                });
            });
        });
    };
    /* This function enable testing by allowing us to manipulate with HTML objects */
    TestCase.prototype.enableTesting = function () {
        var selects = doc.getElementsByClassName("statusSelect");
        for (var i = 0; i < selects.length; i++) {
            selects.item(i).classList.remove("disabledButton");
        }
    };
    /* This function disable testing by not allowing us to manipulate with HTML objects */
    TestCase.prototype.disableTesting = function () {
        var selects = doc.getElementsByClassName("statusSelect");
        var saveButtons = doc.getElementsByClassName("saveButtonWrapper");
        for (var i = 0; i < selects.length; i++) {
            selects.item(i).className += " disabledButton";
            saveButtons.item(i).style.display = "none";
        }
    };
    TestCase.prototype.statusTheRow = function (key, value) {
        var newClass = Functions.getStatusClassByID(value);
        var tr = document.querySelector("tr[data-teststepid='" + key + "']");
        var select = document.querySelector("tr[data-teststepid='" + key + "'] select");
        var button = jQuery(select).parent().find(".saveButtonWrapper");
        var showAddNewIssue = jQuery(select).closest("td").find(".showAddNewIssue");
        // if value is failed, enable to add bug
        if (value > 2) {
            showAddNewIssue.show();
        }
        else {
            showAddNewIssue.hide();
        }
        select.value = value;
        select.dataset.currentvalue = value;
        tr.className = newClass;
        button.fadeOut();
    };
    TestCase.prototype.isSomethingNotSaved = function () {
        var buttons = jQuery(".saveButtonWrapper");
        var returner = false;
        jQuery.each(buttons, function () {
            var dis = jQuery(this);
            if (dis.is(":visible")) {
                returner = true;
                return false;
            }
        });
        return returner;
    };
    /* This function inserts text execution into database */
    TestCase.prototype.executeTest = function (button) {
        var testCase = this;
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
            start: function () {
                testCase.ajax(true);
            },
            success: function (payload) {
                var success = payload.success;
                if (success > 0) {
                    dis.closest("td").find(".showAddNewIssue").data("teststepexecutionid", payload.success);
                    testCase.statusTheRow(testStepID, status);
                    testCase.refreshDatagrid();
                }
                testCase.ajax(false);
            }
        });
    };
    TestCase.prototype.showHistoryModal = function (payload) {
        var table = jQuery(".historyteststeptable");
        var data = JSON.parse(payload.data);
        var testCase = this;
        table.find("tbody tr").remove();
        /** HISTORY STATUSES */
        if (data.length > 0) {
            jQuery.each(data, function () {
                var val = jQuery(this);
                var newClass = Functions.getStatusClassByID(val[0].status.toString());
                var issue = "";
                var issueId = val[0].issueId;
                if (issueId > 0) {
                    issue = " <span class='fa fa-bug showIssueInModal marg-10-left' title='Zobraziť issue' data-issueid='" + issueId + "'></span><small>#" + issueId + "</small>";
                }
                else {
                    issue = "";
                }
                var tr = "<tr class='" + newClass + " nowrap'>"
                    + "<td>" + val[0].user + "</td>"
                    + "<td>" + testCase.statuses[val[0].status] + issue + "</td>"
                    + "<td>" + val[0].create_date + "</td>"
                    + "</tr>";
                table.find("tbody").append(tr);
            });
        }
        else {
            var noRecordsTr = "<tr><td colspan='3'>Neexistujú zatiaľ žiadne záznamy</td></tr>";
            table.find("tbody").append(noRecordsTr);
        }
        var tableissues = jQuery(".historyissuetable");
        var dataissues = JSON.parse(payload.dataissues);
        tableissues.find("tbody tr").remove();
        /** HISTORY ISSUES */
        if (dataissues.length > 0) {
            jQuery.each(dataissues, function () {
                var val = jQuery(this);
                var issue = " <span class='fa fa-bug marg-10-left showIssueInModal' title='Zobraziť issue' data-issueid='" + val[0].issueId + "'></span>";
                var tr = "<tr class='danger nowrap'>"
                    + "<td>" + val[0].issueId + "</td>"
                    + "<td>" + val[0].user + "</td>"
                    + "<td>" + val[0].create_date + issue + "</td>"
                    + "</tr>";
                tableissues.find("tbody").append(tr);
            });
        }
        else {
            var noRecordsTr = "<tr><td colspan='2'>Neexistujú zatiaľ žiadne záznamy</td></tr>";
            tableissues.find("tbody").append(noRecordsTr);
        }
        var historyModal = jQuery("#historyModal");
        historyModal.modal();
        centerModals(historyModal);
    };
    TestCase.prototype.shouldCloseWithForce = function () {
        jQuery("#stopTimerWithForce").modal();
    };
    /* This functions register events that can happen in test case */
    TestCase.prototype.registerEvents = function () {
        var testCase = this;
        var submitButtons = doc.querySelectorAll(".submittestexecution");
        for (var i = 0; i < submitButtons.length; i++) {
            submitButtons[i].addEventListener("click", function () {
                if (!testCase.isAjaxGoing()) {
                    testCase.executeTest(this);
                }
            });
        }
        jQuery(document).on("click", ".showTestStepHistory", function () {
            var dis = jQuery(this);
            var testStepID = dis.data("teststepid");
            jQuery.nette.ajax({
                url: Functions.getLink("getTestStepHistoryLink"),
                data: {
                    testStepID: testStepID,
                    testPlanSprintCaseID: testCase.testPlanSprintCaseID
                },
                start: function () {
                    testCase.ajax(true);
                },
                success: function (payload) {
                    testCase.ajax(false);
                    testCase.showHistoryModal(payload);
                }
            });
        });
        jQuery(document).on("click", ".closeTestPlanCase", function () {
            // is something not saved?
            if (testCase.isSomethingNotSaved()) {
                jQuery("#closeEverything").modal();
                // if nothing was changed, we can close it
            }
            else {
                jQuery("#testPlanCase").modal("hide");
            }
        });
        jQuery(document).on("click", ".closeEverythingButton", function () {
            jQuery("#closeEverything").modal("hide");
            jQuery("#testPlanCase").modal("hide");
        });
        jQuery(document).on("click", ".closeEverythingWithForceButton", function () {
            testCase.setSelectBoxValues(function () {
                jQuery("#stopTimerWithForce").modal("hide");
            });
        });
        var statusSelects = doc.getElementsByClassName("statusSelect");
        for (var i = 0; i < statusSelects.length; i++) {
            statusSelects[i].addEventListener('change', function (event) {
                var target = event.target;
                var inputGroupBtn = target.nextElementSibling;
                var currentValue = target.dataset.currentvalue;
                var newValue = target.value;
                if (currentValue == newValue) {
                    inputGroupBtn.style.display = "none";
                }
                else {
                    inputGroupBtn.style.display = "inline-block";
                }
            });
        }
    };
    /** This functions refresh datagrid items */
    TestCase.prototype.refreshDatagrid = function () {
        var testCase = this;
        jQuery.nette.ajax({
            url: Functions.getLink("redrawDatagridLink"),
            start: function () {
                testCase.ajax(true);
            },
            success: function () {
                testCase.ajax(false);
            }
        });
    };
    TestCase.prototype.setSelectBoxValues = function (onDone) {
        var testCase = this;
        jQuery.nette.ajax({
            url: Functions.getLink("getTestedTestStepsLink"),
            data: {
                testPlanSprintCaseID: testCase.testPlanSprintCaseID
            },
            start: function () {
                testCase.ajax(true);
            },
            success: function (payload) {
                testCase.ajax(false);
                var data = JSON.parse(payload.data);
                for (var key in data) {
                    testCase.statusTheRow(key.toString(), data[key].toString());
                }
                onDone();
            }
        });
    };
    TestCase.prototype.ajax = function (val) {
        this.isAjax = val;
    };
    TestCase.prototype.isAjaxGoing = function () {
        return this.isAjax;
    };
    return TestCase;
}());
