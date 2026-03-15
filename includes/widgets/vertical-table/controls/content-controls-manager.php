<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Vertical_Content_Controls
{
    use Saasp_Vertical_Content_Header_Controls;
    use Saasp_Vertical_Content_Body_Controls;
    use Saasp_Vertical_Content_Features_Controls;
    use Saasp_Vertical_Content_Buttons_Controls;

    protected function content_controls()
    {
        $this->register_content_header_controls();
        $this->register_content_body_controls();
        $this->register_content_features_controls();
        $this->register_content_buttons_controls();
    }
}