<?php


///////////////////////////////////////////////////COURSES///////////////////////////////////////////////////////////////
function nicdark_create_post_type_courses() {
    register_post_type('courses',
        array(
            'labels' => array(
                'name' => __('BK Courses', 'nicdark-shortcodes'),
                'singular_name' => __('Course', 'nicdark-shortcodes')
            ),
            'public' => true,
            'has_archive' => true,
            'exclude_from_search' => true,
            'rewrite' => array('slug' => 'courses'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
        )
    );
}
add_action('init', 'nicdark_create_post_type_courses');

//add taxonomy
function nicdark_create_taxonomy_courses() {
    register_taxonomy(
        'typology-course',
        'post',
        array(
            'label'=>__('COURSES', 'nicdark-shortcodes'),
            'rewrite'=>array('slug'=>'typologies-courses'),
            'hierarchical'=>true
        )
    );
}
add_action('init','nicdark_create_taxonomy_courses');

//add taxonomy to custom post
function nicdark_add_taxonomy_courses(){ register_taxonomy_for_object_type('typology-course', 'courses'); }
add_action('init', 'nicdark_add_taxonomy_courses');

//remove taxonomy from menu
function nicdark_remove_taxonomy_courses(){ remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=typology-course'); }
add_action('admin_menu','nicdark_remove_taxonomy_courses');