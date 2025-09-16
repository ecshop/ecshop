<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

class ecs_error
{
    public $_message = [];

    public $_template = '';

    public $error_no = 0;

    /**
     * 构造函数
     *
     * @param  string  $tpl
     * @return void
     */
    public function __construct($tpl)
    {
        $this->_template = $tpl;
    }

    /**
     * 添加一条错误信息
     *
     * @param  string  $msg
     * @param  int  $errno
     * @return void
     */
    public function add($msg, $errno = 1)
    {
        if (is_array($msg)) {
            $this->_message = array_merge($this->_message, $msg);
        } else {
            $this->_message[] = $msg;
        }

        $this->error_no = $errno;
    }

    /**
     * 清空错误信息
     *
     * @return void
     */
    public function clean()
    {
        $this->_message = [];
        $this->error_no = 0;
    }

    /**
     * 返回所有的错误信息的数组
     *
     * @return array
     */
    public function get_all()
    {
        return $this->_message;
    }

    /**
     * 返回最后一条错误信息
     *
     * @return void
     */
    public function last_message()
    {
        return array_slice($this->_message, -1);
    }

    /**
     * 显示错误信息
     *
     * @param  string  $link
     * @param  string  $href
     * @return void
     */
    public function show($link = '', $href = '')
    {
        if ($this->error_no > 0) {
            $message = [];

            $link = (empty($link)) ? $GLOBALS['_LANG']['back_up_page'] : $link;
            $href = (empty($href)) ? 'javascript:history.back();' : $href;
            $message['url_info'][$link] = $href;
            $message['back_url'] = $href;

            foreach ($this->_message as $msg) {
                $message['content'] = '<div>'.htmlspecialchars($msg).'</div>';
            }

            if (isset($GLOBALS['smarty'])) {
                assign_template();
                $GLOBALS['smarty']->assign('auto_redirect', true);
                $GLOBALS['smarty']->assign('message', $message);
                $GLOBALS['smarty']->display($this->_template);
            } else {
                exit($message['content']);
            }

            exit;
        }
    }
}
