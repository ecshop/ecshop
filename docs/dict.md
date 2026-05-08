# 数据字典

### (`account_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| user_money | decimal(10,2) | 否 | 否 |  |
| frozen_money | decimal(10,2) | 否 | 否 |  |
| rank_points | int | 否 | 否 |  |
| pay_points | int | 否 | 否 |  |
| change_time | int unsigned | 否 | 否 |  |
| change_desc | varchar(255) | 否 | 否 |  |
| change_type | tinyint unsigned | 否 | 否 |  |

### (`ad`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| ad_id | int unsigned | 是 | 否 |  |
| position_id | int unsigned | 是 | 否 |  |
| media_type | tinyint unsigned | 否 | 否 |  |
| ad_name | varchar(60) | 否 | 否 |  |
| ad_link | varchar(255) | 否 | 否 |  |
| ad_code | text | 否 | 否 |  |
| start_time | int | 否 | 否 |  |
| end_time | int | 否 | 否 |  |
| link_man | varchar(60) | 否 | 否 |  |
| link_email | varchar(60) | 否 | 否 |  |
| link_phone | varchar(60) | 否 | 否 |  |
| click_count | int unsigned | 否 | 否 |  |
| enabled | tinyint unsigned | 是 | 否 |  |

### (`ad_custom`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| ad_id | int unsigned | 是 | 否 |  |
| ad_type | tinyint unsigned | 否 | 否 |  |
| ad_name | varchar(60) | 否 | 是 |  |
| add_time | int unsigned | 否 | 否 |  |
| content | mediumtext | 否 | 是 |  |
| url | varchar(255) | 否 | 是 |  |
| ad_status | tinyint unsigned | 否 | 否 |  |

### (`ad_position`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| position_id | tinyint unsigned | 是 | 否 |  |
| position_name | varchar(60) | 否 | 否 |  |
| ad_width | int unsigned | 否 | 否 |  |
| ad_height | int unsigned | 否 | 否 |  |
| position_desc | varchar(255) | 否 | 否 |  |
| position_style | text | 否 | 否 |  |

### (`admin_action`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| action_id | tinyint unsigned | 是 | 否 |  |
| parent_id | tinyint unsigned | 是 | 否 |  |
| action_code | varchar(20) | 否 | 否 |  |
| relevance | varchar(20) | 否 | 否 |  |

### (`admin_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| log_time | int unsigned | 是 | 否 |  |
| user_id | tinyint unsigned | 是 | 否 |  |
| log_info | varchar(255) | 否 | 否 |  |
| ip_address | varchar(15) | 否 | 否 |  |

### (`admin_message`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| message_id | int unsigned | 是 | 否 |  |
| sender_id | tinyint unsigned | 是 | 否 |  |
| receiver_id | tinyint unsigned | 是 | 否 |  |
| sent_time | int unsigned | 否 | 否 |  |
| read_time | int unsigned | 否 | 否 |  |
| readed | tinyint unsigned | 否 | 否 |  |
| deleted | tinyint unsigned | 否 | 否 |  |
| title | varchar(150) | 否 | 否 |  |
| message | text | 否 | 否 |  |

### (`admin_user`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| user_id | int unsigned | 是 | 否 |  |
| user_name | varchar(60) | 是 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| password | varchar(32) | 否 | 否 |  |
| ec_salt | varchar(10) | 否 | 是 |  |
| add_time | int | 否 | 否 |  |
| last_login | int | 否 | 否 |  |
| last_ip | varchar(15) | 否 | 否 |  |
| action_list | text | 否 | 否 |  |
| nav_list | text | 否 | 否 |  |
| lang_type | varchar(50) | 否 | 否 |  |
| agency_id | int unsigned | 是 | 否 |  |
| suppliers_id | int unsigned | 否 | 是 |  |
| todolist | longtext | 否 | 是 |  |
| role_id | int | 否 | 是 |  |

### (`adsense`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| from_ad | int | 是 | 否 |  |
| referer | varchar(255) | 否 | 否 |  |
| clicks | int unsigned | 否 | 否 |  |

### (`affiliate_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int | 是 | 否 |  |
| order_id | int | 否 | 否 |  |
| time | int | 否 | 否 |  |
| user_id | int | 否 | 否 |  |
| user_name | varchar(60) | 否 | 是 |  |
| money | decimal(10,2) | 否 | 否 |  |
| point | int | 否 | 否 |  |
| separate_type | tinyint(1) | 否 | 否 |  |

### (`agency`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| agency_id | int unsigned | 是 | 否 |  |
| agency_name | varchar(255) | 是 | 否 |  |
| agency_desc | text | 否 | 否 |  |

### (`area_region`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| shipping_area_id | int unsigned | 是 | 否 |  |
| region_id | int unsigned | 是 | 否 |  |

### (`article`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| article_id | int unsigned | 是 | 否 |  |
| cat_id | int | 是 | 否 |  |
| title | varchar(150) | 否 | 否 |  |
| content | longtext | 否 | 否 |  |
| author | varchar(30) | 否 | 否 |  |
| author_email | varchar(60) | 否 | 否 |  |
| keywords | varchar(255) | 否 | 否 |  |
| article_type | tinyint unsigned | 否 | 否 |  |
| is_open | tinyint unsigned | 否 | 否 |  |
| add_time | int unsigned | 否 | 否 |  |
| file_url | varchar(255) | 否 | 否 |  |
| open_type | tinyint unsigned | 否 | 否 |  |
| link | varchar(255) | 否 | 否 |  |
| description | varchar(255) | 否 | 是 |  |

