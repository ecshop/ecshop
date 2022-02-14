<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $lang['welcome_title']; ?></title>
    <link href="styles/general.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/transport.js"></script>
</head>
<body id="welcome">
<?php include ROOT_PATH . 'install/templates/header.php'; ?>
<div id="content">
    <form method="post">
        <table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
            <tr>
                <td valign="top">
                    <div id="wrapper" style="padding:30px 0;">
                        <iframe id="iframe" src="templates/license.htm" width="730" height="350"></iframe>
                    </div>
                </td>
                <td width="227" valign="top" background="images/install-step1.gif">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" style="padding-top:10px;"><input type="checkbox" id="js-agree" class="p"/>
                    <label for="js-agree"> <?php echo $lang['agree_license']; ?></label><br/>
                    <span id="install-btn">
                        <input class="button" type="submit" id="js-submit" class="p" value="<?php echo $lang['next_step']; ?><?php echo $lang['setup_environment']; ?>"/>
                    </span>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
</div>
<div id="copyright">
    <div id="copyright-inside">
        <?php include ROOT_PATH . 'install/templates/copyright.php'; ?>
    </div>
</div>
<script type="text/javascript">
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
</script>
</body>
</html>