<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', get_post_type() );

        the_post_navigation(); // Optional: Add navigation between posts.

        // If comments are open or there is at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
