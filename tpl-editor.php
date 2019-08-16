<?php

/**
 * Template Name: Editor-Template
 * Template Post Type: post, page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$templates = 'views/tpl-editor.twig';

$post = new TimberPost();
$context['post'] = $post;
// $context['sidebar'] = Timber::get_sidebar('l-sidebar.php');

Timber::render($templates, $context);
