<?php

/**
 * Plugin Name: Widgets Testimonial DT
 * Plugin URI: 
 * Description: Plugin que permite crear Widgets de testimonios.
 * Version: 1.0.0
 * Author: Delvis Tovar
 * Text Domain: https://github.com/DelvisTovar
 * Author URI: https://github.com/DelvisTovar
 */

namespace DT;

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
	require_once('main.php');
	$redo_object = new E_DT();

defined( 'W_DT_BASEPATH' ) || define( 'W_DT_BASEPATH', plugin_dir_path( __FILE__ ) );
defined( 'W_DT_BASEURI' ) || define( 'W_DT_BASEURI', plugin_dir_url( __FILE__ ) );

/** Enqueue plugin scripts */
add_action( 'wp_enqueue_scripts', function() {

	wp_enqueue_script( 'jquery.min.js','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('jquery'), '3.3.1', false );
	wp_enqueue_script( 'bootstrap.min.js','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js', array(), '4.0.0', true );
	wp_enqueue_script( 'owl.carousel.min.js','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), generarCodigo(3), true );
	wp_enqueue_script( 'w-dt.js', W_DT_BASEURI . 'public/js/w-dt.js', array('jquery'), generarCodigo(3), true );

} );

/** Enqueue plugin styles */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'fonts.googleapis.com', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
	wp_enqueue_style( 'bootstrap.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7');
	wp_enqueue_style( 'awesome.css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0');
	wp_enqueue_style( 'owl.carousel.min.css','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), generarCodigo(3));
	wp_enqueue_style( 'owl.carousel.min.css','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), generarCodigo(3));
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
