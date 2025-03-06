<?php get_header(); ?>

<main class="about-page">
    <section class="hero-section">
        <div class="container">
            <h1><?php echo esc_html(get_theme_mod('about_us_heading', 'About Us')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('about_us_subheading', 'Our mission is to create something amazing.')); ?></p>
        </div>
    </section>

    <section class="company-mission container">
        <h2><?php echo esc_html(get_theme_mod('mission_heading', 'Our Mission')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('mission_content', 'We are passionate about what we do and dedicated to excellence.')); ?></p>
    </section>

    <section class="team-section container">
    <h2><?php echo esc_html(get_theme_mod('about_us_team_heading', 'Meet Our Team')); ?></h2>
    <div class="team-members">
        <?php for ($i = 1; $i <= 6; $i++) : ?>
            <?php 
                $team_member_name = get_theme_mod("team_member_{$i}_name", "Team Member {$i}");
                $team_member_image = get_theme_mod("team_member_{$i}_image", "https://via.placeholder.com/150");
            ?>
            <?php if (!empty($team_member_name)) : ?>
                <div class="team-member">
                    <img src="<?php echo esc_url($team_member_image); ?>" alt="<?php echo esc_attr($team_member_name); ?>">
                    <p><?php echo esc_html($team_member_name); ?></p>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>


    <section class="values-section container">
        <h2><?php echo esc_html(get_theme_mod('values_heading', 'Our Core Values')); ?></h2>
        <ul>
            <?php if (have_rows('core_values')): ?>
                <?php while (have_rows('core_values')): the_row(); ?>
                    <li><?php echo esc_html(get_sub_field('value_text')); ?></li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Commitment to sustainability</li>
                <li>Pure and natural ingredients</li>
                <li>Skin health above all</li>
                <li>Transparency and honesty</li>
            <?php endif; ?>
        </ul>
    </section>

    <section class="journey-section container">
        <h2><?php echo esc_html(get_theme_mod('journey_heading', 'Our Journey')); ?></h2>
        <ol>
            <?php if (have_rows('journey_timeline')): ?>
                <?php while (have_rows('journey_timeline')): the_row(); ?>
                    <li><?php echo esc_html(get_sub_field('timeline_event')); ?></li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Founded in 2010 with a vision for clean skincare.</li>
                <li>Launched our first all-natural product line in 2012.</li>
                <li>Expanded globally by 2015.</li>
                <li>Committed to sustainable packaging by 2020.</li>
            <?php endif; ?>
        </ol>
    </section>

    <section class="testimonials-section container">
        <h2><?php echo esc_html(get_theme_mod('testimonials_heading', 'Customer Testimonials')); ?></h2>
        <table>
            <tr>
                <th><?php echo esc_html(get_theme_mod('testimonials_name_column', 'Name')); ?></th>
                <th><?php echo esc_html(get_theme_mod('testimonials_review_column', 'Review')); ?></th>
            </tr>
            <?php if (have_rows('customer_testimonials')): ?>
                <?php while (have_rows('customer_testimonials')): the_row(); ?>
                    <tr>
                        <td><?php echo esc_html(get_sub_field('customer_name')); ?></td>
                        <td><?php echo esc_html(get_sub_field('customer_review')); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td>Emily R.</td>
                    <td>"Absolutely love the products! My skin has never felt better."</td>
                </tr>
                <tr>
                    <td>Michael B.</td>
                    <td>"Truly natural and effective skincare. Highly recommend!"</td>
                </tr>
            <?php endif; ?>
        </table>
    </section>

    <section class="quote-section container">
        <h2><?php echo esc_html(get_theme_mod('quote_heading', 'Our Sustainability Commitment')); ?></h2>
        <blockquote>
            <?php echo esc_html(get_theme_mod('sustainability_quote', 'We believe in skincare that’s kind to you and the planet. Sustainability isn’t an option—it’s our responsibility.')); ?>
        </blockquote>
    </section>

    <section class="explore-section container">
        <h2><?php echo esc_html(get_theme_mod('explore_heading', 'Explore More')); ?></h2>
        <?php if (have_rows('explore_buttons')): ?>
            <div class="explore-buttons">
                <?php while (have_rows('explore_buttons')): the_row(); ?>
                    <a href="<?php echo esc_url(get_sub_field('button_link')); ?>" class="btn">
                        <?php echo esc_html(get_sub_field('button_text')); ?>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <a href="#" class="btn">Shop Our Products</a>
            <a href="#" class="btn btn-secondary">Read Our Blog</a>
        <?php endif; ?>
    </section>

    <section class="gallery-section container">
        <h2><?php echo esc_html(get_theme_mod('gallery_heading', 'Image Gallery')); ?></h2>
        <figure>
            <img src="<?php echo esc_url(get_theme_mod('about_us_image', 'https://via.placeholder.com/600x300')); ?>" alt="Skincare Image">
            <figcaption><?php echo esc_html(get_theme_mod('gallery_caption', 'Our Natural Ingredients')); ?></figcaption>
        </figure>
    </section>

    <section class="video-section container">
        <h2><?php echo esc_html(get_theme_mod('video_heading', 'Watch Our Story')); ?></h2>
        <iframe width="600" height="338" src="<?php echo esc_url(get_theme_mod('about_us_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ')); ?>" frameborder="0" allowfullscreen></iframe>
    </section>
</main>

<?php get_footer(); ?>
