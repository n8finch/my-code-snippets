<?php
/**
 * Submenu items in secondary menu
 *
 * Assign the same menu to 'header' and 'secondary'.
 * This will display the current section's subpages in 'secondary'
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/building-dynamic-secondary-menu
 *
 * @param array $menu_items, menu items in this menu
 * @param array $args, arguments passed to wp_nav_menu()
 * @return array $menu_items
 *
 */
function be_submenu_items_in_secondary( $menu_items, $args ) {
	// Only run on 'secondary' menu location.
	if( 'secondary' !== $args->theme_location )
		return $menu_items;
	// Find active section
	$active_section = false;
	foreach( $menu_items as $menu_item ) {
		if( ! $menu_item->menu_item_parent && array_intersect( array( 'current-menu-item', 'current-menu-ancestor' ), $menu_item->classes ) )
			$active_section = $menu_item->ID;
	}
	if( ! $active_section )
		return false;
	// Gather all menu items in this section
	$sub_menu = array();
	$section_ids = array( $active_section );
	foreach( $menu_items as $menu_item ) {
		if( in_array( $menu_item->menu_item_parent, $section_ids ) ) {
			$sub_menu[] = $menu_item;
			$section_ids[] = $menu_item->ID;
		}
	}
	return $sub_menu;
}
add_filter( 'wp_nav_menu_objects', 'be_submenu_items_in_secondary', 10, 2 );