### (`article_cat`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| cat_id | int | 是 | 否 |  |
| cat_name | varchar(255) | 否 | 否 |  |
| cat_type | tinyint unsigned | 是 | 否 |  |
| keywords | varchar(255) | 否 | 否 |  |
| cat_desc | varchar(255) | 否 | 否 |  |
| sort_order | tinyint unsigned | 是 | 否 |  |
| show_in_nav | tinyint unsigned | 否 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |

### (`attribute`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| attr_id | int unsigned | 是 | 否 |  |
| cat_id | int unsigned | 是 | 否 |  |
| attr_name | varchar(60) | 否 | 否 |  |
| attr_input_type | tinyint unsigned | 否 | 否 |  |
| attr_type | tinyint unsigned | 否 | 否 |  |
| attr_values | text | 否 | 否 |  |
| attr_index | tinyint unsigned | 否 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |
| is_linked | tinyint unsigned | 否 | 否 |  |
| attr_group | tinyint unsigned | 否 | 否 |  |

### (`auction_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| act_id | int unsigned | 是 | 否 |  |
| bid_user | int unsigned | 否 | 否 |  |
| bid_price | decimal(10,2) unsigned | 否 | 否 |  |
| bid_time | int unsigned | 否 | 否 |  |

### (`auto_manage`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| item_id | int | 是 | 否 |  |
| type | varchar(10) | 是 | 否 |  |
| starttime | int | 否 | 否 |  |
| endtime | int | 否 | 否 |  |

### (`back_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| back_id | int unsigned | 是 | 是 |  |
| goods_id | int unsigned | 是 | 否 |  |
| product_id | int unsigned | 否 | 否 |  |
| product_sn | varchar(60) | 否 | 是 |  |
| goods_name | varchar(120) | 否 | 是 |  |
| brand_name | varchar(60) | 否 | 是 |  |
| goods_sn | varchar(60) | 否 | 是 |  |
| is_real | tinyint unsigned | 否 | 是 |  |
| send_number | int unsigned | 否 | 是 |  |
| goods_attr | text | 否 | 是 |  |

### (`back_order`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| back_id | int unsigned | 是 | 否 |  |
| delivery_sn | varchar(20) | 否 | 否 |  |
| order_sn | varchar(20) | 否 | 否 |  |
| order_id | int unsigned | 是 | 否 |  |
| invoice_no | varchar(50) | 否 | 是 |  |
| add_time | int unsigned | 否 | 是 |  |
| shipping_id | tinyint unsigned | 否 | 是 |  |
| shipping_name | varchar(120) | 否 | 是 |  |
| user_id | int unsigned | 是 | 是 |  |
| action_user | varchar(30) | 否 | 是 |  |
| consignee | varchar(60) | 否 | 是 |  |
| address | varchar(250) | 否 | 是 |  |
| country | int unsigned | 否 | 是 |  |
| province | int unsigned | 否 | 是 |  |
| city | int unsigned | 否 | 是 |  |
| district | int unsigned | 否 | 是 |  |
| sign_building | varchar(120) | 否 | 是 |  |
| email | varchar(60) | 否 | 是 |  |
| zipcode | varchar(60) | 否 | 是 |  |
| tel | varchar(60) | 否 | 是 |  |
| mobile | varchar(60) | 否 | 是 |  |
| best_time | varchar(120) | 否 | 是 |  |
| postscript | varchar(255) | 否 | 是 |  |
| how_oos | varchar(120) | 否 | 是 |  |
| insure_fee | decimal(10,2) unsigned | 否 | 是 |  |
| shipping_fee | decimal(10,2) unsigned | 否 | 是 |  |
| update_time | int unsigned | 否 | 是 |  |
| suppliers_id | int | 否 | 是 |  |
| status | tinyint unsigned | 否 | 否 |  |
| return_time | int unsigned | 否 | 是 |  |
| agency_id | int unsigned | 否 | 是 |  |

### (`bonus_type`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| type_id | int unsigned | 是 | 否 |  |
| type_name | varchar(60) | 否 | 否 |  |
| type_money | decimal(10,2) | 否 | 否 |  |
| send_type | tinyint unsigned | 否 | 否 |  |
| min_amount | decimal(10,2) unsigned | 否 | 否 |  |
| max_amount | decimal(10,2) unsigned | 否 | 否 |  |
| send_start_date | int | 否 | 否 |  |
| send_end_date | int | 否 | 否 |  |
| use_start_date | int | 否 | 否 |  |
| use_end_date | int | 否 | 否 |  |
| min_goods_amount | decimal(10,2) unsigned | 否 | 否 |  |

### (`booking_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| link_man | varchar(60) | 否 | 否 |  |
| tel | varchar(60) | 否 | 否 |  |
| goods_id | int unsigned | 否 | 否 |  |
| goods_desc | varchar(255) | 否 | 否 |  |
| goods_number | int unsigned | 否 | 否 |  |
| booking_time | int unsigned | 否 | 否 |  |
| is_dispose | tinyint unsigned | 否 | 否 |  |
| dispose_user | varchar(30) | 否 | 否 |  |
| dispose_time | int unsigned | 否 | 否 |  |
| dispose_note | varchar(255) | 否 | 否 |  |

### (`brand`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| brand_id | int unsigned | 是 | 否 |  |
| brand_name | varchar(60) | 否 | 否 |  |
| brand_logo | varchar(80) | 否 | 否 |  |
| brand_desc | text | 否 | 否 |  |
| site_url | varchar(255) | 否 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |
| is_show | tinyint unsigned | 是 | 否 |  |

