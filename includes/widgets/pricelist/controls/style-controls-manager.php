<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Pricelist_Style_Controls
{
    use Saasp_Pricelist_Style_Pricelist_Controls;

    protected function style_controls()
    {
        $this->register_style_pricelist_controls();
    }
}
