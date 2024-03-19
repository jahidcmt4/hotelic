<?php
/**
 * hotelic Theme Customizer
 *
 * @package hotelic
 *
 *
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function hotelic_customize_register($wp_customize)
{
    $prefix = "travelfic_customizer_settings_";
    class Hotelic_Separator_Control extends WP_Customize_Control
    {
        public function render_content()
        {
            ?>
			 <br><hr>
			<?php
        }
    }
    class Hotelic_Info_Control extends WP_Customize_Control {
        public function render_content() {
            ?>
            <label style="font-size: 14px;">
                <span style="font-weight:bold"><?php echo esc_html( $this->label ); ?>:</span>                
                <span><?php echo esc_html( $this->description ); ?></span>
            </label>
            <?php
        }
    }


    
    $wp_customize->get_setting("blogname")->transport = "postMessage";
    $wp_customize->get_setting("blogdescription")->transport = "postMessage";
    $wp_customize->get_setting("header_textcolor")->transport = "postMessage";
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial("blogname", [
            "selector" => ".site-title a",
            "render_callback" => "hotelic_customize_partial_blogname",
        ]);
        $wp_customize->selective_refresh->add_partial("blogdescription", [
            "selector" => ".site-description",
            "render_callback" => "hotelic_customize_partial_blogdescription",
        ]);
    }
    
    /*
     * Customizer settings start
     */
    // hotelic panel
    $wp_customize->add_panel("travelfic_customizer_settings", [
        "title" => esc_html__("Hotelic Settings", "hotelic"),
        "priority" => 100,
    ]);

    /*----------------------------------------
			Customizer section -- Header
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_header", [
        "title" => esc_html__("Header Builder", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    /*---- Header fields ------*/

    //Sticky Header
    $wp_customize->add_setting($prefix . "stiky_header", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'disabled'
    ]);
    $wp_customize->add_control($prefix . "stiky_header", [
        "label" => esc_html__("Sticky Header", "hotelic"),
        "section" => "travelfic_customizer_header",
        "type" => "radio",
        "choices" => [
            "enabled" => esc_html__("Enabled", "hotelic"),
            "disabled" => esc_html__("Disabled", "hotelic"),
        ],
        'priority' => 14,
    ]);

    //Sticky Header Background color
    $wp_customize->add_setting($prefix . "stiky_header_bg_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#fff'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_bg_color", [
        "label" => esc_html__("Sticky Header Background", "hotelic"),
        "section" => "travelfic_customizer_header",
        "type" => "color",
        'priority' => 15,
    ]);

    //Sticky Header Background Blur
    $wp_customize->add_setting($prefix . "stiky_header_blur", [
        "transport" => "refresh",
        "sanitize_callback" => "absint",
        "default" => '24'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_blur", [
        "label" => esc_html__("Sticky Header Background blur", "hotelic"),
        "section" => "travelfic_customizer_header",
        "type" => "number",
        'priority' => 16,
    ]);

    //Sticky Header Menu text Color
    $wp_customize->add_setting($prefix . "stiky_header_menu_text_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#000'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_menu_text_color", [
        "label" => esc_html__("Sticky Header Menu Color", "hotelic"),
        "section" => "travelfic_customizer_header",
        "type" => "color",
        'priority' => 17,
    ]);

    //Turn Off Transparent Header
    $wp_customize->add_setting($prefix . "transparent_header", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'disabled'
    ]);
    $wp_customize->add_control($prefix . "transparent_header", [
        "label" => esc_html__("Transparent Header", "hotelic"),
        "section" => "travelfic_customizer_header",
        "type" => "radio",
        "choices" => [
            "enabled" => esc_html__("Enabled", "hotelic"),
            "disabled" => esc_html__("Disabled", "hotelic"),
        ],
        'priority' => 18,
    ]);

    /*----------------------------------------
			Customizer section -- Footer
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_footer", [
        "title" => esc_html__("Footer Builder", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Footer Background Color
    $wp_customize->add_setting($prefix . "footer_bg_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#fff'
    ]);
    $wp_customize->add_control($prefix . "footer_bg_color", [
        "label" => esc_html__("Footer Background Color", "hotelic"),
        "section" => "travelfic_customizer_footer",
        "type" => "color",
    ]);

    //Footer Text Color
    $wp_customize->add_setting($prefix . "footer_text_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#222'
    ]);
    $wp_customize->add_control($prefix . "footer_text_color", [
        "label" => esc_html__("Footer Text Color", "hotelic"),
        "section" => "travelfic_customizer_footer",
        "type" => "color",
    ]);

    /*----------------------------------------
			Typography section -- Typography
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_typography", [
        "title" => esc_html__("Typography", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Heading Font Family
    $wp_customize->add_setting($prefix . "heading_font_family", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_select",
    ]);
    $wp_customize->add_control($prefix . "heading_font_family", [
        "label" => esc_html__("Heading Font Family", "hotelic"),
        "section" => "travelfic_customizer_typography",
        "type" => "select",
        'choices' => function_exists( 'hotelic_google_fonts_list' ) ? hotelic_google_fonts_list() : ['']
    ]);

    //Body Font Family
    $wp_customize->add_setting($prefix . "body_font_family", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_select",
    ]);
    $wp_customize->add_control($prefix . "body_font_family", [
        "label" => esc_html__("Body Font Family", "hotelic"),
        "section" => "travelfic_customizer_typography",
        "type" => "select",
        'choices' => function_exists( 'hotelic_google_fonts_list' ) ? hotelic_google_fonts_list() : ['']
    ]);
    
    /*----------------------------------------
			Customizer section -- Page
	------------------------------------------*/
    $wp_customize->add_section("hotelic_customizer_page", [
        "title" => esc_html__("Page", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Page Sidebar
    $wp_customize->add_setting($prefix . "page_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "page_sidebar", [
        "label" => esc_html__("Page Sidebar", "hotelic"),
        "section" => "hotelic_customizer_page",
        "type" => "radio",
        "choices" => [
            'left' => esc_html__("Left", "hotelic"),
            'right' => esc_html__("Right", "hotelic"),
            'none' => esc_html__("None", "hotelic"),
        ],
    ]);

    //Page Hero Banner
    $wp_customize->add_setting($prefix . "page_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "page_banner", [
        "label" => esc_html__("Page Title style", "hotelic"),
        "section" => "hotelic_customizer_page",
        "type" => "radio",
        "choices" => [
            'banner' => esc_html__("Banner", "hotelic"),
            'title' => esc_html__("Title only", "hotelic"),
        ],
    ]);


    /*----------------------------------------
			Customizer section -- Blog
	------------------------------------------*/
    $wp_customize->add_section("hotelic_customizer_blog", [
        "title" => esc_html__("Blogs", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Page Sidebar
    $wp_customize->add_setting($prefix . "blog_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'none'
    ]);

    $wp_customize->add_control($prefix . "blog_sidebar", [
        "label" => esc_html__("Blog Sidebar", "hotelic"),
        "section" => "hotelic_customizer_blog",
        "type" => "radio",
        "choices" => [
            'left' => esc_html__("Left", "hotelic"),
            'right' => esc_html__("Right", "hotelic"),
            'none' => esc_html__("None", "hotelic"),
        ],
    ]);

    //Blogs Page Banner
    $wp_customize->add_setting($prefix . "blog_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "blog_banner", [
        "label" => esc_html__("Blog page title style", "hotelic"),
        "section" => "hotelic_customizer_blog",
        "type" => "radio",
        "choices" => [
            'banner' => esc_html__("Banner", "hotelic"),
            'title'  => esc_html__("Title", "hotelic"),            
            'empty'  => esc_html__("No title", "hotelic"),
        ],
    ]);

    
    /*----------------------------------------
			Customizer section -- Blog details
	------------------------------------------*/
    $wp_customize->add_section("hotelic_customizer_blog_details", [
        "title" => esc_html__("Blog details", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Details Sidebar
    $wp_customize->add_setting($prefix . "single_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "single_sidebar", [
        "label" => esc_html__("Blog Details Sidebar", "hotelic"),
        "section" => "hotelic_customizer_blog_details",
        "type" => "radio",
        "choices" => [
            'left' => esc_html__("Left", "hotelic"),
            'right' => esc_html__("Right", "hotelic"),
            'none' => esc_html__("None", "hotelic"),
        ],
    ]);


    /*----------------------------------------
			Customizer section -- Archive
	------------------------------------------*/
    $wp_customize->add_section("hotelic_customizer_archive_page", [
        "title" => esc_html__("Archive", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    // Control - 
    $wp_customize->add_setting($prefix . "archive_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "archive_sidebar", [
        "label" => esc_html__("Archive Page Sidebar", "hotelic"),
        "section" => "hotelic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            'left' => esc_html__("Left", "hotelic"),
            'right' => esc_html__("Right", "hotelic"),
            'none' => esc_html__("None", "hotelic"),
        ],
    ]);

    //Archive Page Banner
    $wp_customize->add_setting($prefix . "archive_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "archive_banner", [
        "label" => esc_html__("Archive page title style", "hotelic"),
        "section" => "hotelic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            'banner' => esc_html__("Banner", "hotelic"),
            'title'  => esc_html__("Title", "hotelic"),            
            'empty'  => esc_html__("No title", "hotelic"),
        ],
    ]);

    //Archive Page Transparent Header
    $wp_customize->add_setting($prefix . "archive_transparent_header", [
        "transport" => "refresh",
        "sanitize_callback" => "hotelic_sanitize_radio",
        "default" => 'disabled'
    ]);

    $wp_customize->add_control($prefix . "archive_transparent_header", [
        "label" => esc_html__("Archive Page Transparent Header", "hotelic"),
        "section" => "hotelic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            "enabled" => esc_html__("Enabled", "hotelic"),
            "disabled" => esc_html__("Disabled", "hotelic"),
        ],
    ]);
    
    //Background Image
    $wp_customize->add_setting($prefix . "tf_archive_header_img", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_template_directory_uri() . '/assets/img/page_header.png'
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            $prefix . "tf_archive_header_img",
            [
                "label" => esc_html__("Background Image", "hotelic"),
                "section" => "hotelic_customizer_archive_page",
                "settings" => $prefix . "tf_archive_header_img",
            ]
        )
    );

    
    /*----------------------------------------
			Customizer section -- 404
	------------------------------------------*/
    $wp_customize->add_section("hotelic_customizer_404_Page", [
        "title" => esc_html__("404 Page", "hotelic"),
        "panel" => "travelfic_customizer_settings",
    ]);
    //404 Page Title
    $wp_customize->add_setting($prefix . "404_title", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'Oops! page not found'
    ]);

    $wp_customize->add_control($prefix . "404_title", [
        "label" => esc_html__("404 Page Title", "hotelic"),
        "section" => "hotelic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Page Sub Title
    $wp_customize->add_setting($prefix . "404_sub_title", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'The page you requested could not found or may be deleted from server.'
    ]);
    $wp_customize->add_control($prefix . "404_sub_title", [
        "label" => esc_html__("404 Page Sub Title", "hotelic"),
        "section" => "hotelic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Button Label
    $wp_customize->add_setting($prefix . "404_button_label", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'Back to home'
    ]);
    $wp_customize->add_control($prefix . "404_button_label", [
        "label" => esc_html__("404 Button Label", "hotelic"),
        "section" => "hotelic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Button URL
    $wp_customize->add_setting($prefix . "404_button_url", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_home_url()
    ]);
    $wp_customize->add_control($prefix . "404_button_url", [
        "label" => esc_html__("404 Button URL", "hotelic"),
        "section" => "hotelic_customizer_404_Page",
        "type" => "url",
    ]);

    //Background Image
    $wp_customize->add_setting($prefix . "tf_404_img", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_template_directory_uri() . "/assets/img/page-404.png"
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, $prefix . "tf_404_img", [
            "label" => esc_html__("Background Image", "hotelic"),
            "section" => "hotelic_customizer_404_Page",
            "settings" => $prefix . "tf_404_img",
        ])
    );

    function hotelic_sanitize_radio( $input, $setting ){

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }
    function hotelic_sanitize_select( $input, $setting ){

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_text_field($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }
}
add_action("customize_register", "hotelic_customize_register");
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotelic_customize_partial_blogname()
{
    bloginfo("name");
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotelic_customize_partial_blogdescription()
{
    bloginfo("description");
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotelic_customize_preview_js() {
	wp_enqueue_script( 'hotelic-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), HOTELIC_VERSION, true );
}
add_action( 'customize_preview_init', 'hotelic_customize_preview_js' );