### (`card`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| card_id | tinyint unsigned | 是 | 否 |  |
| card_name | varchar(120) | 否 | 否 |  |
| card_img | varchar(255) | 否 | 否 |  |
| card_fee | decimal(6,2) unsigned | 否 | 否 |  |
| free_money | decimal(6,2) unsigned | 否 | 否 |  |
| card_desc | varchar(255) | 否 | 否 |  |

### (`cart`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 否 | 否 |  |
| session_id | char(32) | 是 | 否 |  |
| goods_id | int unsigned | 否 | 否 |  |
| goods_sn | varchar(60) | 否 | 否 |  |
| product_id | int unsigned | 否 | 否 |  |
| goods_name | varchar(120) | 否 | 否 |  |
| market_price | decimal(10,2) unsigned | 否 | 否 |  |
| goods_price | decimal(10,2) | 否 | 否 |  |
| goods_number | int unsigned | 否 | 否 |  |
| goods_attr | text | 否 | 否 |  |
| is_real | tinyint unsigned | 否 | 否 |  |
| extension_code | varchar(30) | 否 | 否 |  |
| parent_id | int unsigned | 否 | 否 |  |
| rec_type | tinyint unsigned | 否 | 否 |  |
| is_gift | int unsigned | 否 | 否 |  |
| is_shipping | tinyint unsigned | 否 | 否 |  |
| can_handsel | tinyint unsigned | 否 | 否 |  |
| goods_attr_id | varchar(255) | 否 | 否 |  |

### (`cat_recommend`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| cat_id | int | 是 | 否 |  |
| recommend_type | tinyint(1) | 是 | 否 |  |

### (`category`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| cat_id | int unsigned | 是 | 否 |  |
| cat_name | varchar(90) | 否 | 否 |  |
| keywords | varchar(255) | 否 | 否 |  |
| cat_desc | varchar(255) | 否 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |
| template_file | varchar(50) | 否 | 否 |  |
| measure_unit | varchar(15) | 否 | 否 |  |
| show_in_nav | tinyint(1) | 否 | 否 |  |
| style | varchar(150) | 否 | 否 |  |
| is_show | tinyint unsigned | 否 | 否 |  |
| grade | tinyint | 否 | 否 |  |
| filter_attr | varchar(255) | 否 | 否 |  |

### (`collect_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| add_time | int unsigned | 否 | 否 |  |
| is_attention | tinyint(1) | 是 | 否 |  |

### (`comment`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| comment_id | int unsigned | 是 | 否 |  |
| comment_type | tinyint unsigned | 否 | 否 |  |
| id_value | int unsigned | 是 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| user_name | varchar(60) | 否 | 否 |  |
| content | text | 否 | 否 |  |
| comment_rank | tinyint unsigned | 否 | 否 |  |
| add_time | int unsigned | 否 | 否 |  |
| ip_address | varchar(15) | 否 | 否 |  |
| status | tinyint unsigned | 否 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 否 | 否 |  |

### (`crons`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| cron_id | tinyint unsigned | 是 | 否 |  |
| cron_code | varchar(20) | 是 | 否 |  |
| cron_name | varchar(120) | 否 | 否 |  |
| cron_desc | text | 否 | 是 |  |
| cron_order | tinyint unsigned | 否 | 否 |  |
| cron_config | text | 否 | 否 |  |
| thistime | int | 否 | 否 |  |
| nextime | int | 是 | 否 |  |
| day | tinyint | 否 | 否 |  |
| week | varchar(1) | 否 | 否 |  |
| hour | varchar(2) | 否 | 否 |  |
| minute | varchar(255) | 否 | 否 |  |
| enable | tinyint(1) | 是 | 否 |  |
| run_once | tinyint(1) | 否 | 否 |  |
| allow_ip | varchar(100) | 否 | 否 |  |
| alow_files | varchar(255) | 否 | 否 |  |

### (`delivery_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| delivery_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| product_id | int unsigned | 否 | 是 |  |
| product_sn | varchar(60) | 否 | 是 |  |
| goods_name | varchar(120) | 否 | 是 |  |
| brand_name | varchar(60) | 否 | 是 |  |
| goods_sn | varchar(60) | 否 | 是 |  |
| is_real | tinyint unsigned | 否 | 是 |  |
| extension_code | varchar(30) | 否 | 是 |  |
| parent_id | int unsigned | 否 | 是 |  |
| send_number | int unsigned | 否 | 是 |  |
| goods_attr | text | 否 | 是 |  |

### (`delivery_order`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| delivery_id | int unsigned | 是 | 否 |  |
| delivery_sn | varchar(20) | 否 | 否 |  |
| order_sn | varchar(20) | 否 | 否 |  |
| order_id | int unsigned | 是 | 否 |  |
| invoice_no | varchar(50) | 否 | 是 |  |
| add_time | int unsigned | 否 | 是 |  |
| shipping_id | tinyint unsigned | 否 | 是 |  |
| shipping_name | varchar(120) | 否 | 是 |  |
| user_id | int unsigned | 是 | 是 |  |
| action_user | varchar(30) | 否 | 是 |  |
| consignee | varchar(60) | 否 | 是 |  |
| address | varchar(250) | 否 | 是 |  |
| country | int unsigned | 否 | 是 |  |
| province | int unsigned | 否 | 是 |  |
| city | int unsigned | 否 | 是 |  |
| district | int unsigned | 否 | 是 |  |
| sign_building | varchar(120) | 否 | 是 |  |
| email | varchar(60) | 否 | 是 |  |
| zipcode | varchar(60) | 否 | 是 |  |
| tel | varchar(60) | 否 | 是 |  |
| mobile | varchar(60) | 否 | 是 |  |
| best_time | varchar(120) | 否 | 是 |  |
| postscript | varchar(255) | 否 | 是 |  |
| how_oos | varchar(120) | 否 | 是 |  |
| insure_fee | decimal(10,2) unsigned | 否 | 是 |  |
| shipping_fee | decimal(10,2) unsigned | 否 | 是 |  |
| update_time | int unsigned | 否 | 是 |  |
| suppliers_id | int | 否 | 是 |  |
| status | tinyint unsigned | 否 | 否 |  |
| agency_id | int unsigned | 否 | 是 |  |

