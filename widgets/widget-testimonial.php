<?php

namespace WidgetsTestimonialDT\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class WidgetsTestimonialDTTestimonial extends Widget_Base {
	public function get_name() {
		return 'Testimonial';
	}
	public function get_title() {
		return __( 'Testimonial' );
	}
	public function get_icon() {
		return 'eicon-drag-n-drop';
	}
	public function get_categories(){
		return ['dt-widgets'];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => 'Settings Testimonial',
			]
		);
		$this->add_control(
	      'testimonial_title',
	      [
	        'label' => __( 'Title', 'widgetstestimonialdt' ),
	        'type' => Controls_Manager::TEXT,
	        'placeholder' => __( 'Coloque el titulo', 'widgetstestimonialdt' ),
	        'default' => __('What Clients Say', 'widgetstestimonialdt'),
	        'label_block' => true,
	      ]
	    );
		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial_repeat',
			[
				'label' => 'Settings Testimonial content',
			]
		);

		$repeater_testimonial  = new \Elementor\Repeater();

	    $repeater_testimonial->add_control(
			'testimonial_image',
			[
				'label' => esc_html__( 'Choose Image', 'widgetstestimonialdt' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'description' => __('resolución sugerida 291x249', 'widgetstestimonialdt' ),
			]
		);

	    $repeater_testimonial->add_control(
	      'testimonial_name',
	      [
	        'label' => __( 'Title', 'widgetstestimonialdt' ),
	        'type' => Controls_Manager::TEXT,
	        'placeholder' => __( 'Title', 'widgetstestimonialdt' ),
	        'default' => __( 'Jhon Due', 'widgetstestimonialdt' ),
	        'label_block' => true,
	      ]
	    );

	    $repeater_testimonial->add_control(
	      'testimonial_description',
	      [
	        'label' => __( 'Testimonial', 'widgetstestimonialdt' ),
	        'type' => Controls_Manager::TEXTAREA,
	        'placeholder' => __( 'Testimonial', 'widgetstestimonialdt' ),
	        'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. It is a long established fact that a reader will be distracted by the readable its layout.', 'widgetstestimonialdt' ),
	        'label_block' => true,
	      ]
	    );

	    $repeater_testimonial->add_control(
	      'testimonial_rating',
	      [
	        'label' => esc_html__( 'Estrellas', 'widgetstestimonialdt' ),
	        'type' => Controls_Manager::SELECT,
	        'default' => '5',
	        'options' => [
	          '5' => esc_html__( '5', 'widgetstestimonialdt' ),
	          '4' => esc_html__( '4', 'widgetstestimonialdt' ),
	          '3' => esc_html__( '3', 'widgetstestimonialdt' ),
	          '2' => esc_html__( '2', 'widgetstestimonialdt' ),
	          '1' => esc_html__( '1', 'widgetstestimonialdt' ),
	        ],
	        'frontend_available' => true,
	      ]
	    );

	    $this->add_control(
	      'testimonial_list',
	      [
	        'label' => __( 'Lista testimonios', 'widgetstestimonialdt' ),
	        'type' => \Elementor\Controls_Manager::REPEATER,
	        'fields' => $repeater_testimonial->get_controls(),
	        'default' => [
	          [
	            'testimonial_name' => __( 'Juan', 'widgetstestimonialdt' ),
	            'testimonial_description' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. It is a long established fact that a reader will be distracted by the readable its layout.', 'widgetstestimonialdt' ),
	          ],
	        ],
	        'title_field' => '{{{ testimonial_name }}}',
	      ]
	    );

		$this->end_controls_section();
	}
	protected function render(){

		$settings = $this->get_settings_for_display();
		?>
		<!-- HTML DESIGN HERE -->
		
		<section>
			<div class="customer-feedback">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-offset-2 col-12">
							<div>
								<h2 class="section-title"><?php echo esc_attr($settings['testimonial_title']); ?></h2>
							</div>
						</div><!-- /End col -->
					</div><!-- /End row -->

					<div class="row">
						<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 cont-test">
							<?php if ($settings['testimonial_list']) { ?>
								<div class="owl-carousel feedback-slider">
              					<?php foreach ($settings['testimonial_list'] as $item) { ?>
									<!-- slider item -->
									<div class="feedback-slider-item">
										<img src="<?php echo esc_attr($item['testimonial_image']['url']); ?>" alt="Customer Feedback">
										<h3 class="customer-name"><?php echo esc_attr($item['testimonial_name']); ?></h3>
										<p><?php echo $item['testimonial_description'] ?></p>
										<span class="light-bg customer-rating" data-rating="<?php echo esc_attr($item['testimonial_rating']); ?>">
											<?php echo esc_attr($item['testimonial_rating']); ?>
											<i class="fa fa-star"></i>
										</span>
									</div>
									<!-- /slider item -->
								<?php } ?>
								</div><!-- /End feedback-slider -->
            				<?php } ?>
							<!-- side thumbnail -->
							<div class="feedback-slider-thumb hidden-xs">
								<?php if (isset($settings['testimonial_list'][0])) { ?>
								<div class="thumb-prev">
									<span>
										<img src="<?php echo esc_attr($settings['testimonial_list'][0]['testimonial_image']['url']); ?>" alt="Customer Feedback">
									</span>
									<span class="light-bg customer-rating">
										<?php echo  esc_attr($settings['testimonial_list'][0]['testimonial_rating']); ?>
										<i class="fa fa-star"></i>
									</span>
								</div>
								<?php } ?>
								<?php if (isset($settings['testimonial_list'][1])) { ?>
								<div class="thumb-next">
									<span>
										<img src="<?php echo esc_attr($settings['testimonial_list'][1]['testimonial_image']['url']); ?>" alt="Customer Feedback">
									</span>
									<span class="light-bg customer-rating">
										<?php echo  esc_attr($settings['testimonial_list'][1]['testimonial_rating']); ?>
										<i class="fa fa-star"></i>
									</span>
								</div>
								<?php } ?>
							</div>
							<!-- /side thumbnail -->

						</div><!-- /End col -->
					</div><!-- /End row -->
				</div><!-- /End container -->
			</div><!-- /End customer-feedback -->
		</section>
		<!-- HTML END DESIGN HERE -->
		<?php
	}
}