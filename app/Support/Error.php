<?php

declare(strict_types=1);

namespace App\Support;

class Error
{
    public array $_message = [];

    public string $_template = '';

    public int $error_no = 0;

    public function __construct($tpl)
    {
        $this->_template = $tpl;
    }

    /**
     * 添加一条错误信息
     */
    public function add($msg, $errno = 1): void
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
     */
    public function clean(): void
    {
        $this->_message = array();

        $this->error_no = 0;
    }

    /**
     * 返回所有的错误信息的数组
     */
    public function get_all(): array
    {
        return $this->_message;
    }

    /**
     * 返回最后一条错误信息
     */
    public function last_message(): array
    {
        return array_slice($this->_message, -1);
    }

    /**
     * 显示错误信息
     */
    public function show($link = '', $href = '')
    {
        if ($this->error_no > 0) {
            $message = array();

            $link = (empty($link)) ? $GLOBALS['_LANG']['back_up_page'] : $link;
            $href = (empty($href)) ? 'javascript:history.back();' : $href;
            $message['url_info'][$link] = $href;
            $message['back_url'] = $href;

            foreach ($this->_message as $msg) {
                $message['content'] = '<div>' . htmlspecialchars($msg) . '</div>';
            }

            assign_template();

            return view('portal::'.$this->_template, [
                'auto_redirect' => true,
                'message' => $message,
            ]);
        }
    }
}
