

class ForceStatus {

    testCase: any,
    isSet: boolean = false;
    currentStatusID: number;
    statusID: number;

    constructor(testCase: any, onInit: Function) {
        this.testCase = testCase;
        this.registerEvents();
        this.init(onInit);
    }

    public init(onInit: Function) {

        let forceStatus = this;
        jQuery.nette.ajax({
            url: Functions.getLink("getForceStatusLink"),
            data: {
                testPlanSprintCaseID: forceStatus.testCase.testPlanSprintCaseID
            },
            start: function() {
                forceStatus.testCase.ajax(true);
            },
            success: function(payload) {
                forceStatus.testCase.ajax(false);

                forceStatus.currentStatusID = payload.forcedStatusID;
                jQuery("#forceStatusSelect select").val(payload.forcedStatusID);
                jQuery("#forceStatusName").text(forceStatus.testCase.statuses[forceStatus.currentStatusID]);

                forceStatus.changeStatus(payload.forcedStatusID);

                onInit();
            }
        });
    }

    public changeStatus(newStatusID) {
        this.statusID = newStatusID;

        if (this.statusID == this.currentStatusID) {
            jQuery(".saveForceStatus").hide();
        } else {
            jQuery(".saveForceStatus").show();
        }
    }

    public setStatusInDB() {

        let forceStatus = this;
        jQuery.nette.ajax({
            url: Functions.getLink("setForceStatusLink"),
            data: {
                testPlanSprintCaseID: forceStatus.testCase.testPlanSprintCaseID,
                newForceStatus: forceStatus.statusID
            },
            start: function() {
                forceStatus.testCase.ajax(true);
            },
            success: function(payload) {
                forceStatus.testCase.ajax(false);
                forceStatus.currentStatusID = forceStatus.statusID;
                forceStatus.testCase.refreshDatagrid();

                forceStatus.changeStatus(forceStatus.currentStatusID);
                jQuery("#forceStatusName").text(forceStatus.testCase.statuses[forceStatus.currentStatusID]);

                jQuery("#forceStatusSelect").collapse("hide");
            }
        });

    }

    public registerEvents() {
        let forceStatus = this;
        jQuery(".saveForceStatus").on("click", function() {
            if (!forceStatus.testCase.isAjaxGoing()) {
                forceStatus.setStatusInDB();
            }
        });
        jQuery("#forceStatusSelect select").on("change", function(e) {
            forceStatus.changeStatus(e.currentTarget.selectedIndex);
        });
    }

}