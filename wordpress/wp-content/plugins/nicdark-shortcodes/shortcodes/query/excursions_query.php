<?php

$str .= '<div class="nicdark_masonry_container">';

while ( $the_query->have_posts() ) : $the_query->the_post();

	    $alldatas = redux_post_meta( 'redux_demo', $post_id );
	    $postcolor = $alldatas['metabox_excursion_color'];
      
      //info post
      $titlepost = get_the_title();
      $excerptpost = get_the_excerpt();

      //image src
      $attachment_id = get_post_thumbnail_id( $post_id );
      $image_attributes = wp_get_attachment_image_src( $attachment_id, 'large' );
      $outputimagesrc = '<img alt="" src="'.$image_attributes[0].'">';

      //link
      if ($alldatas['metabox_excursion_linkurl'] == '') {
        $permalink = get_permalink( $post_id );
      }else{
        $permalink = $alldatas['metabox_excursion_linkurl'];
      }

      //if button
      if ($alldatas['metabox_excursion_linktitle'] == '') {
        $outputbutton = '';
      }else{
        $outputbutton = '<div class="nicdark_space20"></div><a href="'.$permalink.'" class="white nicdark_btn nicdark_bg_'.$alldatas['metabox_excursion_color'].' medium nicdark_radius nicdark_shadow nicdark_press">'.$alldatas['metabox_excursion_linktitle'].'</a>';
      }

      //location hour date if
      $outputhour = ( $alldatas['metabox_excursion_hour'] != '' ) ? ' <a title="'.$alldatas['metabox_excursion_hour'].'" href="'.$permalink.'" class="nicdark_tooltip nicdark_btn_icon nicdark_bg_greydark white medium nicdark_radius_circle nicdark_absolute_left"><i class="icon-clock"></i></a> ' : '';
      $outputlocation = ( $alldatas['metabox_excursion_location'] != '' ) ? ' <a title="'.$alldatas['metabox_excursion_location'].'" href="'.$permalink.'" class="nicdark_tooltip nicdark_btn_icon nicdark_bg_greydark white medium nicdark_radius_circle nicdark_absolute_right"><i class="icon-location-outline"></i></a> ' : '';
      $outputdate = ( $alldatas['metabox_excursion_date'] != '' ) ? ' <div class="nicdark_textevidence nicdark_bg_'.$alldatas['metabox_excursion_color'].' center"><h5 class="white nicdark_margin20">'.$alldatas['metabox_excursion_date'].'</h5><i class="'.$alldatas['metabox_excursion_icon'].' nicdark_iconbg right medium '.$alldatas['metabox_excursion_color'].'"></i></div> ' : ''; 

      

      $str .= '

        <div style="box-sizing:border-box;" class="grid '.$atts['post_grid_columns'].' percentage nicdark_padding10 nicdark_masonry_item">
                                    
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
 
                '.$outputhour.'
                '.$outputlocation.'
                '.$outputimagesrc.'

                <div class="nicdark_textevidence nicdark_bg_greydark center">
                    <h4 class="white nicdark_margin20">'.$titlepost.'</h4>
                </div>

                '.$outputdate.'
                
                <div class="nicdark_textevidence center">
                    <div class="nicdark_margin20">
                        <p>'.$excerptpost.'</p>
                        '.$outputbutton.'
                    </div>
                </div>

            </div>

        </div>

      ';

endwhile;


$str .= '</div>';