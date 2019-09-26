<?php

/* Post Type: Events */
$events_labels = array(
    "name"                  => __( "Events", "wptd" ),
    "singular_name"         => __( "Event", "wptd" ),
    "menu_name"             => __( "Events", "wptd" ),
    "all_items"             => __( "Alle Events", "wptd" ),
    "add_new"               => __( "Erstellen", "wptd" ),
    "add_new_item"          => __( "Neue Event erstellen", "wptd" ),
    "edit_item"             => __( "Event bearbeiten", "wptd" ),
    "new_item"              => __( "Neue Event", "wptd" ),
    "view_item"             => __( "Anschauen", "wptd" ),
    "view_items"            => __( "Anschauen", "wptd" ),
    "search_items"          => __( "Event durchsuchen", "wptd" ),
    "not_found"             => __( "Keine Events gefunden", "wptd" ),
    "not_found_in_trash"    => __( "Keine Events im Papierkorb gefunden", "wptd" ),
    "parent_item_colon"     => __( "Eltern", "wptd" ),
    "archives"              => __( "Archiv", "wptd" ),
    "filter_items_list"     => __( "Events filtern", "wptd" ),
    "items_list_navigation" => __( "Navigation", "wptd" ),
    "items_list"            => __( "Events Liste", "wptd" ),
    "attributes"            => __( "Events Eigenschaften", "wptd" ),
    "parent_item_colon"     => __( "Eltern", "wptd" ),
);

$events_args = array(
    "label"               => __( "Events", "wptd" ),
    "labels"              => $events_labels,
    "description"         => "",
    "public"              => true,
    "publicly_queryable"  => true,
    "show_ui"             => true,
    "show_in_rest"        => false,
    "rest_base"           => "",
    "has_archive"         => true,
    "show_in_menu"        => true,
    "exclude_from_search" => false,
    "capability_type"     => "post",
    "map_meta_cap"        => true,
    "hierarchical"        => false,
    // make sure to register taxonomies first, so rewrites like events/kategorien are working
    "rewrite"             => array( "slug" => "events", "with_front" => false ),
    "query_var"           => true,
    "menu_position"       => 30,
    "menu_icon"           => "dashicons-calendar-alt",
    "supports"            => array( "title", "editor", "thumbnail", "custom-fields", "revisions" ),
    "taxonomies"          => array( "wptd_event_category", "wptd_event_rubrik" ),
);
// register_post_type( "wptd_event", $events_args );
