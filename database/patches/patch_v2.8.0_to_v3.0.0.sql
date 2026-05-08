-- rename of table
RENAME TABLE `auction_log` TO `activity_auction`;
RENAME TABLE `bonus_type` TO `activity_bonus`;
RENAME TABLE `exchange_goods` TO `activity_exchange`;
RENAME TABLE `group_goods` TO `activity_group`;
RENAME TABLE `package_goods` TO `activity_package`;
RENAME TABLE `snatch_log` TO `activity_snatch`;
RENAME TABLE `favourable_activity` TO `activity`;
RENAME TABLE `topic` TO `activity_topic`;
RENAME TABLE `wholesale` TO `activity_wholesale`;
RENAME TABLE `adsense` TO `ad_adsense`;
RENAME TABLE `email_list` TO `email_subscriber`;
RENAME TABLE `email_sendlist` TO `email_send`;
RENAME TABLE `mail_templates` TO `email_template`;
RENAME TABLE `brand` TO `goods_brand`;
RENAME TABLE `cat_recommend` TO `goods_cat_recommend`;
RENAME TABLE `category` TO `goods_category`;
RENAME TABLE `link_goods` TO `goods_link_goods`;
RENAME TABLE `member_price` TO `goods_member_price`;
RENAME TABLE `products` TO `goods_product`;
RENAME TABLE `attribute` TO `goods_type_attribute`;
RENAME TABLE `virtual_card` TO `goods_virtual_card`;
RENAME TABLE `volume_price` TO `goods_volume_price`;
RENAME TABLE `back_goods` TO `order_back_goods`;
RENAME TABLE `back_order` TO `order_back_order`;
RENAME TABLE `delivery_goods` TO `order_delivery_goods`;
RENAME TABLE `delivery_order` TO `order_delivery_order`;
RENAME TABLE `pay_log` TO `order_pay`;
RENAME TABLE `searchengine` TO `search_engine`;
RENAME TABLE `keywords` TO `search_keywords`;
RENAME TABLE `area_region` TO `shipping_area_region`;
RENAME TABLE `agency` TO `shop_agency`;
RENAME TABLE `card` TO `shop_card`;
RENAME TABLE `crons` TO `shop_cron`;
RENAME TABLE `error_log` TO `shop_error_log`;
RENAME TABLE `friend_link` TO `shop_friend_link`;
RENAME TABLE `nav` TO `shop_nav`;
RENAME TABLE `pack` TO `shop_pack`;
RENAME TABLE `plugins` TO `shop_plugins`;
RENAME TABLE `region` TO `shop_region`;
RENAME TABLE `stats` TO `shop_stats`;
RENAME TABLE `auto_manage` TO `shop_auto_manage`;
RENAME TABLE `suppliers` TO `supplier`;
RENAME TABLE `users` TO `user`;
RENAME TABLE `reg_extend_info` TO `user_extend_info`;
RENAME TABLE `reg_fields` TO `user_extend_fields`;
RENAME TABLE `affiliate_log` TO `user_affiliate`;
RENAME TABLE `booking_goods` TO `user_booking`;
RENAME TABLE `cart` TO `user_cart`;
RENAME TABLE `collect_goods` TO `user_collect`;
RENAME TABLE `tag` TO `user_tag`;
RENAME TABLE `account_log` TO `user_account_log`;
RENAME TABLE `role` TO `admin_role`;

-- change_fields_of_table
ALTER TABLE `admin_user` MODIFY COLUMN `password` varchar(255) NOT NULL DEFAULT '' COMMENT '登录密码' AFTER `email`,
    DROP INDEX `user_name`,
    ADD UNIQUE INDEX `user_name`(`user_name`) USING BTREE;

ALTER TABLE `user` MODIFY COLUMN `password` varchar(255) NOT NULL DEFAULT '' COMMENT '登录密码' AFTER `user_name`,
    DROP INDEX `mobile_phone`,
    ADD UNIQUE INDEX `mobile_phone`(`mobile_phone`) USING BTREE;
