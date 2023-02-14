<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school-theme
 */

get_header();
?>

<main id="primary" class="site-main">
	 
<?php
    while ( have_posts()):
        the_post();
        the_title();
              
        get_template_part('template-parts/content','page');
    
        ?>

		
	 <header class="page-header">
			 <?php
			//  the_archive_title( '<h1 class="page-title">', '</h1>' );
			 the_archive_description( '<div class="archive-description">', '</div>' );
			 ?>
		 </header><!-- .page-header -->
	 
	 <article id="post-<?php the_ID(); ?>" <?php post_class();?>>
		 <div class="entry-content">
		 

			 <?php
			 $terms = get_terms(
						 array(
							 'taxonomy' => 'staff_categories',
						 )
					  );

			 if ($terms && ! is_wp_error( $terms )) {
				 foreach ( $terms as $term) {
					 $args = array(
						 'post_type'      => 'school-staff',
						 'posts_per_page' => -1,
						 'orderby' => 'title',
						 'tax_query'  => array(
							 array(
								 'taxonomy'  => 'staff_categories',
								 'field'     => 'slug',
								 'terms'     => $term->slug,
							 )
						 )

					 );

					 $query = new WP_Query($args);
						 echo "<h2>" .esc_html($term->name). "</h2>";
					 if ( $query -> have_posts() ) {
						 while ($query -> have_posts() ) {
							 $query -> the_post();				
							 
							//  if( function_exists('get_field')) {
							// 	if(get_field('biography'))
							// 	the_field('biography');
							//  }
					 }
					 wp_reset_postdata();
				 
				 }
			 

				 $query = new WP_Query($args); 
			 if($query -> have_posts() ) { 
				 
				 
				 while ($query -> have_posts() ) {
					 $query -> the_post();
					 ?>
					 <article class="staff" id="<?php echo get_the_ID();?>">
						 <h3><?php the_title(); ?></h3>
						 <p><?php the_content(); ?></p>
						 <p><?php the_field('biography'); ?></p>
						 
						 
						 
					 </article>
				 <?php
				 }
				 wp_reset_postdata();
			 }

				 }
			 }
			endwhile;
			 ?>

		 </div>
 
 
 
 
	 </article>


 

 </main>

<?php
// get_sidebar();
// get_footer();
