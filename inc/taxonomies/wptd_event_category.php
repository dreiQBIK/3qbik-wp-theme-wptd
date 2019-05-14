<?php

/* Taxonomy: Event Category */
$labels = array(
    "name"                       => __( "Event-Kategorien", "" ),
    "singular_name"              => __( "Event-Kategorie", "" ),
    "menu_name"                  => __( "Event-Kategorien", "" ),
    "all_items"                  => __( "Alle Event-Kategorien", "" ),
    "edit_item"                  => __( "Event-Kategorien bearbeiten", "" ),
    "view_item"                  => __( "Event-Kategorien ansehen", "" ),
    "update_item"                => __( "Event-Kategorien aktualisieren", "" ),
    "add_new_item"               => __( "Neue Event-Kategorie hinzufügen", "" ),
    "new_item_name"              => __( "Neue Event-Kategorie", "" ),
    "parent_item"                => __( "Eltern der Event-Kategorie", "" ),
    "parent_item_colon"          => __( "Eltern der Event-Kategorie:", "" ),
    "search_items"               => __( "Event-Kategorien suchen", "" ),
    "popular_items"              => __( "Häufig verwendete Event-Kategorien", "" ),
    "separate_items_with_commas" => __( "Event-Kategorien mit Komma trennen", "" ),
    "add_or_remove_items"        => __( "Event-Kategorien hinzufügen oder entfernen", "" ),
    "choose_from_most_used"      => __( "Aus den am häufigsten verwendeten Event-Kategorien auswählen", "" ),
    "not_found"                  => __( "Keine Event-Kategorien gefunden", "" ),
    "no_terms"                   => __( "Keine Event-Kategorien", "" ),
    "items_list_navigation"      => __( "Event-Kategorien Listen-Navigation", "" ),
    "items_list"                 => __( "Event-Kategorien Liste", "" ),
);

$args = array(
    "label"              => __( "Event-Kategorien", "" ),
    "labels"             => $labels,
    "public"             => true,
    "hierarchical"       => false,
    "label"              => "Event-Kategorien",
    "show_ui"            => false,
    "show_in_menu"       => true,
    "show_in_nav_menus"  => true,
    "query_var"          => true,
    "rewrite"            => array( 'slug' => 'events/kategorien', 'with_front' => false, ),
    "show_admin_column"  => false,
    "show_in_rest"       => false,
    "rest_base"          => "",
    "show_in_quick_edit" => false,
    "meta_box_cb"        => false,
);
register_taxonomy( "wptd_event_category", array( "wptd_event" ), $args );
