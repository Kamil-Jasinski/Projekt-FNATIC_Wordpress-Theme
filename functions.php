<?php 

//STYLE
function projectFnatic_resources() {
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('slickstyle', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('slicktheme', get_template_directory_uri() . '/css/slick-theme.css');
}
add_action('wp_enqueue_scripts', 'projectFnatic_resources');

//SKRYPTY
function projectFnatic_scripts() {
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.0', true);
    
    wp_enqueue_script( 'js', get_template_directory_uri() . '/js/js.js', array('jquery'), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'projectFnatic_scripts');

// Include Custom jQuery
function shapeSpace_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');


//MENU REGISTER
function projectFnatic_theme_setup() {
    //Navigation menus
      register_nav_menus( array( 
        'header' => 'Header menu', 
        'footer' => 'Footer menu' 
      ) );
    
    //Add featured image support
      add_theme_support('post-thumbnails');
    
 }
add_action( 'after_setup_theme', 'projectFnatic_theme_setup' );


// Include better comments file from a Parent theme
require_once get_parent_theme_file_path( '/better-comments.php' );






///WIDGETS
function pf_widgets_init() {
    
    register_sidebar( array(
        'name' => 'About Us Video',
        'id' => 'about_us_video',  
        'description' => 'It is an widget witch is placed on the bottom of about us section. It is prepered to show video without title.', 
        'before_widget' => '',  
        'after_widget' => '',  
    ));
    
    register_sidebar( array(
        'name' => 'Sample widget title',
        'id' => 'sample_widget_id1'  
    ));
    
        register_sidebar( array(
        'name' => 'Sample widget title 2',
        'id' => 'sample_widget_id2'  
    ));
    

}
add_action('widgets_init', 'pf_widgets_init');

// Replaces the excerpt "Read More" text by empty space.
function post_read_more_link() {
    return '';
}
add_filter( 'the_content_more_link', 'post_read_more_link' );

//Parent Category First
function show_categories() {
$categories = get_the_category( get_the_ID() );
if( $categories ){
    $output = "";
    $all_posts = 'View all posts in %s';

    //display all the top-level categories first + add space
    foreach ($categories as $category) {
        if( !$category->parent ){
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $all_posts ), $category->name ) ) . '" >' . $category->name.'</a>,' . " ";
        }
    }

    //now, display all the child categories
    foreach ($categories as $category) {
        if( $category->parent ){
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $all_posts ), $category->name ) ) . '" >' . $category->name.'</a>,';
        }
    }

    echo trim( $output, "," );
}

    
};

//Custom Header Video
function pf_video_customizer( $wp_customize ) {



    //Video Section
    $wp_customize->add_section("Videosection", array(
        "title" => __("Pick Your Header Video", "customizer_ads_sections"),
        "priority" => 20,
    ));
    //Video Settings
    $wp_customize->add_setting( 'video_upload',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'absint',
                 'type' => 'theme_mod',
       )
    );
    //Video Controls
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'video_upload',
       array(
          'label' => __( 'Header Video' ),
          'description' => esc_html__( 'Upload your header video, otherwise header section will show only Header Image.' ),
          'section' => 'Videosection',
          'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
          'button_labels' => array( // Optional
             'select' => __( 'Select video' ),
             'change' => __( 'Change video' ),
             'default' => __( 'Default' ),
             'remove' => __( 'Remove' ),
             'placeholder' => __( 'No video selected' ),
             'frame_title' => __( 'Select video' ),
             'frame_button' => __( 'Choose video' ),
// https://developer.wordpress.org/reference/classes/wp_customize_media_control/get_default_button_labels/
          )
       )
    ) );



}
add_action( 'customize_register', 'pf_video_customizer' );

//Custom Header Image
function pf_image_customizer( $wp_customize ) {



    //Video Section
    $wp_customize->add_section("imagesection", array(
        "title" => __("Pick Your Header image", "customizer_ads_sections"),
        "priority" => 21,
    ));
    //image Settings
    $wp_customize->add_setting( 'image_upload',
       array(
          'default' => '',
          'transport' => 'refresh',
          'sanitize_callback' => 'absint',
                 'type' => 'theme_mod',
       )
    );
    //image Controls
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_upload',
       array(
          'label' => __( 'Header image' ),
          'description' => esc_html__( 'The Header Image will appear if page is view on mobile device or you didnt upload Header Video. It is IMPORTANT to upload Header Image, otherwise header section will have only black backgroud.' ),
          'section' => 'imagesection',
          'mime_type' => 'image',  // Required. Can be image, audio, image, application, text
          'button_labels' => array( // Optional
             'select' => __( 'Select image' ),
             'change' => __( 'Change image' ),
             'default' => __( 'Default' ),
             'remove' => __( 'Remove' ),
             'placeholder' => __( 'No image selected' ),
             'frame_title' => __( 'Select image' ),
             'frame_button' => __( 'Choose image' ),
// https://developer.wordpress.org/reference/classes/wp_customize_media_control/get_default_button_labels/
          )
       )
    ) );



}
add_action( 'customize_register', 'pf_image_customizer' );

