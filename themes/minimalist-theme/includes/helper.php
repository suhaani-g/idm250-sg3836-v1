<?php

/**
 * Retrieve menu items as a flat array for custom markup.
 *
 * This function gets the registered menu items and formats them for easier use.
 *
 * @param string $menu_name The registered menu ID.
 * @return array $menu_items Array of WP_Post objects or an empty array if the menu doesn't exist.
 */
function get_skincare_menu($menu_name)
{
    // Get menu locations
    $locations = get_nav_menu_locations();

    // Return an empty array if the menu doesn't exist
    if (!isset($locations[$menu_name])) {
        return [];
    }

    // Retrieve the menu object and items
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id, ['order' => 'ASC']); // Order changed to ASC for proper navigation order

    // Process menu items
    foreach ($menu_items as &$item) {
        // Convert classes array to a space-separated string
        $item->classes = !empty($item->classes) ? implode(' ', array_filter($item->classes)) : '';

        // Ensure target and xfn attributes are set
        $item->target = $item->target ?? '';
        $item->xfn = $item->xfn ?? '';
    }
    unset($item); // Break reference with the last item

    return $menu_items;
}

/**
 * Retrieve the URL and alt text for a post's featured image.
 *
 * Checks if the specified post has a featured image and retrieves its full-size image URL and alt text.
 *
 * @param int $post_id The ID of the post to retrieve the featured image for.
 * @return array|bool Returns an array with 'url' and 'alt' keys if an image exists, otherwise false.
 */
function get_featured_product_image($post_id)
{
    // Return false if the post has no featured image
    if (!has_post_thumbnail($post_id)) {
        return false;
    }

    // Get featured image ID and its details
    $post_thumbnail_id = get_post_thumbnail_id($post_id);
    $featured_image_data = wp_get_attachment_image_src($post_thumbnail_id, 'large'); // Use 'large' for better quality
    $featured_image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);

    return [
        'url' => $featured_image_data[0] ?? '',
        'alt' => $featured_image_alt ?: '',
    ];
}

/**
 * Get the current page URL.
 *
 * This function constructs the full URL of the current page, including HTTPS if applicable.
 *
 * @return string The full URL of the current page.
 */
function get_current_page_url()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') .
        "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

/**
 * Retrieve a short excerpt for a post.
 *
 * This function returns a shortened version of the post content.
 *
 * @param int $post_id The ID of the post to retrieve the excerpt for.
 * @param int $length Number of words for the excerpt (default: 20).
 * @return string The trimmed excerpt with a "Read more" link.
 */
function get_short_excerpt($post_id, $length = 20)
{
    $post = get_post($post_id);

    if (!$post) {
        return '';
    }

    $excerpt = !empty($post->post_excerpt) ? $post->post_excerpt : wp_trim_words($post->post_content, $length);
    
    return $excerpt;
}
