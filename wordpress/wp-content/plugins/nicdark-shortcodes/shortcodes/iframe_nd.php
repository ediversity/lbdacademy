<?php

/////////////////////////////////////////////////////////IFRAME/////////////////////////////////////////
add_shortcode('iframe_nd', 'nicdark_shortcode_iframe');
function nicdark_shortcode_iframe($atts, $content = null)
{  

   $atts = shortcode_atts(
      array(
         'iframe' => '',
         'width' => '',
         'height' => ''
      ), $atts);

   $str = '';
      
   $str .= '<iframe width="'.$atts['width'].'" height="'.$atts['height'].'" src="'.$atts['iframe'].'">';

   return apply_filters('uds_shortcode_out_filter', $str);
}

//vc
add_action( 'vc_before_init', 'nicdark_iframe' );
function nicdark_iframe() {
   vc_map( array(
      "name" => __( "Iframe", "nicdark-shortcodes" ),
      "base" => "iframe_nd",
      'description' => __( 'Add an Iframe', 'nicdark-shortcodes' ),
      "icon" => get_template_directory_uri() . "/vc_extend/iframe.png",
      "class" => "",
      "category" => __( "Nicdark Shortcodes", "nicdark-shortcodes"),
      "params" => array(

         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __( "Width", "nicdark-shortcodes" ),
            "param_name" => "width",
            "description" => __( "Insert iframe width. E.g. 100% or 300px", "nicdark-shortcodes" )
         ),
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => __( "Height", "nicdark-shortcodes" ),
            "param_name" => "height",
            "description" => __( "Insert iframe height, example: 400px", "nicdark-shortcodes" )
         ),
         array(
            "type" => "textarea",
            "class" => "",
            "heading" => __( "Iframe src", "nicdark-shortcodes" ),
            "param_name" => "iframe",
            "description" => __( "Insert your iframe", "nicdark-shortcodes" )
         )
      )
   ) );
}
//end shortcode