### (`email_list`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int | 是 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| stat | tinyint(1) | 否 | 否 |  |
| hash | varchar(10) | 否 | 否 |  |

### (`email_sendlist`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int | 是 | 否 |  |
| email | varchar(100) | 否 | 否 |  |
| template_id | int | 否 | 否 |  |
| email_content | text | 否 | 否 |  |
| error | tinyint(1) | 否 | 否 |  |
| pri | tinyint | 否 | 否 |  |
| last_send | int | 否 | 否 |  |

### (`error_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int | 是 | 否 |  |
| info | varchar(255) | 否 | 否 |  |
| file | varchar(100) | 否 | 否 |  |
| time | int | 是 | 否 |  |

### (`exchange_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| exchange_integral | int unsigned | 否 | 否 |  |
| is_exchange | tinyint unsigned | 否 | 否 |  |
| is_hot | tinyint unsigned | 否 | 否 |  |

### (`favourable_activity`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| act_id | int unsigned | 是 | 否 |  |
| act_name | varchar(255) | 是 | 否 |  |
| start_time | int unsigned | 否 | 否 |  |
| end_time | int unsigned | 否 | 否 |  |
| user_rank | varchar(255) | 否 | 否 |  |
| act_range | tinyint unsigned | 否 | 否 |  |
| act_range_ext | varchar(255) | 否 | 否 |  |
| min_amount | decimal(10,2) unsigned | 否 | 否 |  |
| max_amount | decimal(10,2) unsigned | 否 | 否 |  |
| act_type | tinyint unsigned | 否 | 否 |  |
| act_type_ext | decimal(10,2) unsigned | 否 | 否 |  |
| gift | text | 否 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |

### (`feedback`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| msg_id | int unsigned | 是 | 否 |  |
| parent_id | int unsigned | 否 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| user_name | varchar(60) | 否 | 否 |  |
| user_email | varchar(60) | 否 | 否 |  |
| msg_title | varchar(200) | 否 | 否 |  |
| msg_type | tinyint unsigned | 否 | 否 |  |
| msg_status | tinyint unsigned | 否 | 否 |  |
| msg_content | text | 否 | 否 |  |
| msg_time | int unsigned | 否 | 否 |  |
| message_img | varchar(255) | 否 | 否 |  |
| order_id | int unsigned | 否 | 否 |  |
| msg_area | tinyint unsigned | 否 | 否 |  |

### (`friend_link`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| link_id | int unsigned | 是 | 否 |  |
| link_name | varchar(255) | 否 | 否 |  |
| link_url | varchar(255) | 否 | 否 |  |
| link_logo | varchar(255) | 否 | 否 |  |
| show_order | tinyint unsigned | 是 | 否 |  |

### (`goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| goods_id | int unsigned | 是 | 否 |  |
| cat_id | int unsigned | 是 | 否 |  |
| goods_sn | varchar(60) | 是 | 否 |  |
| goods_name | varchar(120) | 否 | 否 |  |
| goods_name_style | varchar(60) | 否 | 否 |  |
| click_count | int unsigned | 否 | 否 |  |
| brand_id | int unsigned | 是 | 否 |  |
| provider_name | varchar(100) | 否 | 否 |  |
| goods_number | int unsigned | 是 | 否 |  |
| goods_weight | decimal(10,3) unsigned | 是 | 否 |  |
| market_price | decimal(10,2) unsigned | 否 | 否 |  |
| shop_price | decimal(10,2) unsigned | 否 | 否 |  |
| promote_price | decimal(10,2) unsigned | 否 | 否 |  |
| promote_start_date | int unsigned | 是 | 否 |  |
| promote_end_date | int unsigned | 是 | 否 |  |
| warn_number | tinyint unsigned | 否 | 否 |  |
| keywords | varchar(255) | 否 | 否 |  |
| goods_brief | varchar(255) | 否 | 否 |  |
| goods_desc | text | 否 | 否 |  |
| goods_thumb | varchar(255) | 否 | 否 |  |
| goods_img | varchar(255) | 否 | 否 |  |
| original_img | varchar(255) | 否 | 否 |  |
| is_real | tinyint unsigned | 否 | 否 |  |
| extension_code | varchar(30) | 否 | 否 |  |
| is_on_sale | tinyint unsigned | 否 | 否 |  |
| is_alone_sale | tinyint unsigned | 否 | 否 |  |
| is_shipping | tinyint unsigned | 否 | 否 |  |
| integral | int unsigned | 否 | 否 |  |
| add_time | int unsigned | 否 | 否 |  |
| sort_order | int unsigned | 是 | 否 |  |
| is_delete | tinyint unsigned | 否 | 否 |  |
| is_best | tinyint unsigned | 否 | 否 |  |
| is_new | tinyint unsigned | 否 | 否 |  |
| is_hot | tinyint unsigned | 否 | 否 |  |
| is_promote | tinyint unsigned | 否 | 否 |  |
| bonus_type_id | tinyint unsigned | 否 | 否 |  |
| last_update | int unsigned | 是 | 否 |  |
| goods_type | int unsigned | 否 | 否 |  |
| seller_note | varchar(255) | 否 | 否 |  |
| give_integral | int | 否 | 否 |  |
| rank_integral | int | 否 | 否 |  |
| suppliers_id | int unsigned | 否 | 是 |  |
| is_check | tinyint unsigned | 否 | 是 |  |

