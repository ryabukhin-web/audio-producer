<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>post-info<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">
    <a class="post-info__category" href="<?= get_category_link(get_the_category()[0]->term_id) ?>"><?= get_the_category()[0]->cat_name ?></a>
    <div class="post-info__date"><?= get_the_date() ?></div>
</div>