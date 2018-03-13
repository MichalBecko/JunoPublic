/**
 * this is a helper class; you can assume "unix" is a valid timestamp;
 * you can also use the date_iso8601 format if you are familiar with it
 * todo : nothing
 */
var Functions = (function () {
    function Functions() {
    }
    Functions.addZeroOneChar = function (char) {
        if (char < 10) {
            return "0" + char;
        }
        else {
            return "" + char;
        }
    };
    Functions.getLink = function (linkID) {
        var link = doc.getElementById(linkID).dataset.link;
        return "" + link;
    };
    Functions.getStatusClassByID = function (statusID) {
        var newClass = "";
        switch (statusID) {
            case "1":
                newClass = "";
                break;
            case "2":
                newClass = "success";
                break;
            case "3":
                newClass = "danger";
                break;
            case "4":
                newClass = "warning";
                break;
            case "5":
                newClass = "warning";
                break;
        }
        return newClass;
    };
    ;
    return Functions;
}());
