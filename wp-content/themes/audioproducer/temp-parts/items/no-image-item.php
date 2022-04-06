<div class="<?= ($args['container'] ? $args['container'] . ' ' : '') ?>no-image-item<?= ($args['modifier'] ? ' ' . $args['modifier'] : '') ?>">
    
    <?php
    // Категория - дата
    get_template_part('temp-parts/fragment/post', 'info', array('container' => 'no-image-item__info', 'modifier' => ''));
    ?>

    <a class="no-image-item__link" href="<?= the_permalink() ?>">
        <h2 class="no-image-item__title"><?= mb_strimwidth(get_the_title(), 0, 80, ' ...') ?></h2>
    </a>
</div>