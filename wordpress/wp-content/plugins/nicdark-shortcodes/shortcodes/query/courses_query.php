<?php


$str .= '<div class="nicdark_masonry_container">';

while ( $the_query->have_posts() ) : $the_query->the_post();

	  
	     $alldatas = redux_post_meta( 'redux_demo', $post_id );
	     $postcolor = $alldatas['metabox_course_color'];
      
      //info post
      $titlepost = get_the_title();
      $excerptpost = get_the_excerpt();

      //link
      if ($alldatas['metabox_course_linkurl'] == '') {
        $permalink = get_permalink( $post_id );
      }else{
        $permalink = $alldatas['metabox_course_linkurl'];
      }

      //if button
      if ($alldatas['metabox_course_linktitle'] == '') {
        $outputbutton = '';
      }else{
        $outputbutton = '<div class="nicdark_space20"></div><a href="'.$permalink.'" class="white nicdark_btn nicdark_bg_'.$alldatas['metabox_course_color'].' medium nicdark_radius nicdark_shadow nicdark_press">'.$alldatas['metabox_course_linktitle'].'</a>';
      }

      //if price and currency are set
      if ($alldatas['metabox_course_price'] == ''){ 
        $outputpricecurrency = '<div class="nicdark_space80"></div><div class="nicdark_space5"></div>'; 
      }else{  
        $outputpricecurrency = '<a href="'.$permalink.'" class="nicdark_zoom white nicdark_btn_icon nicdark_bg_greydark big nicdark_radius_circle">'.$alldatas['metabox_course_price'].'<br><small>'.$alldatas['metabox_course_currency'].'</small></a>';
      }


      //image src
      $attachment_id = get_post_thumbnail_id( $post_id );
      $image_attributes = wp_get_attachment_image_src( $attachment_id, 'large' );
      $outputimagesrc = 'background:url('.$image_attributes[0].');';
      

      $str .= '

        <div style="box-sizing:border-box;" class="grid '.$atts['post_grid_columns'].' percentage nicdark_padding10 nicdark_masonry_item">
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow center"> 
                <div style="'.$outputimagesrc.' background-size:cover;" class="nicdark_archive1 nicdark_radius_top">
                    <div class="nicdark_filter '.$postcolor.' nicdark_radius_top">
                        <div class="nicdark_space60"></div>
                        '.$outputpricecurrency.'
                        <div class="nicdark_space60"></div>
                    </div>
                </div>
                <div class="nicdark_textevidence nicdark_bg_greydark">
                    <h4 class="white nicdark_margin20">'.$titlepost.'</h4>
                </div>
                <div class="nicdark_margin20">
                    <p>'.$excerptpost.'</p>
                    
                    '.$outputbutton.'
                </div>
            </div>

        </div>

      ';

endwhile;


$str .= '</div>';