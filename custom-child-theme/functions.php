<?php
/**
 * Custom Child Theme functions.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue parent and child theme styles.
 */
function custom_child_theme_enqueue_styles(): void
{
    $parent_style_handle = 'parent-style';

    wp_enqueue_style(
        $parent_style_handle,
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme(get_template())->get('Version')
    );

    wp_enqueue_style(
        'custom-child-style',
        get_stylesheet_uri(),
        [$parent_style_handle],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'custom_child_theme_enqueue_styles');

/**
 * Optionally copy customizer mods from parent theme when child theme is activated.
 *
 * This only runs once at activation and only if the child theme has no theme mods yet.
 */
function custom_child_theme_copy_parent_mods(): void
{
    $child_theme = get_stylesheet();
    $parent_theme = get_template();

    if ($child_theme === $parent_theme) {
        return;
    }

    $child_mods_option = 'theme_mods_' . $child_theme;
    $parent_mods_option = 'theme_mods_' . $parent_theme;

    $existing_child_mods = get_option($child_mods_option);
    if (!empty($existing_child_mods)) {
        return;
    }

    $parent_mods = get_option($parent_mods_option);
    if (empty($parent_mods) || !is_array($parent_mods)) {
        return;
    }

    update_option($child_mods_option, $parent_mods);
}
add_action('after_switch_theme', 'custom_child_theme_copy_parent_mods');