### (`goods_activity`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| act_id | int unsigned | 是 | 否 |  |
| act_name | varchar(255) | 是 | 否 |  |
| act_desc | text | 否 | 否 |  |
| act_type | tinyint unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| product_id | int unsigned | 否 | 否 |  |
| goods_name | varchar(255) | 否 | 否 |  |
| start_time | int unsigned | 否 | 否 |  |
| end_time | int unsigned | 否 | 否 |  |
| is_finished | tinyint unsigned | 否 | 否 |  |
| ext_info | text | 否 | 否 |  |

### (`goods_article`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| article_id | int unsigned | 是 | 否 |  |
| admin_id | tinyint unsigned | 否 | 否 |  |

### (`goods_attr`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| goods_attr_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| attr_id | int unsigned | 是 | 否 |  |
| attr_value | text | 否 | 否 |  |
| attr_price | varchar(255) | 否 | 否 |  |

### (`goods_cat`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| cat_id | int unsigned | 是 | 否 |  |

### (`goods_gallery`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| img_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| img_url | varchar(255) | 否 | 否 |  |
| img_desc | varchar(255) | 否 | 否 |  |
| thumb_url | varchar(255) | 否 | 否 |  |
| img_original | varchar(255) | 否 | 否 |  |
| sort_order | int unsigned | 否 | 否 |  |

### (`goods_type`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| cat_id | int unsigned | 是 | 否 |  |
| cat_name | varchar(60) | 否 | 否 |  |
| enabled | tinyint unsigned | 否 | 否 |  |
| attr_group | varchar(255) | 否 | 否 |  |

### (`group_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| goods_price | decimal(10,2) unsigned | 否 | 否 |  |
| admin_id | tinyint unsigned | 否 | 否 |  |

### (`keywords`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| date | date | 是 | 否 |  |
| searchengine | varchar(20) | 是 | 否 |  |
| keyword | varchar(90) | 是 | 否 |  |
| count | int unsigned | 否 | 否 |  |

### (`link_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| link_goods_id | int unsigned | 是 | 否 |  |
| is_double | tinyint unsigned | 否 | 否 |  |
| admin_id | tinyint unsigned | 否 | 否 |  |

### (`mail_templates`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| template_id | tinyint unsigned | 是 | 否 |  |
| template_code | varchar(30) | 是 | 否 |  |
| is_html | tinyint unsigned | 否 | 否 |  |
| template_subject | varchar(200) | 否 | 否 |  |
| template_content | text | 否 | 否 |  |
| last_modify | int unsigned | 否 | 否 |  |
| last_send | int unsigned | 否 | 否 |  |
| type | varchar(10) | 是 | 否 |  |

### (`member_price`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| price_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| user_rank | tinyint | 是 | 否 |  |
| user_price | decimal(10,2) | 否 | 否 |  |

### (`nav`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int | 是 | 否 |  |
| ctype | varchar(10) | 否 | 是 |  |
| cid | int unsigned | 否 | 是 |  |
| name | varchar(255) | 否 | 否 |  |
| ifshow | tinyint(1) | 是 | 否 |  |
| vieworder | tinyint(1) | 否 | 否 |  |
| opennew | tinyint(1) | 否 | 否 |  |
| url | varchar(255) | 否 | 否 |  |
| type | varchar(10) | 是 | 否 |  |

### (`order_action`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| action_id | int unsigned | 是 | 否 |  |
| order_id | int unsigned | 是 | 否 |  |
| action_user | varchar(30) | 否 | 否 |  |
| order_status | tinyint unsigned | 否 | 否 |  |
| shipping_status | tinyint unsigned | 否 | 否 |  |
| pay_status | tinyint unsigned | 否 | 否 |  |
| action_place | tinyint unsigned | 否 | 否 |  |
| action_note | varchar(255) | 否 | 否 |  |
| log_time | int unsigned | 否 | 否 |  |

### (`order_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rec_id | int unsigned | 是 | 否 |  |
| order_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| goods_name | varchar(120) | 否 | 否 |  |
| goods_sn | varchar(60) | 否 | 否 |  |
| product_id | int unsigned | 否 | 否 |  |
| goods_number | int unsigned | 否 | 否 |  |
| market_price | decimal(10,2) | 否 | 否 |  |
| goods_price | decimal(10,2) | 否 | 否 |  |
| goods_attr | text | 否 | 否 |  |
| send_number | int unsigned | 否 | 否 |  |
| is_real | tinyint unsigned | 否 | 否 |  |
| extension_code | varchar(30) | 否 | 否 |  |
| parent_id | int unsigned | 否 | 否 |  |
| is_gift | int unsigned | 否 | 否 |  |
| goods_attr_id | varchar(255) | 否 | 否 |  |

