<?php

add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');

add_theme_support(
    'html5',
    array(
        'gallery',
        'caption',
        'script',
        'style',
    )
);

// Add support for full and wide align images.
add_theme_support('align-wide');

// Add support for responsive embeds.
add_theme_support('responsive-embeds');

// INCLUDES ====================================================
include(get_template_directory() . '/includes/enqueue.php');
include(get_template_directory() . '/includes/theme-customizer.php');
include(get_template_directory() . '/includes/customizer/codes.php');
include(get_template_directory() . '/includes/BEM_Walker_Nav_Menu.php');
include(get_template_directory() . '/includes/breadcrumbs.php');

// HOOKS    ====================================================
add_action('wp_enqueue_scripts', 'links_enqueue');

add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});

add_action('after_setup_theme', function () {
    add_theme_support('pageviews');
});

add_action('pre_get_posts', 'hwl_home_pagesize', 1);
function hwl_home_pagesize($query)
{
    if (is_admin() || !$query->is_main_query())
        return;

    if ($query->is_post_type_archive('management', 'partners', 'documents', 'author_s_advice')) {
        $query->set('posts_per_page', -1);
    }
}
add_action('customize_register', 'theme_customize_register');

function footnote($category)
{
    if ($category->cat_name === 'Конкурсы') {
        return __('Конкурс', 'audioproducer');
    } else if ($category->cat_name === 'Новости') {
        return __('Новость', 'audioproducer');
    } else if ($category->cat_name === 'События') {
        return __('Событие', 'audioproducer');
    } else if ($category->cat_name === 'Без рубрики') {
        return __('Архив', 'audioproducer');
    } else {
        return $category->cat_name;
    }
}

// AJAX загрузка постов 
function load_posts()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged']  = $_POST['page'] + 1;
    if ($_POST['search']) {
        $args['s']  = $_POST['search'];
    }

    $post_list = new WP_Query($args);
    if ($post_list->have_posts()) {
        while ($post_list->have_posts()) {
            $post_list->the_post();

            if ($_POST['tpl'] === 'post') {
                $excerpt = (!get_the_post_thumbnail_url() ? true : false);
                get_template_part(
                    'temp-parts/items/post',
                    'item',
                    array(
                        'container' => 'list-3__item',
                        'modifier' => 'post-item_border-bootom _show',
                        'excerpt' => $excerpt
                    )
                );
            }
            if ($_POST['tpl'] === 'guild_of_sound_engin') {
                get_template_part(
                    'temp-parts/items/guild',
                    'item',
                    array(
                        'container' => 'list-4__item',
                        'modifier' => '_show',
                    )
                );
            }
        }
        die();
    }
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
