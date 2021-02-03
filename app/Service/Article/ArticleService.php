<?php

namespace App\Service\Article;

/**
 * 文章
 * Class ArticleService
 * @package App\Service\Article
 */
class ArticleService
{
    /**
     * 获得文章分类下的文章列表
     * @param $cat_id
     * @param int $page
     * @param int $size
     * @param string $requirement
     * @return array
     */
    public function get_cat_articles($cat_id, $page = 1, $size = 20, $requirement = '')
    {
        //取出所有非0的文章
        if ($cat_id == '-1') {
            $cat_str = 'cat_id > 0';
        } else {
            $cat_str = get_article_children($cat_id);
        }
        //增加搜索条件，如果有搜索内容就进行搜索
        if ($requirement != '') {
            $sql = 'SELECT article_id, title, author, add_time, file_url, open_type' .
                ' FROM ' . table('article') .
                ' WHERE is_open = 1 AND title like \'%' . $requirement . '%\' ' .
                ' ORDER BY article_type DESC, article_id DESC';
        } else {
            $sql = 'SELECT article_id, title, author, add_time, file_url, open_type' .
                ' FROM ' . table('article') .
                ' WHERE is_open = 1 AND ' . $cat_str .
                ' ORDER BY article_type DESC, article_id DESC';
        }

        $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);

        $arr = array();
        if ($res) {
            while ($row = $GLOBALS['db']->fetchRow($res)) {
                $article_id = $row['article_id'];

                $arr[$article_id]['id'] = $article_id;
                $arr[$article_id]['title'] = $row['title'];
                $arr[$article_id]['short_title'] = config('shop.article_title_length') > 0 ? sub_str($row['title'], config('shop.article_title_length')) : $row['title'];
                $arr[$article_id]['author'] = empty($row['author']) || $row['author'] == '_SHOPHELP' ? config('shop.shop_name') : $row['author'];
                $arr[$article_id]['url'] = $row['open_type'] != 1 ? build_uri('article', array('aid' => $article_id), $row['title']) : trim($row['file_url']);
                $arr[$article_id]['add_time'] = date(config('shop.date_format'), $row['add_time']);
            }
        }

        return $arr;
    }

    /**
     * 获得指定分类下的文章总数
     *
     * @param integer $cat_id
     *
     * @return  integer
     */
    public function get_article_count($cat_id, $requirement = '')
    {
        if ($requirement != '') {
            $count = $db->getOne('SELECT COUNT(*) FROM ' . table('article') . ' WHERE ' . get_article_children($cat_id) . ' AND  title like \'%' . $requirement . '%\'  AND is_open = 1');
        } else {
            $count = $db->getOne("SELECT COUNT(*) FROM " . table('article') . " WHERE " . get_article_children($cat_id) . " AND is_open = 1");
        }
        return $count;
    }
}
