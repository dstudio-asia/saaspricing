<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait Saasp_Comparison_Content_Controls {
    use Saasp_Comparison_Content_Table_Controls;
    use Saasp_Comparison_Content_Columns_Controls;
    use Saasp_Comparison_Content_Features_Controls;
    use Saasp_Comparison_Content_Buttons_Controls;

    protected function content_controls() {
        $this->register_content_table_controls();
        $this->register_content_columns_controls();
        $this->register_content_features_controls();
        $this->register_content_buttons_controls();
    }
}
