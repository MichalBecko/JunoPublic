/**
 * Created by Matej on 6.2.2018.
 */
var Issue = (function () {
    function Issue(testCase, onInit) {
        this.testStepID = 0;
        this.testStepExecutionID = 0;
        this.wasIssueSubmitted = false;
        this.testCase = testCase;
        this.registerEvents();
        onInit();
    }
    Issue.prototype.registerEvents = function () {
        var issue = this;
        jQuery(".showAddNewIssue").on("click", function () {
            // prepare data
            issue.testStepID = jQuery(this).data("teststepid");
            issue.testStepExecutionID = jQuery(this).data("teststepexecutionid");
            jQuery("#issueModal").find("input[name='project']").val(issue.testCase.projectID);
            jQuery("#issueModal").find("input[name='testPlanSprint']").val(issue.testCase.testPlanSprintID);
            jQuery("#issueModal").find("input[name='testPlanSprintCase']").val(issue.testCase.testPlanSprintCaseID);
            jQuery("#issueModal").find("input[name='testStep']").val(jQuery(this).data("teststepid"));
            jQuery("#issueModal").find("input[name='testStepExecution']").val(issue.testStepExecutionID);
            jQuery("#issueModal").modal();
        });
        jQuery.nette.ext('initFormsValidation', false);
        jQuery.nette.ext('initFormsValidation', {
            before: function (a, b) {
                if (b.hasOwnProperty("nette")) {
                    issue.wasIssueSubmitted = jQuery(b.nette.ui).hasClass("submitIssue");
                }
                else {
                    issue.wasIssueSubmitted = false;
                }
            },
            success: function (payload) {
                if (issue.wasIssueSubmitted) {
                    if (payload.success == 1) {
                        jQuery(".issue-errors").hide();
                        jQuery("#issueModal").modal("hide");
                    }
                    else {
                        jQuery(".issue-errors").fadeIn();
                    }
                }
            }
        });
        jQuery(document).on("click", ".showIssueInModal", function () {
            var issueId = jQuery(this).data("issueid");
            jQuery.nette.ajax({
                url: Functions.getLink("getIssueLink"),
                data: {
                    issueId: issueId
                },
                start: function () {
                    testCase.ajax(true);
                },
                success: function (payload) {
                    testCase.ajax(false);
                    var data = JSON.parse(payload.data);
                    var modal = jQuery("#showIssueModal");
                    modal.find(".issueName p").text(data.issueName);
                    modal.find(".issueDescription p").text(data.description);
                    modal.find(".issuePriorita p").text(data.priority_id);
                    modal.find(".issueType p").text(data.issue_type_id);
                    modal.find(".issueCreator p").text(data.name);
                    modal.find(".issueCreateDate p").text(data.create_date);
                    // data fill from payload
                    var attachments = data.attachments;
                    var ul = modal.find(".attachments");
                    ul.find("li").remove();
                    for (var key in attachments) {
                        var li = "<li><a href='" + Functions.getLink("basepath") + "/" + attachments[key] + "' target='_blank'><span class='fa fa-file'></span> " + key + "</a></li>";
                        ul.append(li);
                    }
                    jQuery("#showIssueModal").modal();
                }
            });
        });
        $(document).on("click", ".addToContainer", function () {
            var dis = $(this);
            var inputGroup = dis.closest(".multiplierContainer").eq(0);
            var html = inputGroup.clone().wrap('<p/>').parent().html();
            $(html).insertAfter(inputGroup);
            return false;
        });
        $(document).on("click", ".removeFromContainer", function () {
            var dis = $(this);
            var inputGroup = dis.closest(".multiplierContainer").eq(0);
            var count = inputGroup.parent().find(".multiplierContainer").length;
            if (count > 1) {
                inputGroup.remove();
            }
            return false;
        });
    };
    return Issue;
}());
