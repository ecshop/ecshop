<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $lang['setting_title']; ?></title>
    <link href="styles/general.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/transport.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/draggable.js"></script>
    <script type="text/javascript" src="js/setting.js"></script>
    <script type="text/javascript">
        var $_LANG = {};
        <?php foreach ($lang['js_languages'] as $key => $item): ?>
        $_LANG["<?php echo $key;?>"] = "<?php echo $item;?>";
        <?php endforeach; ?>
    </script>
</head>
<body id="checking">
<?php include ROOT_PATH . 'install/templates/header.php'; ?>
<div id="content">
<form id="js-setting">
    <table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
        <tr>
            <td valign="top">
                <div id="wrapper">

                    <h3><?php echo $lang['db_account']; ?></h3>

                    <table width="450" class="list">
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_host']; ?></td>
                            <td align="left"><input type="text" name="js-db-host" value="localhost"/></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_port']; ?></td>
                            <td align="left"><input type="text" name="js-db-port" value="3306"/></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_user']; ?></td>
                            <td align="left"><input type="text" name="js-db-user" value="root"/></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_pass']; ?></td>
                            <td align="left"><input type="password" name="js-db-pass" value=""/></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_name']; ?></td>
                            <td align="left"><input type="text" name="js-db-name" value=""/>
                                <select name="js-db-list">
                                    <option><?php echo $lang['db_list']; ?></option>
                                </select>
                                <input type="button" name="js-go" class="button" value="<?php echo $lang['go']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['db_prefix']; ?></td>
                            <td align="left"><input type="text" name="js-db-prefix" value="ecs_"/><span class="comment">&nbsp; (<?php echo $lang['change_prefix']; ?>)</span>
                            </td>
                        </tr>
                    </table>
                    <div id="js-monitor"
                         style="display:none;text-align:left;position:absolute;top:45%;left:35%;width:300px;z-index:1000;border:1px solid #000;">
                        <h3 id="js-monitor-title"><?php echo $lang['monitor_title']; ?></h3>
                        <div style="background:#fff;padding-bottom:20px;">
                            <img id="js-monitor-loading" src='images/loading.gif'/><br/><br/>
                            <strong id="js-monitor-wait-please"
                                    style='color:blue;width:65%;float:left;margin-left:3px;'></strong>
                            <span id="js-monitor-view-detail"
                                  style="color:gray;cursor:pointer;;float:right;margin-right:3px;"></span>
                        </div>
                        <div id="js-monitor-notice" name="js-monitor-notice" style="display:none;">
                            <div id="js-notice"
                                 style="background:#fff;margin:0px;padding:5px 0 0 3px;height:100%;font:12px  Arial, Helvetica, sans-serif;line-height:130%; border-color: #BBDDE5 -moz-use-text-color #BBDDE5 #BBDDE5;border-style: dashed;border-width: 1px 0 0 0;"></div>
                            <a id="js-bottom"></a>
                        </div>
                        <img id="js-monitor-close" src='./images/close.gif'
                             style="position:absolute;top:10px;right:10px;cursor:pointer;"/>
                    </div>
                    <h3><?php echo $lang['admin_account']; ?></h3>
                    <table width="450" class="list">
                        <tr>
                            <td width="90" align="left"><?php echo $lang['admin_name']; ?></td>
                            <td align="left"><input type="text" name="js-admin-name" value=""/></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['admin_password']; ?></td>
                            <td align="left"><input type="password" name="js-admin-password" value=""/><span
                                        id="js-admin-password-result"></span></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['password_intensity']; ?></td>
                            <td align="left">
                                <table width="132" cellspacing="0" cellpadding="1" border="0">
                                    <tbody>
                                    <tr align="center">
                                        <td width="33%" id="pwd_lower"
                                            style="border-bottom: 2px solid red;"><?php echo $lang['pwd_lower']; ?></td>
                                        <td width="33%" id="pwd_middle"
                                            style="border-bottom: 2px solid rgb(218, 218, 218);"><?php echo $lang['pwd_middle']; ?></td>
                                        <td width="33%" id="pwd_high"
                                            style="border-bottom: 2px solid rgb(218, 218, 218);"><?php echo $lang['pwd_high']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['admin_password2']; ?></td>
                            <td align="left"><input type="password" name="js-admin-password2" value=""/><span
                                        id="js-admin-confirmpassword-result"></span></td>
                        </tr>
                        <tr>
                            <td width="90" align="left"><?php echo $lang['admin_email']; ?></td>
                            <td align="left"><input type="text" name="js-admin-email" value=""/></td>
                        </tr>
                    </table>

                </div>
            </td>
            <td width="227" valign="top" background="images/install-step3.gif">&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <div id="install-btn"><input type="button" id="js-pre-step" class="button"
                                             value="<?php echo $lang['prev_step'] . $lang['check_system_environment']; ?>"/>
                    <input id="js-install-at-once" type="submit" class="button"
                           value="<?php echo $lang['install_at_once']; ?>"/></div>
            </td>
            <td></td>
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
    var f = $("js-setting");

    f.setAttribute("action", "javascript:install();void 0;");

    f["js-db-name"].onblur = function () {
        var list = getDbList();
        for (var i = 0; i < list.length; i++) {
            if (f["js-db-name"].value === list[i]) {
                var answer = confirm($_LANG["db_exists"]);
                if (answer === false) {
                    f["js-db-name"].value = "";
                }
            }
        }
    }
    f["js-admin-password"].onblur = function () {
        var password = f['js-admin-password'].value;
        var confirm_password = f['js-admin-password2'].value;
        if (!(password.length >= 8 && /\d+/.test(password) && /[a-zA-Z]+/.test(password))) {
            $("js-install-at-once").setAttribute("disabled", "true");
            if (!(password.length >= 8)) {
                $("js-admin-password-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_short"] + "<\/span>";
            } else {
                $("js-admin-password-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_invaild"] + "<\/span>";
            }
        } else {
            $("js-admin-password-result").innerHTML = "<img src='images\/yes.gif'>";
            if (password == confirm_password) {
                $("js-install-at-once").removeAttribute("disabled");
                $("js-admin-confirmpassword-result").innerHTML = "<img src='images\/yes.gif'>";
            } else {
                $("js-install-at-once").setAttribute("disabled", "true");
                if (confirm_password != '') {
                    $("js-admin-confirmpassword-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_not_eq"] + "<\/span>";
                }
            }
        }
    }
    f["js-admin-password2"].onblur = function () {
        var password = f['js-admin-password'].value;
        var confirm_password = f['js-admin-password2'].value;
        if (!(confirm_password.length >= 8 && /\d+/.test(confirm_password) && /[a-zA-Z]+/.test(confirm_password) && password == confirm_password)) {
            $("js-install-at-once").setAttribute("disabled", "true");

            if (!(confirm_password.length >= 8)) {
                $("js-admin-confirmpassword-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_short"] + "<\/span>";
            } else {
                if (password == confirm_password) {
                    $("js-admin-confirmpassword-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_invaild"] + "<\/span>";
                } else {
                    $("js-admin-confirmpassword-result").innerHTML = "<span class='comment'><img src='images\/no.gif'>" + $_LANG["password_not_eq"] + "<\/span>";
                }
            }
        } else {
            $("js-install-at-once").removeAttribute("disabled");
            $("js-admin-confirmpassword-result").innerHTML = "<img src='images\/yes.gif'>";
        }
    }
    f["js-admin-password"].onkeyup = function () {
        var pwd = f['js-admin-password'].value;
        var Mcolor = "#FFF", Lcolor = "#FFF", Hcolor = "#FFF";
        var m = 0;

        var Modes = 0;
        for (i = 0; i < pwd.length; i++) {
            var charType = 0;
            var t = pwd.charCodeAt(i);
            if (t >= 48 && t <= 57) {
                charType = 1;
            } else if (t >= 65 && t <= 90) {
                charType = 2;
            } else if (t >= 97 && t <= 122)
                charType = 4;
            else
                charType = 4;
            Modes |= charType;
        }

        for (i = 0; i < 4; i++) {
            if (Modes & 1) m++;
            Modes >>>= 1;
        }

        if (pwd.length <= 4) {
            m = 1;
        }

        switch (m) {
            case 1 :
                Lcolor = "2px solid red";
                Mcolor = Hcolor = "2px solid #DADADA";
                break;
            case 2 :
                Mcolor = "2px solid #f90";
                Lcolor = Hcolor = "2px solid #DADADA";
                break;
            case 3 :
                Hcolor = "2px solid #3c0";
                Lcolor = Mcolor = "2px solid #DADADA";
                break;
            case 4 :
                Hcolor = "2px solid #3c0";
                Lcolor = Mcolor = "2px solid #DADADA";
                break;
            default :
                Hcolor = Mcolor = Lcolor = "";
                break;
        }
        if (document.getElementById("pwd_lower")) {
            document.getElementById("pwd_lower").style.borderBottom = Lcolor;
            document.getElementById("pwd_middle").style.borderBottom = Mcolor;
            document.getElementById("pwd_high").style.borderBottom = Hcolor;
        }


    }
    f["js-go"].onclick = displayDbList;

    f["js-monitor-close"].onclick = function () {
        $("js-monitor").style.display = "none";
        unlockSpecInputs();
    };

    var detail = $("js-monitor-view-detail")
    detail.innerHTML = $_LANG["display_detail"];
    detail.onclick = function () {
        var mn = $("js-monitor-notice");
        if (mn.style.display === "block") {
            mn.style.display = "none"
            this.innerHTML = $_LANG["display_detail"];
        } else {
            mn.style.display = "block"
            this.innerHTML = $_LANG["hide_detail"];
        }
    };

    notice = $("js-notice");
    var d = new Draggable();
    d.bindDragNode("js-monitor", "js-monitor-title");

    $("js-pre-step").onclick = function () {
        location.href = "./index.php?step=check";
    };
};
</script>
</body>
</html>
