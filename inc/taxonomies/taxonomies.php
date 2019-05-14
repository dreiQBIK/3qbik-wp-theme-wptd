<?php

function wptd_register_taxonomies() {
    foreach ( glob( __DIR__ . '/wptd_*.php' ) as $file ) {
        require_once $file;
    }
}
add_action( 'init', 'wptd_register_taxonomies' );
