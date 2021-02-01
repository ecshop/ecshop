<?php

namespace app\support\sitemap;

/**
 * Class GoogleSitemap
 * @package app\support\sitemap
 */
class GoogleSitemap
{
    public $head = "<\x3Fxml version=\"1.0\" encoding=\"UTF-8\"\x3F>\n<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\">\n";
    public $footer = "</urlset>\n";
    public $item;

    public function item($item)
    {
        $this->item .= "<url>\n";
        foreach ($item as $key => $val) {
            $this->item .= " <$key>" . htmlentities($val, ENT_QUOTES) . "</$key>\n";
        }
        $this->item .= "</url>\n";
    }

    public function generate()
    {
        $all = $this->head;
        $all .= $this->item;
        $all .= $this->footer;

        return $all;
    }
}
