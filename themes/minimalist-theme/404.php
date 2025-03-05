<?php
get_header();
?>

<div class="container text-center">
    <h1 class="error-title">Oops! Page Not Found</h1>
    <p class="error-message">The page you’re looking for doesn’t exist or has been moved.</p>
    
    <div class="search-box">
        <?php get_search_form(); ?>
    </div>

    <a href="<?php echo home_url(); ?>" class="home-button">Go Back Home</a>
</div>

