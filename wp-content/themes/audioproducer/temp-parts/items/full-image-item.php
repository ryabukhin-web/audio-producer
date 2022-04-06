<a class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>full-image-item<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>" href="<?= the_permalink() ?>">
    <div class="full-image-item__image image-conteiner image-conteiner_full" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
        <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
    </div>
    <div class="full-image-item__footnote button button_footnote"><?= (get_field('type') ? get_field('type') : footnote(get_the_category()[0])) ?></div>
    <h2 class="full-image-item__title"><?= mb_strimwidth(get_the_title(), 0, 80, ' ...') ?></h2>
</a>