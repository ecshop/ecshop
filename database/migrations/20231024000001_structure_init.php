<?php

declare(strict_types=1);

use think\migration\db\Column;
use think\migration\Migrator;

class StructureInit extends Migrator
{
    public function change(): void
    {
        $table = $this->table('account_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('user_money', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('frozen_money', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('rank_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('pay_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('change_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('change_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('change_type')->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('ad', ['id' => 'ad_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('position_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('media_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('ad_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('ad_link')->setDefault('')->setComment(''))
            ->addColumn(Column::text('ad_code')->setComment(''))
            ->addColumn(Column::integer('start_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('link_man')->setDefault('')->setComment(''))
            ->addColumn(Column::string('link_email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('link_phone')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('click_count')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('enabled')->setDefault(1)->setComment(''))
            ->addIndex(['position_id'], ['name' => 'position_id'])
            ->addIndex(['enabled'], ['name' => 'enabled'])
            ->save();


        $table = $this->table('admin_action', ['id' => 'action_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('action_code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('relevance')->setDefault('')->setComment(''))
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->save();


        $table = $this->table('admin_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('log_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('log_info')->setDefault('')->setComment(''))
            ->addColumn(Column::string('ip_address')->setDefault('')->setComment(''))
            ->addIndex(['log_time'], ['name' => 'log_time'])
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('admin_message', ['id' => 'message_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('sender_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('receiver_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('sent_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('read_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('readed')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('deleted')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('title')->setDefault('')->setComment(''))
            ->addColumn(Column::text('message')->setComment(''))
            ->addIndex(['sender_id', 'receiver_id'], ['name' => 'sender_id'])
            ->addIndex(['receiver_id'], ['name' => 'receiver_id'])
            ->save();


        $table = $this->table('admin_user', ['id' => 'user_id'])->setComment('表');
        $table
            ->addColumn(Column::string('user_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('password')->setDefault('')->setComment(''))
            ->addColumn(Column::string('ec_salt')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('last_login')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('last_ip')->setDefault('')->setComment(''))
            ->addColumn(Column::text('action_list')->setComment(''))
            ->addColumn(Column::text('nav_list')->setComment(''))
            ->addColumn(Column::string('lang_type')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('agency_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('suppliers_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::text('todolist')->setComment(''))
            ->addColumn(Column::integer('role_id')->setDefault(0)->setComment(''))
            ->addIndex(['user_name'], ['name' => 'user_name'])
            ->addIndex(['agency_id'], ['name' => 'agency_id'])
            ->save();


        $table = $this->table('adsense')->setComment('表');
        $table
            ->addColumn(Column::integer('from_ad')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('referer')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('clicks')->setDefault(0)->setComment(''))
            ->addIndex(['from_ad'], ['name' => 'from_ad'])
            ->save();


        $table = $this->table('ad_custom', ['id' => 'ad_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('ad_type')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('ad_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('content')->setComment(''))
            ->addColumn(Column::string('url')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('ad_status')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('ad_position', ['id' => 'position_id'])->setComment('表');
        $table
            ->addColumn(Column::string('position_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('ad_width')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('ad_height')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('position_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::text('position_style')->setComment(''))
            ->save();


        $table = $this->table('affiliate_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('user_name')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('money', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('point')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('separate_type')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('agency', ['id' => 'agency_id'])->setComment('表');
        $table
            ->addColumn(Column::string('agency_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('agency_desc')->setComment(''))
            ->addIndex(['agency_name'], ['name' => 'agency_name'])
            ->save();


        $table = $this->table('area_region')->setComment('表');
        $table
            ->addColumn(Column::integer('shipping_area_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('region_id')->setDefault(0)->setComment(''))
            ->addIndex(['shipping_area_id', 'region_id'], ['name' => 'shipping_area_id_region_id', 'unique' => true])
            ->save();


        $table = $this->table('article', ['id' => 'article_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('cat_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('title')->setDefault('')->setComment(''))
            ->addColumn(Column::text('content')->setComment(''))
            ->addColumn(Column::string('author')->setDefault('')->setComment(''))
            ->addColumn(Column::string('author_email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('keywords')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('article_type')->setDefault(2)->setComment(''))
            ->addColumn(Column::tinyInteger('is_open')->setDefault(1)->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('file_url')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('open_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('link')->setDefault('')->setComment(''))
            ->addColumn(Column::string('description')->setDefault('')->setComment(''))
            ->addIndex(['cat_id'], ['name' => 'cat_id'])
            ->save();


        $table = $this->table('article_cat', ['id' => 'cat_id'])->setComment('表');
        $table
            ->addColumn(Column::string('cat_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('cat_type')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('keywords')->setDefault('')->setComment(''))
            ->addColumn(Column::string('cat_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(50)->setComment(''))
            ->addColumn(Column::tinyInteger('show_in_nav')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addIndex(['cat_type'], ['name' => 'cat_type'])
            ->addIndex(['sort_order'], ['name' => 'sort_order'])
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->save();


        $table = $this->table('attribute', ['id' => 'attr_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('cat_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('attr_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('attr_input_type')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('attr_type')->setDefault(1)->setComment(''))
            ->addColumn(Column::text('attr_values')->setComment(''))
            ->addColumn(Column::tinyInteger('attr_index')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_linked')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('attr_group')->setDefault(0)->setComment(''))
            ->addIndex(['cat_id'], ['name' => 'cat_id'])
            ->save();


        $table = $this->table('auction_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('act_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('bid_user')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('bid_price', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('bid_time')->setDefault(0)->setComment(''))
            ->addIndex(['act_id'], ['name' => 'act_id'])
            ->save();


        $table = $this->table('auto_manage')->setComment('表');
        $table
            ->addColumn(Column::integer('item_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('type')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('starttime')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('endtime')->setDefault(0)->setComment(''))
            ->addIndex(['item_id', 'type'], ['name' => 'item_id_type', 'unique' => true])
            ->save();


        $table = $this->table('back_goods', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('back_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('product_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('product_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('brand_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_real')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('send_number')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::text('goods_attr')->setComment(''))
            ->addIndex(['back_id'], ['name' => 'back_id'])
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('back_order', ['id' => 'back_id'])->setComment('表');
        $table
            ->addColumn(Column::string('delivery_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('order_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('invoice_no')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_time')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('shipping_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('user_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::string('action_user')->setDefault('')->setComment(''))
            ->addColumn(Column::string('consignee')->setDefault('')->setComment(''))
            ->addColumn(Column::string('address')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('country')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('province')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('city')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('district')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::string('sign_building')->setDefault('')->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('zipcode')->setDefault('')->setComment(''))
            ->addColumn(Column::string('tel')->setDefault('')->setComment(''))
            ->addColumn(Column::string('mobile')->setDefault('')->setComment(''))
            ->addColumn(Column::string('best_time')->setDefault('')->setComment(''))
            ->addColumn(Column::string('postscript')->setDefault('')->setComment(''))
            ->addColumn(Column::string('how_oos')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('insure_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('shipping_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('update_time')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('suppliers_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('status')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('return_time')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('agency_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['order_id'], ['name' => 'order_id'])
            ->save();


        $table = $this->table('bonus_type', ['id' => 'type_id'])->setComment('表');
        $table
            ->addColumn(Column::string('type_name')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('type_money', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::tinyInteger('send_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('min_amount', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('max_amount', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('send_start_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('send_end_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('use_start_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('use_end_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('min_goods_amount', 10, 2)->setDefault(0.00)->setComment(''))
            ->save();


        $table = $this->table('booking_goods', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('link_man')->setDefault('')->setComment(''))
            ->addColumn(Column::string('tel')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('goods_number')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('booking_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_dispose')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('dispose_user')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('dispose_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('dispose_note')->setDefault('')->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('brand', ['id' => 'brand_id'])->setComment('表');
        $table
            ->addColumn(Column::string('brand_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('brand_logo')->setDefault('')->setComment(''))
            ->addColumn(Column::text('brand_desc')->setComment(''))
            ->addColumn(Column::string('site_url')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(50)->setComment(''))
            ->addColumn(Column::tinyInteger('is_show')->setDefault(1)->setComment(''))
            ->addIndex(['is_show'], ['name' => 'is_show'])
            ->save();


        $table = $this->table('card', ['id' => 'card_id'])->setComment('表');
        $table
            ->addColumn(Column::string('card_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('card_img')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('card_fee', 6, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('free_money', 6, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::string('card_desc')->setDefault('')->setComment(''))
            ->save();


        $table = $this->table('cart', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('session_id')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('product_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('market_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('goods_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('goods_number')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('goods_attr')->setComment(''))
            ->addColumn(Column::tinyInteger('is_real')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('extension_code')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('rec_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('is_gift')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_shipping')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('can_handsel')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_attr_id')->setDefault('')->setComment(''))
            ->addIndex(['session_id'], ['name' => 'session_id'])
            ->save();


        $table = $this->table('category', ['id' => 'cat_id'])->setComment('表');
        $table
            ->addColumn(Column::string('cat_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('keywords')->setDefault('')->setComment(''))
            ->addColumn(Column::string('cat_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(50)->setComment(''))
            ->addColumn(Column::string('template_file')->setDefault('')->setComment(''))
            ->addColumn(Column::string('measure_unit')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('show_in_nav')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('style')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_show')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('grade')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('filter_attr')->setDefault(0)->setComment(''))
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->save();


        $table = $this->table('cat_recommend')->setComment('表');
        $table
            ->addColumn(Column::integer('cat_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('recommend_type')->setDefault(0)->setComment(''))
            ->addIndex(['cat_id', 'recommend_type'], ['name' => 'cat_id_recommend_type', 'unique' => true])
            ->save();


        $table = $this->table('collect_goods', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_attention')->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->addIndex(['is_attention'], ['name' => 'is_attention'])
            ->save();


        $table = $this->table('comment', ['id' => 'comment_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('comment_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('id_value')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('user_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('content')->setComment(''))
            ->addColumn(Column::tinyInteger('comment_rank')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('ip_address')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('status')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->addIndex(['id_value'], ['name' => 'id_value'])
            ->save();


        $table = $this->table('crons', ['id' => 'cron_id'])->setComment('表');
        $table
            ->addColumn(Column::string('cron_code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('cron_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('cron_desc')->setComment(''))
            ->addColumn(Column::tinyInteger('cron_order')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('cron_config')->setComment(''))
            ->addColumn(Column::integer('thistime')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('nextime')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('day')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('week')->setDefault('')->setComment(''))
            ->addColumn(Column::string('hour')->setDefault('')->setComment(''))
            ->addColumn(Column::string('minute')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('enable')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('run_once')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('allow_ip')->setDefault('')->setComment(''))
            ->addColumn(Column::string('alow_files')->setDefault('')->setComment(''))
            ->addIndex(['nextime'], ['name' => 'nextime'])
            ->addIndex(['enable'], ['name' => 'enable'])
            ->addIndex(['cron_code'], ['name' => 'cron_code'])
            ->save();


        $table = $this->table('delivery_goods', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('delivery_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('product_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::string('product_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('brand_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_real')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('extension_code')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('parent_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('send_number')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::text('goods_attr')->setComment(''))
            ->addIndex(['delivery_id', 'goods_id'], ['name' => 'delivery_id'])
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('delivery_order', ['id' => 'delivery_id'])->setComment('表');
        $table
            ->addColumn(Column::string('delivery_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('order_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('invoice_no')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_time')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('shipping_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('user_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::string('action_user')->setDefault('')->setComment(''))
            ->addColumn(Column::string('consignee')->setDefault('')->setComment(''))
            ->addColumn(Column::string('address')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('country')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('province')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('city')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('district')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::string('sign_building')->setDefault('')->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('zipcode')->setDefault('')->setComment(''))
            ->addColumn(Column::string('tel')->setDefault('')->setComment(''))
            ->addColumn(Column::string('mobile')->setDefault('')->setComment(''))
            ->addColumn(Column::string('best_time')->setDefault('')->setComment(''))
            ->addColumn(Column::string('postscript')->setDefault('')->setComment(''))
            ->addColumn(Column::string('how_oos')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('insure_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('shipping_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('update_time')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('suppliers_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('status')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('agency_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['order_id'], ['name' => 'order_id'])
            ->save();


        $table = $this->table('email_list')->setComment('表');
        $table
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('stat')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('hash')->setDefault('')->setComment(''))
            ->save();


        $table = $this->table('email_sendlist')->setComment('表');
        $table
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('template_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('email_content')->setComment(''))
            ->addColumn(Column::tinyInteger('error')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('pri')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('last_send')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('error_log')->setComment('表');
        $table
            ->addColumn(Column::string('info')->setDefault('')->setComment(''))
            ->addColumn(Column::string('file')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('time')->setDefault(0)->setComment(''))
            ->addIndex(['time'], ['name' => 'time'])
            ->save();


        $table = $this->table('exchange_goods')->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('exchange_integral')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_exchange')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_hot')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('favourable_activity', ['id' => 'act_id'])->setComment('表');
        $table
            ->addColumn(Column::string('act_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('start_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('user_rank')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('act_range')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('act_range_ext')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('min_amount', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('max_amount', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('act_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('act_type_ext', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::text('gift')->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(50)->setComment(''))
            ->addIndex(['act_name'], ['name' => 'act_name'])
            ->save();


        $table = $this->table('feedback', ['id' => 'msg_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('user_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('user_email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('msg_title')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('msg_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('msg_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('msg_content')->setComment(''))
            ->addColumn(Column::integer('msg_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('message_img')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('msg_area')->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('friend_link', ['id' => 'link_id'])->setComment('表');
        $table
            ->addColumn(Column::string('link_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('link_url')->setDefault('')->setComment(''))
            ->addColumn(Column::string('link_logo')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('show_order')->setDefault(50)->setComment(''))
            ->addIndex(['show_order'], ['name' => 'show_order'])
            ->save();


        $table = $this->table('goods', ['id' => 'goods_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('cat_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_name_style')->setDefault('+')->setComment(''))
            ->addColumn(Column::integer('click_count')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('brand_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('provider_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('goods_number')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('goods_weight', 10, 3)->setDefault(0.000)->setComment(''))
            ->addColumn(Column::decimal('market_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('shop_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('promote_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('promote_start_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('promote_end_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('warn_number')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('keywords')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_brief')->setDefault('')->setComment(''))
            ->addColumn(Column::text('goods_desc')->setComment(''))
            ->addColumn(Column::string('goods_thumb')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_img')->setDefault('')->setComment(''))
            ->addColumn(Column::string('original_img')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_real')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('extension_code')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_on_sale')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('is_alone_sale')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('is_shipping')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('integral')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('sort_order')->setDefault(100)->setComment(''))
            ->addColumn(Column::tinyInteger('is_delete')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_best')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_new')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_hot')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_promote')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('bonus_type_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('last_update')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('seller_note')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('give_integral')->setDefault(-1)->setComment(''))
            ->addColumn(Column::integer('rank_integral')->setDefault(-1)->setComment(''))
            ->addColumn(Column::integer('suppliers_id')->setUnsigned()->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_check')->setDefault(0)->setComment(''))
            ->addIndex(['goods_sn'], ['name' => 'goods_sn'])
            ->addIndex(['cat_id'], ['name' => 'cat_id'])
            ->addIndex(['last_update'], ['name' => 'last_update'])
            ->addIndex(['brand_id'], ['name' => 'brand_id'])
            ->addIndex(['goods_weight'], ['name' => 'goods_weight'])
            ->addIndex(['promote_end_date'], ['name' => 'promote_end_date'])
            ->addIndex(['promote_start_date'], ['name' => 'promote_start_date'])
            ->addIndex(['goods_number'], ['name' => 'goods_number'])
            ->addIndex(['sort_order'], ['name' => 'sort_order'])
            ->save();


        $table = $this->table('goods_activity', ['id' => 'act_id'])->setComment('表');
        $table
            ->addColumn(Column::string('act_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('act_desc')->setComment(''))
            ->addColumn(Column::tinyInteger('act_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('product_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('start_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_finished')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('ext_info')->setComment(''))
            ->addIndex(['act_name', 'act_type', 'goods_id'], ['name' => 'act_name'])
            ->save();


        $table = $this->table('goods_article')->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('article_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('admin_id')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id', 'article_id', 'admin_id'], ['name' => 'goods_id_article_id_admin_id', 'unique' => true])
            ->save();


        $table = $this->table('goods_attr', ['id' => 'goods_attr_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('attr_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('attr_value')->setComment(''))
            ->addColumn(Column::string('attr_price')->setDefault('')->setComment(''))
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->addIndex(['attr_id'], ['name' => 'attr_id'])
            ->save();


        $table = $this->table('goods_cat')->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('cat_id')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id', 'cat_id'], ['name' => 'goods_id_cat_id', 'unique' => true])
            ->save();


        $table = $this->table('goods_gallery', ['id' => 'img_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('img_url')->setDefault('')->setComment(''))
            ->addColumn(Column::string('img_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::string('thumb_url')->setDefault('')->setComment(''))
            ->addColumn(Column::string('img_original')->setDefault('')->setComment(''))
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('goods_type', ['id' => 'cat_id'])->setComment('表');
        $table
            ->addColumn(Column::string('cat_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('enabled')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('attr_group')->setDefault('')->setComment(''))
            ->save();


        $table = $this->table('group_goods')->setComment('表');
        $table
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('goods_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::tinyInteger('admin_id')->setDefault(0)->setComment(''))
            ->addIndex(['parent_id', 'goods_id', 'admin_id'], ['name' => 'parent_id_goods_id_admin_id', 'unique' => true])
            ->save();


        $table = $this->table('keywords')->setComment('表');
        $table
            ->addColumn(Column::date('date')->setComment(''))
            ->addColumn(Column::string('searchengine')->setDefault('')->setComment(''))
            ->addColumn(Column::string('keyword')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('count')->setDefault(0)->setComment(''))
            ->addIndex(['date', 'searchengine', 'keyword'], ['name' => 'date_searchengine_keyword', 'unique' => true])
            ->save();


        $table = $this->table('link_goods')->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('link_goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_double')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('admin_id')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id', 'link_goods_id', 'admin_id'], ['name' => 'goods_id_link_goods_id_admin_id', 'unique' => true])
            ->save();


        $table = $this->table('mail_templates', ['id' => 'template_id'])->setComment('表');
        $table
            ->addColumn(Column::string('template_code')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_html')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('template_subject')->setDefault('')->setComment(''))
            ->addColumn(Column::text('template_content')->setComment(''))
            ->addColumn(Column::integer('last_modify')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('last_send')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('type')->setDefault('')->setComment(''))
            ->addIndex(['template_code'], ['name' => 'template_code', 'unique' => true])
            ->addIndex(['type'], ['name' => 'type'])
            ->save();


        $table = $this->table('member_price', ['id' => 'price_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('user_rank')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('user_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addIndex(['goods_id', 'user_rank'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('nav')->setComment('表');
        $table
            ->addColumn(Column::string('ctype')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('cid')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('ifshow')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('vieworder')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('opennew')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('url')->setDefault('')->setComment(''))
            ->addColumn(Column::string('type')->setDefault('')->setComment(''))
            ->addIndex(['type'], ['name' => 'type'])
            ->addIndex(['ifshow'], ['name' => 'ifshow'])
            ->save();


        $table = $this->table('order_action', ['id' => 'action_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('action_user')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('order_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('pay_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('action_place')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('action_note')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('log_time')->setDefault(0)->setComment(''))
            ->addIndex(['order_id'], ['name' => 'order_id'])
            ->save();


        $table = $this->table('order_goods', ['id' => 'rec_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('goods_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('product_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_number')->setDefault(1)->setComment(''))
            ->addColumn(Column::decimal('market_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('goods_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::text('goods_attr')->setComment(''))
            ->addColumn(Column::integer('send_number')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_real')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('extension_code')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('is_gift')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_attr_id')->setDefault('')->setComment(''))
            ->addIndex(['order_id'], ['name' => 'order_id'])
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('order_info', ['id' => 'order_id'])->setComment('表');
        $table
            ->addColumn(Column::string('order_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('order_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('pay_status')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('consignee')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('country')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('province')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('city')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('district')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('address')->setDefault('')->setComment(''))
            ->addColumn(Column::string('zipcode')->setDefault('')->setComment(''))
            ->addColumn(Column::string('tel')->setDefault('')->setComment(''))
            ->addColumn(Column::string('mobile')->setDefault('')->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('best_time')->setDefault('')->setComment(''))
            ->addColumn(Column::string('sign_building')->setDefault('')->setComment(''))
            ->addColumn(Column::string('postscript')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('shipping_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('pay_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('pay_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('how_oos')->setDefault('')->setComment(''))
            ->addColumn(Column::string('how_surplus')->setDefault('')->setComment(''))
            ->addColumn(Column::string('pack_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('card_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('card_message')->setDefault('')->setComment(''))
            ->addColumn(Column::string('inv_payee')->setDefault('')->setComment(''))
            ->addColumn(Column::string('inv_content')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('goods_amount', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('shipping_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('insure_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('pay_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('pack_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('card_fee', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('money_paid', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('surplus', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('integral')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('integral_money', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('bonus', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('order_amount', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('from_ad')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('referer')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('confirm_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('pay_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('shipping_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('pack_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('card_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('bonus_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('invoice_no')->setDefault('')->setComment(''))
            ->addColumn(Column::string('extension_code')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('extension_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('to_buyer')->setDefault('')->setComment(''))
            ->addColumn(Column::string('pay_note')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('agency_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('inv_type')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('tax', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_separate')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('discount', 10, 2)->setDefault(0)->setComment(''))
            ->addIndex(['order_sn'], ['name' => 'order_sn', 'unique' => true])
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['order_status'], ['name' => 'order_status'])
            ->addIndex(['shipping_status'], ['name' => 'shipping_status'])
            ->addIndex(['pay_status'], ['name' => 'pay_status'])
            ->addIndex(['shipping_id'], ['name' => 'shipping_id'])
            ->addIndex(['pay_id'], ['name' => 'pay_id'])
            ->addIndex(['extension_code', 'extension_id'], ['name' => 'extension_code'])
            ->addIndex(['agency_id'], ['name' => 'agency_id'])
            ->save();


        $table = $this->table('pack', ['id' => 'pack_id'])->setComment('表');
        $table
            ->addColumn(Column::string('pack_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('pack_img')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('pack_fee', 6, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('free_money')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('pack_desc')->setDefault('')->setComment(''))
            ->save();


        $table = $this->table('package_goods')->setComment('表');
        $table
            ->addColumn(Column::integer('package_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('product_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_number')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('admin_id')->setDefault(0)->setComment(''))
            ->addIndex(['package_id', 'goods_id', 'admin_id', 'product_id'], ['name' => 'package_id_goods_id_admin_id_product_id', 'unique' => true])
            ->save();


        $table = $this->table('payment', ['id' => 'pay_id'])->setComment('表');
        $table
            ->addColumn(Column::string('pay_code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('pay_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('pay_fee')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('pay_desc')->setComment(''))
            ->addColumn(Column::tinyInteger('pay_order')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('pay_config')->setComment(''))
            ->addColumn(Column::tinyInteger('enabled')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_cod')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_online')->setDefault(0)->setComment(''))
            ->addIndex(['pay_code'], ['name' => 'pay_code', 'unique' => true])
            ->save();


        $table = $this->table('pay_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('order_amount', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('order_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_paid')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('plugins')->setComment('表');
        $table
            ->addColumn(Column::string('code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('version')->setDefault('')->setComment(''))
            ->addColumn(Column::string('library')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('assign')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('install_date')->setDefault(0)->setComment(''))
            ->addIndex(['code'], ['name' => 'code', 'unique' => true])
            ->save();


        $table = $this->table('products', ['id' => 'product_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_attr')->setDefault('')->setComment(''))
            ->addColumn(Column::string('product_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('product_number')->setUnsigned()->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('region', ['id' => 'region_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('region_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('region_type')->setDefault(2)->setComment(''))
            ->addColumn(Column::integer('agency_id')->setDefault(0)->setComment(''))
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->addIndex(['region_type'], ['name' => 'region_type'])
            ->addIndex(['agency_id'], ['name' => 'agency_id'])
            ->save();


        $table = $this->table('reg_extend_info', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('reg_field_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('content')->setComment(''))
            ->save();


        $table = $this->table('reg_fields')->setComment('表');
        $table
            ->addColumn(Column::string('reg_field_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('dis_order')->setDefault(100)->setComment(''))
            ->addColumn(Column::tinyInteger('display')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('type')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_need')->setDefault(1)->setComment(''))
            ->save();


        $table = $this->table('role', ['id' => 'role_id'])->setComment('表');
        $table
            ->addColumn(Column::string('role_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('action_list')->setComment(''))
            ->addColumn(Column::text('role_describe')->setComment(''))
            ->addIndex(['role_name'], ['name' => 'user_name'])
            ->save();


        $table = $this->table('searchengine')->setComment('表');
        $table
            ->addColumn(Column::date('date')->setComment(''))
            ->addColumn(Column::string('searchengine')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('count')->setDefault(0)->setComment(''))
            ->addIndex(['date', 'searchengine'], ['name' => 'date_searchengine', 'unique' => true])
            ->save();


        $this->table('sessions')->drop()->save();
        $this->table('sessions_data')->drop()->save();


        $table = $this->table('shipping', ['id' => 'shipping_id'])->setComment('表');
        $table
            ->addColumn(Column::string('shipping_code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('shipping_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('shipping_desc')->setDefault('')->setComment(''))
            ->addColumn(Column::string('insure')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('support_cod')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('enabled')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('shipping_print')->setComment(''))
            ->addColumn(Column::string('print_bg')->setDefault('')->setComment(''))
            ->addColumn(Column::text('config_lable')->setComment(''))
            ->addColumn(Column::tinyInteger('print_model')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_order')->setDefault(0)->setComment(''))
            ->addIndex(['shipping_code', 'enabled'], ['name' => 'shipping_code'])
            ->save();


        $table = $this->table('shipping_area', ['id' => 'shipping_area_id'])->setComment('表');
        $table
            ->addColumn(Column::string('shipping_area_name')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('shipping_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('configure')->setComment(''))
            ->addIndex(['shipping_id'], ['name' => 'shipping_id'])
            ->save();


        $table = $this->table('shop_config')->setComment('表');
        $table
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('code')->setDefault('')->setComment(''))
            ->addColumn(Column::string('type')->setDefault('')->setComment(''))
            ->addColumn(Column::string('store_range')->setDefault('')->setComment(''))
            ->addColumn(Column::string('store_dir')->setDefault('')->setComment(''))
            ->addColumn(Column::text('value')->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(1)->setComment(''))
            ->addIndex(['code'], ['name' => 'code', 'unique' => true])
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->save();


        $table = $this->table('snatch_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('snatch_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('bid_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('bid_time')->setDefault(0)->setComment(''))
            ->addIndex(['snatch_id'], ['name' => 'snatch_id'])
            ->save();


        $table = $this->table('stats')->setComment('表');
        $table
            ->addColumn(Column::integer('access_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('ip_address')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('visit_times')->setDefault(1)->setComment(''))
            ->addColumn(Column::string('browser')->setDefault('')->setComment(''))
            ->addColumn(Column::string('system')->setDefault('')->setComment(''))
            ->addColumn(Column::string('language')->setDefault('')->setComment(''))
            ->addColumn(Column::string('area')->setDefault('')->setComment(''))
            ->addColumn(Column::string('referer_domain')->setDefault('')->setComment(''))
            ->addColumn(Column::string('referer_path')->setDefault('')->setComment(''))
            ->addColumn(Column::string('access_url')->setDefault('')->setComment(''))
            ->addIndex(['access_time'], ['name' => 'access_time'])
            ->save();


        $table = $this->table('suppliers', ['id' => 'suppliers_id'])->setComment('表');
        $table
            ->addColumn(Column::string('suppliers_name')->setDefault('')->setComment(''))
            ->addColumn(Column::text('suppliers_desc')->setComment(''))
            ->addColumn(Column::tinyInteger('is_check')->setDefault(1)->setComment(''))
            ->save();


        $table = $this->table('tag', ['id' => 'tag_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('tag_words')->setDefault('')->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();


        $table = $this->table('template')->setComment('表');
        $table
            ->addColumn(Column::string('filename')->setDefault('')->setComment(''))
            ->addColumn(Column::string('region')->setDefault('')->setComment(''))
            ->addColumn(Column::string('library')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('sort_order')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('id_value')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('number')->setDefault(5)->setComment(''))
            ->addColumn(Column::tinyInteger('type')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('theme')->setDefault('')->setComment(''))
            ->addColumn(Column::string('remarks')->setDefault('')->setComment(''))
            ->addIndex(['filename', 'region'], ['name' => 'filename'])
            ->addIndex(['theme'], ['name' => 'theme'])
            ->addIndex(['remarks'], ['name' => 'remarks'])
            ->save();


        $table = $this->table('topic', ['id' => 'topic_id'])->setComment('表');
        $table
            ->addColumn(Column::string('title')->setDefault('')->setComment(''))
            ->addColumn(Column::text('intro')->setComment(''))
            ->addColumn(Column::integer('start_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::text('data')->setComment(''))
            ->addColumn(Column::string('template')->setDefault('')->setComment(''))
            ->addColumn(Column::text('css')->setComment(''))
            ->addColumn(Column::string('topic_img')->setDefault('')->setComment(''))
            ->addColumn(Column::string('title_pic')->setDefault('')->setComment(''))
            ->addColumn(Column::string('base_style')->setDefault('')->setComment(''))
            ->addColumn(Column::text('htmls')->setComment(''))
            ->addColumn(Column::string('keywords')->setDefault('')->setComment(''))
            ->addColumn(Column::string('description')->setDefault('')->setComment(''))
            ->addIndex(['topic_id'], ['name' => 'topic_id'])
            ->save();


        $table = $this->table('users', ['id' => 'user_id'])->setComment('表');
        $table
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::string('user_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('password')->setDefault('')->setComment(''))
            ->addColumn(Column::string('question')->setDefault('')->setComment(''))
            ->addColumn(Column::string('answer')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('sex')->setDefault(0)->setComment(''))
            ->addColumn(Column::date('birthday')->setComment(''))
            ->addColumn(Column::decimal('user_money', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::decimal('frozen_money', 10, 2)->setDefault(0.00)->setComment(''))
            ->addColumn(Column::integer('pay_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('rank_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('address_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('reg_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('last_login')->setDefault(0)->setComment(''))
            ->addColumn(Column::dateTime('last_time')->setComment(''))
            ->addColumn(Column::string('last_ip')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('visit_count')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('user_rank')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_special')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('ec_salt')->setDefault('')->setComment(''))
            ->addColumn(Column::string('salt')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('parent_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('flag')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('alias')->setDefault('')->setComment(''))
            ->addColumn(Column::string('msn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('qq')->setDefault('')->setComment(''))
            ->addColumn(Column::string('office_phone')->setDefault('')->setComment(''))
            ->addColumn(Column::string('home_phone')->setDefault('')->setComment(''))
            ->addColumn(Column::string('mobile_phone')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_validated')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('credit_line', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::string('passwd_question')->setDefault('')->setComment(''))
            ->addColumn(Column::string('passwd_answer')->setDefault('')->setComment(''))
            ->addIndex(['user_name'], ['name' => 'user_name', 'unique' => true])
            ->addIndex(['email'], ['name' => 'email'])
            ->addIndex(['parent_id'], ['name' => 'parent_id'])
            ->addIndex(['flag'], ['name' => 'flag'])
            ->save();


        $table = $this->table('user_account')->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('admin_user')->setDefault('')->setComment(''))
            ->addColumn(Column::decimal('amount', 10, 2)->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('add_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('paid_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('admin_note')->setDefault('')->setComment(''))
            ->addColumn(Column::string('user_note')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('process_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('payment')->setDefault('')->setComment(''))
            ->addColumn(Column::tinyInteger('is_paid')->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->addIndex(['is_paid'], ['name' => 'is_paid'])
            ->save();


        $table = $this->table('user_address', ['id' => 'address_id'])->setComment('表');
        $table
            ->addColumn(Column::string('address_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('consignee')->setDefault('')->setComment(''))
            ->addColumn(Column::string('email')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('country')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('province')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('city')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('district')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('address')->setDefault('')->setComment(''))
            ->addColumn(Column::string('zipcode')->setDefault('')->setComment(''))
            ->addColumn(Column::string('tel')->setDefault('')->setComment(''))
            ->addColumn(Column::string('mobile')->setDefault('')->setComment(''))
            ->addColumn(Column::string('sign_building')->setDefault('')->setComment(''))
            ->addColumn(Column::string('best_time')->setDefault('')->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('user_bonus', ['id' => 'bonus_id'])->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('bonus_type_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('bonus_sn')->setDefault('0')->setComment(''))
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('used_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('order_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('emailed')->setDefault(0)->setComment(''))
            ->addIndex(['user_id'], ['name' => 'user_id'])
            ->save();


        $table = $this->table('user_feed', ['id' => 'feed_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('user_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('value_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('feed_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_feed')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('user_rank', ['id' => 'rank_id'])->setComment('表');
        $table
            ->addColumn(Column::string('rank_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('min_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('max_points')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('discount')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('show_price')->setDefault(1)->setComment(''))
            ->addColumn(Column::tinyInteger('special_rank')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('virtual_card', ['id' => 'card_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('card_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('card_password')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('add_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_date')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('is_saled')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('order_sn')->setDefault('')->setComment(''))
            ->addColumn(Column::string('crc32')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->addIndex(['card_sn'], ['name' => 'car_sn'])
            ->addIndex(['is_saled'], ['name' => 'is_saled'])
            ->save();


        $table = $this->table('volume_price')->setComment('表');
        $table
            ->addColumn(Column::tinyInteger('price_type')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('volume_number')->setDefault(0)->setComment(''))
            ->addColumn(Column::decimal('volume_price', 10, 2)->setDefault(0.00)->setComment(''))
            ->addIndex(['price_type', 'goods_id', 'volume_number'], ['name' => 'price_type_goods_id_volume_number', 'unique' => true])
            ->save();


        $table = $this->table('vote', ['id' => 'vote_id'])->setComment('表');
        $table
            ->addColumn(Column::string('vote_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('start_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('end_time')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('can_multi')->setDefault(0)->setComment(''))
            ->addColumn(Column::integer('vote_count')->setDefault(0)->setComment(''))
            ->save();


        $table = $this->table('vote_log', ['id' => 'log_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('vote_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('ip_address')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('vote_time')->setDefault(0)->setComment(''))
            ->addIndex(['vote_id'], ['name' => 'vote_id'])
            ->save();


        $table = $this->table('vote_option', ['id' => 'option_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('vote_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('option_name')->setDefault('')->setComment(''))
            ->addColumn(Column::integer('option_count')->setDefault(0)->setComment(''))
            ->addColumn(Column::tinyInteger('option_order')->setDefault(100)->setComment(''))
            ->addIndex(['vote_id'], ['name' => 'vote_id'])
            ->save();


        $table = $this->table('wholesale', ['id' => 'act_id'])->setComment('表');
        $table
            ->addColumn(Column::integer('goods_id')->setDefault(0)->setComment(''))
            ->addColumn(Column::string('goods_name')->setDefault('')->setComment(''))
            ->addColumn(Column::string('rank_ids')->setDefault('')->setComment(''))
            ->addColumn(Column::text('prices')->setComment(''))
            ->addColumn(Column::tinyInteger('enabled')->setDefault(0)->setComment(''))
            ->addIndex(['goods_id'], ['name' => 'goods_id'])
            ->save();
    }
}
