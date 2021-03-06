<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
$templates = array( 'views/blog.twig' );

$post = new TimberPost();
$context['post'] = $post;
$context['posts'] = new Timber\PostQuery();
$context['pagination'] = Timber::get_pagination();
$context['sidebar'] = Timber::get_sidebar('l_sidebar.php');

Timber::render( $templates, $context );
