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
                'title' => __('Результаты поиска по запросу', 'audioproducer') . ($_GET['s'] ? ' - "' . $_GET['s'] . '"' : ''),
                'button' => array(
                    'modifier' => '',
                    'link' => '',
                    'text' => '',
                )
            )
        );
        ?>

        <form role="search-form" method="get" class="search-form search-form_on-page" action="">
            <input value="<?= $_GET['s'] ?>" name="s" class="search-form__input" type="text" placeholder="<?= __('Поиск по сайту', 'audioproducer') ?>" autocomplete="off">
            <button class="search-form__button icon-search"></button>
        </form>

        <?php
        $post_list = new WP_Query(array(
            'post_type' => 'post',
            's' => $_GET['s'],
            'post_status' => 'publish',
            'posts_per_page'   => 21
        ));
        if ($post_list->have_posts()) : ?>

            <div class="list-3 list-3_archive">

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    $excerpt = (!get_the_post_thumbnail_url() ? true : false);
                    get_template_part('temp-parts/items/post', 'item',  array('container' => 'list-3__item', 'modifier' => 'post-item_border-bootom _show', 'excerpt' => $excerpt));
                    ?>

                <?php endwhile ?>

            </div>

            <?php if ($post_list->max_num_pages > 1) :
                // Кнопка
                $args = $post_list->query_vars;
                unset($args['s']);
                unset($args['search_terms_count']);
                unset($args['search_terms']);
                unset($args['search_orderby_title']);

                get_template_part(
                    'temp-parts/fragment/button',
                    'more',
                    array(
                        'data-param-posts' => serialize($args),
                        'data-max-pages' => $post_list->max_num_pages,
                        'search' => $_GET['s']
                    )
                );
            endif ?>

        <?php else : ?>
            <p><?= __('Раздел пуст', 'audioproducer') ?></p>
        <?php endif ?>

    </div>
</main>

<?php get_footer() ?>