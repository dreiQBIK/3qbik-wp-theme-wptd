<?php

/**
 * Template Name: Baukasten (Detail)
 * Template Post Type: post, page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$templates = 'views/tpl-builder-detail.twig';

$post = new TimberPost();
$context['post'] = $post;
$context['sidebar'] = Timber::get_sidebar('l_sidebar.php');

Timber::render($templates, $context);
