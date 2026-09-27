<?php

if (! defined('ABSPATH')) {
    exit;
}

function sd_theme_enqueue_assets(): void
{
    wp_enqueue_style('dashicons');

    $manifest_path = get_theme_file_path('/dist/.vite/manifest.json');

    if (! file_exists($manifest_path)) {
        return;
    }

    $manifest = json_decode(
        file_get_contents($manifest_path),
        true
    );

    $entry = $manifest['src/main.js'] ?? null;

    if (! $entry) {
        return;
    }

    if (! empty($entry['css'])) {
        foreach ($entry['css'] as $index => $css_file) {
            wp_enqueue_style(
                'sd-theme-style-' . $index,
                get_theme_file_uri('/dist/' . $css_file),
                [],
                null
            );
        }
    }

    wp_enqueue_script(
        'sd-theme-vue',
        get_theme_file_uri('/dist/' . $entry['file']),
        [],
        null,
        true
    );
    wp_localize_script(
        'sd-theme-vue',
        'wpVueData',
        vue_wp_get_data()
    );
}

add_action('wp_enqueue_scripts', 'sd_theme_enqueue_assets');

function sd_theme_add_module_type(
    string $tag,
    string $handle,
    string $src
): string {
    if ($handle !== 'sd-theme-vue') {
        return $tag;
    }

    return sprintf(
        '<script type="module" src="%s"></script>',
        esc_url($src)
    );
}

add_filter(
    'script_loader_tag',
    'sd_theme_add_module_type',
    10,
    3
);


// Menus
function sd_register_nav_menu(){
    register_nav_menus( array(
        'main' => __( 'Головне меню', 'vue-wp-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'sd_register_nav_menu', 0 );

function sd_get_menus(){
   
    $menus = [];
    $menus_location = get_nav_menu_locations();
    foreach ( $menus_location as $location => $id ) {
        $menu_items = wp_get_nav_menu_items($id);
        $i = 0;
        foreach($menu_items as $item){
            $menus[$location][$i]['url'] = $item->url;
            $menus[$location][$i]['title'] = $item->title;
            $i++;
        }
    }
    return $menus;
}


function vue_wp_get_data(): array
{
    $data = [
        'acf' => null,
        'menus' => sd_get_menus(),
        'contactForm' => '',
        'logo' => esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ),
        'site_url'=>site_url(),
       
    ];
    if ( shortcode_exists( 'fluentform' ) ) {
        $data['contactForm'] = do_shortcode( '[fluentform id="3"]' );
    }

    if (function_exists('get_fields')) {
        $post_id = get_queried_object_id();

        $data['acf'] = get_fields($post_id) ?: [];
        $data['acfOptions'] = get_fields('options') ?: [];
    }

    return $data;
}
add_theme_support( 'custom-logo' );