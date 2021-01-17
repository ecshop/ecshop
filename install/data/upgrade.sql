ALTER TABLE `ecs_goods_gallery`
ADD COLUMN `sort_order` int(11) UNSIGNED NOT NULL DEFAULT 0 AFTER `img_original`;