window.onload = function () {
    var agree = $("js-agree");
    var submit = $("js-submit");
    submit.disabled=!agree.checked;
    agree.onclick = function () {
        submit.disabled=!this.checked;
    };
    submit.onclick=function () {
        this.form.action = "./index.php?step=check";
    };
};