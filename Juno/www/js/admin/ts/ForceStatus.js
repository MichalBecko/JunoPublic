var ForceStatus = (function () {
    function ForceStatus(testCase, onInit) {
        this.isSet = false;
        this.testCase = testCase;
        this.registerEvents();
        this.init(onInit);
    }
    ForceStatus.prototype.init = function (onInit) {
        var forceStatus = this;
        jQuery.nette.ajax({
            url: Functions.getLink("getForceStatusLink"),
            data: {
                testPlanSprintCaseID: forceStatus.testCase.testPlanSprintCaseID
            },
            start: function () {
                forceStatus.testCase.ajax(true);
            },
            success: function (payload) {
                forceStatus.testCase.ajax(false);
                forceStatus.currentStatusID = payload.forcedStatusID;
                jQuery("#forceStatusSelect select").val(payload.forcedStatusID);
                jQuery("#forceStatusName").text(forceStatus.testCase.statuses[forceStatus.currentStatusID]);
                forceStatus.changeStatus(payload.forcedStatusID);
                onInit();
            }
        });
    };
    ForceStatus.prototype.changeStatus = function (newStatusID) {
        this.statusID = newStatusID;
        if (this.statusID == this.currentStatusID) {
            jQuery(".saveForceStatus").hide();
        }
        else {
            jQuery(".saveForceStatus").show();
        }
    };
    ForceStatus.prototype.setStatusInDB = function () {
        var forceStatus = this;
        jQuery.nette.ajax({
            url: Functions.getLink("setForceStatusLink"),
            data: {
                testPlanSprintCaseID: forceStatus.testCase.testPlanSprintCaseID,
                newForceStatus: forceStatus.statusID
            },
            start: function () {
                forceStatus.testCase.ajax(true);
            },
            success: function (payload) {
                forceStatus.testCase.ajax(false);
                forceStatus.currentStatusID = forceStatus.statusID;
                forceStatus.testCase.refreshDatagrid();
                forceStatus.changeStatus(forceStatus.currentStatusID);
                jQuery("#forceStatusName").text(forceStatus.testCase.statuses[forceStatus.currentStatusID]);
                jQuery("#forceStatusSelect").collapse("hide");
            }
        });
    };
    ForceStatus.prototype.registerEvents = function () {
        var forceStatus = this;
        jQuery(".saveForceStatus").on("click", function () {
            if (!forceStatus.testCase.isAjaxGoing()) {
                forceStatus.setStatusInDB();
            }
        });
        jQuery("#forceStatusSelect select").on("change", function (e) {
            forceStatus.changeStatus(e.currentTarget.selectedIndex);
        });
    };
    return ForceStatus;
}());
