<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Vertical_Style_Controls
{
    use Saasp_Vertical_Style_Header_Controls;
    use Saasp_Vertical_Style_Ribbon_Controls;
    use Saasp_Vertical_Style_Pricing_Controls;
    use Saasp_Vertical_Style_Countdown_Controls;
    use Saasp_Vertical_Style_Review_Controls;
    use Saasp_Vertical_Style_Features_Controls;
    use Saasp_Vertical_Style_Buttons_Controls;

    protected function style_controls()
    {
        $this->register_style_header_controls();
        $this->register_style_ribbon_controls();
        $this->register_style_pricing_controls();
        $this->register_style_countdown_controls();
        $this->register_style_review_controls();
        $this->register_style_features_controls();
        $this->register_style_buttons_controls();
    }
}