//Custom Socials links
function pf_socials_callout ($wp_customize) {
    //Socials Section
    $wp_customize->add_section('pf_socials_callout_section', array(
    'title' => 'Socials Links',
        "priority" => 22
    ));
    
    // Facebook Link
    $wp_customize->add_setting('pf_socials_callout_facebook', array(
    'default' => 'Facebook link goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_socials_callout_facebook_control', array(
    'label' => 'Put facebook link below:',
    'section' => 'pf_socials_callout_section',
    'settings' => 'pf_socials_callout_facebook',
    'description' => esc_html__( 'Insert full website address, otherwise the link will not work. ' )
    
    )));
    
    // Instagram Link
    $wp_customize->add_setting('pf_socials_callout_instagram', array(
    'default' => 'Instagram link goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_socials_callout_instagram_control', array(
    'label' => 'Put instagram link below:',
    'section' => 'pf_socials_callout_section',
    'settings' => 'pf_socials_callout_instagram',
    'description' => esc_html__( 'Insert full website address, otherwise the link will not work. ' )
    
    )));
    
    // Youtube Link
    $wp_customize->add_setting('pf_socials_callout_youtube', array(
    'default' => 'YouTube link goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_socials_callout_youtube_control', array(
    'label' => 'Put youtube link below:',
    'section' => 'pf_socials_callout_section',
    'settings' => 'pf_socials_callout_youtube',
    'description' => esc_html__( 'Insert full website address, otherwise the link will not work. ' )
    
    )));
    
    
};
add_action('customize_register','pf_socials_callout');

//Custom Slogan textarea
function pf_slogan_callout ($wp_customize) {
//Article
    $wp_customize->add_section('pf_slogan_callout_section', array(
    'title' => 'Slogan',
        "priority" => 23
    ));
    
    // PART 1
    $wp_customize->add_setting('pf_slogan_callout_part1', array(
    'default' => 'First slogan line goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_slogan_callout_part1_control', array(
    'label' => 'Part 1:',
    'section' => 'pf_slogan_callout_section',
    'settings' => 'pf_slogan_callout_part1',
    'type' => 'textarea'
    
    )));
    
    // PART 2
    $wp_customize->add_setting('pf_slogan_callout_part2', array(
    'default' => 'Second slogan line goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_slogan_callout_part2_control', array(
    'label' => 'Part 2:',
    'section' => 'pf_slogan_callout_section',
    'settings' => 'pf_slogan_callout_part2',
    'type' => 'textarea'
    
    )));
    
    
};
add_action('customize_register','pf_slogan_callout');

//Custom About Us Title
function pf_about_us_callout ($wp_customize) {
//Article
    $wp_customize->add_section('pf_article_callout_section', array(
    'title' => 'About Us',
        "priority" => 24
    ));
    
    // TITLE
    $wp_customize->add_setting('pf_article1_callout_title', array(
    'default' => 'The Title'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_article1_callout_title_control', array(
    'label' => 'Title: ',
    'section' => 'pf_article_callout_section',
    'settings' => 'pf_article1_callout_title',
    'type' => 'textarea'
    
    )));
    
    // PART 1
    $wp_customize->add_setting('pf_article1_callout_part1', array(
    'default' => 'Part one of article content goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_article1_callout_part1_control', array(
    'label' => 'Part 1:',
    'section' => 'pf_article_callout_section',
    'settings' => 'pf_article1_callout_part1',
    'type' => 'textarea'
    
    )));
    
    // PART 2
    $wp_customize->add_setting('pf_article1_callout_part2', array(
    'default' => 'Part two of article content goes here...'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_article1_callout_part2_control', array(
    'label' => 'Part 2:',
    'section' => 'pf_article_callout_section',
    'settings' => 'pf_article1_callout_part2',
    'type' => 'textarea'
    
    )));
    
    
};
add_action('customize_register','pf_about_us_callout');

//Custom Title, Name, Function, Description and Photo for Players 1-6
function pf_player_callout ($wp_customize) {
    
//TITLE
    $wp_customize->add_section('pf_players_title_section', array(
    'title' => 'Players Section Title',
        "priority" => 25
    ));
    
    $wp_customize->add_setting('pf_players_title', array(
    'default' => 'The Title'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_players_title_control', array(
    'label' => 'Title:',
    'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.'),
    'section' => 'pf_players_title_section',
    'settings' => 'pf_players_title'
    
    )));
    
