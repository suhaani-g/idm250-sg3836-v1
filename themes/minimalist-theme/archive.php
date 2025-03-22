<?php get_header(); ?>

<main class="archive-page container">
    <header class="archive-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php if (category_description()) : ?>
            <div class="archive-description">
                <?php echo category_description(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="archive-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="archive-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="archive-title"><?php the_title(); ?></h2>
                        
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p>No products found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
