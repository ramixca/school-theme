<?php
// CPT for Staff
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

//register CPT for Students
function students_custom_post_types() {
	$labels = array(
		'name'               => _x( 'Student', 'post type general name'  ),
		'singular_name'      => _x( 'Student', 'post type singular name'  ),
		'menu_name'          => _x( 'Student', 'admin menu'  ),
		'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Student' ),
		'add_new_item'       => __( 'Add New Student' ),
		'new_item'           => __( 'New Student' ),
		'edit_item'          => __( 'Edit Student' ),
		'view_item'          => __( 'View Student'  ),
		'all_items'          => __( 'All Student' ),
		'search_items'       => __( 'Search Student' ),
		'parent_item_colon'  => __( 'Parent Student:' ),
		'not_found'          => __( 'No Student found.' ),
		'not_found_in_trash' => __( 'No Student found in Trash.' ),
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
		'rewrite'            => array( 'slug' => 'student' ),
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-heart',
		'supports'           => array( 'title' ),
		// 'template_lock'      => 'all'
	);
	register_post_type( 'school-students', $args );
}
add_action( 'init', 'students_custom_post_types' );

/*
TAXONOMIES
*/
	// Add Faculty Category taxonomy
	function faculty_staff_taxonomy() {
		
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

	// Add Administrative Category taxonomy
	function administrative_staff_taxonomy() {
		
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


    // Add Designer Category taxonomy
	function designer_student_taxonomy() {
	
		$labels = array(
			'name'              => _x( 'Designer Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Designer Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Designer Categories' ),
			'all_items'         => __( 'All Designer Category' ),
			'parent_item'       => __( 'Parent Designer Category' ),
			'parent_item_colon' => __( 'Parent Designer Category:' ),
			'edit_item'         => __( 'Edit Designer Category' ),
			'view_item'         => __( 'View Designer Category' ),
			'update_item'       => __( 'Update Designer Category' ),
			'add_new_item'      => __( 'Add New Designer Category' ),
			'new_item_name'     => __( 'New Designer Category Name' ),
			'menu_name'         => __( 'Designer Category' ),
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
			'rewrite'           => array( 'slug' => 'designer' ),
		);
		register_taxonomy( 'designer_student_categories', array( 'school-students' ), $args );
	}
	add_action( 'init', 'designer_student_taxonomy');


	    // Add Developer Category taxonomy
		function developer_student_taxonomy() {
	
			$labels = array(
				'name'              => _x( 'Developer Categories', 'taxonomy general name' ),
				'singular_name'     => _x( 'Developer Category', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Developer Categories' ),
				'all_items'         => __( 'All Developer Category' ),
				'parent_item'       => __( 'Parent Developer Category' ),
				'parent_item_colon' => __( 'Parent Developer Category:' ),
				'edit_item'         => __( 'Edit Developer Category' ),
				'view_item'         => __( 'View Developer Category' ),
				'update_item'       => __( 'Update Developer Category' ),
				'add_new_item'      => __( 'Add New Developer Category' ),
				'new_item_name'     => __( 'New Developer Category Name' ),
				'menu_name'         => __( 'Developer Category' ),
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
				'rewrite'           => array( 'slug' => 'developer' ),
			);
			register_taxonomy( 'developer_student_categories', array( 'school-students' ), $args );
		}
		add_action( 'init', 'developer_student_taxonomy');


    //Rewrite flush 
    function school_rewrite_flush() {
        staff_custom_post_types();
		faculty_staff_taxonomy();
		administrative_staff_taxonomy();
        designer_student_taxonomy();
        developer_student_taxonomy();
        flush_rewrite_rules();
        
    }
    add_action( 'after_switch_theme', 'fwd_rewrite_flush' );


    ?>