### (`order_info`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| order_id | int unsigned | 是 | 否 |  |
| order_sn | varchar(20) | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| order_status | tinyint unsigned | 是 | 否 |  |
| shipping_status | tinyint unsigned | 是 | 否 |  |
| pay_status | tinyint unsigned | 是 | 否 |  |
| consignee | varchar(60) | 否 | 否 |  |
| country | int unsigned | 否 | 否 |  |
| province | int unsigned | 否 | 否 |  |
| city | int unsigned | 否 | 否 |  |
| district | int unsigned | 否 | 否 |  |
| address | varchar(255) | 否 | 否 |  |
| zipcode | varchar(60) | 否 | 否 |  |
| tel | varchar(60) | 否 | 否 |  |
| mobile | varchar(60) | 否 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| best_time | varchar(120) | 否 | 否 |  |
| sign_building | varchar(120) | 否 | 否 |  |
| postscript | varchar(255) | 否 | 否 |  |
| shipping_id | tinyint | 是 | 否 |  |
| shipping_name | varchar(120) | 否 | 否 |  |
| pay_id | tinyint | 是 | 否 |  |
| pay_name | varchar(120) | 否 | 否 |  |
| how_oos | varchar(120) | 否 | 否 |  |
| how_surplus | varchar(120) | 否 | 否 |  |
| pack_name | varchar(120) | 否 | 否 |  |
| card_name | varchar(120) | 否 | 否 |  |
| card_message | varchar(255) | 否 | 否 |  |
| inv_payee | varchar(120) | 否 | 否 |  |
| inv_content | varchar(120) | 否 | 否 |  |
| goods_amount | decimal(10,2) | 否 | 否 |  |
| shipping_fee | decimal(10,2) | 否 | 否 |  |
| insure_fee | decimal(10,2) | 否 | 否 |  |
| pay_fee | decimal(10,2) | 否 | 否 |  |
| pack_fee | decimal(10,2) | 否 | 否 |  |
| card_fee | decimal(10,2) | 否 | 否 |  |
| money_paid | decimal(10,2) | 否 | 否 |  |
| surplus | decimal(10,2) | 否 | 否 |  |
| integral | int unsigned | 否 | 否 |  |
| integral_money | decimal(10,2) | 否 | 否 |  |
| bonus | decimal(10,2) | 否 | 否 |  |
| order_amount | decimal(10,2) | 否 | 否 |  |
| from_ad | int | 否 | 否 |  |
| referer | varchar(255) | 否 | 否 |  |
| add_time | int unsigned | 否 | 否 |  |
| confirm_time | int unsigned | 否 | 否 |  |
| pay_time | int unsigned | 否 | 否 |  |
| shipping_time | int unsigned | 否 | 否 |  |
| pack_id | tinyint unsigned | 否 | 否 |  |
| card_id | tinyint unsigned | 否 | 否 |  |
| bonus_id | int unsigned | 否 | 否 |  |
| invoice_no | varchar(255) | 否 | 否 |  |
| extension_code | varchar(30) | 是 | 否 |  |
| extension_id | int unsigned | 是 | 否 |  |
| to_buyer | varchar(255) | 否 | 否 |  |
| pay_note | varchar(255) | 否 | 否 |  |
| agency_id | int unsigned | 是 | 否 |  |
| inv_type | varchar(60) | 否 | 否 |  |
| tax | decimal(10,2) | 否 | 否 |  |
| is_separate | tinyint(1) | 否 | 否 |  |
| parent_id | int unsigned | 否 | 否 |  |
| discount | decimal(10,2) | 否 | 否 |  |

### (`pack`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| pack_id | tinyint unsigned | 是 | 否 |  |
| pack_name | varchar(120) | 否 | 否 |  |
| pack_img | varchar(255) | 否 | 否 |  |
| pack_fee | decimal(6,2) unsigned | 否 | 否 |  |
| free_money | int unsigned | 否 | 否 |  |
| pack_desc | varchar(255) | 否 | 否 |  |

### (`package_goods`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| package_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| product_id | int unsigned | 是 | 否 |  |
| goods_number | int unsigned | 否 | 否 |  |
| admin_id | tinyint unsigned | 否 | 否 |  |

### (`pay_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| order_id | int unsigned | 否 | 否 |  |
| order_amount | decimal(10,2) unsigned | 否 | 否 |  |
| order_type | tinyint unsigned | 否 | 否 |  |
| is_paid | tinyint unsigned | 否 | 否 |  |

### (`payment`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| pay_id | tinyint unsigned | 是 | 否 |  |
| pay_code | varchar(20) | 是 | 否 |  |
| pay_name | varchar(120) | 否 | 否 |  |
| pay_fee | varchar(10) | 否 | 否 |  |
| pay_desc | text | 否 | 否 |  |
| pay_order | tinyint unsigned | 否 | 否 |  |
| pay_config | text | 否 | 否 |  |
| enabled | tinyint unsigned | 否 | 否 |  |
| is_cod | tinyint unsigned | 否 | 否 |  |
| is_online | tinyint unsigned | 否 | 否 |  |

### (`plugins`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| code | varchar(30) | 是 | 否 |  |
| version | varchar(10) | 否 | 否 |  |
| library | varchar(255) | 否 | 否 |  |
| assign | tinyint unsigned | 否 | 否 |  |
| install_date | int unsigned | 否 | 否 |  |

### (`products`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| product_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 否 | 否 |  |
| goods_attr | varchar(50) | 否 | 是 |  |
| product_sn | varchar(60) | 否 | 是 |  |
| product_number | int unsigned | 否 | 是 |  |

### (`reg_extend_info`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 否 | 否 |  |
| reg_field_id | int unsigned | 否 | 否 |  |
| content | text | 否 | 否 |  |

### (`reg_fields`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | tinyint unsigned | 是 | 否 |  |
| reg_field_name | varchar(60) | 否 | 否 |  |
| dis_order | tinyint unsigned | 否 | 否 |  |
| display | tinyint unsigned | 否 | 否 |  |
| type | tinyint unsigned | 否 | 否 |  |
| is_need | tinyint unsigned | 否 | 否 |  |

