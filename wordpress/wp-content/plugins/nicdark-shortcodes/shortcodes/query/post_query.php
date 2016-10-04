<?php

$outputfilter = 0;

//start translate
$nicdark_text_postquery_all = __('ALL','nicdark-shortcodes');
$nicdark_text_postquery_more = __('Read More','nicdark-shortcodes');
//end translate

//start filter
if ($atts['show_filter'] == 1) {

  $outputfilter = 'nicdark_filter'; 

  //build categories array
  $allcategories = array();
  while ( $the_query->have_posts() ) : $the_query->the_post();
    
    $category = get_the_category(); 
    $categoryname = $category[0]->cat_name;
    $categoryslug = $category[0]->category_nicename;

    $allcategories[] = $categoryslug ;

  endwhile;
  $uniquecategories = array_unique($allcategories);

  //all filter button and starter div
  $str .= '<div class="nicdark_masonry_btns"><div class="nicdark_margin10"><a data-filter="*" class="nicdark_bg_grey2_hover nicdark_transition nicdark_btn nicdark_bg_grey small nicdark_shadow nicdark_radius grey">'.$nicdark_text_postquery_all.'</a></div>';

  //output all categories buttons
  foreach($uniquecategories as $value){ 
      $categoryuniquename = get_category_by_slug($value);
      $str .= '<div class="nicdark_margin10"><a data-filter=".'.$value.'" class="nicdark_bg_grey2_hover nicdark_transition nicdark_btn nicdark_bg_grey small nicdark_shadow nicdark_radius grey">'.$categoryuniquename->cat_name.'</a></div>';
  }

  //closer div and spacer
  $str .= '<div class="nicdark_space10"></div></div>';

}
//end filter



$str .= '<div class="nicdark_masonry_container '.$outputfilter.'">';

while ( $the_query->have_posts() ) : $the_query->the_post();

	  
	  $alldatas = redux_post_meta( 'redux_demo', $post_id );
	  $postcolor = $alldatas['metabox_posts_color'];
      
      //info post
      $titlepost = get_the_title();
      $excerptpost = get_the_excerpt();
      $permalink = get_permalink( $post_id );
      $categories = get_the_category(); 
    $categoryslug = $categories[0]->category_nicename;
      
      //image src
    $attachment_id = get_post_thumbnail_id( $post_id );
  $image_attributes = wp_get_attachment_image_src( $attachment_id, 'large' );
  $linkicononimg = '';
  if ( $image_attributes[0] != '' ) { $linkicononimg = '<a href="'.$permalink.'" class="nicdark_zoom nicdark_btn_icon nicdark_bg_'.$postcolor.' nicdark_border_'.$postcolor.'dark white medium nicdark_radius_circle nicdark_absolute_left"><i class="icon-link-outline"></i></a>'; }
  if ( $image_attributes[0] == '' ) { $outputimagesrc = ''; }else{
    $outputimagesrc = ''.$linkicononimg.'<div class="nicdark_featured_image"><img alt="" src="'.$image_attributes[0].'"></div>';
  }
      $str .= '

		<div style="box-sizing:border-box;" class="grid '.$atts['post_grid_columns'].' percentage nicdark_padding10 nicdark_masonry_item '; 

    foreach($categories as $category) {
      $str .= ' '.$category->category_nicename.' ';
    }

    $str .= '">
			

				<div class="nicdark_archive1 nicdark_bg_'.$postcolor.' nicdark_radius nicdark_shadow">  

					'.$outputimagesrc.'
					                    
                    <div class="nicdark_margin20 nicdark_post_archive">
                        <h4 class="white">'.$titlepost.'</h4>
                        <div class="nicdark_space20"></div>
                        <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
                        <div class="nicdark_space20"></div>
                        <p class="white">'.do_shortcode($excerptpost).'</p>
                        <div class="nicdark_space20"></div>
                        <a href="'.$permalink.'" class="white nicdark_btn"><i class="icon-doc-text-1 "></i>'.$nicdark_text_postquery_more.'</a>                        
                    </div>

                    <i class="icon-pencil-1 nicdark_iconbg right medium '.$postcolor.'"></i>

                </div>

			
		</div>

      ';

endwhile;


$str .= '</div>';