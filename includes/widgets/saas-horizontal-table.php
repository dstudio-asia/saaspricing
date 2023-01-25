<?php
/**
 * Class: SaasHorizontalTable
 * Name: Saas Horizontal Table
 * Slug: saas-pricing
 */

 // Elementor Classes

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Box_Shadow;
 use Elementor\Group_Control_Image_Size;
 use \Elementor\Group_Control_Css_Filter;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class SaasHorizontalTable
 */

class SaasHorizontalTable extends \Elementor\Widget_Base {

public function get_name() {
    return 'saasHorizontal';
}

public function get_title() {
    return esc_html__( 'Horizontal Pricing Table', SAAS_PRICINNG_TXT_DOMAIN );
}

public function get_icon() {
    return 'eicon-device-tablet';
}

public function get_categories() {
    return ['saas_pricing_category'];
}

public function get_keywords() {
    return [ 'pricing', 'tables' , 'saaspricing', 'horizontal'];
}

public function saasp_allowed_tags(){
    
    $saasp_allowed_html_tags = array(
		'a' => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr' => array(
			'title' => array(),
		),
		'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(
			'title' => array(),
		),
		'code' => array(),
		'del' => array(
			'datetime' => array(),
			'title' => array(),
		),
		'dd' => array(),
		'div' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'i' => array(),
		'img' => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li' => array(
			'class' => array(),
		),
		'ol' => array(
			'class' => array(),
		),
		'p' => array(
			'class' => array(),
		),
		'q' => array(
			'cite' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'strike' => array(),
		'strong' => array(),
		'ul' => array(
			'class' => array(),
		),
	);
	
	return $saasp_allowed_html_tags;
}

protected function register_controls() {

	
}

protected function render() {
 $settings = $this->get_settings_for_display();
?>

   <!-- single pricing section start -->
   <div class="saaspricing-horizontal my-5">
            <div class="row ">
                <!-- heading and feature start  -->
                <div class=" col-lg-8 ">
                    <div class="p-4 p-sm-5 d-flex flex-column justify-content-center position-relative h-100">

                        <!-- heading  -->
                        <h2 class="h3 mb-3"><strong>Lifetime Membership</strong></h2>
                        <!-- sub-heading  -->
                        <p class="text-muted pb-4 border-bottom">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cupiditate
                            quae
                            deserunt excepturi nihil nobis. Hic dolores architecto quod dicta, iusto odio, sit quae
                            cum,
                            quos
                            alias eveniet corrupti ab pariah's.</p>

                        <!-- feature list  -->

                        <div class="feature-list">
                            <p class="text-uppercase text-muted fw-bold mb-0 saaspricing-new-section text-nowrap mb-3">
                                what’s
                                included
                                <span class="line-pricing"></span>
                            </p>
                            <!-- feature list row  -->
                            <div class="row">

                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>
                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>
                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>
                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>
                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>
                                <!-- feature list items  -->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <i class="fas fa-check text-success me-3"></i> <small>Lorem Ipsum</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- heading and feature end  -->


                <!-- sidebar start (pricing,countdown , cta)  start-->
                <div class=" col-lg-4 text-center">
                    <div
                        class="p-4 p-sm-5 h-100 saaspricing-bg-warm d-flex align-items-center justify-content-center flex-column position-relative">

                        <!-- ribbons -->
                        <span class="border-o fw-bold fs-sm saaspricing-ribbon bg-success">20%</span>
                        <!-- slogan -->
                        <p class="h5 w-75" role="heading">Pay once, own it forever</p>

                        <!-- pricing  -->
                        <div class="h2 d-inline fw-bold text-black"> <span class="fs-4  text-danger"> <s>$300</s></span>
                            <span class="fs-1"> $199 </span> <small
                                class="fw-normal fs-6 saaspricing-align-super">USD</small>
                        </div>
                        <div class="h2 d-inline fw-bold text-black d-none"> <span class="fs-1"> $199 </span> <small
                                class=" fw-bold fs-6 saaspricing-align-super">USD</small></div>

                        <!-- countdown  -->
                        <div class="text-center my-3 mb-4  fw-bold ">
                            <span
                                class="saaspricing-countdown text-danger border rounded-3 px-2 py-1 border-danger"></span>
                        </div>

                        <!-- cta  -->
                        <a href="#" class="btn btn-dark text-nowrap mb-2" role="button"> Get started <span class="ms-2">
                                <i class="fas fa-arrow-right"></i></span> </a>

                        <a href="#" class="text-decoration-underline text-black-50 ">Get a free sample <span
                                class="text-muted">(20MB)</span></a>
                    </div>

                </div>
                <!-- sidebar start (pricing,countdown , cta)  end-->
            </div>
        </div>
        <!-- single pricing section end -->
<?php
 }
}