### (`region`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| region_id | int unsigned | 是 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |
| region_name | varchar(120) | 否 | 否 |  |
| region_type | tinyint(1) | 是 | 否 |  |
| agency_id | int unsigned | 是 | 否 |  |

### (`role`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| role_id | int unsigned | 是 | 否 |  |
| role_name | varchar(60) | 是 | 否 |  |
| action_list | text | 否 | 否 |  |
| role_describe | text | 否 | 是 |  |

### (`searchengine`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| date | date | 是 | 否 |  |
| searchengine | varchar(20) | 是 | 否 |  |
| count | int unsigned | 否 | 否 |  |

### (`shipping`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| shipping_id | tinyint unsigned | 是 | 否 |  |
| shipping_code | varchar(20) | 是 | 否 |  |
| shipping_name | varchar(120) | 否 | 否 |  |
| shipping_desc | varchar(255) | 否 | 否 |  |
| insure | varchar(10) | 否 | 否 |  |
| support_cod | tinyint unsigned | 否 | 否 |  |
| enabled | tinyint unsigned | 是 | 否 |  |
| shipping_print | text | 否 | 否 |  |
| print_bg | varchar(255) | 否 | 是 |  |
| config_lable | text | 否 | 是 |  |
| print_model | tinyint(1) | 否 | 是 |  |
| shipping_order | tinyint unsigned | 否 | 否 |  |

### (`shipping_area`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| shipping_area_id | int unsigned | 是 | 否 |  |
| shipping_area_name | varchar(150) | 否 | 否 |  |
| shipping_id | tinyint unsigned | 是 | 否 |  |
| configure | text | 否 | 否 |  |

### (`shop_config`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| parent_id | int unsigned | 是 | 否 |  |
| code | varchar(30) | 是 | 否 |  |
| type | varchar(10) | 否 | 否 |  |
| store_range | varchar(255) | 否 | 否 |  |
| store_dir | varchar(255) | 否 | 否 |  |
| value | text | 否 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |

### (`snatch_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| snatch_id | tinyint unsigned | 是 | 否 |  |
| user_id | int unsigned | 否 | 否 |  |
| bid_price | decimal(10,2) | 否 | 否 |  |
| bid_time | int unsigned | 否 | 否 |  |

### (`stats`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| access_time | int unsigned | 是 | 否 |  |
| ip_address | varchar(15) | 否 | 否 |  |
| visit_times | int unsigned | 否 | 否 |  |
| browser | varchar(60) | 否 | 否 |  |
| system | varchar(20) | 否 | 否 |  |
| language | varchar(20) | 否 | 否 |  |
| area | varchar(30) | 否 | 否 |  |
| referer_domain | varchar(100) | 否 | 否 |  |
| referer_path | varchar(200) | 否 | 否 |  |
| access_url | varchar(255) | 否 | 否 |  |

### (`suppliers`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| suppliers_id | int unsigned | 是 | 否 |  |
| suppliers_name | varchar(255) | 否 | 是 |  |
| suppliers_desc | mediumtext | 否 | 是 |  |
| is_check | tinyint unsigned | 否 | 否 |  |

### (`tag`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| tag_id | int | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| tag_words | varchar(255) | 否 | 否 |  |

### (`template`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| idx | int unsigned | 是 | 否 |  |
| filename | varchar(30) | 是 | 否 |  |
| region | varchar(40) | 是 | 否 |  |
| library | varchar(40) | 否 | 否 |  |
| sort_order | tinyint unsigned | 否 | 否 |  |
| id | int unsigned | 否 | 否 |  |
| number | tinyint unsigned | 否 | 否 |  |
| type | tinyint unsigned | 否 | 否 |  |
| theme | varchar(60) | 是 | 否 |  |
| remarks | varchar(30) | 是 | 否 |  |

### (`topic`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| topic_id | int unsigned | 是 | 否 |  |
| title | varchar(255) | 否 | 否 |  |
| intro | text | 否 | 否 |  |
| start_time | int | 否 | 否 |  |
| end_time | int | 否 | 否 |  |
| data | text | 否 | 否 |  |
| template | varchar(255) | 否 | 否 |  |
| css | text | 否 | 否 |  |
| topic_img | varchar(255) | 否 | 是 |  |
| title_pic | varchar(255) | 否 | 是 |  |
| base_style | char(6) | 否 | 是 |  |
| htmls | mediumtext | 否 | 是 |  |
| keywords | varchar(255) | 否 | 是 |  |
| description | varchar(255) | 否 | 是 |  |

### (`user_account`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| admin_user | varchar(255) | 否 | 否 |  |
| amount | decimal(10,2) | 否 | 否 |  |
| add_time | int | 否 | 否 |  |
| paid_time | int | 否 | 否 |  |
| admin_note | varchar(255) | 否 | 否 |  |
| user_note | varchar(255) | 否 | 否 |  |
| process_type | tinyint(1) | 否 | 否 |  |
| payment | varchar(90) | 否 | 否 |  |
| is_paid | tinyint(1) | 是 | 否 |  |

### (`user_address`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| address_id | int unsigned | 是 | 否 |  |
| address_name | varchar(50) | 否 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| consignee | varchar(60) | 否 | 否 |  |
| email | varchar(60) | 否 | 否 |  |
| country | int | 否 | 否 |  |
| province | int | 否 | 否 |  |
| city | int | 否 | 否 |  |
| district | int | 否 | 否 |  |
| address | varchar(120) | 否 | 否 |  |
| zipcode | varchar(60) | 否 | 否 |  |
| tel | varchar(60) | 否 | 否 |  |
| mobile | varchar(60) | 否 | 否 |  |
| sign_building | varchar(120) | 否 | 否 |  |
| best_time | varchar(120) | 否 | 否 |  |

