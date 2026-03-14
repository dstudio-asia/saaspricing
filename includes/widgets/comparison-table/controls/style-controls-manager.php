<?php

if (! defined('ABSPATH')) {
    exit;
}

trait Saasp_Comparison_Style_Controls
{
    use Saasp_Comparison_Style_Table_Controls;
    use Saasp_Comparison_Style_Columns_Controls;
    use Saasp_Comparison_Style_Pricing_Controls;
    use Saasp_Comparison_Style_Tooltip_Controls;
    use Saasp_Comparison_Style_Features_Controls;
    use Saasp_Comparison_Style_Review_Controls;
    use Saasp_Comparison_Style_Ribbon_Controls;
    use Saasp_Comparison_Style_Buttons_Controls;

    protected function style_controls()
    {
        $this->register_style_table_controls();
        $this->register_style_columns_controls();
        $this->register_style_pricing_controls();
        $this->register_style_tooltip_controls();
        $this->register_style_features_controls();
        $this->register_style_review_controls();
        $this->register_style_ribbon_controls();
        $this->register_style_buttons_controls();
    }
}
