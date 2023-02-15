<?php
		$args = array(
            'page_id' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3);

		$query = new WP_Query($args);
        
		if($query -> have_posts() ) {?>
        <section>

		<?php	while ($query -> have_posts() ) {
				$query -> the_post();?>
				<a href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
				<img><?php the_post_thumbnail( 'thumbnail' ); ?></img>
        </a>
                <?php
               
			}
			wp_reset_postdata();
            ?>
            </section>
            <?php
		}

?>