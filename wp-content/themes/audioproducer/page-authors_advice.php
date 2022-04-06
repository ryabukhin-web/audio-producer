<?php
/*
Template Name: Authors_advice
Template Post Type: page
*/
?>

<?php get_header() ?>

<main class="main">
    <div class="container">
        <?php $cat = get_the_category(); ?>
        <div class="main-title main-title--single">
            <h2 class="main-title__title title title--uppercase"><?= the_title() ?></h2>
            <div class="main-title__icon">
                <?php if (get_field('icon_class')) : ?>
                    <span class="<?= get_field('icon_class') ?>" <?php if (get_field('icon_class_width')) : ?> style="font-size: <?= get_field('icon_class_width') ?>px" <?php endif ?>></span>
                <?php endif ?>
            </div>
        </div>

        <div class="page-container authors-advice">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="authors-advice__article article">
                        <?php the_content() ?>
                    </div>

                    <?php
                    $args = array(
                        'post_type' => 'author_s_advice',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'orderby'   => 'menu_order',
                        'order'     => 'ASC'
                    );
                    $post_list = new WP_Query($args);

                    if ($post_list->have_posts()) :
                    ?>
                        <div class="authors-advice__content">
                            <?php while ($post_list->have_posts()) : $post_list->the_post(); ?>
                                <div class="authors-advice__item authors-item">
                                    <div class="authors-item__image image-conteiner" style="background-image: url(<?= get_the_post_thumbnail_url() ?>)">
                                        <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                        <div class="authors-item__back"></div>
                                    </div>
                                    <h3 class="authors-item__title"><?= the_title() ?></h3>
                                    <div class="authors-item__text"><?php the_content() ?></div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    <?php endif ?>

                <?php endwhile ?>
            <?php else : ?>
                <p><?= __('Page in development', 'mora') ?></p>
            <?php endif ?>
        </div>
    </div>
</main>

<?php get_footer() ?>