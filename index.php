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

defined( 'W_DT_BASEPATH' ) || define( 'W_DT_BASEPATH', plugin_dir_path( __FILE__ ) );
defined( 'W_DT_BASEURI' ) || define( 'W_DT_BASEURI', plugin_dir_url( __FILE__ ) );

/** Enqueue plugin scripts */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'bootstrap.min.js',W_DT_BASEURI .'public/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'owl.carousel.min.js', W_DT_BASEURI .'public/js/owl.carousel.min.js', array('jquery'), generarCodigo(3), true );
	wp_enqueue_script( 'w-dt.js', W_DT_BASEURI . 'public/js/w-dt.js', array('jquery'), generarCodigo(3), true );

} );

/** Enqueue plugin styles */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'fonts.googleapis.com', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
	wp_enqueue_style( 'bootstrap.min.css',  W_DT_BASEURI . 'public/css/bootstrap.min.css', array(), '3.3.7');
	wp_enqueue_style( 'awesome.css',  W_DT_BASEURI . 'public/css/font-awesome.min.css', array(), '4.7.0');
	wp_enqueue_style( 'owl.carousel.min.css', W_DT_BASEURI . 'public/css/owl.carousel.min.css', array(), generarCodigo(3));
	wp_enqueue_style( 'animate.min.css', W_DT_BASEURI . 'public/css/animate.min.css', array(), generarCodigo(3));
	wp_enqueue_style( 'w-dt.css', W_DT_BASEURI . 'public/css/w-dt.css', array(), generarCodigo(3));

	
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
