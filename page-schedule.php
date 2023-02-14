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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		

		endwhile; // End of the loop.
		?>
		<section>
			
		
			
				<?php if( have_rows('schedule') ):?>
					<table class="schedule">
						<caption>Weekly Course Schedule</caption>
						<thead>
							<tr>
								<th><?php esc_html_e('Date'); ?></th>
								<th><?php esc_html_e('Course'); ?></th>
								<th><?php esc_html_e('Instructor'); ?></th>
								
							</tr>
						</thead>
						<tbody>		
					
					<?php 
						while( have_rows('schedule') ) : the_row();?>
							<tr>
								<td><?php echo get_sub_field('date'); ?></td>
								<td><?php echo get_sub_field('course'); ?></td>
								<td><?php echo get_sub_field('instructor'); ?></td>
							</tr>
						</tbody>
						<?php
				
				endwhile;

			else:

			endif;
	
				?>
		</section>

	</main><!-- #main -->

<?php
// get_sidebar();
// get_footer();