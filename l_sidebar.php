<?php
/**
 * The Template for the sidebar containing the sidebar
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = Timber::context();
$templates = 'partials/layouts/l_sidebar.twig';

$context['tags'] = Timber::get_terms('tag');
$context['categories'] = Timber::get_terms('category');

Timber::render($templates, $context);
