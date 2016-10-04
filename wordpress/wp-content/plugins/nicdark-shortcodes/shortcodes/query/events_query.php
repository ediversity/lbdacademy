<?php

$str .= '<div class="nicdark_masonry_container">';

while ( $the_query->have_posts() ) : $the_query->the_post();

	    $alldatas = redux_post_meta( 'redux_demo', $post_id );
	    $postcolor = $alldatas['metabox_event_color'];
      
      //info post
      $titlepost = get_the_title();
      $excerptpost = get_the_excerpt();

      //link
      if ($alldatas['metabox_event_linkurl'] == '') {
        $permalink = get_permalink( $post_id );
      }else{
        $permalink = $alldatas['metabox_event_linkurl'];
      }

      //get date info
      $eventdate = new DateTime($alldatas['metabox_event_date']);
      $neweventdate = ( $alldatas['metabox_event_date'] != '' ) ? ' <a href="'.$permalink.'" class="nicdark_btn nicdark_bg_greydark white medium nicdark_radius nicdark_absolute_left">'.$eventdate->format('j').'<br><small>'.$eventdate->format('M').'</small></a> ' : '';

      //image src
      $attachment_id = get_post_thumbnail_id( $post_id );
      $image_attributes = wp_get_attachment_image_src( $attachment_id, 'large' );
      $outputimagesrc = ( $image_attributes[0] != '' ) ? ' '.$neweventdate.'<img alt="" src="'.$image_attributes[0].'"> ' : '';

      //if button
      if ($alldatas['metabox_event_linktitle'] == '') {
        $outputbutton = '';
      }else{
        $outputbutton = '<div class="nicdark_space20"></div><a href="'.$permalink.'" class="white nicdark_btn nicdark_bg_'.$alldatas['metabox_event_color'].'dark medium nicdark_radius nicdark_shadow nicdark_press">'.$alldatas['metabox_event_linktitle'].'</a>';
      }

      //location hour date if
      $outputlocation = ( $alldatas['metabox_event_location'] != '' ) ? ' <h5 class="white"><i class="icon-pin-outline"></i> '.$alldatas['metabox_event_location'].'</h5> ' : '';
      $outputhour = ( $alldatas['metabox_event_hour'] != '' ) ? ' <div class="nicdark_space10"></div><h5 class="white"><i class="icon-clock-1"></i> '.$alldatas['metabox_event_hour'].'</h5> ' : '';
      $outputdate = ( $alldatas['metabox_event_date'] != '' ) ? ' <div class="nicdark_space10"></div><h5 class="white"><i class="icon-calendar"></i> '.$alldatas['metabox_event_date'].'</h5> ' : '';

      
      $str .= '

        <div style="box-sizing:border-box;" class="grid '.$atts['post_grid_columns'].' percentage nicdark_padding10 nicdark_masonry_item">
              
            <!--archive1-->
            <div class="nicdark_archive1 nicdark_bg_'.$postcolor.' nicdark_radius nicdark_shadow">

                '.$outputimagesrc.'
                
                <div class="nicdark_textevidence nicdark_bg_greydark">
                    <h4 class="white nicdark_margin20">'.$titlepost.'</h4>
                </div>
                
                <div class="nicdark_margin20 nicdark_event_archive">
                  
                    '.$outputlocation.'
                    '.$outputhour.'
                    '.$outputdate.'

                    <div class="nicdark_space20"></div>
                    <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>
                    <div class="nicdark_space20"></div>
                    <p class="white">'.$excerptpost.'</p>
                    '.$outputbutton.'   
                 </div>

            </div>
            <!--archive1-->

        </div>

      ';

endwhile;


$str .= '</div>';