<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$templates = array( 'views/single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'views/single.twig' );
$templates_pass = 'single-password.twig';

$post = Timber::query_post();
$context['post'] = $post;

if ( post_password_required( $post->ID ) ) {
	Timber::render( $templates_pass, $context );
} else {
	Timber::render( $templates, $context );
}
