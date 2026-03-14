<?php
// Elementor Classes

use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Saasp_Horizontal
 */

class Saasp_Horizontal extends Widget_Base {

use Sassp_Utils;
    use Saasp_Horizontal_Content_Controls;
    use Saasp_Horizontal_Style_Controls;

public function get_name() {
    return 'saasp-horizontal';
}

public function get_title() {
    return esc_html__( 'Horizontal Pricing Table', 'saaspricing' );
}

public function get_icon() {
    return 'saasp-icon eicon-device-tablet';
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

    $this->content_controls();
    $this->style_controls();
}
private function get_currency_symbol( $saasp_symbol_name ) {
    $saasp_symbols = [
        'dollar' => '&#36;',
        'euro' => '&#128;',
        'franc' => '&#8355;',
        'pound' => '&#163;',
        'ruble' => '&#8381;',
        'shekel' => '&#8362;',
        'baht' => '&#3647;',
        'yen' => '&#165;',
        'won' => '&#8361;',
        'guilder' => '&fnof;',
        'peso' => '&#8369;',
        'peseta' => '&#8359;',
        'lira' => '&#8356;',
        'rupee' => '&#8360;',
        'indian_rupee' => '&#8377;',
        'real' => 'R$',
        'krona' => 'kr',
    ];
    return isset( $saasp_symbols[ $saasp_symbol_name ] ) ? $saasp_symbols[ $saasp_symbol_name ] : '';
}

protected function render() {
 $settings = $this->get_settings_for_display();
?>
<div class="saaspricing-horizontal">
    <div class="row gx-0 saaspricing-horizontal-wrapper <?php if ('yes' === $settings['saasp_horizontal_cta_row_reverse']) { echo esc_attr('saaspricing-row-reverse'); } ?>">
        <div class="col-lg-8">
            <div class="sasspricing-horizontal-left d-flex flex-column justify-content-center position-relative h-100">
                <!-- Table header -->
                <div class="saaspricing-horizontal-header">
                    <?php if ('' !== $settings['saasp_horizontal_header_title']) {
                        printf('<%1$s class="saaspricing-horizontal-title">%2$s</%1$s>', esc_html( self::validate_html_tag( $settings['saasp_horizontal_header_title_tag'] ) ), esc_html( $settings['saasp_horizontal_header_title'] ) );
                    } ?>
                    <?php if ('' !== $settings['saasp_horizontal_header_description']) { ?>
                        <p class="saaspricing-horizontal-description">
                            <?php echo esc_html($settings['saasp_horizontal_header_description']); ?>
                        </p>
                    <?php } ?>
                </div>
                
                <?php if ('yes' === ($settings['saasp_horizontal_show_divider'])) { ?>
                    <div class="saasp-horizontal-divider">
                        <hr>
                    </div>
                <?php } ?>

                <!-- Table features -->
                <div class="saaspricing-horizontal-feature-list">
                    <?php if ('' !== $settings['saasp_horizontal_features_title']) { ?>
                        <p class="saaspricing-horizontal-feature-title">
                            <?php echo esc_html($settings['saasp_horizontal_features_title']); ?>
                        </p>
                    <?php } ?>
                    <div class="row">
                        <?php if ($settings['saasp_horizontal_features']) {
                            foreach ($settings['saasp_horizontal_features'] as $saasp_horizontal_features) { ?>
                                <div class="saasp-columns">
                                    <div class="saasp-horizontal-icon-wrapper elementor-repeater-item-<?php echo esc_attr($saasp_horizontal_features['_id']); ?>">
                                        <?php Icons_Manager::render_icon($saasp_horizontal_features['saasp_horizontal_features_icon'], ['aria-hidden' => 'true']); ?> 
                                        <small class="saaspricing-horizontal-feature-text"><?php echo esc_html($saasp_horizontal_features['saasp_horizontal_features_text']); ?></small>
                                    </div>
                                </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="saaspricing-horizontal-sidebar">
                <!-- Table ribbon -->
                <?php if ('yes' === $settings['saasp_horizontal_show_ribbon'] && '' !== $settings['saasp_horizontal_ribbon_title']) {
                    if ('left' === $settings['saasp_horizontal_ribbon_position']) {
                        $saasp_ribbon_position = 'saaspricing-horizontal-left-position';
                    } elseif ('right' === $settings['saasp_horizontal_ribbon_position']) {
                        $saasp_ribbon_position = 'saaspricing-horizontal-right-position';
                    } else {
                        $saasp_ribbon_position = 'saaspricing-horizontal-right-position';
                    } ?>
                    <span class="saaspricing-horizontal-ribbon <?php echo esc_attr($saasp_ribbon_position); ?>">
                        <?php echo esc_html($settings['saasp_horizontal_ribbon_title']); ?>
                    </span>
                <?php } ?>

                <!-- Table slogan -->
                <p class="saaspricing-horizontal-slogan-title <?php
                    if ('center' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-center');
                    } elseif ('right' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-right');
                    } elseif ('justify' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-center');
                    } else {
                        echo esc_attr('saaspricing-horizontal-pricing-left');
                    } ?>">
                    <?php echo esc_html($settings['saasp_horizontal_cta_slogan_text']); ?>
                </p>

                <!-- Table pricing -->
                <div class="saasprcing-horizontal-pricing <?php
                    if ('center' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-center');
                    } elseif ('right' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-right');
                    } elseif ('justify' === $settings['saasp_horizontal_cta_alignment']) {
                        echo esc_attr('saaspricing-horizontal-pricing-center');
                    } else {
                        echo esc_attr('saaspricing-horizontal-pricing-left');
                    } ?>">
                    <?php if ('none' !== $settings['saasp_horizontal_currency_symbol'] && 'yes' === $settings['saasp_horizontal_sale']) { ?>
                        <del class="saaspricing-horizontal-original">
                            <span>
                                <?php if ('custom' !== $settings['saasp_horizontal_currency_symbol']) {
                                    echo esc_html($this->get_currency_symbol($settings['saasp_horizontal_currency_symbol']));
                                } else {
                                    echo esc_html($settings['saasp_horizontal_currency_symbol_custom']);
                                } ?>
                                <?php if ('' !== $settings['saasp_horizontal_original_price']) { ?>
                                    <span class="fw-bold">
                                        <?php echo esc_html($settings['saasp_horizontal_original_price']); ?>
                                    </span>
                                <?php } ?>
                            </span>
                        </del>
                    <?php } ?>

                    <?php if ('before' === $settings['saasp_horizontal_pricing_symbol_position']) { ?>
                        <span class="saaspricing-horizontal-symbol saaspricing-horizontal-price-text">
                            <?php if ('custom' !== $settings['saasp_horizontal_currency_symbol']) {
                                echo esc_html($this->get_currency_symbol($settings['saasp_horizontal_currency_symbol']));
                            } else {
                                echo esc_html($settings['saasp_horizontal_currency_symbol_custom']);
                            } ?>
                        </span>
                    <?php } ?>

                    <?php if ('' === $settings['saasp_horizontal_currency_format']) { ?>
                        <span class="saaspricing-horizontal-price saaspricing-horizontal-price-text">
                            <?php echo esc_html(explode(".", $settings['sassp_horizontal_price'])[0]); ?>
                        </span>
                        <?php if ('' !== explode(".", $settings['sassp_horizontal_price'])[1]) { ?>
                            <span class="saaspricing-fraction-price">
                                <?php echo esc_html(explode(".", $settings['sassp_horizontal_price'])[1]); ?>
                            </span>
                        <?php } ?>
                    <?php } else { ?>
                        <span class="saaspricing-horizontal-price saaspricing-horizontal-price-text">
                            <?php echo esc_html($settings['sassp_horizontal_price']); ?>
                        </span>
                    <?php } ?>

                    <?php if ('after' === $settings['saasp_horizontal_pricing_symbol_position']) { ?>
                        <span class="saaspricing-horizontal-symbol saaspricing-horizontal-price-text">
                            <?php if ('custom' !== $settings['saasp_horizontal_currency_symbol']) {
                                echo esc_html($this->get_currency_symbol($settings['saasp_horizontal_currency_symbol']));
                            } else {
                                echo esc_html($settings['saasp_horizontal_currency_symbol_custom']);
                            } ?>
                        </span>
                    <?php } ?>

                    <?php if ('' !== $settings['saasp_horizontal_period']) { ?>
                        <span class="saaspricing-horizontal-period <?php if ('below' === $settings['saasp_horizontal_period_position']) { echo esc_attr('w-100 mt-1'); } ?>">
                            <?php echo esc_html($settings['saasp_horizontal_period']); ?>
                        </span>
                    <?php } ?>
                </div>

                <!-- Table countdown -->
                <?php if ('yes' === $settings['saasp_horizontal_show_countdown'] && '' !== $settings['saasp_horizontal_show_countdown']) { ?>
                    <div class="saaspricing-horizontal-countdown">
                        <span class="saaspricing-countdown" data-countdown-index="0" data-expire-date="<?php echo esc_attr($settings['saasp_horizontal_expire_date']); ?>">
                            <?php echo esc_html__('00d: 00h: 00m: 00s', 'saaspricing'); ?>
                        </span>
                    </div>
                <?php } ?>

                <!-- Table review -->
                <?php if ('yes' === $settings['saasp_horizontal_show_rating'] && '' !== $settings['saasp_horizontal_rating_num']) { ?>
                    <div class="saaspricing-ratings saaspricing-horizontal-ratings">
                        <div class="saaspricing-star-icon fs-6">
                            <?php
                            $saasp_rating = $settings['saasp_horizontal_rating_num'];
                            $saasp_full_stars = floor($saasp_rating);
                            $saasp_half_star = $saasp_rating - $saasp_full_stars;

                            for ($k = 0; $k < $saasp_full_stars; $k++) { ?>
                                <span class="saaspricing-icons"><i class="fa fa-star"></i></span>
                            <?php }

                            if ($saasp_half_star >= 0.5) { ?>
                                <span class="saaspricing-icons-half"><i class="fa fa-star"></i></span>
                            <?php }

                            for ($j = 0; $j < 5 - ceil($settings['saasp_horizontal_rating_num']); $j++) { ?>
                                <span class="saaspricing-icons-none"><i class="fa fa-star"></i></span>
                            <?php }

                            if ('' !== $settings['saasp_horizontal_rating_counter']) { ?>
                                <small class="saaspricing-review-text">
                                    <?php echo esc_html__('(', 'saaspricing') . esc_html($settings['saasp_horizontal_rating_counter']) . esc_html__(')', 'saaspricing'); ?>
                                </small>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- Table buttons -->
                <?php if ('' !== $settings['saasp_horizontal_primary_cta_text'] && 'yes' === $settings['saasp_horizontal_primary_cta_switch']) {
                    if (!empty($settings['saasp_horizontal_primary_cta_url']['url'])) {
                        $this->add_link_attributes('saasp_horizontal_primary_cta_url', $settings['saasp_horizontal_primary_cta_url']);
                    } ?>
                    <a class="btn saaspricing-horizontal-primary <?php
                        if ('center' === $settings['saasp_horizontal_cta_alignment']) {
                            echo esc_attr(' mx-auto');
                        } elseif ('right' === $settings['saasp_horizontal_cta_alignment']) {
                            echo esc_attr(' ms-auto');
                        } elseif ('justify' === $settings['saasp_horizontal_cta_alignment']) {
                            echo esc_attr(' w-100');
                        } else {
                            echo esc_attr(' me-auto');
                        }
                        if ('extra-small' === $settings['saasp_horizontal_primary_cta_size']) {
                            echo esc_attr('saaspricing-xsm-btn');
                        } elseif ('small' === $settings['saasp_horizontal_primary_cta_size']) {
                            echo esc_attr(' saaspricing-sm-btn');
                        } elseif ('medium' === $settings['saasp_horizontal_primary_cta_size']) {
                            echo esc_attr(' saaspricing-m-btn');
                        } elseif ('large' === $settings['saasp_horizontal_primary_cta_size']) {
                            echo esc_attr(' saaspricing-l-btn');
                        } elseif ('extra-large' === $settings['saasp_horizontal_primary_cta_size']) {
                            echo esc_attr(' saaspricing-xl-btn');
                        } ?>" 
                        <?php echo wp_kses($this->get_render_attribute_string('saasp_horizontal_primary_cta_url'), $this->saasp_allowed_tags()); ?>>
                        <?php echo esc_html($settings['saasp_horizontal_primary_cta_text']); ?>
                        <span class="saaspricing-primary-spacing">
                            <?php Icons_Manager::render_icon($settings['saasp_horizontal_primary_cta_icon'], ['aria-hidden' => 'true']); ?>
                        </span>
                    </a>
                <?php } ?>

                <?php if ('' !== $settings['saasp_horizontal_secondary_cta_text'] && 'yes' === $settings['saasp_horizontal_secondary_cta_switch']) {
                    if (!empty($settings['saasp_horizontal_secondary_cta_url']['url'])) {
                        $this->add_link_attributes('saasp_horizontal_secondary_cta_url', $settings['saasp_horizontal_secondary_cta_url']);
                    } ?>
                    <div class="saaspricng-horizontal-secondary-main <?php
                        if ('center' === $settings['saasp_horizontal_cta_alignment']) {
                            echo esc_attr('text-center ');
                        } elseif ('right' === $settings['saasp_horizontal_cta_alignment']) {
                            echo esc_attr(' text-end');
                        } ?>">
                        <a class="btn saaspricing-horizontal-secondary <?php
                            if ('justify' === $settings['saasp_horizontal_cta_alignment']) {
                                echo esc_attr(' w-100');
                            }
                            if ('extra-small' === $settings['saasp_horizontal_secondary_cta_size']) {
                                echo esc_attr(' saaspricing-xsm-btn');
                            } elseif ('small' === $settings['saasp_horizontal_secondary_cta_size']) {
                                echo esc_attr(' saaspricing-sm-btn');
                            } elseif ('medium' === $settings['saasp_horizontal_secondary_cta_size']) {
                                echo esc_attr(' saaspricing-m-btn');
                            } elseif ('large' === $settings['saasp_horizontal_secondary_cta_size']) {
                                echo esc_attr(' saaspricing-l-btn');
                            } elseif ('extra-large' === $settings['saasp_horizontal_secondary_cta_size']) {
                                echo esc_attr(' saaspricing-xl-btn');
                            } ?>" 
                            <?php echo wp_kses($this->get_render_attribute_string('saasp_horizontal_secondary_cta_url'), $this->saasp_allowed_tags()); ?>>
                            <?php echo esc_html($settings['saasp_horizontal_secondary_cta_text']); ?>
                            <span class="saaspricing-secondary-spacing">
                                <?php Icons_Manager::render_icon($settings['saasp_horizontal_secondary_cta_icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
}
protected function _content_template() {
?>
<div class="saaspricing-horizontal">
    <#
        let rowReverse = '';
        if ('yes' === settings.saasp_horizontal_cta_row_reverse) {
            rowReverse = 'saaspricing-row-reverse';
        }
    #>
    
    <#
        let symbols = {
            dollar: '&#36;',
            euro: '&#128;',
            franc: '&#8355;',
            pound: '&#163;',
            ruble: '&#8381;',
            shekel: '&#8362;',
            baht: '&#3647;',
            yen: '&#165;',
            won: '&#8361;',
            guilder: '&fnof;',
            peso: '&#8369;',
            peseta: '&#8359;',
            lira: '&#8356;',
            rupee: '&#8360;',
            indian_rupee: '&#8377;',
            real: 'R$',
            krona: 'kr'
        };

        let symbol = '';
        if (settings.saasp_horizontal_currency_symbol) {
            if ('custom' !== settings.saasp_horizontal_currency_symbol) {
                symbol = symbols[settings.saasp_horizontal_currency_symbol] || '';
            } else {
                symbol = settings.saasp_horizontal_currency_symbol_custom;
            }
        }
    #>

    <#
        let ctaAlignment = settings.saasp_horizontal_cta_alignment === 'right' ? 'ms-auto' :
            settings.saasp_horizontal_cta_alignment === 'center' ? 'mx-auto' :
            settings.saasp_horizontal_cta_alignment === 'left' ? 'me-auto' : 'mx-auto';

        let buttonSize = settings.saasp_horizontal_primary_cta_size === 'extra-small' ? 'saaspricing-xsm-btn' :
            settings.saasp_horizontal_primary_cta_size === 'small' ? 'saaspricing-sm-btn' :
            settings.saasp_horizontal_primary_cta_size === 'medium' ? 'saaspricing-m-btn' :
            settings.saasp_horizontal_primary_cta_size === 'large' ? 'saaspricing-l-btn' :
            settings.saasp_horizontal_primary_cta_size === 'extra-large' ? 'saaspricing-xl-btn' : 'saaspricing-m-btn';

        let buttonSizeSecondary = settings.saasp_horizontal_secondary_cta_size === 'extra-small' ? 'saaspricing-xsm-btn' :
            settings.saasp_horizontal_secondary_cta_size === 'small' ? 'saaspricing-sm-btn' :
            settings.saasp_horizontal_secondary_cta_size === 'medium' ? 'saaspricing-m-btn' :
            settings.saasp_horizontal_secondary_cta_size === 'large' ? 'saaspricing-l-btn' :
            settings.saasp_horizontal_secondary_cta_size === 'extra-large' ? 'saaspricing-xl-btn' : 'saaspricing-m-btn';

        let buttonAlignment = settings.saasp_horizontal_cta_alignment === 'center' ? 'text-center' :
            settings.saasp_horizontal_cta_alignment === 'right' ? 'text-end' : 
            settings.saasp_horizontal_cta_alignment === 'left' ? 'text-start' : 'text-center';

        let ButtonWidth = 'justify' === settings.saasp_horizontal_cta_alignment ? 'w-100' : '';
    #>

    <div class="row gx-0 saaspricing-horizontal-wrapper {{ rowReverse }}">
        <div class="col-lg-8">
            <div class="sasspricing-horizontal-left d-flex flex-column justify-content-center position-relative h-100">
                <!-- Table header -->
                <div class="saaspricing-horizontal-header">
                    <#
                        if ('' !== settings.saasp_horizontal_header_title) {
                    #>
                        <{{{ settings.saasp_horizontal_header_title_tag }}} class="saaspricing-horizontal-title">
                            {{{ settings.saasp_horizontal_header_title }}}
                        </{{{ settings.saasp_horizontal_header_title_tag }}}>
                    <#
                        }
                    #>
                    <#
                        if ('' !== settings.saasp_horizontal_header_description) {
                    #>
                        <p class="saaspricing-horizontal-description">
                            {{{ settings.saasp_horizontal_header_description }}}
                        </p>
                    <#
                        }
                    #>
                </div>

                <# if ('yes' === settings.saasp_horizontal_show_divider) { #>
                    <div class="saasp-horizontal-divider">
                        <hr>
                    </div>
                <# } #>

                <!-- Table features -->
                <div class="saaspricing-horizontal-feature-list">
                    <# if ('' !== settings.saasp_horizontal_features_title) { #>
                        <p class="saaspricing-horizontal-feature-title">
                            {{{ settings.saasp_horizontal_features_title }}}
                        </p>
                    <# } #>

                    <div class="row">
                        <# if (settings.saasp_horizontal_features) {
                            settings.saasp_horizontal_features.forEach(function(saasp_horizontal_features) { #>
                                <div class="saasp-columns">
                                    <div class="saasp-horizontal-icon-wrapper elementor-repeater-item-{{{ saasp_horizontal_features._id }}}">
                                        <#
                                            let featureIcon = elementor.helpers.renderIcon(view, saasp_horizontal_features.saasp_horizontal_features_icon, { 'aria-hidden': true }, 'i', 'object');
                                        #>
                                        {{{ featureIcon.value }}}
                                        <small class="saaspricing-horizontal-feature-text">
                                            {{{ saasp_horizontal_features.saasp_horizontal_features_text }}}
                                        </small>
                                    </div>
                                </div>
                            <# });
                        } #>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="saaspricing-horizontal-sidebar">
                <!-- Table ribbon -->
                <# if ('yes' === settings.saasp_horizontal_show_ribbon && '' !== settings.saasp_horizontal_ribbon_title) {
                    let saasp_ribbon_position = 'saaspricing-horizontal-' + settings.saasp_horizontal_ribbon_position + '-position';
                #>
                    <span class="saaspricing-horizontal-ribbon {{ saasp_ribbon_position }}">
                        {{{ settings.saasp_horizontal_ribbon_title }}}
                    </span>
                <# } #>

                <!-- Table slogan -->
                <p class="saaspricing-horizontal-slogan-title {{ 
                    'center' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-center' :
                    'right' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-right' :
                    'justify' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-center' :
                    'saaspricing-horizontal-pricing-left' }}">
                    {{{ settings.saasp_horizontal_cta_slogan_text }}}
                </p>

                <!-- Table pricing -->
                <div class="saasprcing-horizontal-pricing {{ 
                    'center' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-center' :
                    'right' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-right' :
                    'justify' === settings.saasp_horizontal_cta_alignment ? 'saaspricing-horizontal-pricing-center' :
                    'saaspricing-horizontal-pricing-left' }}">
                    <#
                        if ('none' !== settings.saasp_horizontal_currency_symbol && 'yes' === settings.saasp_horizontal_sale) {
                    #>
                        <del class="saaspricing-horizontal-original">
                            <span>
                                {{{ symbol }}}
                                <# if ('' !== settings.saasp_horizontal_original_price) { #>
                                    <span class="fw-bold">
                                        {{{ settings.saasp_horizontal_original_price }}}
                                    </span>
                                <# } #>
                            </span>
                        </del>
                    <# } #>

                    <# if ('before' === settings.saasp_horizontal_pricing_symbol_position) { #>
                        <span class="saaspricing-horizontal-symbol saaspricing-horizontal-price-text">
                            {{{ symbol }}}
                        </span>
                    <# } #>

                    <# if ('' === settings.saasp_horizontal_currency_format) { #>
                        <span class="saaspricing-horizontal-price saaspricing-horizontal-price-text">
                            {{{ settings.sassp_horizontal_price.split('.')[0] }}}
                        </span>
                        <# if ('' !== settings.sassp_horizontal_price.split('.')[1]) { #>
                            <span class="saaspricing-fraction-price">
                                {{{ settings.sassp_horizontal_price.split('.')[1] }}}
                            </span>
                        <# }
                    } else { #>
                        <span class="saaspricing-horizontal-price saaspricing-horizontal-price-text">
                            {{{ settings.sassp_horizontal_price }}}
                        </span>
                    <# } #>

                    <# if ('after' === settings.saasp_horizontal_pricing_symbol_position) { #>
                        <span class="saaspricing-horizontal-symbol saaspricing-horizontal-price-text">
                            {{{ symbol }}}
                        </span>
                    <# } #>

                    <# if ('' !== settings.saasp_horizontal_period) { #>
                        <span class="saaspricing-horizontal-period {{ 'below' === settings.saasp_horizontal_period_position ? 'w-100 mt-1' : '' }}">
                            {{{ settings.saasp_horizontal_period }}}
                        </span>
                    <# } #>
                </div>

                <!-- Table countdown -->
                <# if ('yes' === settings.saasp_horizontal_show_countdown && '' !== settings.saasp_horizontal_expire_date) { #>
                    <div class="saaspricing-horizontal-countdown {{ ctaAlignment }}">
                        <span class="saaspricing-countdown" data-countdown-index="0" data-expire-date="{{ settings.saasp_horizontal_expire_date }}">
                            <?php echo esc_html__('00d: 00h: 00m: 00s', 'saaspricing'); ?>
                        </span>
                    </div>
                <# } #>

                <!-- Table review -->
                <# if ('yes' === settings.saasp_horizontal_show_rating && '' !== settings.saasp_horizontal_rating_num) {
                    let saasp_rating = settings.saasp_horizontal_rating_num;
                    let saasp_full_stars = Math.floor(saasp_rating);
                    let saasp_half_star = saasp_rating - saasp_full_stars;
                    let saasp_empty_stars = 5 - Math.ceil(saasp_rating);
                #>
                    <div class="saaspricing-ratings saaspricing-horizontal-ratings {{ ctaAlignment }}">
                        <div class="saaspricing-star-icon fs-6"> 
                            <# for (let k = 0; k < saasp_full_stars; k++) { #>
                                <span class="saaspricing-icons">
                                    <i class="fa fa-star"></i>
                                </span>
                            <# } if (saasp_half_star >= 0.5) { #>
                                <span class="saaspricing-icons-half">
                                    <i class="fa fa-star"></i>
                                </span>
                            <# } for (let j = 0; j < saasp_empty_stars; j++) { #>
                                <span class="saaspricing-icons-none">
                                    <i class="fa fa-star"></i>
                                </span>
                            <# } if ('' !== settings.saasp_horizontal_rating_counter) { #>
                                <small class="saaspricing-review-text">
                                    {{{ '(' + settings.saasp_horizontal_rating_counter + ')' }}}
                                </small>
                            <# } #>
                        </div>
                    </div>
                <# } #>

                <!-- Primary CTA -->
                <# if ('' !== settings.saasp_horizontal_primary_cta_text && 'yes' === settings.saasp_horizontal_primary_cta_switch) { #>
                    <a class="btn saaspricing-horizontal-primary {{ ctaAlignment }} {{ ButtonWidth }} {{ buttonSize }}" href="{{ settings.saasp_horizontal_primary_cta_url.url }}">
                        {{{ settings.saasp_horizontal_primary_cta_text }}}
                        <span class="saaspricing-primary-spacing">
                            <#
                                let primaryButton = elementor.helpers.renderIcon(view, settings.saasp_horizontal_primary_cta_icon, { 'aria-hidden': true }, 'i', 'object');
                            #>
                            {{{ primaryButton.value }}}
                        </span>
                    </a>
                <# } #>

                <!-- Secondary CTA -->
                <# if ('' !== settings.saasp_horizontal_secondary_cta_text && 'yes' === settings.saasp_horizontal_secondary_cta_switch) { #>
                    <div class="saaspricng-horizontal-secondary-main {{ buttonAlignment }}">
                        <a class="btn saaspricing-horizontal-secondary {{ ButtonWidth }} {{ buttonSizeSecondary }}" href="{{ settings.saasp_horizontal_secondary_cta_url.url }}">
                            {{{ settings.saasp_horizontal_secondary_cta_text }}}
                            <span class="saaspricing-secondary-spacing">
                                <#
                                    let secondaryButton = elementor.helpers.renderIcon(view, settings.saasp_horizontal_secondary_cta_icon, { 'aria-hidden': true }, 'i', 'object');
                                #>
                                {{{ secondaryButton.value }}}
                            </span>
                        </a>
                    </div>
                <# } #>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
