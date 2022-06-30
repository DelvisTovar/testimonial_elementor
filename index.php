<?php

/**
 * Plugin Name: Widgets Testimonial DT
 * Plugin URI: 
 * Description: Plugin que permite crear Widgets de testimonios.
 * Version: 1.0.0
 * Author: Delvis Tovar
 * Text Domain: widgetstestimonialdt
 * Author URI: https://github.com/DelvisTovar
 * Tags: elemetor, widget, testimonial
 */

namespace WidgetsTestimonialDT;

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
	require_once('main.php');
	$redo_object = new WidgetsTestimonialDTMAin();

defined( 'TESTIMONIALDT_BASEPATH' ) || define( 'TESTIMONIALDT_BASEPATH', plugin_dir_path( __FILE__ ) );
defined( 'TESTIMONIALDT_BASEURI' ) || define( 'TESTIMONIALDT_BASEURI', plugin_dir_url( __FILE__ ) );

/** Enqueue plugin scripts */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'bootstrap.min.js',TESTIMONIALDT_BASEURI.'public/js/bootstrap.bundle.min.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'owl.carousel.min.js',TESTIMONIALDT_BASEURI.'public/js/owl.carousel.min.js', array('jquery'), generarCodigo(3), true );
	wp_enqueue_script( 'w-dt.js',TESTIMONIALDT_BASEURI.'public/js/w-dt.js', array('jquery'), generarCodigo(3), true );

} );

/** Enqueue plugin styles */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'fonts.googleapis.com', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
	wp_enqueue_style( 'bootstrap.min.css', TESTIMONIALDT_BASEURI.'public/css/bootstrap5.1.3.min.css', array(), '5.1.3');
	wp_enqueue_style( 'awesome.css', TESTIMONIALDT_BASEURI.'public/css/font-awesome.min.css', array(), '4.7.0');
	wp_enqueue_style( 'owl.carousel.min.css',TESTIMONIALDT_BASEURI.'public/css/owl.carousel.min.css', array(), generarCodigo(3));
	wp_enqueue_style( 'animate.min.css',TESTIMONIALDT_BASEURI.'public/css/animate.min.css', array(), generarCodigo(3));
	wp_enqueue_style( 'w-dt.css',TESTIMONIALDT_BASEURI.'public/css/w-dt.css', array(), generarCodigo(3));

	
}, 50);

function generarCodigo($length) {
	$rand_string = '';
	for($i = 0; $i < $length; $i++) {
		$number = random_int(0, 36);
		//$character = base_convert($number, 10, 36);
		$rand_string .= $number;
	}
	return $rand_string;
}
