<?php
/**
 * Class: SaasComparisonTable
 * Name: Saas Comparison Table
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
 * Class SaasComparisonTable
 */

class SaasComparisonTable extends \Elementor\Widget_Base {

public function get_name() {
    return 'saasComparison';
}

public function get_title() {
    return esc_html__( 'Comparison Pricing Table', SAAS_PRICINNG_TXT_DOMAIN );
}

public function get_icon() {
    return 'eicon-table';
}

public function get_categories() {
    return ['saas_pricing_category'];
}

public function get_keywords() {
    return [ 'pricing', 'tables' , 'saaspricing', 'comparison'];
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
  <!-- pricing comparison table start  -->
  <div class="saaspricing-main table-responsive-xl position-relative mt-5">
            <table class="saaspricing-table" role="presentation">
                <!-- table header start  -->
                <thead class="tableHeader" id="tableHeader">

                    <!-- highlights the most popular plan -->
                    <tr>
                        <td class="saaspricing-blank"></td>
                        <td class="saaspricing-blank"></td>
                        <td class="saaspricing-table-popular">
                            <div class="">Most popular</div>
                            <div class="saaspricing-countdown py-1 px-2 fs-sm text-dark rounded"></div>
                        </td>
                        <td class="saaspricing-blank"></td>
                    </tr>
                    <!-- package title start -->
                    <tr class="price-table-head">
                        <td></td>
                        <td>
                            <span>Free</span>
                            <br><small class="fs-sm">Starter plan</small>
                        </td>
                        <td class="">
                            <span>Personal</span>
                            <br><small class="fs-sm">Longer data retention</small>
                        </td>
                        <td class="green-width">
                            <span>Pro</span>
                            <br><small class="fs-sm">Our complete solution</small>
                        </td>
                    </tr>

                    <!-- package header (icon, pricing, reviews, countdown timer) start -->
                    <tr>
                        <td> <span class="d-block fs-3 mb-3" role="heading">SaasPricing Comparison</span>
                            <span class="d-block fs-sm w-75 w-sm-100">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Veritatis, impedit.</span>
                        </td>

                        <td class="price saaspricing-pricing">
                            <!-- package image  -->
                            <a class="image-popup-vertical-fit" href="https://saaspricing.netlify.app/assets/images/1.svg">
                                <img src="https://saaspricing.netlify.app/assets/images/1.svg" width="80" height="80" alt=" it's a free package ">
                            </a>
                            <div><span>Free</span></div>
                        </td>

                        <td class="price saaspricing-pricing">
                            <!-- package image  -->
                            <a class="image-popup-vertical-fit" href="https://saaspricing.netlify.app/assets/images/2.svg">
                                <img src="https://saaspricing.netlify.app/assets/images/2.svg" width="80" height="80" alt="it's for personal usage">
                            </a>
                            <!-- pricing  -->
                            <div> <s class="text-danger"><span>$</span><span>20</span></s>
                                <span>€</span><span>9</span><span>/</span><span>mo</span>
                            </div>
                            <div class="ratings my-3">
                                <div class="saaspricing-star-icon fs-6">
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-yellow"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-yellow"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-yellow"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right saaspricing-yellow"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star-half saaspricing-star-left saaspricing-yellow"></i>
                                        <i class="fas fa-star-half saaspricing-star-right"></i>
                                    </span>

                                    <small class="text-success"> (3K+) </small>
                                </div>
                            </div>
                        </td>
                        <td class="price saaspricing-pricing">
                            <!-- package image  -->
                            <a class="image-popup-vertical-fit" href="https://saaspricing.netlify.app/assets/images/3.svg">
                                <img src="https://saaspricing.netlify.app/assets/images/3.svg" width="80" height="80" alt="it's for professional usage">
                            </a>
                            <div><span>€</span>39<span>/</span><span>mo</span></div>

                        </td>
                    </tr>
                    <!-- package header (icon, pricing, reviews, countdown timer) end -->

                </thead>
                <!-- table header end  -->

                <!-- table body start  -->
                <tbody>

                    <!-- features section start -->

                    <!-- feature row 1  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 1</span>
                        </td>

                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <!-- feature row 2  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 2</span>

                        <td>30 Days</td>
                        <td>90 Days</td>
                        <td>180 Days</td>
                    </tr>
                    <!-- feature row 3  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 3</span>

                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 4  -->
                    <tr>
                        <td>
                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 4</span>
                        </td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 5  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 5</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 6  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 6</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 7  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 7</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 8  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 8</span></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-times"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>
                    <!-- feature row 9  -->
                    <tr>
                        <td><span data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, tempora."
                                class="price-table-help">
                                <i class="far fa-fw fa-question-circle"></i>
                            </span> <span>Feature 9</span></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                        <td><i class="fas fa-check"></i></td>
                    </tr>


                    <!-- features section end -->

                </tbody>
                <!-- table body end  -->

                <!-- table footer start  -->
                <tfoot>
                    <!-- cta start  -->
                    <tr>
                        <td></td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Learn More...</a>
                        </td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Free trial?</a>
                        </td>
                        <td class="footer-cta">

                            <a href="#" class="btn btn-dark text-nowrap" role="button"> Get started <span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span> </a>
                            <a class="d-block fs-sm fw-normal mt-3" href="#"> Free trial?</a>
                        </td>
                    </tr>
                    <!-- cta start  -->
                </tfoot>
                <!-- table footer end  -->

            </table>
        </div>
        <!-- pricing comparison table end  -->
<?php
 }
}