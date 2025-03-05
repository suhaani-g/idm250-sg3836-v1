<section class="about-section">
    <div class="container">
        <h2><?php echo get_theme_mod('about_title', 'About Minimalist Skincare'); ?></h2>
        <p><?php echo get_theme_mod('about_text', 'We believe in simplicity, purity, and effectiveness.'); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('about_cta_link', home_url('/about'))); ?>" class="btn">
            <?php echo esc_html(get_theme_mod('about_cta_text', 'Learn More')); ?>
        </a>
    </div>
</section>
