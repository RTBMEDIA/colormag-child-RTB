<?php
// Add your custom functions here

 add_action( 'wp_enqueue_scripts', 'colormag_enqueue_styles', 15 );
  function colormag_enqueue_styles() {
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
     wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
         array('parent-style')
     );
}

// Remove html comments
    function disable_html_in_comments()
    {
        global $allowedtags;
        $allowedtags = array();
    }
    disable_html_in_comments();
// End remove html comments

// Remove url comments
add_filter('comment_form_default_fields', 'colormag_unset_url_field');
function colormag_unset_url_field($fields){
	if(isset($fields['url']))
		unset($fields['url']);
	return $fields;
}
// END Remove url comments

// REMOVE emoji

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 

// END REMOVES emoji

// REMOVE toobar when viewing site as 
add_filter('show_admin_bar', '__return_false');
// END REMOVE toobar when viewing site as 










?>