<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>guild-item<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">

    <?php if (get_the_post_thumbnail_url()) : ?>
        <div class="guild-item__image image-conteiner image-conteiner_guild" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
            <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
        </div>
    <?php endif ?>

    <h2 class="guild-item__title"><?= mb_strimwidth(get_the_title(), 0, 80, ' ...') ?></h2>

    <p class="guild-item__text"><?= get_field('status') ?></p>

</div>