<?php

namespace TWA\JednoduchePriklady\breadcrumb;

/**
 * Breadcrumb Item
 */
class Item
{

    /**
     * @var string Label 
     */
    private $label;

    /**
     * @var string URL
     */
    private $url;

    public function __construct(string $label, string $url = '')
    {
        $this->label = $label;
        $this->url = $this->setUrl($url);
    }

    public function setUrl(string $url)
    {
        if (empty($url)) {
            $this->url = '';
        } else {
            $this->url = preg_replace('~^-+|-+$~', '', strtolower(preg_replace('~[^a-zA-Z0-9_/:#?=\.]+~', '-', $url)));
        }
    }

    public function __toString()
    {
        if (!empty($this->url)) {
            return '<a href="' . $this->url . '">' . $this->label . '</a>';
        } else {
            return $this->label;
        }
    }
}
