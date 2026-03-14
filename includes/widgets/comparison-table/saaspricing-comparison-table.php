<?php
// Elementor Classes

use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Saasp_Comparison
 */

class Saasp_Comparison extends Widget_Base
{

    use Sassp_Utils;
    use Saasp_Comparison_Content_Controls;
    use Saasp_Comparison_Style_Controls;

    public function get_name()
    {
        return 'saasp-comparison';
    }

    public function get_title()
    {
        return esc_html__('Comparison Table', 'saaspricing');
    }

    public function get_icon()
    {
        return 'saasp-icon eicon-table';
    }

    public function get_categories()
    {
        return ['saas_pricing_category'];
    }

    public function get_keywords()
    {
        return ['pricing', 'tables', 'saaspricing', 'comparison'];
    }

    public function saasp_allowed_tags()
    {

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

    protected function register_controls()
    {

        $this->content_controls();
        $this->style_controls();
    }

    private function get_currency_symbol($saasp_symbol_name)
    {
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
        return isset($saasp_symbols[$saasp_symbol_name]) ? $saasp_symbols[$saasp_symbol_name] : '';
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="saaspricing-main table-responsive-lg position-relative">
            <table class="saaspricing-table" role="presentation">
                <thead>
                    <!-- Table ribbons -->
                    <?php
                    if (
                        'yes' === $settings['saasp_comparison_show_ribbon_1']  ||  'yes' === $settings['saasp_comparison_show_countdown_1']  ||
                        'yes' === $settings['saasp_comparison_show_ribbon_2'] || 'yes' === $settings['saasp_comparison_show_countdown_2'] ||
                        'yes' === $settings['saasp_comparison_show_ribbon_3'] ||  'yes' === $settings['saasp_comparison_show_countdown_3']
                    ) {
                    ?>
                        <tr class="saaspricing-ribbon-table-row">
                            <td class="saaspricing-blank"></td>
                            <?php
                            $saasp_expire_date_one = $settings['saasp_comparison_expire_date_1'];
                            $saasp_expire_date_two = $settings['saasp_comparison_expire_date_2'];
                            $saasp_expire_date_three =  $settings['saasp_comparison_expire_date_3'];

                            for ($i = 1, $j = 0; $i <= $settings['saasp_comparison_select_columns'], $j < $settings['saasp_comparison_select_columns']; $i++, $j++) {
                                $saasp_visible = '';
                                if ('yes' === $settings['saasp_comparison_show_ribbon_' . $i] ||  'yes' === $settings['saasp_comparison_show_countdown_' . $i]) {
                                    $saasp_visible;
                                } else {
                                    $saasp_visible = 'saasp-hidden';
                                }
                            ?>
                                <td class="saaspricing-ribbon-wrapper saaspricing-common-ribbon saaspricing-comparison-header-alignment
                                        <?php echo esc_attr($saasp_visible); ?>" data-expire-date-one="<?php echo esc_attr($saasp_expire_date_one); ?>"
                                    data-expire-date-two="<?php echo esc_attr($saasp_expire_date_two); ?>" data-expire-date-three="<?php echo esc_attr($saasp_expire_date_three); ?>">
                                    <div class="saaspricing-ribbon-title">
                                        <?php
                                        if ($settings['saasp_comparison_ribbon_title_' . $i]) {
                                            echo esc_html($settings['saasp_comparison_ribbon_title_' . $i]);
                                        }
                                        ?>
                                    </div>
                                    <div class="saaspricing-countdown">
                                        <?php
                                        if ('yes' === $settings['saasp_comparison_show_countdown_' . $i] &&  '' !== $settings['saasp_comparison_show_countdown_' . $i]) {
                                        ?>
                                            <div class="saaspricing-show-expire-date" data-countdown-index="<?php echo esc_attr($j); ?>"
                                                data-expire-date-<?php echo esc_attr($i); ?>="<?php echo esc_attr($settings['saasp_comparison_expire_date_' . $i]); ?>">
                                                <?php echo esc_html__('00d: 00h: 00m: 00s', 'saaspricing'); ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- Table head -->
                    <?php
                    if ('1' === $settings['saasp_comparison_select_columns']) {
                        if (
                            '' !== $settings['saasp_comparison_header_title_text_1'] ||
                            '' !== $settings['saasp_comparison_header_title_description_1']
                        ) {
                    ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_1'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_1']); ?>
                                    </small>
                                </td>
                            </tr>
                        <?php
                        }
                    } elseif ('2' === $settings['saasp_comparison_select_columns']) {
                        if (
                            '' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_description_1']
                            || '' !== $settings['saasp_comparison_header_title_text_2'] || '' !== $settings['saasp_comparison_header_title_description_2']
                        ) {
                        ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_1'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_1']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_2'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_2']); ?>
                                    </small>
                                </td>
                            </tr>
                        <?php
                        }
                    } elseif ('3' === $settings['saasp_comparison_select_columns']) {
                        if (
                            '' !== $settings['saasp_comparison_header_title_text_1'] || '' !== $settings['saasp_comparison_header_title_description_1'] ||
                            '' !== $settings['saasp_comparison_header_title_text_2'] || '' !== $settings['saasp_comparison_header_title_description_2'] ||
                            '' !== $settings['saasp_comparison_header_title_text_3'] || '' !== $settings['saasp_comparison_header_title_description_3']
                        ) {
                        ?>
                            <tr class="saaspricing-price-table-head saaspricing-table-background">
                                <td class="saaspricing-blank"></td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_1'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_1']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_2'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_2']); ?>
                                    </small>
                                </td>
                                <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                    <?php printf('<%1$s class="saaspricing-heading-title">%2$s</%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_column_html_title_tag'])), esc_html($settings['saasp_comparison_header_title_text_3'])); ?>
                                    <small>
                                        <?php echo esc_html($settings['saasp_comparison_header_title_description_3']); ?>
                                    </small>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <!-- Table images, pricing, review  -->
                    <tr class="saaspricing-table-main saaspricing-table-background">
                        <td class="saaspricing-table-title-description">
                            <?php
                            if ('' !== $settings['saasp_comparison_header_table_title']) {
                                printf('<%1$s class="d-block saaspricing-table-title" role="heading"> %2$s </%1$s>', esc_html(self::validate_html_tag($settings['saasp_comparison_header_table_title_tag'])), esc_html($settings['saasp_comparison_header_table_title']));
                            }
                            ?>
                            <?php
                            if ('' !== $settings['saasp_comparison_header_table_description']) {
                            ?>
                                <span class="d-block saaspricing-w-sm-100 saaspricing-table-description">
                                    <?php echo esc_html($settings['saasp_comparison_header_table_description']); ?>
                                </span>
                            <?php
                            }
                            ?>
                        </td>

                        <?php
                        for ($i = 1; $i <= $settings['saasp_comparison_select_columns']; $i++) {
                        ?>
                            <td class="saaspricing-price saaspricing-original-price saaspricing-comparison-header-alignment">
                                <?php
                                if ('' !== $settings['saasp_comparison_choose_media_' . $i]['url']) {
                                ?>
                                    <div
                                        <?php
                                        if ('yes' === $settings['saasp_comparison_media_light_box_' . $i]) {
                                        ?>
                                        class="saasprcing-img-holder"
                                        <?php
                                        }
                                        ?>>
                                        <img src="<?php echo esc_url($settings['saasp_comparison_choose_media_' . $i]['url']); ?>" class="<?php echo esc_attr('saaspricing-header-image-' . $i) ?>" alt="comparison table media <?php echo esc_attr($i); ?>">
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="saasspricing-pricing-block saaspricing-comparison-header-alignment">
                                    <?php
                                    if ('yes' === $settings['saasp_comparison_sale_' . $i]) {
                                    ?>
                                        <s class="saaspricing-original-slashed-price me-2">
                                            <?php
                                            if ('none' !== $settings['saasp_comparison_currency_symbol_' . $i] && 'yes' === $settings['saasp_comparison_sale_' . $i]) {
                                            ?>
                                                <span>
                                                    <?php
                                                    if ('custom' !== $settings['saasp_comparison_currency_symbol_' . $i]) {
                                                        echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_' . $i]));
                                                    } else {
                                                        echo esc_html($settings['saasp_comparison_currency_symbol_custom_' . $i]);
                                                    }
                                                    ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ('' !== $settings['saasp_comparison_original_price_' . $i]) {
                                            ?>
                                                <span>
                                                    <?php echo esc_html($settings['saasp_comparison_original_price_' . $i]); ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                        </s>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (
                                        'none' !== $settings['saasp_comparison_currency_symbol_' . $i] &&
                                        'before' === $settings['saasp_comparison_header_pricing_symbol_position'] ||
                                        empty($settings['saasp_comparison_header_pricing_symbol_position'])
                                    ) {
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
                                            <?php
                                            if ('custom' !== $settings['saasp_comparison_currency_symbol_' . $i]) {
                                                echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_' . $i]));
                                            } else {
                                                echo esc_html($settings['saasp_comparison_currency_symbol_custom_' . $i]);
                                            }
                                            ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ('' === $settings['saasp_comparison_currency_format_' . $i]) {
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-typography">
                                            <?php echo esc_html(explode(".", $settings['sassp_comparison_price_' . $i])[0]); ?>
                                        </span>
                                        <?php
                                        if ('' !== explode(".", $settings['sassp_comparison_price_' . $i])[1]) {
                                        ?>
                                            <span class="saaspricing-price-text saaspricing-fraction-price saaspricing-price-typography">
                                                <?php echo esc_html(explode(".", $settings['sassp_comparison_price_' . $i])[1]); ?>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-typography">
                                            <?php echo esc_html($settings['sassp_comparison_price_' . $i]); ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ('none' !== $settings['saasp_comparison_currency_symbol_' . $i] && 'after' === $settings['saasp_comparison_header_pricing_symbol_position']) {
                                    ?>
                                        <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
                                            <?php
                                            if ('custom' !== $settings['saasp_comparison_currency_symbol_' . $i]) {
                                                echo esc_html($this->get_currency_symbol($settings['saasp_comparison_currency_symbol_' . $i]));
                                            } else {
                                                echo esc_html($settings['saasp_comparison_currency_symbol_custom_' . $i]);
                                            }
                                            ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ('' !== $settings['saasp_comparison_period_' . $i]) {
                                    ?>
                                        <span class="saaspricing-period ms-1 saaspricing-comparison-header-alignment
                                        <?php if ('below' === $settings['saasp_comparison_header_period_position']) {
                                            echo esc_attr('w-100');
                                        } ?>">
                                            <?php
                                            echo esc_html($settings['saasp_comparison_period_' . $i]);
                                            ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if ('yes' === $settings['saasp_comparison_show_rating_' . $i] && '' !== $settings['saasp_comparison_rating_num_' . $i]) {
                                ?>
                                    <div class="saaspricing-ratings">
                                        <div class="saaspricing-star-icon fs-6">
                                            <?php
                                            $saasp_rating = $settings['saasp_comparison_rating_num_' . $i];
                                            $saasp_full_stars = floor($saasp_rating);
                                            $saasp_half_star = $saasp_rating - $saasp_full_stars;

                                            for ($k = 0; $k <  $saasp_full_stars; $k++) {
                                            ?>
                                                <span class="saaspricing-icons">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            <?php
                                            }
                                            if ($saasp_half_star >= 0.5) {
                                            ?>
                                                <span class="saaspricing-icons-half">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            for ($j = 0; $j < 5 - ceil($settings['saasp_comparison_rating_num_' . $i]); $j++) {
                                            ?>
                                                <span class="saaspricing-icons-none">
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ('' !== $settings['saasp_comparison_rating_counter_' . $i]) {
                                            ?>
                                                <small class="saaspricing-review-text">
                                                    <?php echo esc_html__('(', 'saaspricing') . esc_html($settings['saasp_comparison_rating_counter_' . $i]) . esc_html__(')', 'saaspricing'); ?>
                                                </small>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (! empty($settings['saasp_comparison_primary_cta_url_' . $i]['url'])) {
                                    $this->add_link_attributes('saasp_comparison_primary_cta_url_' . $i, $settings['saasp_comparison_primary_cta_url_' . $i]);
                                }
                                ?>
                                <?php
                                if ('' !== $settings['saasp_comparison_primary_cta_text_' . $i] && 'top' === $settings['saasp_comparison_primary_cta_position_' . $i]) {
                                    if ('yes' === $settings['saasp_comparison_primary_cta_switch_' . $i]) {
                                ?>
                                        <div class="saasp-top-primary <?php
                                                                        if ('center' === $settings['saasp_comparison_cta_alignment']) {
                                                                            echo esc_attr('text-center');
                                                                        } elseif ('right' === $settings['saasp_comparison_cta_alignment']) {
                                                                            echo esc_attr('text-end');
                                                                        }
                                                                        ?>">
                                            <a class="btn saaspricing-primary-btn saaspricing-primary-<?php
                                                                                                        echo esc_attr($i);
                                                                                                        if ('justify' === $settings['saasp_comparison_cta_alignment']) {
                                                                                                            echo esc_attr(' w-100');
                                                                                                        }
                                                                                                        if ('extra-small' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-xsm-btn');
                                                                                                        } elseif ('small' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-sm-btn');
                                                                                                        } elseif ('medium' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-m-btn');
                                                                                                        } elseif ('large' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-l-btn');
                                                                                                        } elseif ('extra-large' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-xl-btn');
                                                                                                        }
                                                                                                        ?>"
                                                role="button"
                                                <?php
                                                echo wp_kses($this->get_render_attribute_string('saasp_comparison_primary_cta_url_' . $i), $this->saasp_allowed_tags());
                                                ?>>
                                                <?php echo esc_html($settings['saasp_comparison_primary_cta_text_' . $i]); ?>
                                                <span class="saaspricing-primary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon($settings['saasp_comparison_primary_cta_icon_' . $i], ['aria-hidden' => 'true']); ?>
                                                </span>
                                            </a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <?php
                                $saasp_margin_top = "";

                                if ('top' === $settings['saasp_comparison_primary_cta_position_' . $i] &&  'yes' === $settings['saasp_comparison_primary_cta_switch_' . $i]) {
                                    $saasp_margin_top = "mt-3";
                                } else {
                                    $saasp_margin_top;
                                }
                                ?>
                                <?php
                                if ('' !== $settings['saasp_comparison_secondary_cta_text_' . $i] && 'top' === $settings['saasp_comparison_secondary_cta_position_' . $i]) {
                                    if (! empty($settings['saasp_comparison_secondary_cta_url_' . $i]['url'])) {
                                        $this->add_link_attributes('saasp_comparison_secondary_cta_url_' . $i, $settings['saasp_comparison_secondary_cta_url_' . $i]);
                                    }
                                    if ('yes' === $settings['saasp_comparison_secondary_cta_switch_' . $i]) {
                                ?>

                                        <div class="saaspricing-cta-main saasp-top-secondary" <?php
                                                                                                if ('center' === $settings['saasp_comparison_cta_alignment']) {
                                                                                                    echo esc_attr('text-center');
                                                                                                } elseif ('right' === $settings['saasp_comparison_cta_alignment']) {
                                                                                                    echo esc_attr('text-end');
                                                                                                }
                                                                                                ?>>
                                            <a class="btn btn-link saaspricing-secondary-btn saaspricing-secondary-<?php
                                                                                                                    echo esc_attr($i);
                                                                                                                    if ('justify' === $settings['saasp_comparison_cta_alignment']) {
                                                                                                                        echo esc_attr(' w-100');
                                                                                                                    }
                                                                                                                    if ('extra-small' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                                                                        echo esc_attr(' saaspricing-xsm-btn ');
                                                                                                                    } elseif ('small' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                                                                        echo esc_attr(' saaspricing-sm-btn ');
                                                                                                                    } elseif ('medium' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                                                                        echo esc_attr(' saaspricing-m-btn ');
                                                                                                                    } elseif ('large' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                                                                        echo esc_attr(' saaspricing-l-btn ');
                                                                                                                    } elseif ('extra-large' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                                                                        echo esc_attr(' saaspricing-xl-btn ');
                                                                                                                    }
                                                                                                                    echo esc_attr($saasp_margin_top);
                                                                                                                    ?>"
                                                role="button"
                                                <?php
                                                echo wp_kses($this->get_render_attribute_string('saasp_comparison_secondary_cta_url_' . $i), $this->saasp_allowed_tags());
                                                ?>>
                                                <?php echo esc_html($settings['saasp_comparison_secondary_cta_text_' . $i]); ?>
                                                <span class="saaspricing-secondary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon($settings['saasp_comparison_secondary_cta_icon_' . $i], ['aria-hidden' => 'true']); ?>
                                                </span>
                                            </a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>

                <!-- popup image section -->
                <div class="saasprcing-img-lightbox">
                    <div class="saasprcing-img-lightbox-inner">
                        <img src="" alt="Popup Image">
                        <div class="saasprcing-lightbox-close">
                            <div class="saasprcing-lightbox-bar"></div>
                            <div class="saasprcing-lightbox-bar"></div>
                        </div>
                    </div>
                </div>

                <tbody class="saaspricing-table-body saaspricing-table-background">
                    <!-- Table Features  -->
                    <?php
                    if ('1' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_1']) {
                        foreach ($settings['saasp_comparison_table_feature_list_1'] as $saasp_features_one) {
                    ?>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main">
                                    <?php
                                    if (
                                        'yes' === $saasp_features_one['saasp_comparison_show_features_tooltip'] &&
                                        ('before' === $saasp_features_one['saasp_comparison_features_tooltip_position'] ||
                                            empty($saasp_features_one['saasp_comparison_features_tooltip_position']))
                                    ) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_one['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <span class="saaspricing-feature-title">
                                        <?php echo esc_html($saasp_features_one['saasp_comparison_feature_title']); ?>
                                    </span>
                                    <?php
                                    if ('yes' === $saasp_features_one['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_one['saasp_comparison_features_tooltip_position']) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_one['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_one['saasp_comparison_feature_icon'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_one['saasp_comparison_feature_text']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php
                        }
                    } elseif ('2' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_2']) {
                        foreach ($settings['saasp_comparison_table_feature_list_2'] as $saasp_features_two) {
                        ?>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main">
                                    <?php
                                    if (
                                        'yes' === $saasp_features_two['saasp_comparison_show_features_tooltip'] &&
                                        ('before' === $saasp_features_two['saasp_comparison_features_tooltip_position'] ||
                                            empty($saasp_features_two['saasp_comparison_features_tooltip_position']))
                                    ) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_two['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <span class="saaspricing-feature-title">
                                        <?php echo esc_html($saasp_features_two['saasp_comparison_feature_title']); ?>
                                    </span>
                                    <?php
                                    if ('yes' === $saasp_features_two['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_two['saasp_comparison_features_tooltip_position']) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_two['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_two['saasp_comparison_feature_icon_1'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_1']); ?>
                                    </span>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_two['saasp_comparison_feature_icon_2'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_two['saasp_comparison_feature_text_2']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php
                        }
                    } elseif ('3' === $settings['saasp_comparison_select_columns'] && $settings['saasp_comparison_table_feature_list_3']) {
                        foreach ($settings['saasp_comparison_table_feature_list_3'] as $saasp_features_three) {
                        ?>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main">
                                    <?php
                                    if (
                                        'yes' === $saasp_features_three['saasp_comparison_show_features_tooltip'] &&
                                        ('before' === $saasp_features_three['saasp_comparison_features_tooltip_position'] ||
                                            empty($saasp_features_three['saasp_comparison_features_tooltip_position']))
                                    ) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_three['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                    <span class="saaspricing-feature-title">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_title']); ?>
                                    </span>
                                    <?php
                                    if ('yes' === $saasp_features_three['saasp_comparison_show_features_tooltip'] && 'after' === $saasp_features_three['saasp_comparison_features_tooltip_position']) {
                                    ?>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo esc_attr($saasp_features_three['saasp_comparison_features_tooltip_description']); ?>"
                                            class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_three['saasp_comparison_feature_icon_1'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_1']); ?>
                                    </span>
                                </td>
                                <td class="saaspricing-cell ">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_three['saasp_comparison_feature_icon_2'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_2']); ?>
                                    </span>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <?php Icons_Manager::render_icon($saasp_features_three['saasp_comparison_feature_icon_3'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        <?php echo esc_html($saasp_features_three['saasp_comparison_feature_text_3']); ?>
                                    </span>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot class="saaspricing-table-background">
                    <!-- Table CTA -->
                    <?php
                    if (
                        'bottom' === $settings['saasp_comparison_primary_cta_position_1']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_1']
                        || 'bottom' === $settings['saasp_comparison_primary_cta_position_2']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_2']
                        || 'bottom' === $settings['saasp_comparison_primary_cta_position_3']  || 'bottom' === $settings['saasp_comparison_secondary_cta_position_3']
                    ) {
                    ?>
                        <tr class="saaspricing-cta-main <?php
                                                        if ('center' === $settings['saasp_comparison_cta_alignment']) {
                                                            echo esc_attr('text-center');
                                                        } elseif ('right' === $settings['saasp_comparison_cta_alignment']) {
                                                            echo esc_attr('text-end');
                                                        }
                                                        ?>">
                            <td class="saaspricing-blank"></td>
                            <?php
                            for ($i = 1; $i <= $settings['saasp_comparison_select_columns']; $i++) {
                            ?>
                                <td class="saaspricing-footer-cta">
                                    <?php
                                    if (
                                        '' !== $settings['saasp_comparison_primary_cta_text_' . $i] && 'bottom' === $settings['saasp_comparison_primary_cta_position_' . $i] ||
                                        empty($settings['saasp_comparison_primary_cta_position_' . $i])
                                    ) {
                                        if ('yes' === $settings['saasp_comparison_primary_cta_switch_' . $i]) {
                                    ?>
                                            <a class="btn saaspricing-primary-btn saaspricing-primary-<?php
                                                                                                        echo esc_attr($i);
                                                                                                        if ('justify' === $settings['saasp_comparison_cta_alignment']) {
                                                                                                            echo esc_attr(' w-100');
                                                                                                        }
                                                                                                        if ('extra-small' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-xsm-btn');
                                                                                                        } elseif ('small' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-sm-btn');
                                                                                                        } elseif ('medium' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-m-btn');
                                                                                                        } elseif ('large' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-l-btn');
                                                                                                        } elseif ('extra-large' === $settings['saasp_comparison_primary_cta_size_' . $i]) {
                                                                                                            echo esc_attr(' saaspricing-xl-btn');
                                                                                                        }
                                                                                                        ?>"
                                                role="button"
                                                <?php
                                                if ($settings['saasp_comparison_primary_cta_url_' . $i]['url'] != '') {
                                                ?>
                                                href="<?php echo esc_url($settings['saasp_comparison_primary_cta_url_' . $i]['url']); ?>"
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($settings['saasp_comparison_primary_cta_url_' . $i]['is_external'] != '') {
                                                ?>
                                                target="_blank"
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($settings['saasp_comparison_primary_cta_url_' . $i]['nofollow'] != '') {
                                                ?>
                                                rel="nofollow"
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (!empty($settings['saasp_comparison_primary_cta_url_' . $i]['custom_attributes'])) {
                                                    $attributes = [];
                                                    $custom_attrs = trim($settings['saasp_comparison_primary_cta_url_' . $i]['custom_attributes']);
                                                    foreach (explode(' ', $custom_attrs) as $attr) {
                                                        if (strpos($attr, '|') === false) continue;
                                                        [$key, $raw_value] = explode('|', $attr, 2);
                                                        $key = trim($key);
                                                        $raw_value = trim($raw_value);
                                                        $value = preg_replace('/^[\'"](.*)[\'"]$/', '$1', $raw_value);
                                                        $attributes[] = esc_attr($key) . '="' . esc_attr($value) . '"';
                                                    }
                                                    // Attributes are above escaped correctly
                                                    // phpcs:disable WordPress.Security.EscapeOutput
                                                    echo implode(' ', $attributes);
                                                }
                                                ?>>
                                                <?php echo esc_html($settings['saasp_comparison_primary_cta_text_' . $i]); ?>
                                                <span class="saaspricing-primary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon($settings['saasp_comparison_primary_cta_icon_' . $i], ['aria-hidden' => 'true']); ?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if ('bottom' === $settings['saasp_comparison_primary_cta_position_' . $i] && !empty($settings['saasp_comparison_primary_cta_position_' . $i])) {
                                    ?>
                                        <br />
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (
                                        '' !== $settings['saasp_comparison_secondary_cta_text_' . $i] &&  'bottom' === $settings['saasp_comparison_secondary_cta_position_' . $i] ||
                                        empty($settings['saasp_comparison_secondary_cta_position_' . $i])
                                    ) {
                                        if (! empty($settings['saasp_comparison_secondary_cta_url_' . $i]['url'])) {
                                            $this->add_link_attributes('saasp_comparison_secondary_cta_url_' . $i, $settings['saasp_comparison_secondary_cta_url_' . $i]);
                                        }
                                        if ('yes' === $settings['saasp_comparison_secondary_cta_switch_' . $i]) {
                                    ?>
                                            <a class="btn btn-link saaspricing-secondary-btn 
                                            saaspricing-secondary-<?php
                                                                    echo esc_attr($i);
                                                                    if ('justify' === $settings['saasp_comparison_cta_alignment']) {
                                                                        echo esc_attr(' w-100');
                                                                    }
                                                                    if ('extra-small' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                        echo esc_attr(' saaspricing-xsm-btn');
                                                                    } elseif ('small' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                        echo esc_attr(' saaspricing-sm-btn');
                                                                    } elseif ('medium' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                        echo esc_attr(' saaspricing-m-btn');
                                                                    } elseif ('large' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                        echo esc_attr(' saaspricing-l-btn');
                                                                    } elseif ('extra-large' === $settings['saasp_comparison_secondary_cta_size_' . $i]) {
                                                                        echo esc_attr(' saaspricing-xl-btn');
                                                                    }
                                                                    ?>"
                                                role="button"
                                                <?php
                                                echo wp_kses($this->get_render_attribute_string('saasp_comparison_secondary_cta_url_' . $i), $this->saasp_allowed_tags());
                                                ?>>
                                                <?php echo esc_html($settings['saasp_comparison_secondary_cta_text_' . $i]); ?>
                                                <span class="saaspricing-secondary-spacing-<?php echo esc_attr($i); ?>">
                                                    <?php Icons_Manager::render_icon($settings['saasp_comparison_secondary_cta_icon_' . $i], ['aria-hidden' => 'true']); ?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tfoot>
            </table>
        </div>
    <?php
    }
    protected function _content_template()
    {
    ?>
        <div class="saaspricing-main table-responsive-lg position-relative">
            <table class="saaspricing-table" role="presentation">
                <thead>
                    <#
                        let symbols={
                        dollar: '&#36;' ,
                        euro: '&#128;' ,
                        franc: '&#8355;' ,
                        pound: '&#163;' ,
                        ruble: '&#8381;' ,
                        shekel: '&#8362;' ,
                        baht: '&#3647;' ,
                        yen: '&#165;' ,
                        won: '&#8361;' ,
                        guilder: '&fnof;' ,
                        peso: '&#8369;' ,
                        peseta: '&#8359;' ,
                        lira: '&#8356;' ,
                        rupee: '&#8360;' ,
                        indian_rupee: '&#8377;' ,
                        real: 'R$' ,
                        krona: 'kr'
                        };

                        let symbol='' ,
                        iconsHTML={};
                        #>

                        <!-- Ribbon is not working perfectly  -->
                        <#
                            if ( 'yes'===settings.saasp_comparison_show_ribbon_1 || 'yes'===settings.saasp_comparison_show_ribbon_2 || 'yes'===settings.saasp_comparison_show_ribbon_3 ) {
                            #>
                            <tr class="saaspricing-ribbon-table-row">
                                <td class="saaspricing-blank"></td>
                                <#
                                    let saasp_expire_date_one=settings.saasp_comparison_expire_date_1
                                    let saasp_expire_date_two=settings.saasp_comparison_expire_date_2
                                    let saasp_expire_date_three=settings.saasp_comparison_expire_date_3

                                    for (let i=1, j=0; i <=settings.saasp_comparison_select_columns, j < settings.saasp_comparison_select_columns; i++, j++) {
                                    let saasp_visible=''

                                    if ('yes'===settings['saasp_comparison_show_ribbon_' + i]) {
                                    saasp_visible
                                    } else {
                                    saasp_visible='saasp-hidden'
                                    }

                                    #>
                                    <td class="saaspricing-ribbon-wrapper saaspricing-common-ribbon saaspricing-comparison-header-alignment {{ saasp_visible }}"
                                        data-expire-date-one="{{ saasp_expire_date_one }}"
                                        data-expire-date-two="{{ saasp_expire_date_two }}"
                                        data-expire-date-three="{{ saasp_expire_date_three }}">
                                        <div class="saaspricing-ribbon-title">
                                            {{{ settings['saasp_comparison_ribbon_title_' + i] }}}
                                        </div>
                                        <div class="saaspricing-countdown">
                                            <#
                                                if ('yes'===settings['saasp_comparison_show_countdown_' + i] && '' !==settings['saasp_comparison_show_countdown_' + i]) {
                                                #>
                                                <div class="saaspricing-show-expire-date" data-countdown-index="{{ j }}"
                                                    data-expire-date-{{ i }}="{{ settings['saasp_comparison_expire_date_' + i] }}">
                                                    <?php echo esc_html__('00d: 00h: 00m: 00s', 'saaspricing'); ?>
                                                </div>
                                                <#
                                                    }
                                                    #>
                                        </div>
                                    </td>
                                    <#
                                        }
                                        #>
                            </tr>
                            <#
                                }
                                #>
                                <!-- Table head -->
                                <#
                                    let selectColumns=settings.saasp_comparison_select_columns
                                    if (selectColumns==='1' || selectColumns==='2' || selectColumns==='3' ) {
                                    #>
                                    <tr class="saaspricing-price-table-head saaspricing-table-background">
                                        <td class="saaspricing-blank"></td>
                                        <#
                                            for (let i=1; i <=selectColumns; i++) {
                                            let headerTitleText=settings['saasp_comparison_header_title_text_' + i];
                                            let headerTitleDescription=settings['saasp_comparison_header_title_description_' + i];

                                            if (headerTitleText !=='' || headerTitleDescription !=='' ) {
                                            #>
                                            <td class="saaspricing-table-head saaspricing-comparison-header-alignment">
                                                <{{{ settings.saasp_comparison_column_html_title_tag }}} class="saaspricing-heading-title">{{{ headerTitleText }}}</{{{ settings.saasp_comparison_column_html_title_tag }}}>
                                                <small>{{{ headerTitleDescription }}}</small>
                                            </td>
                                            <#
                                                }
                                                }
                                                #>
                                    </tr>
                                    <#
                                        }
                                        #>
                                        <!-- Table images, pricing, review  -->
                                        <tr class="saaspricing-table-main saaspricing-table-background">
                                            <td class="saaspricing-table-title-description">
                                                <#
                                                    if ('' !==settings.saasp_comparison_header_table_title) {
                                                    #>
                                                    <{{{settings.saasp_comparison_header_table_title_tag}}} class="d-block saaspricing-table-title" role="heading">
                                                        {{{ settings.saasp_comparison_header_table_title }}}
                                                    </{{{settings.saasp_comparison_header_table_title_tag}}}>
                                                    <#
                                                        }
                                                        if ('' !==settings.saasp_comparison_header_table_description) {
                                                        #>
                                                        <span class="d-block saaspricing-w-sm-100 saaspricing-table-description">
                                                            {{{ settings.saasp_comparison_header_table_description }}}
                                                        </span>
                                                        <#
                                                            }
                                                            #>
                                            </td>
                                            <#
                                                for( let i=1; i <=settings.saasp_comparison_select_columns; i++ ) {
                                                #>
                                                <td class="saaspricing-price saaspricing-original-price saaspricing-comparison-header-alignment">
                                                    <!-- Lightbox -->
                                                    <# if ( '' !==settings['saasp_comparison_choose_media_' + i]['url'] ) { #>
                                                        <#
                                                            let popup=''
                                                            if ( 'yes'===settings['saasp_comparison_media_light_box_' + i] ) {
                                                            popup='saaspricing-image-popup'
                                                            }
                                                            #>
                                                            <a class="{{popup}}" href="{{ settings['saasp_comparison_choose_media_' + i]['url'] }}">
                                                                <img src="{{{ settings['saasp_comparison_choose_media_' + i]['url'] }}}" class="{{{ 'saaspricing-header-image-' + i }}}" alt="comparison table media {{ i }}">
                                                            </a>
                                                            <# } #>
                                                                <!-- Pricing -->
                                                                <div class="saasspricing-pricing-block saaspricing-comparison-header-alignment">

                                                                    <# if ( 'yes'===settings['saasp_comparison_sale_' + i] ) { #>
                                                                        <s class="saaspricing-original-slashed-price me-2">
                                                                            <# if ( 'none' !==settings['saasp_comparison_currency_symbol_' + i] && 'yes'===settings['saasp_comparison_sale_' + i] ) { #>
                                                                                <span>
                                                                                    <# if ( 'custom' !==settings['saasp_comparison_currency_symbol_' + i] ) { #>
                                                                                        {{{ symbols[settings['saasp_comparison_currency_symbol_' + i]] }}}
                                                                                        <# } else { #>
                                                                                            {{{ symbols[settings['saasp_comparison_currency_symbol_custom_' + i]] }}}
                                                                                            <# } #>
                                                                                </span>
                                                                                <# } #>
                                                                                    <# if ( '' !==settings['saasp_comparison_original_price_' + i] ) { #>
                                                                                        <span>
                                                                                            {{{ settings['saasp_comparison_original_price_' + i] }}}
                                                                                        </span>
                                                                                        <# } #>
                                                                        </s>
                                                                        <# } #>

                                                                            <# if ( 'none' !==settings['saasp_comparison_currency_symbol_' + i] &&
                                                                                ( 'before'===settings['saasp_comparison_header_pricing_symbol_position'] || ''===settings['saasp_comparison_header_pricing_symbol_position'] ) ) {
                                                                                #>
                                                                                <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
                                                                                    <# if ( 'custom' !==settings['saasp_comparison_currency_symbol_' + i] ) { #>
                                                                                        {{{ symbols[settings['saasp_comparison_currency_symbol_' + i]] }}}
                                                                                        <# } else { #>
                                                                                            {{{ symbols[settings['saasp_comparison_currency_symbol_custom_' + i]] }}}
                                                                                            <# } #>
                                                                                </span>
                                                                                <#
                                                                                    }
                                                                                    #>

                                                                                    <# if ( ''===settings['saasp_comparison_currency_format_' + i] ) { #>
                                                                                        <span class="saaspricing-price-text saaspricing-price-typography">
                                                                                            {{{ settings['sassp_comparison_price_' + i].split('.')[0] }}}
                                                                                        </span>
                                                                                        <# if ( '' !==settings['sassp_comparison_price_' + i].split('.')[1] ) { #>
                                                                                            <span class="saaspricing-price-text saaspricing-fraction-price saaspricing-price-typography">
                                                                                                {{{ settings['sassp_comparison_price_' + i].split('.')[1] }}}
                                                                                            </span>
                                                                                            <# } #>
                                                                                                <# } else { #>
                                                                                                    <span class="saaspricing-price-text saaspricing-price-typography">
                                                                                                        {{{ settings['sassp_comparison_price_' + i] }}}
                                                                                                    </span>
                                                                                                    <# } #>

                                                                                                        <# if ( 'none' !==settings['saasp_comparison_currency_symbol_' + i] && 'after'===settings['saasp_comparison_header_pricing_symbol_position'] ) { #>
                                                                                                            <span class="saaspricing-price-text saaspricing-price-symbol saaspricing-price-typography">
                                                                                                                <# if ( 'custom' !==settings['saasp_comparison_currency_symbol_' + i] ) { #>
                                                                                                                    {{{ symbols[settings['saasp_comparison_currency_symbol_' + i]] }}}
                                                                                                                    <# } else { #>
                                                                                                                        {{{ symbols[settings['saasp_comparison_currency_symbol_custom_' + i]] }}}
                                                                                                                        <# } #>
                                                                                                            </span>
                                                                                                            <# } #>

                                                                                                                <# if ( '' !==settings['saasp_comparison_period_' + i] ) { #>
                                                                                                                    <span class="saaspricing-period ms-1 saaspricing-comparison-header-alignment <# if ( 'below' === settings['saasp_comparison_header_period_position'] ) { #>w-100<# } #>">
                                                                                                                        {{{ settings['saasp_comparison_period_' + i] }}}
                                                                                                                    </span>
                                                                                                                    <# } #>
                                                                </div>
                                                                <!-- Review  -->
                                                                <# if ( 'yes'===settings['saasp_comparison_show_rating_' + i] && '' !==settings['saasp_comparison_rating_num_' + i] ) { #>
                                                                    <div class="saaspricing-ratings">
                                                                        <div class="saaspricing-star-icon fs-6">
                                                                            <# let saasp_rating=settings['saasp_comparison_rating_num_' + i]; #>
                                                                                <# let saasp_full_stars=Math.floor(saasp_rating); #>
                                                                                    <# let saasp_half_star=saasp_rating - saasp_full_stars; #>

                                                                                        <# for (let k=0; k < saasp_full_stars; k++) { #>
                                                                                            <span class="saaspricing-icons">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </span>
                                                                                            <# } #>

                                                                                                <# if (saasp_half_star>= 0.5) { #>
                                                                                                    <span class="saaspricing-icons-half">
                                                                                                        <i class="fa fa-star"></i>
                                                                                                    </span>
                                                                                                    <# } #>

                                                                                                        <# for (let j=0; j < 5 - Math.ceil(settings['saasp_comparison_rating_num_' + i]); j++) { #>
                                                                                                            <span class="saaspricing-icons-none">
                                                                                                                <i class="fa fa-star"></i>
                                                                                                            </span>
                                                                                                            <# } #>

                                                                                                                <# if ('' !==settings['saasp_comparison_rating_counter_' + i]) { #>
                                                                                                                    <small class="saaspricing-review-text">
                                                                                                                        {{{ '(' + settings['saasp_comparison_rating_counter_' + i] + ')' }}}
                                                                                                                    </small>
                                                                                                                    <# } #>
                                                                        </div>
                                                                    </div>
                                                                    <# } #>
                                                                        <!-- Review End -->
                                                                        <!-- top primary button start -->
                                                                        <#
                                                                            if ('' !==settings['saasp_comparison_primary_cta_text_' + i] && 'top'===settings['saasp_comparison_primary_cta_position_' + i]) {
                                                                            if ('yes'===settings['saasp_comparison_primary_cta_switch_' + i]) {
                                                                            #>
                                                                            <#
                                                                                let ctaAlignment='text-start'
                                                                                if ('center'===settings.saasp_comparison_cta_alignment) {
                                                                                ctaAlignment='text-center'
                                                                                } else if ('right'===settings.saasp_comparison_cta_alignment) {
                                                                                ctaAlignment='text-end'
                                                                                }
                                                                                #>
                                                                                <div class="saasp-top-primary {{ ctaAlignment }}">
                                                                                    <a class="btn saaspricing-primary-btn saaspricing-primary-{{ i }} {{ 'justify' === settings['saasp_comparison_cta_alignment'] ? 'w-100' : '' }}
                                    {{ 'extra-small' === settings['saasp_comparison_primary_cta_size_' + i] ? 'saaspricing-xsm-btn' : '' }}
                                    {{ 'small' === settings['saasp_comparison_primary_cta_size_' + i] ? 'saaspricing-sm-btn' : '' }}
                                    {{ 'medium' === settings['saasp_comparison_primary_cta_size_' + i] ? 'saaspricing-m-btn' : '' }}
                                    {{ 'large' === settings['saasp_comparison_primary_cta_size_' + i] ? 'saaspricing-l-btn' : '' }}
                                    {{ 'extra-large' === settings['saasp_comparison_primary_cta_size_' + i] ? 'saaspricing-xl-btn' : '' }}"
                                                                                        role="button"
                                                                                        href="{{ settings['saasp_comparison_primary_cta_url_' + i]['url'] }}">
                                                                                        {{{ settings['saasp_comparison_primary_cta_text_' + i] }}}
                                                                                        <span class="saaspricing-primary-spacing-{{ i }}">
                                                                                            <#
                                                                                                let topPrimary=elementor.helpers.renderIcon( view, settings['saasp_comparison_primary_cta_icon_' + i], { 'aria-hidden' : true }, 'i' , 'object' );
                                                                                                #>
                                                                                                {{{ topPrimary.value }}}
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                                <#
                                                                                    }
                                                                                    }
                                                                                    #>
                                                                                    <!-- top primary button end -->
                                                                                    <#
                                                                                        let saasp_margin_top='' ;
                                                                                        if ('top'===settings['saasp_comparison_primary_cta_position_' + i] && 'yes'===settings['saasp_comparison_primary_cta_switch_' + i]) {
                                                                                        saasp_margin_top='mt-3' ;
                                                                                        }
                                                                                        #>
                                                                                        <!-- top secondary button start -->
                                                                                        <#
                                                                                            if ('' !==settings['saasp_comparison_secondary_cta_text_' + i] && 'top'===settings['saasp_comparison_secondary_cta_position_' + i]) {
                                                                                            if ('yes'===settings['saasp_comparison_secondary_cta_switch_' + i]) {
                                                                                            let button_classes=[]
                                                                                            if ('justify'===settings['saasp_comparison_cta_alignment']) {
                                                                                            button_classes.push('w-100');
                                                                                            }
                                                                                            let size=settings['saasp_comparison_secondary_cta_size_' + i];
                                                                                            if ('extra-small'===size) {
                                                                                            button_classes.push('saaspricing-xsm-btn');
                                                                                            } else if ('small'===size) {
                                                                                            button_classes.push('saaspricing-sm-btn');
                                                                                            } else if ('medium'===size) {
                                                                                            button_classes.push('saaspricing-m-btn');
                                                                                            } else if ('large'===size) {
                                                                                            button_classes.push('saaspricing-l-btn');
                                                                                            } else if ('extra-large'===size) {
                                                                                            button_classes.push('saaspricing-xl-btn');
                                                                                            }
                                                                                            #>
                                                                                            <#
                                                                                                let ctaAlignment='text-start'
                                                                                                if ('center'===settings.saasp_comparison_cta_alignment) {
                                                                                                ctaAlignment='text-center'
                                                                                                } else if ('right'===settings.saasp_comparison_cta_alignment) {
                                                                                                ctaAlignment='text-end'
                                                                                                }
                                                                                                #>
                                                                                                <div class="saaspricing-cta-main saasp-top-secondary {{ ctaAlignment }}">
                                                                                                    <a class="btn btn-link saaspricing-secondary-btn saaspricing-secondary-{{ i }} {{ button_classes.join(' ') }} {{ saasp_margin_top }}"
                                                                                                        role="button" href="{{ settings['saasp_comparison_secondary_cta_url_' + i]['url'] }}">
                                                                                                        {{{ settings['saasp_comparison_secondary_cta_text_' + i] }}}
                                                                                                        <span class="saaspricing-secondary-spacing-{{ i }}">
                                                                                                            <#
                                                                                                                let topSecondary=elementor.helpers.renderIcon( view, settings['saasp_comparison_secondary_cta_icon_' + i], { 'aria-hidden' : true }, 'i' , 'object' );
                                                                                                                #>
                                                                                                                {{{ topSecondary.value }}}
                                                                                                        </span>
                                                                                                    </a>
                                                                                                </div>
                                                                                                <#
                                                                                                    }
                                                                                                    }
                                                                                                    #>
                                                </td>
                                                <#
                                                    }
                                                    #>
                                        </tr>
                </thead>
                <tbody class="saaspricing-table-body saaspricing-table-background">
                    <# if ('1'===settings.saasp_comparison_select_columns && settings.saasp_comparison_table_feature_list_1) { #>
                        <# _.each(settings.saasp_comparison_table_feature_list_1, function(saasp_features_one) { #>
                            <tr class="saaspricing-feature-list">
                                <td class="saaspricing-feature-main">
                                    <# if ('yes'===saasp_features_one.saasp_comparison_show_features_tooltip && ('before'===saasp_features_one.saasp_comparison_features_tooltip_position || !saasp_features_one.saasp_comparison_features_tooltip_position)) { #>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_one.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                            <i class="far fa-fw fa-question-circle"></i>
                                        </span>
                                        <# } #>
                                            <span class="saaspricing-feature-title">
                                                {{{ saasp_features_one.saasp_comparison_feature_title }}}
                                            </span>
                                            <# if ('yes'===saasp_features_one.saasp_comparison_show_features_tooltip && 'after'===saasp_features_one.saasp_comparison_features_tooltip_position) { #>
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_one.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                                    <i class="far fa-fw fa-question-circle"></i>
                                                </span>
                                                <# } #>
                                </td>
                                <td class="saaspricing-cell">
                                    <span class="saaspricing-cell-icon">
                                        <#
                                            let columnOnceFeature=elementor.helpers.renderIcon( view, saasp_features_one.saasp_comparison_feature_icon , { 'aria-hidden' : true }, 'i' , 'object' );
                                            #>
                                            {{{ columnOnceFeature.value }}}
                                    </span>
                                    <span class="saaspricing-cell-text">
                                        {{{ saasp_features_one.saasp_comparison_feature_text }}}
                                    </span>
                                </td>
                            </tr>
                            <# }); #>
                                <# } else if ('2'===settings.saasp_comparison_select_columns && settings.saasp_comparison_table_feature_list_2) { #>
                                    <# _.each(settings.saasp_comparison_table_feature_list_2, function(saasp_features_two) { #>
                                        <tr class="saaspricing-feature-list">
                                            <td class="saaspricing-feature-main">
                                                <# if ('yes'===saasp_features_two.saasp_comparison_show_features_tooltip && ('before'===saasp_features_two.saasp_comparison_features_tooltip_position || !saasp_features_two.saasp_comparison_features_tooltip_position)) { #>
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_two.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                                        <i class="far fa-fw fa-question-circle"></i>
                                                    </span>
                                                    <# } #>
                                                        <span class="saaspricing-feature-title">
                                                            {{{ saasp_features_two.saasp_comparison_feature_title }}}
                                                        </span>
                                                        <# if ('yes'===saasp_features_two.saasp_comparison_show_features_tooltip && 'after'===saasp_features_two.saasp_comparison_features_tooltip_position) { #>
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_two.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                                                <i class="far fa-fw fa-question-circle"></i>
                                                            </span>
                                                            <# } #>
                                            </td>
                                            <td class="saaspricing-cell">
                                                <span class="saaspricing-cell-icon">
                                                    <#
                                                        let columnTwoFeatureOne=elementor.helpers.renderIcon( view, saasp_features_two.saasp_comparison_feature_icon_1 , { 'aria-hidden' : true }, 'i' , 'object' );
                                                        #>
                                                        {{{ columnTwoFeatureOne.value }}}
                                                </span>
                                                <span class="saaspricing-cell-text">
                                                    {{{ saasp_features_two.saasp_comparison_feature_text_1 }}}
                                                </span>
                                            </td>
                                            <td class="saaspricing-cell">
                                                <span class="saaspricing-cell-icon">
                                                    <#
                                                        let columnTwoFeatureTwo=elementor.helpers.renderIcon( view, saasp_features_two.saasp_comparison_feature_icon_2 , { 'aria-hidden' : true }, 'i' , 'object' );
                                                        #>
                                                        {{{ columnTwoFeatureTwo.value }}}
                                                </span>
                                                <span class="saaspricing-cell-text">
                                                    {{{ saasp_features_two.saasp_comparison_feature_text_2 }}}
                                                </span>
                                            </td>
                                        </tr>
                                        <# }); #>
                                            <# } else if ('3'===settings.saasp_comparison_select_columns && settings.saasp_comparison_table_feature_list_3) { #>
                                                <# _.each(settings.saasp_comparison_table_feature_list_3, function(saasp_features_three) { #>
                                                    <tr class="saaspricing-feature-list">
                                                        <td class="saaspricing-feature-main">
                                                            <# if ('yes'===saasp_features_three.saasp_comparison_show_features_tooltip && ('before'===saasp_features_three.saasp_comparison_features_tooltip_position || !saasp_features_three.saasp_comparison_features_tooltip_position)) { #>
                                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_three.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                                                    <i class="far fa-fw fa-question-circle"></i>
                                                                </span>
                                                                <# } #>
                                                                    <span class="saaspricing-feature-title">
                                                                        {{{ saasp_features_three.saasp_comparison_feature_title }}}
                                                                    </span>
                                                                    <# if ('yes'===saasp_features_three.saasp_comparison_show_features_tooltip && 'after'===saasp_features_three.saasp_comparison_features_tooltip_position) { #>
                                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ saasp_features_three.saasp_comparison_features_tooltip_description }}" class="saaspricing-price-table-help">
                                                                            <i class="far fa-fw fa-question-circle"></i>
                                                                        </span>
                                                                        <# } #>
                                                        </td>
                                                        <td class="saaspricing-cell">
                                                            <span class="saaspricing-cell-icon">
                                                                <#
                                                                    let columnThreeFeatureOne=elementor.helpers.renderIcon( view, saasp_features_three.saasp_comparison_feature_icon_1 , { 'aria-hidden' : true }, 'i' , 'object' );
                                                                    #>
                                                                    {{{ columnThreeFeatureOne.value }}}
                                                            </span>
                                                            <span class="saaspricing-cell-text">
                                                                {{{ saasp_features_three.saasp_comparison_feature_text_1 }}}
                                                            </span>
                                                        </td>
                                                        <td class="saaspricing-cell">
                                                            <span class="saaspricing-cell-icon">
                                                                <#
                                                                    let columnThreeFeatureTwo=elementor.helpers.renderIcon( view, saasp_features_three.saasp_comparison_feature_icon_2 , { 'aria-hidden' : true }, 'i' , 'object' );
                                                                    #>
                                                                    {{{ columnThreeFeatureTwo.value }}}
                                                            </span>
                                                            <span class="saaspricing-cell-text">
                                                                {{{ saasp_features_three.saasp_comparison_feature_text_2 }}}
                                                            </span>
                                                        </td>
                                                        <td class="saaspricing-cell">
                                                            <span class="saaspricing-cell-icon">
                                                                <#
                                                                    let columnThreeFeatureThree=elementor.helpers.renderIcon( view, saasp_features_three.saasp_comparison_feature_icon_3 , { 'aria-hidden' : true }, 'i' , 'object' );
                                                                    #>
                                                                    {{{ columnThreeFeatureThree.value }}}
                                                            </span>
                                                            <span class="saaspricing-cell-text">
                                                                {{{ saasp_features_three.saasp_comparison_feature_text_3 }}}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <# }); #>
                                                        <# } #>
                </tbody>
                <tfoot class="saaspricing-table-background">
                    <# if ('bottom'===settings.saasp_comparison_primary_cta_position_1 || 'bottom'===settings.saasp_comparison_secondary_cta_position_1 || 'bottom'===settings.saasp_comparison_primary_cta_position_2 || 'bottom'===settings.saasp_comparison_secondary_cta_position_2 || 'bottom'===settings.saasp_comparison_primary_cta_position_3 || 'bottom'===settings.saasp_comparison_secondary_cta_position_3) { #>
                        <#
                            let ctaAlignment='text-start'
                            if ('center'===settings.saasp_comparison_cta_alignment) {
                            ctaAlignment='text-center'
                            } else if ('right'===settings.saasp_comparison_cta_alignment) {
                            ctaAlignment='text-end'
                            }
                            #>
                            <tr class="saaspricing-cta-main {{ctaAlignment}}">
                                <td class="saaspricing-blank"></td>
                                <# for (let i=1; i <=settings.saasp_comparison_select_columns; i++) { #>
                                    <td class="saaspricing-footer-cta">
                                        <# if ('' !==settings['saasp_comparison_primary_cta_text_' + i] && ('bottom'===settings['saasp_comparison_primary_cta_position_' + i] || !settings['saasp_comparison_primary_cta_position_' + i])) { #>
                                            <# if ('yes'===settings['saasp_comparison_primary_cta_switch_' + i]) { #>
                                                <a class="btn saaspricing-primary-btn saaspricing-primary-{{ i }}{{ 'justify' === settings.saasp_comparison_cta_alignment ? ' w-100' : '' }}{{ 'extra-small' === settings['saasp_comparison_primary_cta_size_' + i] ? ' saaspricing-xsm-btn' : '' }}{{ 'small' === settings['saasp_comparison_primary_cta_size_' + i] ? ' saaspricing-sm-btn' : '' }}{{ 'medium' === settings['saasp_comparison_primary_cta_size_' + i] ? ' saaspricing-m-btn' : '' }}{{ 'large' === settings['saasp_comparison_primary_cta_size_' + i] ? ' saaspricing-l-btn' : '' }}{{ 'extra-large' === settings['saasp_comparison_primary_cta_size_' + i] ? ' saaspricing-xl-btn' : '' }}" role="button" href="{{ settings['saasp_comparison_primary_cta_url_' + i]['url'] }}">
                                                    {{{ settings['saasp_comparison_primary_cta_text_' + i] }}}
                                                    <span class="saaspricing-primary-spacing-{{ i }}">
                                                        <#
                                                            let bottomPrimary=elementor.helpers.renderIcon( view, settings['saasp_comparison_primary_cta_icon_' + i], { 'aria-hidden' : true }, 'i' , 'object' );
                                                            #>
                                                            {{{ bottomPrimary.value }}}
                                                    </span>
                                                </a>
                                                <# } #>
                                                    <# } #>
                                                        <# if ('bottom'===settings['saasp_comparison_primary_cta_position_' + i] && 'yes'===settings['saasp_comparison_primary_cta_switch_' + i] ) { #>
                                                            <br />
                                                            <# } #>
                                                                <#
                                                                    if ('' !==settings['saasp_comparison_secondary_cta_text_' + i] && ('bottom'===settings['saasp_comparison_secondary_cta_position_' + i] || !settings['saasp_comparison_secondary_cta_position_' + i])) {
                                                                    if ('yes'===settings['saasp_comparison_secondary_cta_switch_' + i]) {
                                                                    #>

                                                                    <a class="btn btn-link saaspricing-secondary-btn saaspricing-secondary-{{ i }}{{ 'justify' === settings.saasp_comparison_cta_alignment ? ' w-100' : '' }}{{ 'extra-small' === settings['saasp_comparison_secondary_cta_size_' + i] ? ' saaspricing-xsm-btn' : '' }}{{ 'small' === settings['saasp_comparison_secondary_cta_size_' + i] ? ' saaspricing-sm-btn' : '' }}{{ 'medium' === settings['saasp_comparison_secondary_cta_size_' + i] ? ' saaspricing-m-btn' : '' }}{{ 'large' === settings['saasp_comparison_secondary_cta_size_' + i] ? ' saaspricing-l-btn' : '' }}{{ 'extra-large' === settings['saasp_comparison_secondary_cta_size_' + i] ? ' saaspricing-xl-btn' : '' }}" role="button" href="{{ settings['saasp_comparison_secondary_cta_url_' + i]['url'] }}">
                                                                        {{{ settings['saasp_comparison_secondary_cta_text_' + i] }}}
                                                                        <span class="saaspricing-secondary-spacing-{{ i }}">
                                                                            <#
                                                                                let bottomSecondary=elementor.helpers.renderIcon( view, settings['saasp_comparison_secondary_cta_icon_' + i], { 'aria-hidden' : true }, 'i' , 'object' );
                                                                                #>
                                                                                {{{ bottomSecondary.value }}}
                                                                        </span>
                                                                    </a>
                                                                    <#
                                                                        }
                                                                        }
                                                                        #>
                                    </td>
                                    <# } #>
                            </tr>
                            <# } #>
                </tfoot>
            </table>
        </div>
<?php
    }
}
