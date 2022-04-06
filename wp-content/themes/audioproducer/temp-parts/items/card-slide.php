<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>card-slide<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">
    <div class="card-slide__image image-conteiner image-conteiner_slide" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
        <img class="image-conteiner__image" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
    </div>
    <div class="card-slide__body">
        <h3 class="card-slide__title"><?= get_the_title() ?></h3>
        <div class="card-slide__text"><?= get_field('front_text') ?></div>
    </div>
</div>