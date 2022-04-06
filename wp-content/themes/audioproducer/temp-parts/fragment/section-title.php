<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>section-title<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">
    <h2 class="section-title__title"><span class="icon-elepse"></span><?= $args['title'] ?></h2>
    <?php if ($args['button']) : ?>
        <a class="section-title__button button<?= ($args['button']['modifier'] ? ' ' . $args['button']['modifier'] : '') ?>" href="<?= ($args['button']['link'] ? ' ' . $args['button']['link'] : '#') ?>"><?= $args['button']['text'] ?><?= $args['button']['text_after'] ?></a>
    <?php endif ?>
</div>