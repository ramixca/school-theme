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
 * @package school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">
	 
	

		
		<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		
		<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
			<div class="entry-content">
			

				<?php
				$terms = get_terms(
							array(
								'taxonomy' => 'student_categories'
							)
						 );

				if ($terms && ! is_wp_error( $terms )) {
					foreach ( $terms as $term) {
						$args = array(
							'post_type'      => 'school-students',
							'posts_per_page' => -1,
							'order'          => 'ASC',
							'orderby'        => 'title',
							'tax_query'      => array(
								array(
									'taxonomy'  => 'student_categories',
									'field'     => 'slug',
									'terms'     => $term->slug,
								)
							)

						);

						$query = new WP_Query($args);
							echo "<h2>" .$term->name. "</h2>";
						if ( $query -> have_posts() ) {
							while ($query -> have_posts() ) {
								$query -> the_post();					
						}
						wp_reset_postdata();
					
					}
				

					$query = new WP_Query($args); 
				if($query -> have_posts() ) { 
					
					
					while ($query -> have_posts() ) {
						$query -> the_post();
						?>
						<article class="students" id="<?php echo get_the_ID();?>">
							<a href=<?php the_permalink(); ?>
							<h3><?php the_title(); ?></h3></a>
							<?php the_post_thumbnail('thumbnail'); ?>
							</a>
							<p><?php the_excerpt(); ?></p>
							
							<p>Specialty: <?php echo "<a href=''>" .$term->name. "</a>"; ?></p>
							
						</article>
					<?php
					}
					wp_reset_postdata();
				}

					}
				}
				
				?>

			</div>
	
	
	
	
		</article>




	</main>

<?php
// get_sidebar();
// get_footer();
