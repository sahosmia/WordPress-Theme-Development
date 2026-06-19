<?php
/**
 * Helper functions for the theme
 */

/**
 * Function to get limited excerpt
 */
if ( ! function_exists( 'get_limited_excerpt' ) ) {
    function get_limited_excerpt($limit = 150) { // 150 characters = approx 2-3 lines
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = get_the_content();
        }
        
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        
        if (strlen($excerpt) > $limit) {
            $excerpt = substr($excerpt, 0, $limit) . '...';
        }
        
        return $excerpt;
    }
}
