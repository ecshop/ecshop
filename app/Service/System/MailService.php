<?php

namespace App\Service\System;

/**
 * Class MailService
 * @package App\Service\System
 */
class MailService
{
    /**
     * 邮件发送
     *
     * @param: $name[string]        接收人姓名
     * @param: $email[string]       接收人邮件地址
     * @param: $subject[string]     邮件标题
     * @param: $content[string]     邮件内容
     * @param: $type[int]           0 普通邮件， 1 HTML邮件
     * @param: $notification[bool]  true 要求回执， false 不用回执
     *
     * @return boolean
     */
    public function send_mail($name, $email, $subject, $content, $type = 0, $notification = false)
    {
        /* 如果邮件编码不是EC_CHARSET，创建字符集转换对象，转换编码 */
        if (config('shop.mail_charset') != EC_CHARSET) {
            $name = ecs_iconv(EC_CHARSET, config('shop.mail_charset'), $name);
            $subject = ecs_iconv(EC_CHARSET, config('shop.mail_charset'), $subject);
            $content = ecs_iconv(EC_CHARSET, config('shop.mail_charset'), $content);
            $shop_name = ecs_iconv(EC_CHARSET, config('shop.mail_charset'), config('shop.shop_name'));
        }
        $charset = config('shop.mail_charset');
        /**
         * 使用mail函数发送邮件
         */
        if (config('shop.mail_service') == 0 && function_exists('mail')) {
            /* 邮件的头部信息 */
            $content_type = ($type == 0) ? 'Content-Type: text/plain; charset=' . $charset : 'Content-Type: text/html; charset=' . $charset;
            $headers = array();
            $headers[] = 'From: "' . '=?' . $charset . '?B?' . base64_encode($shop_name) . '?=' . '" <' . config('shop.smtp_mail') . '>';
            $headers[] = $content_type . '; format=flowed';
            if ($notification) {
                $headers[] = 'Disposition-Notification-To: ' . '=?' . $charset . '?B?' . base64_encode($shop_name) . '?=' . '" <' . config('shop.smtp_mail') . '>';
            }

            $res = @mail($email, '=?' . $charset . '?B?' . base64_encode($subject) . '?=', $content, implode("\r\n", $headers));

            if (!$res) {
                $GLOBALS['err']->add($GLOBALS['_LANG']['sendemail_false']);

                return false;
            } else {
                return true;
            }
        } /**
         * 使用smtp服务发送邮件
         */
        else {
            /* 邮件的头部信息 */
            $content_type = ($type == 0) ?
                'Content-Type: text/plain; charset=' . $charset : 'Content-Type: text/html; charset=' . $charset;
            $content = base64_encode($content);

            $headers = array();
            $headers[] = 'Date: ' . gmdate('D, j M Y H:i:s') . ' +0000';
            $headers[] = 'To: "' . '=?' . $charset . '?B?' . base64_encode($name) . '?=' . '" <' . $email . '>';
            $headers[] = 'From: "' . '=?' . $charset . '?B?' . base64_encode($shop_name) . '?=' . '" <' . config('shop.smtp_mail') . '>';
            $headers[] = 'Subject: ' . '=?' . $charset . '?B?' . base64_encode($subject) . '?=';
            $headers[] = $content_type . '; format=flowed';
            $headers[] = 'Content-Transfer-Encoding: base64';
            $headers[] = 'Content-Disposition: inline';
            if ($notification) {
                $headers[] = 'Disposition-Notification-To: ' . '=?' . $charset . '?B?' . base64_encode($shop_name) . '?=' . '" <' . config('shop.smtp_mail') . '>';
            }

            /* 获得邮件服务器的参数设置 */
            $params['host'] = config('shop.smtp_host');
            $params['port'] = config('shop.smtp_port');
            $params['user'] = config('shop.smtp_user');
            $params['pass'] = config('shop.smtp_pass');

            if (empty($params['host']) || empty($params['port'])) {
                // 如果没有设置主机和端口直接返回 false
                $GLOBALS['err']->add($GLOBALS['_LANG']['smtp_setting_error']);

                return false;
            } else {
                // 发送邮件
                if (!function_exists('fsockopen')) {
                    //如果fsockopen被禁用，直接返回
                    $GLOBALS['err']->add($GLOBALS['_LANG']['disabled_fsockopen']);

                    return false;
                }

                static $smtp;

                $send_params['recipients'] = $email;
                $send_params['headers'] = $headers;
                $send_params['from'] = config('shop.smtp_mail');
                $send_params['body'] = $content;

                if (!isset($smtp)) {
                    $smtp = new smtp($params);
                }

                if ($smtp->connect() && $smtp->send($send_params)) {
                    return true;
                } else {
                    $err_msg = $smtp->error_msg();
                    if (empty($err_msg)) {
                        $GLOBALS['err']->add('Unknown Error');
                    } else {
                        if (strpos($err_msg, 'Failed to connect to server') !== false) {
                            $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['smtp_connect_failure'], $params['host'] . ':' . $params['port']));
                        } elseif (strpos($err_msg, 'AUTH command failed') !== false) {
                            $GLOBALS['err']->add($GLOBALS['_LANG']['smtp_login_failure']);
                        } elseif (strpos($err_msg, 'bad sequence of commands') !== false) {
                            $GLOBALS['err']->add($GLOBALS['_LANG']['smtp_refuse']);
                        } else {
                            $GLOBALS['err']->add($err_msg);
                        }
                    }

                    return false;
                }
            }
        }
    }
}
