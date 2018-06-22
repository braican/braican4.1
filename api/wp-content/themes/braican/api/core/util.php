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
    $templateDir = get_template_directory();
    $svgPath = "$templateDir/svg/$svg.svg";

    if(!file_exists($svgPath)){
        return false;
    }

    if($return){
        return file_get_contents($svgPath);
    }

    include($svgPath);
}
endif;
