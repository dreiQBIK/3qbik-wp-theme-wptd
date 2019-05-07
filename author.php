<?php
/**
 * The template for displaying Author Archive pages
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $wp_query;
$context = \Timber\Timber::context();
$templates = array( 'views/author.twig', 'views/archive.twig' );

$context['posts'] = \Timber\Timber::get_posts();

if ( isset( $wp_query->query_vars['author'] ) ) {
	$author = new \Timber\User( $wp_query->query_vars['author'] );
	$context['author'] = $author;
	$context['title'] = 'Author Archives: ' . $author->name();
}

\Timber\Timber::render( $templates, $context );
