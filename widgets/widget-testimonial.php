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
	    $this->add_control(
	      'testimonial_view',
	      [
	        'label' => esc_html__( 'Template', 'widgetstestimonialdt' ),
	        'type' => Controls_Manager::SELECT,
	        'default' => '1',
	        'options' => [
	          /*'5' => esc_html__( '5', 'widgetstestimonialdt' ),
	          '4' => esc_html__( '4', 'widgetstestimonialdt' ),*/
	          '3' => esc_html__( '3', 'widgetstestimonialdt' ),
	          '2' => esc_html__( '2', 'widgetstestimonialdt' ),
	          '1' => esc_html__( '1', 'widgetstestimonialdt' ),
	        ],
	        'frontend_available' => true,
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
	        'label' => esc_html__( 'Stars', 'widgetstestimonialdt' ),
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
	        'label' => __( 'Testimonials list', 'widgetstestimonialdt' ),
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
		$view = $settings['testimonial_view'];
		#diseño 1
		if ($view == 1) {
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
										<p><?php echo esc_attr($item['testimonial_description']); ?></p>
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
		} elseif ($view == 2) { ?>
		  <div class="testimonials2 text-center">
		    <div class="container">
		      <h3><?php echo esc_attr($settings['testimonial_title']); ?></h3>
		      <div class="row">
		      	<?php if ($settings['testimonial_list']) { ?>
		      		<?php foreach ($settings['testimonial_list'] as $item) { ?>
				        <div class="col-md-6 col-lg-4">
				          <div class="card border-light bg-light text-center">
				            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
				            <div class="card-body blockquote">
				              <p class="card-text"><?php echo esc_attr($item['testimonial_description']); ?></p>
				              <footer class="blockquote-footer">
				              	<cite title="Source Title"><?php echo esc_attr($item['testimonial_name']); ?></cite>
				              </footer>
				            </div>
				          </div>
				        </div>
		        	<?php } ?>
		    	<?php } ?>
		      </div>
		    </div>
		  </div>
		<?php
		} elseif ($view = 3){ ?>
			<div class="container testimonial3  text-center">
	            <div class="heading white-heading"><?php echo esc_attr($settings['testimonial_title']); ?></div>
				<div id="carouselExampleIndicators" class="carousel slide testimonial3_control_button" data-bs-ride="true">
				  <div class="carousel-indicators">
				  	<?php if ($settings['testimonial_list']) { ?>
				  		<?php $slider3count1 = 0; ?>
		      			<?php foreach ($settings['testimonial_list'] as $item1) { ?>
		      				<?php $slider3ClassActive1 = ($slider3count1 == 0) ? 'active' : ''; ?>
				    		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $slider3count1; ?>" class="<?php echo $slider3ClassActive1; ?>" aria-current="true" aria-label="Slide"></button>
				    		<?php $slider3count1++; ?> 
						<?php } ?>
					<?php } ?>
				  </div>
				  <div class="carousel-inner" id="testimonial3">
				  	<?php if ($settings['testimonial_list']) { ?>
				  		<?php $slider3count = 1; ?>
		      			<?php foreach ($settings['testimonial_list'] as $item) { ?>
		      				<?php $slider3ClassActive = ($slider3count == 1) ? 'active' : ''; ?>
						  	<div class="carousel-item <?php echo $slider3ClassActive; ?>">
						  		<div class="testimonial3_slide">
						  			<img src="<?php echo esc_attr($item['testimonial_image']['url']); ?>" class="img-circle img-responsive" />
						  			<p><?php echo esc_attr($item['testimonial_description']); ?></p>
						  			<h4><?php echo esc_attr($item['testimonial_name']); ?></h4>
						  		</div>
						  	</div>
						  	<?php $slider3count++; ?> 
						<?php } ?>
					<?php } ?>
				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>
				</div>	
			</div>
		<?php }
	}
}