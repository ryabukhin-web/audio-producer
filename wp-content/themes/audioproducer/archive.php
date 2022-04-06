<?php get_header() ?>

<main class="main">
    <div class="container">

        <div class="main__pathway">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('||', $page_lang); ?>
        </div>

        <?php
        // Заголовок
        get_template_part(
            'temp-parts/fragment/section',
            'title',
            array(
                'container' => '',
                'modifier' => 'section-title_page',
                'title' => single_cat_title('', 0),
                'button' => array(
                    'modifier' => '',
                    'link' => '',
                    'text' => '',
                )
            )
        );
        ?>

        <?php $post_list = new WP_Query(array(
            'post_type' => $post->post_type,
            'cat' => get_cat_ID(single_cat_title('', 0)),
            'post_status' => 'publish',
            'posts_per_page'   => 21
        ));
        if ($post_list->have_posts()) : ?>

            <div class="list-3 list-3_archive">

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    $excerpt = (!get_the_post_thumbnail_url() ? true : false);
                    get_template_part('temp-parts/items/post', 'item', array('container' => 'list-3__item', 'modifier' => 'post-item_border-bootom _show', 'excerpt' => $excerpt));
                    ?>

                    <?php array_push($post__not_in, get_the_ID()) ?>
                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>

            <?php if ($post_list->max_num_pages > 1) :
                // Кнопка
                get_template_part(
                    'temp-parts/fragment/button',
                    'more',
                    array(
                        'data-param-posts' => serialize($post_list->query_vars),
                        'data-max-pages' => $post_list->max_num_pages,
                        'data-tpl' => ''
                    )
                );
            endif ?>

        <?php else : ?>
            <p><?= __('Раздел пуст', 'audioproducer') ?></p>
        <?php endif ?>

    </div>
</main>

<?php get_footer() ?>