<?php
/**
 * The Template for displaying all categories
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$templates = 'views/category.twig';

$term = new Timber\Term();
$posts = new Timber\PostQuery();
$post = new TimberPost();

$context['post'] = $post;
$context['posts'] = $posts;
$context['term'] = $term;
$context['pagination'] = Timber::get_pagination();
$context['sidebar'] = Timber::get_sidebar('l_sidebar.php');

Timber::render( $templates, $context );
