<?php


//generate taxonomy terms
function buildSelect($tax,$bginput){ 
  $terms = get_terms($tax);
  $the_tax = get_taxonomy($tax);
  $tax_name = $the_tax->labels->name;
  $x = '<select name="'. $tax .'" class="nicdark_bg_'.$bginput.' nicdark_radius nicdark_shadow grey medium subtitle">';
  $x .= '<option value="">'.__('ALL','nicdark-shortcodes').' '. $tax_name .'</option>';
  foreach ($terms as $term) {
     $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';  
  }
  $x .= '</select>';
  return $x;
}



/////////////////////////////////////////////////////////advanced_search/////////////////////////////////////////
add_shortcode('advanced_search_nd', 'nicdark_shortcode_advanced_search');
function nicdark_shortcode_advanced_search($atts, $content = null)
{  

   $atts = shortcode_atts(
      array(
         'post_type' => '',
         'columns' => '',
         'btncolor' => '',
         'bginput' => ''
      ), $atts);

  $str = '';

  $posttype = $atts['post_type'];
  $columns = $atts['columns'];
  $btncolor = $atts['btncolor'];
  $bginput = $atts['bginput'];


  //start translate
  $nicdark_text_search_date = __('DATE','nicdark-shortcodes');
  $nicdark_text_search_keyword = __('KEYWORD','nicdark-shortcodes');
  $nicdark_text_search_submit = __('SEARCH','nicdark-shortcodes');
  //end translate


  //find action link
  $actioncourses = get_post_type_archive_link( ''.$posttype.'' );

  $outputdateparam = ( $posttype != 'courses' ) ? ' 
    <div style="box-sizing:border-box; padding: 0px 10px;" class="grid '.$columns.' percentage">
      <input class="nicdark_bg_'.$bginput.' nicdark_radius nicdark_shadow grey medium subtitle nicdark_calendar" placeholder="'.$nicdark_text_search_date.'" name="date" type="text" value="">
    </div>
  ' : '';

   $str .= '
   <form class="nicdark_advanced_search" action="'.$actioncourses.'" method="GET">
    <input type="hidden" value="true" name="advsearch">
    <input type="hidden" value="'.$posttype.'" name="posttype">
    <div style="box-sizing:border-box; padding: 0px 10px;" class="grid '.$columns.' percentage">
      <input class="nicdark_bg_'.$bginput.' nicdark_radius nicdark_shadow grey medium subtitle" type="text" placeholder="'.$nicdark_text_search_keyword.'" name="keyword" value="">
    </div>
    <div style="box-sizing:border-box; padding: 0px 10px;" class="grid '.$columns.' percentage">';

    $taxonomies = get_object_taxonomies($posttype);
    foreach($taxonomies as $tax){
      $str .= ''.buildSelect($tax,$bginput).'';
    }

     $str .= '</div>'.$outputdateparam.'
    <div style="box-sizing:border-box; padding: 0px 10px;" class="grid '.$columns.' percentage">
      <input type="submit" value="'.$nicdark_text_search_submit.'" class="nicdark_btn fullwidth nicdark_bg_'.$btncolor.' nicdark_shadow">
    </div>
    <input type="hidden" value="'.$taxonomies[0].'" name="taxonomy">

   </form>';

   return apply_filters('uds_shortcode_out_filter', $str);
}

//vc
add_action( 'vc_before_init', 'nicdark_advanced_search' );
function nicdark_advanced_search() {
   vc_map( array(
      "name" => __( "Advanced Search", "nicdark-shortcodes" ),
      "base" => "advanced_search_nd",
      'description' => __( 'Insert Advanced Search', 'nicdark-shortcodes' ),
      'show_settings_on_create' => true,
      "icon" => get_template_directory_uri() . "/vc_extend/advanced_search.png",
      "class" => "",
      "category" => __( "Nicdark Shortcodes", "nicdark-shortcodes"),
      "params" => array(

         array(
         'type' => 'dropdown',
          'heading' => "Post Type",
          'param_name' => 'post_type',
          'admin_label' => true,
          'value' => array( "select", "courses", "excursions", "our-events" ),
          'description' => __( "Choose the post type to filter", "nicdark-shortcodes" )
         ),
         array(
         'type' => 'dropdown',
          'heading' => "Columns",
          'param_name' => 'columns',
          'value' => array( __( 'Select', 'nicdark-shortcodes' ) => 'select', __( '4 Columns', 'nicdark-shortcodes' ) => 'grid_3', __( '3 Columns', 'nicdark-shortcodes' ) => 'grid_4', __( '2 Columns', 'nicdark-shortcodes' ) => 'grid_6', __( '1 Column', 'nicdark-shortcodes' ) => 'grid_12' ),
          'description' => __( "Choose columns style", "nicdark-shortcodes" )
         ),
         array(
         'type' => 'dropdown',
          'heading' => "Button Color",
          'param_name' => 'btncolor',
          'value' => array( "select", "yellow", "orange", "red", "violet", "blue", "green" ),
          'description' => __( "Select your button color", "nicdark-shortcodes" )
         ),
         array(
         'type' => 'dropdown',
          'heading' => "Color Field",
          'param_name' => 'bginput',
          'value' => array( __( 'Select', 'nicdark-shortcodes' ) => 'select', __( 'Light Version', 'nicdark-shortcodes' ) => 'grey2', __( 'Dark Version', 'nicdark-shortcodes' ) => 'greydark2' ),
          'description' => __( "Select your color", "nicdark-shortcodes" )
         )

      )
   ) );
}
//end shortcode