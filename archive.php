<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$templates = array( 'views/archive.twig', 'views/index.twig' );
$context = \Timber\Timber::context();

$context['title'] = 'Archiv';
if ( is_day() ) {
	$context['title'] = 'Archiv: ' . get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$context['title'] = 'Archiv: ' . get_the_date( 'M Y' );
} else if ( is_year() ) {
	$context['title'] = 'Archiv: ' . get_the_date( 'Y' );
} else if ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}
$context['posts'] = \Timber\Timber::get_posts();

\Timber\Timber::render( $templates, $context );
