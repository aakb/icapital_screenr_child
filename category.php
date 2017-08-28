<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Screenr
 */

get_header(); ?>

	<div id="content" class="site-content">

		<div id="content-inside" class="container no-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
                    <div class="container">
                        <?php if ( have_posts() ) : ?>

                        <div class="row">

                            <?php
                            /* Start the Loop */
                            $count = 0;
                            ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php

                                    $layout = absint( get_theme_mod( 'services_layout', 2 ) );
                                    if ( $layout == 0 ){
                                        $layout = 2;
                                    }

                                    $count++;
                                    $classes = '';
                                    switch ($layout) {
                                        case 1:
                                            $classes = 'col-sm-12';
                                            break;
                                        case 2:
                                            $classes = 'col-sm-6';
                                            break;
                                        case 3:
                                            $classes = 'col-sm-4';
                                            break;
                                        case 4:
                                            $classes = 'col-sm-3';
                                            break;
                                        default:
                                            $classes = 'col-sm-6';
                                    }

                                    ?>

                            <div class="<?php echo esc_attr($classes); ?>">

                                <?php

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'category-box' );
                                ?>

                            </div>
                                <?php
                                if ($count % $layout == 0) {
                                    echo '</div><!-- /.row  -->' . "\n";
                                    echo '<div class="row">' . "\n";
                                }
                                ?>

                            <?php endwhile; ?>

                            <?php the_posts_navigation(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        <?php endif; ?>
                    </div>
				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
