<?php get_header(); ?>

<main class="container">
    <h1><?php the_archive_title(); ?></h1>
    <div class="post-listing">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="post-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
            </article>
        <?php endwhile; else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
