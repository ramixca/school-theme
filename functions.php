<?php
/**
 * fwd-school-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fwd-school-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fwd-school-theme, use a find and replace
		* to change 'school' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'school' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'school_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'school_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function school_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'school_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'school_content_width', 0 );
//from fwd starter theme
function school_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'school_content_width', 960 );
}
add_action( 'after_setup_theme', 'school_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'school' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'school_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_scripts() {
	wp_enqueue_style( 'school-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_scripts' );

/**
 * Enqueue scripts and styles.
 */


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Change excerpt length to 20 characters
function fwd_excerpt_lenght($length) {
	return 20;
}

add_filter('excerpt_length', 'fwd_excerpt_lenght', 999 );

//Change the excerpt more to a link
function fwd_excerpt_more ($more) {
		$more = '...<a class="read-more" href="'. esc_url(get_permalink()) .'">Continue Reading about '. get_the_title().'</a>';
		return $more;
}

add_filter('excerpt_more', 'fwd_excerpt_more');

/*
CUSTOM POST TYPE & TAXONOMY
*/

//register CPT
    function staff_custom_post_types() {
        $labels = array(
            'name'               => _x( 'Staff', 'post type general name'  ),
            'singular_name'      => _x( 'Staff', 'post type singular name'  ),
            'menu_name'          => _x( 'Staff', 'admin menu'  ),
            'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'Staff' ),
            'add_new_item'       => __( 'Add New Staff' ),
            'new_item'           => __( 'New Staff' ),
            'edit_item'          => __( 'Edit Staff' ),
            'view_item'          => __( 'View Staff'  ),
            'all_items'          => __( 'All Staff' ),
            'search_items'       => __( 'Search Staff' ),
            'parent_item_colon'  => __( 'Parent Staff:' ),
            'not_found'          => __( 'No Staff found.' ),
            'not_found_in_trash' => __( 'No Staff found in Trash.' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'show_in_rest'       => true,        
            'query_var'          => true,
            'has_archive'        => true,
            'rewrite'            => array( 'slug' => 'staff' ),
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-archive',
            'supports'           => array( 'title' ),
        );
        register_post_type( 'school-staff', $args );
    }
    add_action( 'init', 'staff_custom_post_types' );
    //Custom Post Type for Staff


/*
TAXONOMIES
*/
	function faculty_staff_taxonomy() {
		// Add Faculty Category taxonomy
		$labels = array(
			'name'              => _x( 'Faculty Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Faculty Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Faculty Categories' ),
			'all_items'         => __( 'All Faculty Category' ),
			'parent_item'       => __( 'Parent Faculty Category' ),
			'parent_item_colon' => __( 'Parent Faculty Category:' ),
			'edit_item'         => __( 'Edit Faculty Category' ),
			'view_item'         => __( 'View Faculty Category' ),
			'update_item'       => __( 'Update FacultyCategory' ),
			'add_new_item'      => __( 'Add New Faculty Category' ),
			'new_item_name'     => __( 'New Faculty Category Name' ),
			'menu_name'         => __( 'Faculty Category' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_in_nav_menu'  => true,
			'show_in_rest'      => true,        
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'faculty' ),
		);
		register_taxonomy( 'faculty_staff_categories', array( 'school-staff' ), $args );
	}
	add_action( 'init', 'faculty_staff_taxonomy');


	function administrative_staff_taxonomy() {
		// Add Administrtive Category taxonomy
		$labels = array(
			'name'              => _x( 'Administrative Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Administrative Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Administrative Categories' ),
			'all_items'         => __( 'All Administrative Category' ),
			'parent_item'       => __( 'Parent Administrative Category' ),
			'parent_item_colon' => __( 'Parent Administrative Category:' ),
			'edit_item'         => __( 'Edit Administrative Category' ),
			'view_item'         => __( 'View Administrative Category' ),
			'update_item'       => __( 'Update Administrative Category' ),
			'add_new_item'      => __( 'Add New Administrative Category' ),
			'new_item_name'     => __( 'New Administrative Category Name' ),
			'menu_name'         => __( 'Administrative Category' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_in_nav_menu'  => true,
			'show_in_rest'      => true,        
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'administrative' ),
		);
		register_taxonomy( 'administrative_staff_categories', array( 'school-staff' ), $args );
	}
	add_action( 'init', 'administrative_staff_taxonomy');
    

    function school_rewrite_flush() {
        staff_custom_post_types();
		faculty_staff_taxonomy();
		administrative_staff_taxonomy();
        flush_rewrite_rules();
        
    }
    add_action( 'after_switch_theme', 'fwd_rewrite_flush' );


	?>