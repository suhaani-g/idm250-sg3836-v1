<?php
get_header(); 
?>

<main class="content-area">
    <div class="container">
        <?php
        if (have_posts()) : 
            while (have_posts()) : the_post();
        ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta">
                        <span>Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
                    </div>
                    <div class="content">
                        <?php the_excerpt();  ?>
                    </div>
                </article>
        <?php
            endwhile;
        else :
        ?>
            <p>No posts found.</p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
