<?php get_header(); ?>

<main class="container">
    <article class="single-post">
        <h1><?php the_title(); ?></h1>
        <div class="post-meta"><?php the_date(); ?> | <?php the_author(); ?></div>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>
