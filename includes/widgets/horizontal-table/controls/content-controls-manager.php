<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Horizontal_Content_Controls
{
    use Saasp_Horizontal_Content_Header_Controls;
    use Saasp_Horizontal_Content_Features_Controls;
    use Saasp_Horizontal_Content_Pricing_Controls;
    use Saasp_Horizontal_Content_Buttons_Controls;

    protected function content_controls()
    {
        $this->register_content_header_controls();
        $this->register_content_features_controls();
        $this->register_content_pricing_controls();
        $this->register_content_buttons_controls();
    }
}
