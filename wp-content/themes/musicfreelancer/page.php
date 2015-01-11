<?php get_header(); ?>

<div>

    <?php while(have_posts()): the_post() ?>

        <!--<h2><?php /*//the_title()*/?></h2>-->
        <?php
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) {
        the_post_thumbnail();
        }
        the_content();?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;?>

    <?php endwhile; ?>


<?php get_sidebar();?>
</div>
<?php get_footer(); ?>

