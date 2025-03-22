<?php
/**
 * Content Template Part
 *
 * This file is responsible for displaying the main content area of posts and pages.
 * It uses a specific class naming convention for targeted CSS styling.
 *
 * CSS Methodology:
 * - All content styles are scoped within the .main-content class
 * - Example: .main-content h2 { styles }
 * - This prevents styles from affecting elements outside this component
 * - This approach maintains clean separation between component styles
 *
 * Example CSS usage:
 * .main-content h2 { color: blue; }
 * .main-content p { margin-bottom: 1rem; }
 * .main-content img { max-width: 100%; }
 *
 */
?>
<!-- content -->
<div class="main-content">
  <?php echo get_the_content(); ?>
</div>