//PLAYER 1
    $wp_customize->add_section('pf_player1_callout_section', array(
    'title' => '- Player 1',
        "priority" => 26
    ));
    // NAME
    $wp_customize->add_setting('pf_player1_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player1_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player1_callout_section',
    'settings' => 'pf_player1_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player1_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player1_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player1_callout_section',
    'settings' => 'pf_player1_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player1_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player1_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player1_callout_section',
    'settings' => 'pf_player1_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player1_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player1_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player1_callout_section',
    'settings' => 'pf_player1_callout_image'
    
    ))); // /PLAYER 1
    
//PLAYER 2
    $wp_customize->add_section('pf_player2_callout_section', array(
    'title' => '- Player 2',
        "priority" => 27
    ));
    
    // NAME
    $wp_customize->add_setting('pf_player2_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player2_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player2_callout_section',
    'settings' => 'pf_player2_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player2_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player2_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player2_callout_section',
    'settings' => 'pf_player2_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player2_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player2_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player2_callout_section',
    'settings' => 'pf_player2_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player2_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player2_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player2_callout_section',
    'settings' => 'pf_player2_callout_image'
    
    ))); // /PLAYER 2
    

//PLAYER 3
    $wp_customize->add_section('pf_player3_callout_section', array(
    'title' => '- Player 3',
        "priority" => 28
    ));
    
    // NAME
    $wp_customize->add_setting('pf_player3_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player3_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player3_callout_section',
    'settings' => 'pf_player3_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player3_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player3_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player3_callout_section',
    'settings' => 'pf_player3_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player3_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player3_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player3_callout_section',
    'settings' => 'pf_player3_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player3_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player3_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player3_callout_section',
    'settings' => 'pf_player3_callout_image'
    
    ))); // /PLAYER 3
    
    
//PLAYER 4
    $wp_customize->add_section('pf_player4_callout_section', array(
    'title' => '- Player 4',
        "priority" => 29
    ));
    
    // NAME
    $wp_customize->add_setting('pf_player4_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player4_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player4_callout_section',
    'settings' => 'pf_player4_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player4_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player4_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player4_callout_section',
    'settings' => 'pf_player4_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player4_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player4_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player4_callout_section',
    'settings' => 'pf_player4_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player4_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player4_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player4_callout_section',
    'settings' => 'pf_player4_callout_image'
    
    ))); // /PLAYER 4
    
    
//PLAYER 5
    $wp_customize->add_section('pf_player5_callout_section', array(
    'title' => '- Player 5',
        "priority" => 30
    ));
    
    // NAME
    $wp_customize->add_setting('pf_player5_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player5_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player5_callout_section',
    'settings' => 'pf_player5_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player5_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player5_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player5_callout_section',
    'settings' => 'pf_player5_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player5_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player5_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player5_callout_section',
    'settings' => 'pf_player5_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player5_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player5_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player5_callout_section',
    'settings' => 'pf_player5_callout_image'
    
    ))); // /PLAYER 5
    
    
//PLAYER 6
    $wp_customize->add_section('pf_player6_callout_section', array(
    'title' => '- Player 6',
        "priority" => 31
    ));
    
    // NAME
    $wp_customize->add_setting('pf_player6_callout_name', array(
    'default' => 'Name'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player6_callout_name_control', array(
    'label' => 'Player name:',
    'section' => 'pf_player6_callout_section',
    'settings' => 'pf_player6_callout_name'
    
    )));
    
    // FUNCTION
    $wp_customize->add_setting('pf_player6_callout_function', array(
    'default' => 'Function'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player6_callout_function_control', array(
    'label' => 'Player function:',
    'section' => 'pf_player6_callout_section',
    'settings' => 'pf_player6_callout_function'
    
    )));
    
    // ABOUT
    $wp_customize->add_setting('pf_player6_callout_about', array(
    'default' => 'About Player'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pf_player6_callout_about_control', array(
    'label' => 'About Player: ',
    'section' => 'pf_player6_callout_section',
    'settings' => 'pf_player6_callout_about',
    'type' => 'textarea'
    ))); 
        
    // IMAGE
    $wp_customize->add_setting('pf_player6_callout_image', array(
    'default' => 'Player Photo'
    ));
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'pf_player6_callout_image_control', array(
    'label' => 'Photo: ',
    'section' => 'pf_player6_callout_section',
    'settings' => 'pf_player6_callout_image'
    
    ))); // /PLAYER 6
    
};
add_action('customize_register','pf_player_callout');
    












