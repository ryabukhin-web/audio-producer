<script>
    var this_page = 1;
</script>

<div class="main__more">
    <div class="button button_more js-loadmore" title="<?= __('Показать еще', 'audioproducer') ?>" data-param-posts='<?= $args['data-param-posts'] ?>' data-max-pages='<?= $args['data-max-pages'] ?>' data-tpl='<?= ($post->post_type ? $post->post_type : 'post') ?>' <?php if ($args['search']) : ?> data-search='<?= $args['search'] ?>' <?php endif ?> data-posts-per-page='<?= ($args['data-posts-per-page'] ? $args['data-posts-per-page'] : '16') ?>'>
        <span class="icon-load"></span><?= __('Показать еще', 'audioproducer') ?>
    </div>
</div>