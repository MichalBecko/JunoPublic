/**
 * this is a helper class; you can assume "unix" is a valid timestamp;
 * you can also use the date_iso8601 format if you are familiar with it
 * todo : nothing
 */
var Timer = (function () {
    function Timer(testCase, onInit) {
        this.status = 0;
        this.testCase = testCase;
        this.startButton = doc.getElementById("playTimer");
        this.stopButton = doc.getElementById("stopTimer");
        this.clock = doc.getElementById("clock");
        this.registerClickEvents();
        this.init(onInit);
    }
    /* This function is called mainly for loading initials */
    Timer.prototype.init = function (onInit) {
        var timer = this;
        this.isCurrentlyRunning(function () {
            if (timer.status == 1) {
                timer.interval = setInterval(timer.refreshCurrentTime, 1000);
                timer.startButton.style.display = "none";
                timer.stopButton.style.display = "inline-block";
                timer.testCase.enableTesting();
            }
            onInit();
        });
    };
    /* this is what happens when we click start timer */
    Timer.prototype.startTimer = function () {
        var timer = this;
        if (timer.canStartTimer()) {
            this.startTimerInDB(function () {
                timer.startTiming();
            });
        }
    };
    /* This functions is either called by manual click on play OR automatically when we load test case */
    Timer.prototype.startTiming = function () {
        if (this.status == 0) {
            var currentDate = new Date();
            this.startStamp = currentDate.getTime();
        }
        this.status = 1;
        this.interval = setInterval(this.refreshCurrentTime, 1000);
        this.startButton.style.display = "none";
        this.stopButton.style.display = "inline-block";
        this.testCase.enableTesting();
        this.testCase.refreshDatagrid();
    };
    /* This functions stops current time */
    Timer.prototype.stopTimer = function () {
        var timer = this;
        this.stopTimerDB(function () {
            timer.status = 0;
            clearInterval(timer.interval);
            timer.stopButton.style.display = "none";
            timer.startButton.style.display = "inline-block";
            timer.clock.innerHTML = "00:00:00";
            timer.testCase.disableTesting();
            timer.testCase.refreshDatagrid();
        });
    };
    /* This functions register clicks in TestCaseForm */
    Timer.prototype.registerClickEvents = function () {
        var timer = this;
        this.startButton.addEventListener("click", function () {
            if (timer.testCase.isAjaxGoing()) {
                return false;
            }
            timer.startTimer();
        });
        this.stopButton.addEventListener("click", function () {
            if (timer.testCase.isAjaxGoing()) {
                return false;
            }
            timer.stopTimer();
        });
    };
    /* This function inserts new timer into DB */
    Timer.prototype.startTimerInDB = function (onSuccess) {
        var timer = this;
        jQuery.nette.ajax({
            url: Functions.getLink("startTimerLink"),
            data: {
                testPlanSprintCaseID: timer.testCase.testPlanSprintCaseID,
                testerID: timer.testCase.testerID
            },
            start: function () {
                timer.testCase.ajax(true);
            },
            success: function (payload) {
                timer.testCase.testCaseRunID = payload.testCaseRunID;
                timer.testCase.ajax(false);
                onSuccess();
            }
        });
    };
    /* This function updated row into db so timer is stopped */
    Timer.prototype.stopTimerDB = function (onSuccess) {
        var timer = this;
        if (timer.testCase.isSomethingNotSaved()) {
            timer.testCase.shouldCloseWithForce();
        }
        else {
            jQuery.nette.ajax({
                url: Functions.getLink("stopTimerLink"),
                data: {
                    testCaseRunID: timer.testCase.testCaseRunID
                },
                start: function () {
                    timer.testCase.ajax(true);
                },
                success: function (payload) {
                    timer.testCase.ajax(false);
                    onSuccess();
                }
            });
        }
    };
    /* This function checks if is timer currently running */
    Timer.prototype.isCurrentlyRunning = function (onDone) {
        var timer = this;
        jQuery.nette.ajax({
            url: Functions.getLink("isTimerRunningLink"),
            data: {
                testPlanSprintCaseID: timer.testCase.testPlanSprintCaseID,
                testerID: timer.testCase.testerID
            },
            start: function () {
                timer.testCase.ajax(true);
            },
            success: function (payload) {
                var testCaseRunID = payload.testCaseRunID;
                var startTime = payload.startTime;
                timer.status = payload.isRunning;
                if (timer.status == 1) {
                    var currentDate = new Date(startTime["Y"], startTime["m"] - 1, startTime["d"], startTime["H"], startTime["i"], startTime["s"], 0); // YYYY (M-1) D H m s ms
                    timer.startStamp = currentDate.getTime();
                    timer.testCase.testCaseRunID = testCaseRunID;
                }
                timer.testCase.ajax(false);
                onDone();
            }
        });
    };
    Timer.prototype.canStartTimer = function () {
        var countOfTestSteps = jQuery(".teststepstable tbody tr").length;
        if (countOfTestSteps > 0) {
            return true;
        }
        else {
            return false;
        }
    };
    /* DO NOT CALL this function manually, it is only being called by setInterval */
    Timer.prototype.refreshCurrentTime = function () {
        var timer = this.testCase.timer;
        var currentDate = new Date();
        var diff = Math.round((currentDate.getTime() - timer.startStamp) / 1000);
        var h = Math.floor(diff / (60 * 60));
        diff = diff - (h * 60 * 60);
        var m = Math.floor(diff / (60));
        diff = diff - (m * 60);
        var s = diff;
        if (!isNaN(h)) {
            timer.clock.innerHTML = Functions.addZeroOneChar(h) + ":" + Functions.addZeroOneChar(m) + ":" + Functions.addZeroOneChar(s);
        }
    };
    return Timer;
}());
