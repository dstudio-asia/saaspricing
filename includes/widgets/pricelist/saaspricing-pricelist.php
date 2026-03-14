<?php

use \Elementor\Widget_Base;

class Saaspricing_Pricelist extends Widget_Base {

    use Saasp_Pricelist_Content_Controls;
    use Saasp_Pricelist_Style_Controls;

	public function get_name() {
		return 'saaspricing-pricelist';
	}

	public function get_title() {
		return __( 'Pricelist', 'saaspricing' );
	}

	public function get_icon() {
		return 'saasp-icon eicon-price-list';
	}

	public function get_categories() {
		return [ 'saas_pricing_category' ];
	}

	protected function register_controls() {
        $this->content_controls();
        $this->style_controls();
	}

	private function get_currency_symbol( $saasp_symbol_name ) {
		$saasp_symbols = [
			'taka' => '&#2547;',
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

	protected function render(){
		$settings = $this->get_settings_for_display();
	?>
	<div class="container saasp-pricelist-main-container">
    	<div class="saasp-pricelist-main">
			<!-- Pricelist Repeater Start -->
			<div class="saasp-wraped-lists">
				<?php
				if ('' !== $settings['saasp_pricelist_repeater']) {
					foreach ($settings['saasp_pricelist_repeater'] as $pricelist) {
				?>
					<div class="row saasp-pricelist-wraper">
						<?php
						if ($pricelist['saasp_pricelist_list_title'] || $pricelist['saasp_pricelist_list_description'] || $pricelist['saasp_pricelist_list_price']) {
						?>
							<div class="col">
								<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
									<?php
									if ('' !== $pricelist['saasp_pricelist_list_title'] || '' !== $pricelist['saasp_pricelist_list_description']) {
									?>
										<div class="saasp-pricelist">
											<h3 class="saasp-pricelist-title">
												<?php echo esc_html($pricelist['saasp_pricelist_list_title']); ?>
											</h3>
											<p class="saasp-pricelist-description">
												<?php echo esc_html($pricelist['saasp_pricelist_list_description']); ?>
											</p>
										</div>
									<?php
									}
									?>
									<?php
									if ('' !== $pricelist['saasp_pricelist_list_price']) {
									?>
										<h3 class="saasp-pricelist-price text-end text-nowrap">
											<span class="saasp-pricelist-currency">
											<?php 
											if ('custom' !== $settings['saasp_pricelist_currency_symbol']) {
												echo esc_html($this->get_currency_symbol($settings['saasp_pricelist_currency_symbol']));
											} else {
												echo esc_html($settings['saasp_pricelist_currency_symbol_custom']);
											}
											?></span><span class="saasp-pricelist-list-num"><?php echo esc_html($pricelist['saasp_pricelist_list_price']); ?></span>
										</h3>
									<?php
									}
									?>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				<?php
					}
				}
				?>
			</div>
    	</div>
	</div>

	<?php
	}

	public function content_template() {
	?>
		<div class="container saasp-pricelist-main-container">
			<div class="saasp-pricelist-main">
				<div class="saasp-wraped-lists">
					<!-- Pricelist Repeater Start -->
					<#
						let symbols = {
							taka: '&#2547;',
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

						if (settings.saasp_pricelist_currency_symbol) {
							if ('custom' !== settings.saasp_pricelist_currency_symbol) {
								symbol = symbols[settings.saasp_pricelist_currency_symbol] || '';
							} else {
								symbol = settings.saasp_pricelist_currency_symbol_custom;
							}
						}

						if (settings.saasp_pricelist_repeater) {
							_.each(settings.saasp_pricelist_repeater, function(pricelist) {
					#>
						<div class="row saasp-pricelist-wraper">
							<#
								if (pricelist.saasp_pricelist_list_title || pricelist.saasp_pricelist_list_description || pricelist.saasp_pricelist_list_price) {
							#>
								<div class="col">
									<div class="saasp-pricelist-right d-flex justify-content-between saasp-pricelist-content-alignment">
										<#
										if (pricelist.saasp_pricelist_list_title || pricelist.saasp_pricelist_list_description) {
										#>
											<div class="saasp-pricelist">
												<h3 class="saasp-pricelist-title">
													{{{ pricelist.saasp_pricelist_list_title }}}
												</h3>
												<p class="saasp-pricelist-description">
													{{{ pricelist.saasp_pricelist_list_description }}}
												</p>
											</div>
										<#
										}
										#>
										<#
										if (pricelist.saasp_pricelist_list_price !== null && pricelist.saasp_pricelist_list_price !== undefined) {
										#>
											<h3 class="saasp-pricelist-price text-end text-nowrap">
												<span class="saasp-pricelist-currency">{{{symbol}}}</span><span class="saasp-pricelist-list-num">{{{ pricelist.saasp_pricelist_list_price }}}</span>
											</h3>
										<#
										}
										#>
									</div>
								</div>
							<#
							}
							#>
						</div>
					<#
						});
					}
					#>
				</div>
			</div>
		</div>
	<?php
	}

}
