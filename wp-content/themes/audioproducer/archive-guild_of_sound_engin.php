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
                'title' => __('Члены Гильдии', 'audioproducer'),
                'button' => array(
                    'modifier' => '',
                    'link' => '',
                    'text' => '',
                )
            )
        );
        ?>

        <?php
        $post_list = new WP_Query(array(
            'post_type' => $post->post_type,
            'post_status' => 'publish',
            'posts_per_page'   => 16,
            'meta_query' => array(
                array(
                    'key' => 'guild_member',
                    'value' => true
                ),
            )
        ));
        if ($post_list->have_posts()) : ?>

            <div class="list-4">

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    get_template_part('temp-parts/items/guild', 'item', array('container' => 'list-4__item', 'modifier' => '_show',));
                    ?>

                    <?php array_push($post__not_in, get_the_ID()) ?>
                <?php endwhile ?>

            </div>

            <?php if ($post_list->max_num_pages > 1) :
                // Кнопка
                get_template_part(
                    'temp-parts/fragment/button',
                    'more',
                    array(
                        'data-param-posts' => serialize($post_list->query_vars),
                        'data-max-pages' => $post_list->max_num_pages,
                        'data-posts-per-page' => $post_list->query_vars['posts_per_page']
                    )
                );
            endif ?>

        <?php else : ?>
            <p><?= __('Раздел пуст', 'audioproducer') ?></p>
        <?php endif ?>

    </div>
</main>

<?php get_footer() ?>