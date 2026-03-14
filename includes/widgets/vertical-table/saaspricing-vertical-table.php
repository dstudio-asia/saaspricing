<?php
 // Elementor Classes

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Box_Shadow;
 use \Elementor\Group_Control_Border;
 use \Elementor\Icons_Manager;
 use \Elementor\Widget_Base;
 use \Elementor\Repeater;
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Saasp_Vertical
 */

class Saasp_Vertical extends Widget_Base {

use Sassp_Utils;
    use Saasp_Vertical_Content_Controls;
    use Saasp_Vertical_Style_Controls;

public function get_name() {
    return 'saasp-vertical';
}

public function get_title() {
    return esc_html__( 'Vertical Pricing Table', 'saaspricing' );
}

public function get_icon() {
    return 'saasp-icon eicon-price-table';
}

public function get_categories() {
    return ['saas_pricing_category'];
}

public function get_keywords() {
    return [ 'pricing', 'tables' , 'saaspricing', 'verticle'];
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
<div class="saaspricing-cards-all">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="saaspricing-card saaspricing-vertical-pricing-card">
                <!-- Table ribbon -->
                <?php if ('yes' === $settings['saasp_vertical_show_ribbon']) { ?>
                    <div class="saaspricing-card-header saaspricing-vertical-ribbon">
                        <p class="saaspricing-ribbon-title mb-0 saaspricing-vertical-header-alignment">
                            <small><?php echo esc_html($settings['saasp_vertical_ribbon_title']); ?></small>
                        </p>
                    </div>
                <?php } ?>

                <div class="saaspricing-card-body position-relative">
                    <!-- Table header -->
                    <div class="saaspricing-vertical-header saaspricing-vertical-header-alignment  <?php if ('yes' !== $settings['saasp_vertical_show_ribbon']) { echo esc_attr('saaspricing-p-vertical-header'); } ?>">
                        <?php if ('' !== $settings['saasp_vertical_icon']['value']) { ?>
                            <div class="saaspricing-vertical-icon elementor-icon saaspricing-vertical-header-alignment">
                                <?php Icons_Manager::render_icon($settings['saasp_vertical_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                        <?php } ?>

                        <?php if ('' !== $settings['saasp_vertical_header_title']) {
                            printf('<%1$s class="card-title saaspricing-vertical-title saaspricing-vertical-header-alignment">%2$s</%1$s>',
                                esc_html( self::validate_html_tag( $settings['saasp_vertical_header_title_tag'] ) ),
                                esc_html( $settings['saasp_vertical_header_title'] ) );
                        } ?>

                        <p class="saaspricing-vertical-description saaspricing-vertical-header-alignment">
                            <?php echo esc_html($settings['saasp_vertical_header_description']); ?>
                        </p>
                    </div>

                    <!-- Table pricing -->
                    <div class="saasprcing-vertical-pricing saaspricing-vertical-body-alignment">
                        <?php if ('none' !== $settings['saasp_vertical_currency_symbol'] && 'yes' === $settings['saasp_vertical_sale']) { ?>
                            <del class="saaspricing-vertical-original">
                                <span>
                                    <?php if ('custom' !== $settings['saasp_vertical_currency_symbol']) {
                                        echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                    } else {
                                        echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                    } ?>
                                    <?php if ('' !== $settings['saasp_vertical_original_price']) { ?>
                                        <span class="fw-bold"><?php echo esc_html($settings['saasp_vertical_original_price']); ?></span>
                                    <?php } ?>
                                </span>
                            </del>
                        <?php } ?>

                        <?php if ('before' === $settings['saasp_vertical_pricing_symbol_position']) { ?>
                            <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                <?php if ('custom' !== $settings['saasp_vertical_currency_symbol']) {
                                    echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                } else {
                                    echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                } ?>
                            </span>
                        <?php } ?>

                        <?php if ('' === $settings['saasp_vertical_currency_format']) { ?>
                            <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                <?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[0]); ?>
                            </span>
                            <?php if ('' !== explode(".", $settings['sassp_vertical_price'])[1]) { ?>
                                <span class="saaspricing-fraction-price saaspricing-vertical-price-text">
                                    <?php echo esc_html(explode(".", $settings['sassp_vertical_price'])[1]); ?>
                                </span>
                            <?php } ?>
                        <?php } else { ?>
                            <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                <?php echo esc_html($settings['sassp_vertical_price']); ?>
                            </span>
                        <?php } ?>

                        <?php if ('after' === $settings['saasp_vertical_pricing_symbol_position']) { ?>
                            <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                <?php if ('custom' !== $settings['saasp_vertical_currency_symbol']) {
                                    echo esc_html($this->get_currency_symbol($settings['saasp_vertical_currency_symbol']));
                                } else {
                                    echo esc_html($settings['saasp_vertical_currency_symbol_custom']);
                                } ?>
                            </span>
                        <?php } ?>

                        <?php if ('' !== $settings['saasp_vertical_period']) { ?>
                            <span class="saaspricing-vertical-period saaspricing-vertical-body-alignment <?php if ('below' === $settings['saasp_vertical_period_position']) { echo esc_attr('w-100 mt-1'); } ?>">
                                <?php echo esc_html($settings['saasp_vertical_period']); ?>
                            </span>
                        <?php } ?>
                    </div>

                    <!-- Table countdown -->
                    <?php if ('yes' === $settings['saasp_vertical_show_countdown'] && '' !== $settings['saasp_vertical_show_countdown']) { ?>
                        <div class="saaspricing-vertical-countdown saaspricing-vertical-body-alignment">
                            <span class="saaspricing-countdown"
                                data-countdown-index="0"
                                data-expire-date="<?php echo esc_attr($settings['saasp_vertical_expire_date']); ?>">
                                <?php echo esc_html__('00d: 00h: 00m: 00s', 'saaspricing'); ?>
                            </span>
                        </div>
                    <?php } ?>

                    <!-- Table review -->
                    <?php if ('yes' === $settings['saasp_vertical_show_rating'] && '' !== $settings['saasp_vertical_rating_num']) {
                        $saasp_top_gap = 'yes' === $settings['saasp_vertical_show_countdown'] ? 'gap-30' : 'no-gap'; ?>
                        <div class="saaspricing-ratings saaspricing-vertical-ratings saaspricing-vertical-body-alignment">
                            <div class="saaspricing-star-icon <?php echo esc_attr($saasp_top_gap); ?> fs-6">
                                <?php
                                $saasp_rating = $settings['saasp_vertical_rating_num'];
                                $saasp_full_stars = floor($saasp_rating);
                                $saasp_half_star = $saasp_rating - $saasp_full_stars;

                                for ($k = 0; $k < $saasp_full_stars; $k++) { ?>
                                    <span class="saaspricing-icons"><i class="fa fa-star"></i></span>
                                <?php }
                                if ($saasp_half_star >= 0.5) { ?>
                                    <span class="saaspricing-icons-half"><i class="fa fa-star"></i></span>
                                <?php }
                                for ($j = 0; $j < 5 - ceil($settings['saasp_vertical_rating_num']); $j++) { ?>
                                    <span class="saaspricing-icons-none"><i class="fa fa-star"></i></span>
                                <?php }
                                if ('' !== $settings['saasp_vertical_rating_counter']) { ?>
                                    <small class="saaspricing-review-text">
                                        <?php echo esc_html__('(', 'saaspricing') . esc_html($settings['saasp_vertical_rating_counter']) . esc_html__(')', 'saaspricing'); ?>
                                    </small>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Table top CTA -->
                    <?php if ('top' === $settings['saasp_vertical_primary_cta_position'] || 'top' === $settings['saasp_vertical_secondary_cta_position']) { ?>
                        <div class="saaspricing-cta-card saaspricing-vertical-cta-alignment 
                            <?php if ('center' === $settings['saasp_vertical_cta_alignment']) {
                                echo esc_attr('text-center');
                            } elseif ('right' === $settings['saasp_vertical_cta_alignment']) {
                                echo esc_attr('text-end');
                            } ?>">
                            <?php if ('yes' === $settings['saasp_vertical_primary_cta_switch'] && '' !== $settings['saasp_vertical_primary_cta_text'] 
                            && 'top' === $settings['saasp_vertical_primary_cta_position']) {
                                if (!empty($settings['saasp_vertical_primary_cta_url']['url'])) {
                                    $this->add_link_attributes('saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url']);
                                } ?>
                                <a class="btn saaspricing-vertical-primary 
                                    <?php if ('justify' === $settings['saasp_vertical_cta_alignment']) {
                                        echo esc_attr('saaspricing-vertical-justify ');
                                    }
                                    if ('extra-small' === $settings['saasp_vertical_primary_cta_size']) {
                                        echo esc_attr('saaspricing-xsm-btn');
                                    } elseif ('small' === $settings['saasp_vertical_primary_cta_size']) {
                                        echo esc_attr('saaspricing-sm-btn');
                                    } elseif ('medium' === $settings['saasp_vertical_primary_cta_size']) {
                                        echo esc_attr('saaspricing-m-btn');
                                    } elseif ('large' === $settings['saasp_vertical_primary_cta_size']) {
                                        echo esc_attr('saaspricing-l-btn');
                                    } elseif ('extra-large' === $settings['saasp_vertical_primary_cta_size']) {
                                        echo esc_attr('saaspricing-xl-btn');
                                    } ?>" 
                                    <?php echo wp_kses($this->get_render_attribute_string('saasp_vertical_primary_cta_url'), $this->saasp_allowed_tags()); ?>>
                                    <?php echo esc_html($settings['saasp_vertical_primary_cta_text']); ?>
                                    <span class="saaspricing-primary-spacing">
                                        <?php Icons_Manager::render_icon($settings['saasp_vertical_primary_cta_icon'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                </a>
                            <?php } ?>

                            <?php if ('yes' === $settings['saasp_vertical_secondary_cta_switch'] && '' !== $settings['saasp_vertical_secondary_cta_text'] &&
                            'top' === $settings['saasp_vertical_secondary_cta_position']) {
                                if (!empty($settings['saasp_vertical_secondary_cta_url']['url'])) {
                                    $this->add_link_attributes('saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url']);
                                } ?>
                                <div class="saaspricng-secondary-main <?php if ('center' === $settings['saasp_vertical_cta_alignment']) {
                                    echo esc_attr('text-center');
                                } elseif ('right' === $settings['saasp_vertical_cta_alignment']) {
                                    echo esc_attr('text-end');
                                } ?>">
                                    <a class="btn saaspricing-vertical-secondary 
                                        <?php if ('justify' === $settings['saasp_vertical_cta_alignment']) {
                                            echo esc_attr('saaspricing-vertical-justify ');
                                        }
                                        if ('' !== $settings['saasp_vertical_cta_alignment']) {
                                            echo esc_attr('saaspricing-cta-' . $settings['saasp_vertical_cta_alignment']);
                                        }
                                        if ('extra-small' === $settings['saasp_vertical_secondary_cta_size']) {
                                            echo esc_attr('saaspricing-xsm-btn');
                                        } elseif ('small' === $settings['saasp_vertical_secondary_cta_size']) {
                                            echo esc_attr('saaspricing-sm-btn');
                                        } elseif ('medium' === $settings['saasp_vertical_secondary_cta_size']) {
                                            echo esc_attr('saaspricing-m-btn');
                                        } elseif ('large' === $settings['saasp_vertical_secondary_cta_size']) {
                                            echo esc_attr('saaspricing-l-btn');
                                        } elseif ('extra-large' === $settings['saasp_vertical_secondary_cta_size']) {
                                            echo esc_attr('saaspricing-xl-btn');
                                        } ?>" 
                                        <?php echo wp_kses($this->get_render_attribute_string('saasp_vertical_secondary_cta_url'), $this->saasp_allowed_tags()); ?>>
                                        <?php echo esc_html($settings['saasp_vertical_secondary_cta_text']); ?>
                                        <span class="saaspricing-secondary-spacing">
                                            <?php Icons_Manager::render_icon($settings['saasp_vertical_secondary_cta_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Table features -->
                    <div class="saaspricing-vertical-feature">
                        <?php if ('' !== $settings['saasp_vertical_features_title']) { ?>
                            <p class="saaspricing-features-title">
                                <?php echo esc_html($settings['saasp_vertical_features_title']); ?>
                            </p>
                        <?php } ?>
                        <ol class="list-unstyled mb-0">
                            <?php if ($settings['saasp_vertical_features']) {
                                foreach ($settings['saasp_vertical_features'] as $saasp_vertical_features) { ?>
                                    <li class="saaspricing-vertical-padding elementor-repeater-item-<?php echo esc_attr($saasp_vertical_features['_id']); ?>">
                                        <?php Icons_Manager::render_icon($saasp_vertical_features['saasp_vertical_features_icon'], ['aria-hidden' => 'true']); ?>
                                        <small><?php echo esc_html($saasp_vertical_features['saasp_vertical_features_text']); ?></small>
                                    </li>
                                <?php } } ?>
                        </ol>
                    </div>
                </div>

                <!-- Table bottom CTA -->
                <?php if ('top' !== $settings['saasp_vertical_primary_cta_position'] && 'bottom' === $settings['saasp_vertical_primary_cta_position']
                || 'top' !== $settings['saasp_vertical_secondary_cta_position'] && 'bottom' === $settings['saasp_vertical_secondary_cta_position']) { ?>
                    <div class="saaspricing-card-footer <?php if ('center' === $settings['saasp_vertical_cta_alignment']) {
                        echo esc_attr('text-center');
                    } elseif ('right' === $settings['saasp_vertical_cta_alignment']) {
                        echo esc_attr('text-end');
                    } ?>">
                        <?php if ('' !== $settings['saasp_vertical_primary_cta_text']
                        && 'bottom' === $settings['saasp_vertical_primary_cta_position'] || empty($settings['saasp_vertical_primary_cta_position'])) {
                            if (!empty($settings['saasp_vertical_primary_cta_url']['url'])) {
                                $this->add_link_attributes('saasp_vertical_primary_cta_url', $settings['saasp_vertical_primary_cta_url']);
                            }
                            if ('yes' === $settings['saasp_vertical_primary_cta_switch']) { ?>
                                <a class="btn saaspricing-vertical-primary <?php if ('justify' === $settings['saasp_vertical_cta_alignment']) {
                                    echo esc_attr('saaspricing-vertical-justify ');
                                }
                                if ('extra-small' === $settings['saasp_vertical_primary_cta_size']) {
                                    echo esc_attr('saaspricing-xsm-btn');
                                } elseif ('small' === $settings['saasp_vertical_primary_cta_size']) {
                                    echo esc_attr('saaspricing-sm-btn');
                                } elseif ('medium' === $settings['saasp_vertical_primary_cta_size']) {
                                    echo esc_attr('saaspricing-m-btn');
                                } elseif ('large' === $settings['saasp_vertical_primary_cta_size']) {
                                    echo esc_attr('saaspricing-l-btn');
                                } elseif ('extra-large' === $settings['saasp_vertical_primary_cta_size']) {
                                    echo esc_attr('saaspricing-xl-btn');
                                } ?>"
                                <?php echo wp_kses($this->get_render_attribute_string('saasp_vertical_primary_cta_url'), $this->saasp_allowed_tags()); ?>>
                                    <?php echo esc_html($settings['saasp_vertical_primary_cta_text']); ?>
                                    <span class="saaspricing-primary-spacing">
                                        <?php Icons_Manager::render_icon($settings['saasp_vertical_primary_cta_icon'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                </a>
                        <?php } } ?>

                        <?php if ('' !== $settings['saasp_vertical_secondary_cta_text']
                        && 'bottom' === $settings['saasp_vertical_secondary_cta_position'] || empty($settings['saasp_vertical_secondary_cta_position'])) {
                            if (!empty($settings['saasp_vertical_secondary_cta_url']['url'])) {
                                $this->add_link_attributes('saasp_vertical_secondary_cta_url', $settings['saasp_vertical_secondary_cta_url']);
                            }
                            if ('yes' === $settings['saasp_vertical_secondary_cta_switch']) { ?>
                                <div class="saaspricng-secondary-main <?php if ('center' === $settings['saasp_vertical_cta_alignment']) {
                                    echo esc_attr('text-center');
                                } elseif ('right' === $settings['saasp_vertical_cta_alignment']) {
                                    echo esc_attr('text-end');
                                } ?>">
                                    <a class="btn saaspricing-vertical-secondary <?php if ('justify' === $settings['saasp_vertical_cta_alignment']) {
                                        echo esc_attr('saaspricing-vertical-justify ');
                                    }
                                    if ('extra-small' === $settings['saasp_vertical_secondary_cta_size']) {
                                        echo esc_attr('saaspricing-xsm-btn');
                                    } elseif ('small' === $settings['saasp_vertical_secondary_cta_size']) {
                                        echo esc_attr('saaspricing-sm-btn');
                                    } elseif ('medium' === $settings['saasp_vertical_secondary_cta_size']) {
                                        echo esc_attr('saaspricing-m-btn');
                                    } elseif ('large' === $settings['saasp_vertical_secondary_cta_size']) {
                                        echo esc_attr('saaspricing-l-btn');
                                    } elseif ('extra-large' === $settings['saasp_vertical_secondary_cta_size']) {
                                        echo esc_attr('saaspricing-xl-btn');
                                    } ?>"
                                    <?php echo wp_kses($this->get_render_attribute_string('saasp_vertical_secondary_cta_url'), $this->saasp_allowed_tags()); ?>>
                                        <?php echo esc_html($settings['saasp_vertical_secondary_cta_text']); ?>
                                        <span class="saaspricing-secondary-spacing">
                                            <?php Icons_Manager::render_icon($settings['saasp_vertical_secondary_cta_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    </a>
                                </div>
                        <?php } } ?>
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
    <div class="saaspricing-cards-all">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="saaspricing-card saaspricing-vertical-pricing-card">
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
    
                let symbol = '',
                    iconsHTML = {};
    
                if ( settings.saasp_vertical_currency_symbol ) {
                    if ( 'custom' !== settings.saasp_vertical_currency_symbol ) {
                        symbol = symbols[ settings.saasp_vertical_currency_symbol ] || '';
                    } else {
                        symbol = settings.saasp_vertical_currency_symbol_custom;
                    }
                }
                #>
    
                <#
                    let textAlign = 'text-center'
                    if(settings.saasp_vertical_cta_alignment == 'center') {
                        textAlign = 'text-center'
                    }else if(settings.saasp_vertical_cta_alignment == 'right') {
                        textAlign = 'text-end'
                    }else if(settings.saasp_vertical_cta_alignment == 'left') {
                        textAlign = 'text-start'
                    }
                #>
    
                <#
                    let textJustify = ''
                    let buttonSize = 'saaspricing-m-btn'
                    if('justify' === settings.saasp_vertical_cta_alignment) {
                        textJustify = 'saaspricing-vertical-justify'
                    }
                    if('extra-small' === settings.saasp_vertical_primary_cta_size) {
                        buttonSize = 'saaspricing-xsm-btn'
                    } else if ( 'small' === settings.saasp_vertical_primary_cta_size ) {
                        buttonSize = 'saaspricing-sm-btn'
                    } else if ( 'medium' === settings.saasp_vertical_primary_cta_size ) {
                        buttonSize = 'saaspricing-m-btn'
                    } else if ( 'large' === settings.saasp_vertical_primary_cta_size ) {
                        buttonSize = 'saaspricing-l-btn'
                    } else if ( 'extra-large' === settings.saasp_vertical_primary_cta_size ) {
                        buttonSize = 'saaspricing-xl-btn'
                    }
                #>

                <#
                    let secondaryButtonSize = 'saaspricing-m-btn'
                    if('extra-small' === settings.saasp_vertical_secondary_cta_size) {
                        secondaryButtonSize = 'saaspricing-xsm-btn'
                    } else if ( 'small' === settings.saasp_vertical_secondary_cta_size ) {
                        secondaryButtonSize = 'saaspricing-sm-btn'
                    } else if ( 'medium' === settings.saasp_vertical_secondary_cta_size ) {
                        secondaryButtonSize = 'saaspricing-m-btn'
                    } else if ( 'large' === settings.saasp_vertical_secondary_cta_size ) {
                        secondaryButtonSize = 'saaspricing-l-btn'
                    } else if ( 'extra-large' === settings.saasp_vertical_secondary_cta_size ) {
                        secondaryButtonSize = 'saaspricing-xl-btn'
                    }
                #>
    
    
                    <!-- Table ribbon -->
                    <#
                    if ( 'yes' === settings.saasp_vertical_show_ribbon ) {
                    #>
                        <div class="saaspricing-card-header saaspricing-vertical-ribbon">
                            <p class="saaspricing-ribbon-title mb-0 saaspricing-vertical-header-alignment"> 
                                <small>{{{ settings.saasp_vertical_ribbon_title }}}</small>
                            </p>
                        </div>
                    <#
                    }
                    #>
                    <div class="saaspricing-card-body position-relative">
                            <!-- Table header -->
                            <div class="saaspricing-vertical-header saaspricing-vertical-header-alignment 
                            <# if ( 'yes' !== settings.saasp_vertical_show_ribbon ) { #>
                                saaspricing-p-vertical-header
                            <# } #>
                            ">
                            <#  
                            let iconHTML = elementor.helpers.renderIcon( view, settings.saasp_vertical_icon, { 'aria-hidden': true }, 'i' , 'object' );
                            if(iconHTML.value){
                            #>
                                <div class="saaspricing-vertical-icon elementor-icon saaspricing-vertical-header-alignment">
                                    {{{ iconHTML.value }}}
                                </div>
                            <#  
                            }
                            #>
    
                            <# if ( settings.saasp_vertical_header_title ) { #>
                                <{{{ settings.saasp_vertical_header_title_tag }}} class="card-title saaspricing-vertical-title saaspricing-vertical-header-alignment">
                                    {{{ settings.saasp_vertical_header_title }}}
                                </{{{ settings.saasp_vertical_header_title_tag }}}>
                            <# } #>
    
                            <p class="saaspricing-vertical-description saaspricing-vertical-header-alignment">
                                {{{ settings.saasp_vertical_header_description }}}
                            </p>
                        </div>
                        <!-- table pricing -->
                        <div class="saasprcing-vertical-pricing saaspricing-vertical-body-alignment">
                            <# 
                            if ( 'none' !== settings.saasp_vertical_currency_symbol && 'yes' === settings.saasp_vertical_sale ) {
                            #>
                                <del class="saaspricing-vertical-original">
                                    <span>
                                        {{{ symbol }}}
                                        <# if ( settings.saasp_vertical_original_price ) { #>
                                            <span class="fw-bold">
                                                {{{ settings.saasp_vertical_original_price }}}
                                            </span>
                                        <# } #>
                                    </span>
                                </del>
                            <#
                            }
                            #>
                            <# if ( 'before' === settings.saasp_vertical_pricing_symbol_position ) { #>
                                <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                    {{{symbol}}}
                                </span>
                            <# } #>
                            <# if ( '' === settings.saasp_vertical_currency_format ) { #>
                                <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                    {{{ settings.sassp_vertical_price.split('.')[0] }}}
                                </span>
                            <# if ( settings.sassp_vertical_price.split('.')[1] ) { #>
                                <span class="saaspricing-fraction-price saaspricing-vertical-price-text">
                                    {{{ settings.sassp_vertical_price.split('.')[1] }}}
                                </span>
                            <# } #>
                            <# } else { #>
                                <span class="saaspricing-vertical-price saaspricing-vertical-typography saaspricing-vertical-price-text">
                                    {{{ settings.sassp_vertical_price }}}
                                </span>
                            <# } #>
                            <# if ( 'after' === settings.saasp_vertical_pricing_symbol_position ) { #>
                                <span class="saaspricing-vertical-symbol saaspricing-vertical-price-text">
                                    {{{symbol}}}
                                </span>
                            <# } #>
                            <# if ( settings.saasp_vertical_period ) { #>
                                <span class="saaspricing-vertical-period saaspricing-vertical-body-alignment
                                    <# if ( 'below' === settings.saasp_vertical_period_position ) { #>
                                        saaspricing-vertical-justify mt-1
                                    <# } #>">
                                    {{{ settings.saasp_vertical_period }}}
                                </span>
                            <# } #>
                        </div>
                        <!-- Table countdown -->
                        <# if ( 'yes' === settings.saasp_vertical_show_countdown && settings.saasp_vertical_expire_date ) { #>
                            <div class="saaspricing-vertical-countdown saaspricing-vertical-body-alignment">
                                <span class="saaspricing-countdown"
                                    data-countdown-index="0"
                                    data-expire-date="{{ settings.saasp_vertical_expire_date }}">
                                    <?php echo esc_html__('00d: 00h: 00m: 00s','saaspricing'); ?>
                                </span>
                            </div>
                        <# } #>
                        <!-- Table review -->
                        <# 
                        if ( 'yes' === settings.saasp_vertical_show_rating && settings.saasp_vertical_rating_num ) { 
                           let saasp_top_gap =  'yes' === settings.saasp_vertical_show_countdown ? 'gap-30' : 'no-gap' ;  
                        #>
                            <div class="saaspricing-ratings saaspricing-vertical-ratings saaspricing-vertical-body-alignment">
                                <div class="saaspricing-star-icon {{ saasp_top_gap }} fs-6"> 
                                    <# let saasp_rating = settings.saasp_vertical_rating_num; #>
                                    <# let saasp_full_stars = Math.floor( saasp_rating ); #>
                                    <# let saasp_half_star = saasp_rating - saasp_full_stars; #>
    
                                    <# for ( let k = 0; k < saasp_full_stars; k++ ) { #>
                                        <span class="saaspricing-icons">
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <# } #>
    
                                    <# if ( saasp_half_star >= 0.5 ) { #>
                                        <span class="saaspricing-icons-half">
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <# } #>
    
                                    <# for ( let j = 0; j < 5 - Math.ceil( settings.saasp_vertical_rating_num ); j++ ) { #>
                                        <span class="saaspricing-icons-none">
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <# } #>
    
                                    <# if ( settings.saasp_vertical_rating_counter ) { #>
                                        <small class="saaspricing-review-text">
                                            ({{ settings.saasp_vertical_rating_counter }})
                                        </small>
                                    <# } #>
                                </div>
                            </div>
                        <# } #>
                        <!-- Table top CTA -->
                        <# if ( 'top' === settings.saasp_vertical_primary_cta_position || 'top' === settings.saasp_vertical_secondary_cta_position ) { #>
                            
                            <div class="saaspricing-cta-card saaspricing-vertical-cta-alignment {{ textAlign }}"> 
                            <!-- top primary -->
                            <# if ( 'yes' === settings.saasp_vertical_primary_cta_switch && settings.saasp_vertical_primary_cta_text && 'top' === settings.saasp_vertical_primary_cta_position ) { #>
                            <a class="btn saaspricing-vertical-primary {{ textJustify }} {{ buttonSize }}" href='{{ settings.saasp_vertical_primary_cta_url.url }}'
                            >
                                {{{ settings.saasp_vertical_primary_cta_text }}}
                                <span class="saaspricing-primary-spacing"> 
                                    <#
                                        let primaryTop = elementor.helpers.renderIcon( view, settings.saasp_vertical_primary_cta_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                    #>
                                    {{{ primaryTop.value }}}
                                </span>
                            </a>
                            <# } #>
                            <!-- top secondary -->
                            <# if ( 'yes' === settings.saasp_vertical_secondary_cta_switch && settings.saasp_vertical_secondary_cta_text && 'top' === settings.saasp_vertical_secondary_cta_position ) { #>
                                    <div class="saaspricng-secondary-main {{ textAlign }}">
                                        <a class="btn saaspricing-vertical-secondary {{ textJustify }} {{ secondaryButtonSize }}" href='{{ settings.saasp_vertical_primary_cta_url.url }}'>
                                            {{{ settings.saasp_vertical_secondary_cta_text }}}
                                            <span class="saaspricing-secondary-spacing"> 
                                            <#
                                                let SecondaryTop = elementor.helpers.renderIcon( view, settings.saasp_vertical_secondary_cta_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                            #>
                                            {{{ SecondaryTop.value }}}
                                            </span>
                                        </a>
                                    </div>
                            <# } #>
                            </div>
                        <# } #>
                        <!-- Table features -->
                        <div class="saaspricing-vertical-feature">
                            <# if ( settings.saasp_vertical_features_title ) { #>
                                <p class="saaspricing-features-title">
                                    {{{ settings.saasp_vertical_features_title }}}
                                </p>
                            <# } #>
                            <ol class="list-unstyled mb-0">
                                <# if ( settings.saasp_vertical_features ) {
                                    _.each( settings.saasp_vertical_features, function( feature ) { #>
                                        <li class="saaspricing-vertical-padding elementor-repeater-item-{{ feature._id }}">
                                            <#
                                            let icon = elementor.helpers.renderIcon( view, feature.saasp_vertical_features_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                            #>
                                            {{{ icon.value }}}
                                            <small>
                                                {{{ feature.saasp_vertical_features_text }}}
                                            </small>
                                        </li>
                                    <# } );
                                } #>
                            </ol>
                        </div>
                    </div>
                    <!-- Table bottom cta -->
                    <# if ( ( 'top' !== settings.saasp_vertical_primary_cta_position && 'bottom' === settings.saasp_vertical_primary_cta_position ) ||
                    ( 'top' !== settings.saasp_vertical_secondary_cta_position && 'bottom' === settings.saasp_vertical_secondary_cta_position ) ) { 
                    #>
                    <div class="saaspricing-card-footer {{ textAlign }}"> 
                        <!-- Primary Bottom -->
                        <#
                        if ( '' !== settings.saasp_vertical_primary_cta_text && ('bottom' === settings.saasp_vertical_primary_cta_position || 
                        settings.saasp_vertical_primary_cta_position === '' ) ) {
                            if('yes' === settings.saasp_vertical_primary_cta_switch) {
                        #>   
                        <a class="btn saaspricing-vertical-primary {{ buttonSize }} {{ textJustify }}" href="{{settings.saasp_vertical_primary_cta_url.url}}" >
                            {{{ settings.saasp_vertical_primary_cta_text }}}
                            <span class="saaspricing-primary-spacing">
                                <#
                                    let primaryBottom = elementor.helpers.renderIcon( view, settings.saasp_vertical_primary_cta_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                #>
                                {{{ primaryBottom.value }}}
                            </span>
                        </a>
                        <#
                        }
                        }
                        #>
                        <!-- Secondary Bottom -->
    
                        <#
                        if ( '' !== settings.saasp_vertical_secondary_cta_text && ('bottom' === settings.saasp_vertical_secondary_cta_position || 
                        settings.saasp_vertical_secondary_cta_position === '' ) ) {
                            if('yes' === settings.saasp_vertical_secondary_cta_switch) {
                        #>
                        <div class="saaspricng-secondary-main {{ textAlign }}">
                            <a class="btn saaspricing-vertical-secondary {{ secondaryButtonSize }} {{ textJustify }}" href="{{settings.saasp_vertical_secondary_cta_url.url}}" >
                                {{{ settings.saasp_vertical_secondary_cta_text }}}
                                <span class="saaspricing-secondary-spacing">
                                    <#
                                        let secondaryBottom = elementor.helpers.renderIcon( view, settings.saasp_vertical_secondary_cta_icon, { 'aria-hidden': true }, 'i' , 'object' );
                                    #>
                                    {{{ secondaryBottom.value }}}
                                </span>
                            </a>
                        </div>
                        <#
                        }
                        }
                        #>
                    </div>
                    <# 
                    }
                    #>
                </div>
            </div>
        </div>
    </div>
<?php
}
}