<?php get_header() ?>

<section class="section all-posts">
    <div class="container all-posts__container">

        <div class="all-posts__top">
            <?php
            $post__not_in = [];
            $args = array(
                'cat' => -1,
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
            $post_list = new WP_Query($args);
            if ($post_list->have_posts()) : ?>

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    get_template_part('temp-parts/items/full-image', 'item', array('container' => 'all-posts__big-item '));
                    ?>

                    <?php array_push($post__not_in, get_the_ID()) ?>
                <?php endwhile;
                wp_reset_postdata(); ?>

            <?php endif ?>

            <?php
            $args = array(
                'cat' => -1,
                'post_type' => 'post',
                'post__not_in' => $post__not_in,
                'post_status' => 'publish',
                'posts_per_page' => 4,
            );
            $post_list = new WP_Query($args);
            if ($post_list->have_posts()) : ?>

                <div class="all-posts__list list">

                    <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                        <?php
                        // Элемент
                        get_template_part('temp-parts/items/no-image', 'item', array('container' => 'list__item'));
                        ?>

                        <?php array_push($post__not_in, get_the_ID()) ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>

            <?php endif ?>
        </div>

        <?php
        $args = array(
            'cat' => -1,
            'post_type' => 'post',
            'post__not_in' => $post__not_in,
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            )
        );
        $post_list = new WP_Query($args);
        if ($post_list->have_posts()) : ?>

            <div class="all-posts__bottom list-3">

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    get_template_part('temp-parts/items/post', 'item', array('container' => 'list-3__item', 'excerpt' => false));
                    ?>

                    <?php array_push($post__not_in, get_the_ID()) ?>
                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>

        <?php endif ?>

    </div>
</section>

<section class="section section_grey section_d-slider">
    <div class="container">

        <?php
            // Заголовок
            get_template_part(
                'temp-parts/fragment/section',
                'title',
                array(
                    'container' => '',
                    'modifier' => '',
                    'title' => __('Гильдия Звукорежиссеров', 'audioproducer'),
                    'button' => array(
                        'modifier' => 'button_footnote button_footnote-link',
                        'link' => '#',
                        'text' => __('Вступить в Гильдию', 'audioproducer'),
                    )
                )
            );
            ?>

        <p class="section-text section-text_light"><?= __('Гильдия объединяет профессиональных звукорежиссеров всех музыкальных направлений', 'audioproducer') ?></p>


        <div class="d-slider">

            <div class="d-slider__panel">
                <a class="d-slider__link" href="/guild_of_sound_engin/"><?= __('Смотреть всех', 'audioproducer') ?></a>

                <div class="d-slider__arrow d-slider__arrow_prev"><span class="icon-bold-arrow"></span></div>
                <div class="d-slider__arrow d-slider__arrow_next"><span class="icon-bold-arrow"></span></div>
            </div>

            <?php
            $post__not_in = [];
            $args = array(
                'post_type' => 'guild_of_sound_engin',
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => 'front_text',
                        'compare' => 'REGEXP',
                        'value' => '.+'
                    ),
                )
            );
            $post_list = new WP_Query($args);
            if ($post_list->have_posts()) : ?>

                <div class="d-slider__swiper js-d-slider swiper">
                    <div class="d-slider__wrapper swiper-wrapper">

                        <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                            <?php
                            // Элемент
                            get_template_part('temp-parts/items/card', 'slide', array('container' => 'd-slider__slide', 'modifier' => 'swiper-slide'));
                            ?>

                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                </div>

            <?php endif ?>

        </div>

    </div>

</section>

<section class="section">
    <div class="container">

        <?php
            // Заголовок
            get_template_part(
                'temp-parts/fragment/section',
                'title',
                array(
                    'container' => '',
                    'modifier' => 'section-title_space-between',
                    'title' => __('Образование', 'audioproducer'),
                    'button' => array(
                        'modifier' => 'button_arrow',
                        'link' => '/education/',
                        'text' => __('Смотреть все', 'audioproducer'),
                        'text_after' => '<span class="icon-arrow">',
                    )
                )
            );
            ?>

        <?php
        $args = array(
            'post_type' => 'education-partners',
            'post_status' => 'publish',
            'posts_per_page' => 4,
        );
        $post_list = new WP_Query($args);
        if ($post_list->have_posts()) : ?>

            <div class="education">

                <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                    <?php
                    // Элемент
                    get_template_part('temp-parts/items/ed', 'item', array('container' => 'education__item'));
                    ?>

                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>

        <?php endif ?>

    </div>
</section>

<section class="section become-author">
    <div class="container">
        <h2 class="become-author__title"><?= __('Стань автором журнала Звукорежиссер', 'audioproducer') ?></h2>
        <p class="become-author__text"><?= __('Всероссийская звукорежиссерская научно-практическая конференция На «Мосфильме» пройдет семинар Андрея Левина по записи музыки для', 'audioproducer') ?></p>
        <a class="become-author__button button button_main" href="#"><?= __('Заполнить анкету', 'audioproducer') ?></a>
    </div>
</section>

<div class="container">
    <div class="two-col">
        <section class="section two-col__left">

            <?php
            // Заголовок
            get_template_part(
                'temp-parts/fragment/section',
                'title',
                array(
                    'container' => '',
                    'modifier' => '',
                    'title' => __('Новости', 'audioproducer'),
                    'button' => array(
                        'modifier' => '',
                        'link' => '',
                        'text' => '',
                    )
                )
            );
            ?>

            <?php
            $args = array(
                'cat' => array(2, 6),
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
            );
            $post_list = new WP_Query($args);
            if ($post_list->have_posts()) : ?>

                <div class="list">

                    <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                        <?php
                        // Элемент
                        get_template_part('temp-parts/items/no-image', 'item', array('container' => 'list__item'));
                        ?>

                        <?php array_push($post__not_in, get_the_ID()) ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>

                <a class="list__button button button_arrow" href="#"><?= __('Смотреть все', 'audioproducer') ?><span class="icon-arrow"></span></a>

            <?php endif ?>
        </section>

        <section class="section two-col__right">

            <?php
            // Заголовок
            get_template_part(
                'temp-parts/fragment/section',
                'title',
                array(
                    'container' => '',
                    'modifier' => 'section-title_space-between',
                    'title' => __('Статьи', 'audioproducer'),
                    'button' => array(
                        'modifier' => 'button_arrow',
                        'link' => '/articles/',
                        'text' => __('Смотреть все'),
                        'text_after' => '<span class="icon-arrow">',
                    )
                )
            );
            ?>

            <?php
            $args = array(
                'cat' => 7,
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
            $post_list = new WP_Query($args);
            if ($post_list->have_posts()) : ?>

                <div class="list-2">

                    <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>

                        <?php
                        // Элемент
                        get_template_part('temp-parts/items/post', 'item', array('container' => 'list-2__item', 'modifier' => 'post-item_with-text', 'excerpt' => true));
                        ?>

                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>

            <?php endif ?>

        </section>
    </div>
</div>

<main class="main"></main>

<?php get_footer() ?>