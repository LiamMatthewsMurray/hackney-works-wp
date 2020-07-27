<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<section class="hero">
    <div class="hero__background" style="background-image: url('<?php echo get_the_post_thumbnail_url( null, "full" ); ?>')"></div>
    <div class="container container--narrow hero__content">
        <h1 class="hero__title"><?php the_title(); ?></h1>
        <p class="hero__excerpt"><?php echo get_the_excerpt(); ?></p>
    </div>
</section>

<article class="page-content">
    <div class="container container--narrow">
        <?php the_content(); ?>
    </div>
</article>

<?php endwhile; else: ?>

<p>Nothing to show</p>

<?php endif; ?>

<?php get_footer(); ?>