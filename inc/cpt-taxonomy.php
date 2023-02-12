<?php
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


    

    function school_rewrite_flush() {
        staff_custom_post_types();
        // school_register_taxonomies();
        flush_rewrite_rules();
        
    }
    add_action( 'after_switch_theme', 'fwd_rewrite_flush' );