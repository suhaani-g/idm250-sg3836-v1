<?php get_header(); ?>

<main class="about-page">
    <section class="hero-section">
        <div class="container">
            <h1><?php echo esc_html(get_theme_mod('about_us_heading', 'About Us')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('about_us_subheading', 'Our mission is to create something amazing.')); ?></p>
        </div>
    </section>

    <section class="company-mission container">
        <h2>Our Mission</h2>
        <p><?php echo esc_html(get_theme_mod('about_us_content', 'We are passionate about what we do and dedicated to excellence.')); ?></p>
    </section>

    <section class="team-section container">
        <h2>Meet Our Team</h2>
        <p><?php echo esc_html(get_theme_mod('about_us_team', 'Our Team: John Doe, Jane Smith, Michael Brown')); ?></p>
    </section>

    <section class="values-section container">
        <h2>Our Core Values</h2>
        <ul>
            <li>Commitment to sustainability</li>
            <li>Pure and natural ingredients</li>
            <li>Skin health above all</li>
            <li>Transparency and honesty</li>
        </ul>
    </section>

    <section class="journey-section container">
        <h2>Our Journey</h2>
        <ol>
            <li>Founded in 2010 with a vision for clean skincare.</li>
            <li>Launched our first all-natural product line in 2012.</li>
            <li>Expanded globally by 2015.</li>
            <li>Committed to sustainable packaging by 2020.</li>
        </ol>
    </section>

    <section class="testimonials-section container">
        <h2>Customer Testimonials</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Review</th>
            </tr>
            <tr>
                <td>Emily R.</td>
                <td>"Absolutely love the products! My skin has never felt better."</td>
            </tr>
            <tr>
                <td>Michael B.</td>
                <td>"Truly natural and effective skincare. Highly recommend!"</td>
            </tr>
        </table>
    </section>

    <section class="quote-section container">
        <h2>Our Sustainability Commitment</h2>
        <blockquote>
            "We believe in skincare that’s kind to you and the planet. Sustainability isn’t an option—it’s our responsibility."
        </blockquote>
    </section>

    <section class="explore-section container">
        <h2>Explore More</h2>
        <a href="#" class="btn">Shop Our Products</a>
        <a href="#" class="btn btn-secondary">Read Our Blog</a>
    </section>

    <section class="gallery-section container">
        <h2>Image Gallery</h2>
        <figure>
            <img src="<?php echo esc_url(get_theme_mod('about_us_image', 'https://via.placeholder.com/600x300')); ?>" alt="Skincare Image">
            <figcaption>Our Natural Ingredients</figcaption>
        </figure>
    </section>

    <section class="video-section container">
        <h2>Watch Our Story</h2>
        <iframe width="600" height="338" src="<?php echo esc_url(get_theme_mod('about_us_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ')); ?>" frameborder="0" allowfullscreen></iframe>
    </section>
</main>

<?php get_footer(); ?>
