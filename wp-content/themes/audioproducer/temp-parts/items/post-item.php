<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>post-item<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">

    <?php if (get_the_post_thumbnail_url()) : ?>

        <a class="post-item__image-block" href="<?= the_permalink() ?>">

            <div class="post-item__image image-conteiner image-conteiner_post" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
                <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
            </div>

            <div class="image-conteiner__footnote button button_footnote"><?= (get_field('type') ? get_field('type') : footnote(get_the_category()[0])) ?></div>

        </a>

    <?php else : ?>

        <div class="post-item__footnote button button_footnote"><?= (get_field('type') ? get_field('type') : footnote(get_the_category()[0])) ?></div>

    <?php endif ?>

    <a class="post-item__link" href="<?= the_permalink() ?>">
        <h2 class="post-item__title"><?= mb_strimwidth(get_the_title(), 0, 80, ' ...') ?></h2>
    </a>

    <?php if ($args['excerpt']) : ?>

        <p class="post-item__text"><?= mb_strimwidth(get_the_excerpt(), 0, 90, ' ...') ?></p>

    <?php endif ?>

</div>