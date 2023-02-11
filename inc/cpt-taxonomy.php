<?php
    function school_register_custom_post_types() {
        $labels = array(
            'name'               => _x( 'Staff', 'post type general name' ),
            'singular_name'      => _x( 'Staff', 'post type singular name'),
            'menu_name'          => _x( 'Staff', 'admin menu' ),
            'name_admin_bar'     => _x( 'Staf', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'staff' ),
            'add_new_item'       => __( 'Add New staff' ),
            'new_item'           => __( 'New Staff' ),
            'edit_item'          => __( 'Edit Staff' ),
            'view_item'          => __( 'View Staff' ),
            'all_items'          => __( 'All Staff' ),
            'search_items'       => __( 'Search Staff' ),
            'parent_item_colon'  => __( 'Parent Staff:' ),
            'not_found'          => __( 'No staff found.' ),
            'not_found_in_trash' => __( 'No staff found in Trash.' ),
            'archives'           => __( 'Staff Archives'),
            'insert_into_item'   => __( 'Insert into staff'),
            'uploaded_to_this_item' => __( 'Uploaded to this staff'),
            'filter_item_list'   => __( 'Filter staff list'),
            'items_list_navigation' => __( 'Staff list navigation'),
            'items_list'         => __( 'Staff list'),
            'featured_image'     => __( 'Staff featured image'),
            'set_featured_image' => __( 'Set staff featured image'),
            'remove_featured_image' => __( 'Remove staff featured image'),
            'use_featured_image' => __( 'Use as featured image'),
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
    add_action( 'init', 'school_register_custom_post_types' );
    //Custom Post Type for Staff


    