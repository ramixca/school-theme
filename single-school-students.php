<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fwd-school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : ?>
			<article>
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
					<?php the_post(); ?>
					<?php the_content(); ?>
					<?php the_post_thumbnail('single-student'); ?>
			</article>

		
			
		<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'school' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'school' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; 
				?>
					
			</main>

		<?php

