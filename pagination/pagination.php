
<?php

// From: http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
// From: http://sgwordpress.com/teaches/how-to-add-wordpress-pagination-without-a-plugin/
// See also: http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/

// NOTE: Use this:
if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
}

// NOTE: make sure to `offset` in the WP_Query! E.g.:
global $paged;
$offset = 0;
if( 0 !== $paged ) { $offset = ($paged -1 ) * 6;  }
$loop = new WP_Query( array(
	'post_type' => 'lt_recap',
	'posts_per_page' => 6,
	'offset' => $offset ) );

/**
 * Add Pagination for Custom Loops and Custom Post Types
 * @param  string  $pages [description]
 * @param  integer $range [description]
 * @return [type]         [description]
 */

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
