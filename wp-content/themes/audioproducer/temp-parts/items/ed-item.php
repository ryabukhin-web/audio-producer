<a class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>ed-item<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>" href="<?= get_field('link') ?>" target="_blank">
    <h3 class="ed-item__title"><?php the_title() ?></h3>
    <img class="ed-item__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
</a>