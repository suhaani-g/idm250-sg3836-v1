<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add meta box
add_action('add_meta_boxes', 'skincare_add_product_meta_boxes');

function skincare_add_product_meta_boxes() {
    add_meta_box(
        'product_details_box',            // ID
        'Product Details',                // Title
        'skincare_product_details_box',   // Callback
        'products',                       // Post type slug (change if different)
        'normal',                         // Context
        'high'                            // Priority
    );
}

// Render meta box content
function skincare_product_details_box($post) {
    // Retrieve existing values from the database
    $price = get_post_meta($post->ID, '_product_price', true);
    $ingredients = get_post_meta($post->ID, '_product_ingredients', true);
    $best_for = get_post_meta($post->ID, '_product_best_for', true);
    $benefits = get_post_meta($post->ID, '_product_benefits', true);

    // Security nonce
    wp_nonce_field('skincare_save_product_details', 'skincare_product_details_nonce');
    ?>

    <p>
        <label for="product_price"><strong>Price ($):</strong></label><br>
        <input type="number" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" step="0.01" />
    </p>

    <p>
        <label for="product_ingredients"><strong>Ingredients (one per line):</strong></label><br>
        <textarea id="product_ingredients" name="product_ingredients" rows="4" cols="50"><?php echo esc_textarea($ingredients); ?></textarea>
    </p>

    <p>
        <label for="product_best_for"><strong>Best For:</strong></label><br>
        <input type="text" id="product_best_for" name="product_best_for" value="<?php echo esc_attr($best_for); ?>" />
    </p>

    <p>
        <label for="product_benefits"><strong>Key Benefits (one per line):</strong></label><br>
        <textarea id="product_benefits" name="product_benefits" rows="4" cols="50"><?php echo esc_textarea($benefits); ?></textarea>
    </p>

    <?php
}

// Save meta box data
add_action('save_post', 'skincare_save_product_details');

function skincare_save_product_details($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['skincare_product_details_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['skincare_product_details_nonce'], 'skincare_save_product_details')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sanitize and save the fields
    if (isset($_POST['product_price'])) {
        $price = sanitize_text_field($_POST['product_price']);
        update_post_meta($post_id, '_product_price', $price);
    }

    if (isset($_POST['product_ingredients'])) {
        $ingredients = sanitize_textarea_field($_POST['product_ingredients']);
        update_post_meta($post_id, '_product_ingredients', $ingredients);
    }

    if (isset($_POST['product_best_for'])) {
        $best_for = sanitize_text_field($_POST['product_best_for']);
        update_post_meta($post_id, '_product_best_for', $best_for);
    }

    if (isset($_POST['product_benefits'])) {
        $benefits = sanitize_textarea_field($_POST['product_benefits']);
        update_post_meta($post_id, '_product_benefits', $benefits);
    }
}
