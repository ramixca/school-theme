<?php
/**
 * The template for displaying the home page
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

<section class="recent-news">
            <h2><?php esc_html_e('Recent News', 'school')?></h2>
            <?php
           

            // $args = array (
            //     'page_id' => 8,
            //     'post_per_page' => 3
            // );
            $blog_query = new WP_Query(array('page_id' =>8));
            if($blog_query -> have_posts() ) {
                while($blog_query -> have_post() ) {
                    $blog_query -> get_post();
                    ?>
                    <div>                        
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                            <img src="<?php the_post_thumbnail('thumbnail'); ?>">
                        </a>
                </div>
                    <?php
                }
                wp_reset_postdata();            
            }
            
            ?>
        </section>

        <?php
    endwhile;
    ?>
    </main>

    <?php
get_sidebar();
get_footer();