### (`user_bonus`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| bonus_id | int unsigned | 是 | 否 |  |
| bonus_type_id | tinyint unsigned | 否 | 否 |  |
| bonus_sn | bigint unsigned | 否 | 否 |  |
| user_id | int unsigned | 是 | 否 |  |
| used_time | int unsigned | 否 | 否 |  |
| order_id | int unsigned | 否 | 否 |  |
| emailed | tinyint unsigned | 否 | 否 |  |

### (`user_feed`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| feed_id | int unsigned | 是 | 否 |  |
| user_id | int unsigned | 否 | 否 |  |
| value_id | int unsigned | 否 | 否 |  |
| goods_id | int unsigned | 否 | 否 |  |
| feed_type | tinyint unsigned | 否 | 否 |  |
| is_feed | tinyint unsigned | 否 | 否 |  |

### (`user_rank`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| rank_id | tinyint unsigned | 是 | 否 |  |
| rank_name | varchar(30) | 否 | 否 |  |
| min_points | int unsigned | 否 | 否 |  |
| max_points | int unsigned | 否 | 否 |  |
| discount | tinyint unsigned | 否 | 否 |  |
| show_price | tinyint unsigned | 否 | 否 |  |
| special_rank | tinyint unsigned | 否 | 否 |  |

### (`users`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| user_id | int unsigned | 是 | 否 |  |
| email | varchar(60) | 是 | 否 |  |
| user_name | varchar(60) | 是 | 否 |  |
| password | varchar(32) | 否 | 否 |  |
| question | varchar(255) | 否 | 否 |  |
| answer | varchar(255) | 否 | 否 |  |
| sex | tinyint unsigned | 否 | 否 |  |
| birthday | date | 否 | 否 |  |
| user_money | decimal(10,2) | 否 | 否 |  |
| frozen_money | decimal(10,2) | 否 | 否 |  |
| pay_points | int unsigned | 否 | 否 |  |
| rank_points | int unsigned | 否 | 否 |  |
| address_id | int unsigned | 否 | 否 |  |
| reg_time | int unsigned | 否 | 否 |  |
| last_login | int unsigned | 否 | 否 |  |
| last_time | datetime | 否 | 否 |  |
| last_ip | varchar(15) | 否 | 否 |  |
| visit_count | int unsigned | 否 | 否 |  |
| user_rank | tinyint unsigned | 否 | 否 |  |
| is_special | tinyint unsigned | 否 | 否 |  |
| ec_salt | varchar(10) | 否 | 是 |  |
| salt | varchar(10) | 否 | 否 |  |
| parent_id | int | 是 | 否 |  |
| flag | tinyint unsigned | 是 | 否 |  |
| alias | varchar(60) | 否 | 否 |  |
| msn | varchar(60) | 否 | 否 |  |
| qq | varchar(20) | 否 | 否 |  |
| office_phone | varchar(20) | 否 | 否 |  |
| home_phone | varchar(20) | 否 | 否 |  |
| mobile_phone | varchar(20) | 否 | 否 |  |
| is_validated | tinyint unsigned | 否 | 否 |  |
| credit_line | decimal(10,2) unsigned | 否 | 否 |  |
| passwd_question | varchar(50) | 否 | 是 |  |
| passwd_answer | varchar(255) | 否 | 是 |  |

### (`virtual_card`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| card_id | int | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| card_sn | varchar(60) | 是 | 否 |  |
| card_password | varchar(60) | 否 | 否 |  |
| add_date | int | 否 | 否 |  |
| end_date | int | 否 | 否 |  |
| is_saled | tinyint(1) | 是 | 否 |  |
| order_sn | varchar(20) | 否 | 否 |  |
| crc32 | varchar(12) | 否 | 否 |  |

### (`volume_price`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| id | int unsigned | 是 | 否 |  |
| price_type | tinyint unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| volume_number | int unsigned | 是 | 否 |  |
| volume_price | decimal(10,2) | 否 | 否 |  |

### (`vote`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| vote_id | int unsigned | 是 | 否 |  |
| vote_name | varchar(250) | 否 | 否 |  |
| start_time | int unsigned | 否 | 否 |  |
| end_time | int unsigned | 否 | 否 |  |
| can_multi | tinyint unsigned | 否 | 否 |  |
| vote_count | int unsigned | 否 | 否 |  |

### (`vote_log`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| log_id | int unsigned | 是 | 否 |  |
| vote_id | int unsigned | 是 | 否 |  |
| ip_address | varchar(15) | 否 | 否 |  |
| vote_time | int unsigned | 否 | 否 |  |

### (`vote_option`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| option_id | int unsigned | 是 | 否 |  |
| vote_id | int unsigned | 是 | 否 |  |
| option_name | varchar(250) | 否 | 否 |  |
| option_count | int unsigned | 否 | 否 |  |
| option_order | tinyint unsigned | 否 | 否 |  |

### (`wholesale`)
| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |
| ------- | --------- | --------- | --------- | -------------- |
| act_id | int unsigned | 是 | 否 |  |
| goods_id | int unsigned | 是 | 否 |  |
| goods_name | varchar(255) | 否 | 否 |  |
| rank_ids | varchar(255) | 否 | 否 |  |
| prices | text | 否 | 否 |  |
| enabled | tinyint unsigned | 否 | 否 |  |

