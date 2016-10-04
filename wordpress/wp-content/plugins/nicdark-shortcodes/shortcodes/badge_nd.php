<?php

/////////////////////////////////////////////////////////badge/////////////////////////////////////////
add_shortcode('badge_nd', 'nicdark_shortcode_badge');
function nicdark_shortcode_badge($atts, $content = null)
{	

	$atts = shortcode_atts(
		array(
			'content' => ''
		), $atts);

    $str = '';
		
   $str .= wpb_js_remove_wpautop($content, true);

	return apply_filters('uds_shortcode_out_filter', $str);
}

//vc
add_action( 'vc_before_init', 'nicdark_badge' );
function nicdark_badge() {
   vc_map( array(
      "name" => __( "Badge", "nicdark-shortcodes" ),
      "base" => "badge_nd",
      'holder' => 'div',
      'description' => __( 'Add Custom badge', 'nicdark-shortcodes' ),
      "icon" => get_template_directory_uri() . "/vc_extend/badge.png",
      "class" => "",
      "category" => __( "Nicdark Shortcodes", "nicdark-shortcodes"),
      "params" => array(
         array(
            "type" => "textarea_html",
            "class" => "",
            "heading" => __( "badge", "nicdark-shortcodes" ),
            "param_name" => "content",
            "value" => __( "<ul class='nicdark_list border'>    
    <li class='nicdark_border_grey'>
        <h5 class='grey subtitle'>DRAWING LESSON IN ALL CLASSES <a href='#' class='nicdark_btn nicdark_bg_blue extrasmall nicdark_radius nicdark_shadow white right'>9:00</a></h5> 
        <div class='nicdark_space15'></div>
    </li>

    <li class='nicdark_border_grey'>
        <div class='nicdark_space15'></div>
        <h5 class='grey subtitle'>BASIC NICE ART VIDEOS <a href='#' class='nicdark_btn nicdark_bg_violet extrasmall nicdark_radius nicdark_shadow white right'>11:00</a></h5>   
        <div class='nicdark_space15'></div>
    </li>
        
    <li class='nicdark_border_grey'>
        <div class='nicdark_space15'></div>
        <h5 class='grey subtitle'>SOME WATER COLOR PRACTICE <a href='#' class='nicdark_btn nicdark_bg_blue extrasmall nicdark_radius nicdark_shadow white right'>14:00</a></h5>   
        <div class='nicdark_space15'></div>
    </li>

    <li class='nicdark_border_grey'>
        <div class='nicdark_space15'></div>
        <h5 class='grey subtitle'>WONDERFUL STENCIL TEST PAINTING <a href='#' class='nicdark_btn nicdark_bg_violet extrasmall nicdark_radius nicdark_shadow white right'>15:00</a></h5>    
        <div class='nicdark_space15'></div>
    </li>

    <li class='nicdark_border_grey'>
        <div class='nicdark_space15'></div>
        <h5 class='grey subtitle'>COLOR WITH FRUIT AND VEGETABLES <a href='#' class='nicdark_btn nicdark_bg_blue extrasmall nicdark_radius nicdark_shadow white right'>17:00</a></h5>    
    </li> 
</ul>", "nicdark-shortcodes" ),
            "description" => __( "Change source code for edit the style", "nicdark-shortcodes" )
         )
      )
   ) );
}
//end shortcode badge