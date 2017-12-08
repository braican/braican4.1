<?php
//
// Utility API functions for this theme
//


if(!function_exists('include_svg')) :
/**
 * include svgs inline
 * @param {string} $svg // the svg to include
 * @param {boolean} $return // whether to return the svg as a string or simply include the svg
 */
function include_svg( $svg, $return = false ){
    $svg_path = get_template_directory() . '/svg/build/' . $svg . '.svg';

    if(!file_exists($svg_path)){
        return false;
    }

    if($return){
        return file_get_contents($svg_path);
    }

    include( $svg_path );
}
endif;
