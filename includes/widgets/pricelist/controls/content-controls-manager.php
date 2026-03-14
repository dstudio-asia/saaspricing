<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Pricelist_Content_Controls
{
    use Saasp_Pricelist_Content_Pricelist_Controls;

    protected function content_controls()
    {
        $this->register_content_pricelist_controls();
    }
}
