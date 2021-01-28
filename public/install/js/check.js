window.onload = function () {
    $("js-pre-step").onclick = function() {
        location.href="./index.php?step=welcome";
    };
    $("js-recheck").onclick = function () {
        location.href="./index.php?step=check";
    };
    $("js-submit").onclick = function () {
        this.form.action="index.php?step=setting_ui";
    };
};