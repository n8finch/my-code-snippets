<?php

// Mostly from http://www.wpbeginner.com/wp-themes/how-to-add-custom-items-to-specific-wordpress-menus/
//

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if (is_single() && $args->theme_location == 'primary') {
        $items .= '<li>Show whatever</li>';
    }
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. wp_logout_url() .'">Log Out</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. site_url('wp-login.php') .'">Log In</a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items."<li class='menu-header-search'><form action='http://example.com/' id='searchform' method='get'><input type='text' name='s' id='s' placeholder='Search'></form></li>";

    return $items;
}

add_filter('wp_nav_menu_items','chi_add_search_box_to_menu', 10, 2);
function chi_add_search_box_to_menu( $items, $args ) {

	$searchform = '<li><form class="searchform seach-form" role="search" method="get" action="http://whateversite.com/" _lpchecked="1">
		<div class="search-table">
			<div class="search-field">
				<label class="screen-reader-text" for="searchform">Search for:</label>
				<input id="searchform" type="text" value="" name="s" class="s" placeholder="Search ..." required="" aria-required="true" aria-label="Search ...">
			</div>
			<div class="search-button">
				<input type="submit" class="searchsubmit" value="" alt="Search">
			</div>
		</div>
	</form></li>';


    if( $args->theme_location == 'top_navigation' )
        return $items.$searchform;

    return $items;
}

add_filter('wp_nav_menu_items','add_todaysdate_in_menu', 10, 2);
function add_todaysdate_in_menu( $items, $args ) {
    if( $args->theme_location == 'primary')  {

        $todaysdate = date('l jS F Y');
        $items .=  '<li>' . $todaysdate .  '</li>';

    }
    return $items;
}
