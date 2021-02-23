<?php

namespace App\Service\User\Address;

/**
 * Class AddressService
 * @package App\Service\User\Address
 */
class AddressService
{
    /**
     * 取得用户地址列表
     * @param int $user_id 用户id
     * @return  array
     */
    public function address_list($user_id)
    {
        $sql = "SELECT * FROM " . table('user_address') .
            " WHERE user_id = '$user_id'";

        return $GLOBALS['db']->getAll($sql);
    }

    /**
     * 取得用户地址信息
     * @param int $address_id 地址id
     * @return  array
     */
    public function address_info($address_id)
    {
        $sql = "SELECT * FROM " . table('user_address') .
            " WHERE address_id = '$address_id'";

        return $GLOBALS['db']->getRow($sql);
    }

    /**
     * 取得收货人地址列表
     * @param int $user_id 用户编号
     * @return  array
     */
    public function get_consignee_list($user_id)
    {
        $sql = "SELECT * FROM " . table('user_address') .
            " WHERE user_id = '$user_id' LIMIT 5";

        return $GLOBALS['db']->getAll($sql);
    }

    /**
     * 保存用户的收货人信息
     * 如果收货人信息中的 id 为 0 则新增一个收货人信息
     *
     * @access  public
     * @param array $consignee
     * @param boolean $default 是否将该收货人信息设置为默认收货人信息
     * @return  boolean
     */
    public function save_consignee($consignee, $default = false)
    {
        if ($consignee['address_id'] > 0) {
            /* 修改地址 */
            $res = $GLOBALS['db']->autoExecute(table('user_address'), $consignee, 'UPDATE', 'address_id = ' . $consignee['address_id'] . " AND `user_id`= '" . $_SESSION['user_id'] . "'");
        } else {
            /* 添加地址 */
            $res = $GLOBALS['db']->autoExecute(table('user_address'), $consignee, 'INSERT');
            $consignee['address_id'] = $GLOBALS['db']->insert_id();
        }

        if ($default) {
            /* 保存为用户的默认收货地址 */
            $sql = "UPDATE " . table('users') .
                " SET address_id = '$consignee[address_id]' WHERE user_id = '$_SESSION[user_id]'";

            $res = $GLOBALS['db']->query($sql);
        }

        return $res !== false;
    }

    /**
     * 删除一个收货地址
     *
     * @access  public
     * @param integer $id
     * @return  boolean
     */
    public function drop_consignee($id)
    {
        $sql = "SELECT user_id FROM " . table('user_address') . " WHERE address_id = '$id'";
        $uid = $GLOBALS['db']->getOne($sql);

        if ($uid != $_SESSION['user_id']) {
            return false;
        } else {
            $sql = "DELETE FROM " . table('user_address') . " WHERE address_id = '$id'";
            $res = $GLOBALS['db']->query($sql);

            return $res;
        }
    }

    /**
     *  添加或更新指定用户收货地址
     *
     * @access  public
     * @param array $address
     * @return  bool
     */
    public function update_address($address)
    {
        $address_id = intval($address['address_id']);
        unset($address['address_id']);

        if ($address_id > 0) {
            /* 更新指定记录 */
            $GLOBALS['db']->autoExecute(table('user_address'), $address, 'UPDATE', 'address_id = ' . $address_id . ' AND user_id = ' . $address['user_id']);
        } else {
            /* 插入一条新记录 */
            $GLOBALS['db']->autoExecute(table('user_address'), $address, 'INSERT');
            $address_id = $GLOBALS['db']->insert_id();
        }

        if (isset($address['defalut']) && $address['default'] > 0 && isset($address['user_id'])) {
            $sql = "UPDATE " . table('users') .
                " SET address_id = '" . $address_id . "' " .
                " WHERE user_id = '" . $address['user_id'] . "'";
            $GLOBALS['db']->query($sql);
        }

        return true;
    }


    /**
     *  保存用户收货地址
     *
     * @access  public
     * @param array $address array_keys(consignee string, email string, address string, zipcode string, tel string, mobile stirng, sign_building string, best_time string, order_id int)
     * @param int $user_id 用户ID
     *
     * @return  boolen  $bool
     */
    public function save_order_address($address, $user_id)
    {
        $GLOBALS['err']->clean();
        /* 数据验证 */
        empty($address['consignee']) and $GLOBALS['err']->add($GLOBALS['_LANG']['consigness_empty']);
        empty($address['address']) and $GLOBALS['err']->add($GLOBALS['_LANG']['address_empty']);
        $address['order_id'] == 0 and $GLOBALS['err']->add($GLOBALS['_LANG']['order_id_empty']);
        if (empty($address['email'])) {
            $GLOBALS['err']->add($GLOBALS['email_empty']);
        } else {
            if (!is_email($address['email'])) {
                $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['email_invalid'], $address['email']));
            }
        }
        if ($GLOBALS['err']->error_no > 0) {
            return false;
        }

        /* 检查订单状态 */
        $sql = "SELECT user_id, order_status FROM " . table('order_info') . " WHERE order_id = '" . $address['order_id'] . "'";
        $row = $GLOBALS['db']->getRow($sql);
        if ($row) {
            if ($user_id > 0 && $user_id != $row['user_id']) {
                $GLOBALS['err']->add($GLOBALS['_LANG']['no_priv']);
                return false;
            }
            if ($row['order_status'] != OS_UNCONFIRMED) {
                $GLOBALS['err']->add($GLOBALS['_LANG']['require_unconfirmed']);
                return false;
            }
            $GLOBALS['db']->autoExecute(table('order_info'), $address, 'UPDATE', "order_id = '$address[order_id]'");
            return true;
        } else {
            /* 订单不存在 */
            $GLOBALS['err']->add($GLOBALS['_LANG']['order_exist']);
            return false;
        }
    }

    /**
     * 取得收货人信息
     * @param int $user_id 用户编号
     * @return  array
     */
    public function get_consignee($user_id)
    {
        if (isset($_SESSION['flow_consignee'])) {
            /* 如果存在session，则直接返回session中的收货人信息 */

            return $_SESSION['flow_consignee'];
        } else {
            /* 如果不存在，则取得用户的默认收货人信息 */
            $arr = array();

            if ($user_id > 0) {
                /* 取默认地址 */
                $sql = "SELECT ua.*" .
                    " FROM " . table('user_address') . "AS ua, " . table('users') . ' AS u ' .
                    " WHERE u.user_id='$user_id' AND ua.address_id = u.address_id";

                $arr = $GLOBALS['db']->getRow($sql);
            }

            return $arr;
        }
    }


}
