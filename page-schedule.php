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

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<section>
			
		
			
				<?php if( have_rows('schedule') ):?>
					<table class="schedule">
						<caption>Weekly Course Schedule</caption>
						<thead>
							<tr>
								<th>Date</th>
								<th>Course</th>
								<th>Instructor</th>
							</tr>
						</thead>
						<tbody>						
					
					<?php 
						while( have_rows('schedule') ) : the_row();

						// Load sub field value.
						$date       = get_sub_field('date');
						$course     = get_sub_field('course');
						$instructor = get_sub_field('instructor');
						
						// Do something...
					
						echo '<tr>';
						echo '<td>' .$date. '</td>';
						echo '<td>' .$course. '</td>';
						echo '<td>' .$instructor. '</td>';
						echo '</tr>';
						?>
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