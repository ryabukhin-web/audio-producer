<?php get_header() ?>

<main class="main">
    <div class="container">

        <div class="main__pathway">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('||', $page_lang); ?>
        </div>

        <article class="article article_container">

            <?php if (get_the_post_thumbnail_url()) : ?>
                <div class="article__image image-conteiner image-conteiner_article" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                    <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                </div>
            <?php endif ?>

            <div class="article__title-block <?= (get_the_post_thumbnail_url() ? 'article__title-block_margin' : '') ?>">

                <div class="article__info post-info">
                    <a class="post-info__category" href="<?= get_category_link(get_the_category()[0]->term_id) ?>"><?= get_the_category()[0]->cat_name ?></a>
                    <div class="post-info__date"><?= get_the_date() ?></div>
                </div>

                <h1 class="article__title article__title_single"><span class="icon-elepse"></span><?php the_title() ?></h1>

            </div>

            <div class="article__body">

                <div class="article__aside aside">
                    <div class="aside__title"><?= __('Категории', 'audioproducer') ?></div>
                    <?php
                    $default = array(
                        'theme_location' => 'header',
                        'menu'           => 'Категории',
                        'depth'          => 1,
                        'container'      => false,
                        'fallback_cb'    => false,
                        'echo'           => true,
                        'walker'         => new BEM_Walker_Nav_Menu(),
                        'bem_block'      => 'category-nav',
                        'items_wrap'     => '<nav class="aside__nav category-nav"><ul class="category-nav__list">%3$s</ul></nav>'
                    );
                    wp_nav_menu($default);
                    ?>
                </div>

                <div class="article__content">
                    <?php the_content() ?>
                </div>

            </div>

        </article>
    </div>
</main>

<?php get_footer() ?>