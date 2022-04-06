<footer class="footer">

    <?php
    // Пописка на новые материалы
    get_template_part('temp-parts/fragment/subscription');
    ?>

    <div class="footer__main">
        <div class="container">
            <div class="footer__container">

                <div class="footer__logo logo">
                    <a class="logo__link" href="/">
                        <img class="logo__image logo__image_l" src="<?= get_stylesheet_directory_uri() ?>/images/logo-l.png" width="235" height="39" alt="<?php bloginfo('name') ?>">
                    </a>
                </div>

                <div class="footer__menu">
                    <?php
                    $default = array(
                        'theme_location' => 'footer',
                        'menu'           => 'Нижнее меню 1',
                        'depth'          => 1,
                        'container'      => false,
                        'fallback_cb'    => false,
                        'echo'           => true,
                        'walker'         => new BEM_Walker_Nav_Menu(),
                        'bem_block'      => 'f-nav',
                        'items_wrap'     => '<nav class="footer__nav f-nav"><ul class="f-nav__list">%3$s</ul></nav>'
                    );
                    wp_nav_menu($default);
                    ?>
                </div>

                <div class="footer__menu">
                    <?php
                    $default = array(
                        'theme_location' => 'footer',
                        'menu'           => 'Нижнее меню 2',
                        'depth'          => 1,
                        'container'      => false,
                        'fallback_cb'    => false,
                        'echo'           => true,
                        'walker'         => new BEM_Walker_Nav_Menu(),
                        'bem_block'      => 'f-nav',
                        'items_wrap'     => '<nav class="footer__nav f-nav"><ul class="f-nav__list">%3$s</ul></nav>'
                    );
                    wp_nav_menu($default);
                    ?>
                </div>

                <div class="footer__menu footer__menu_gold">
                    <?php
                    $default = array(
                        'theme_location' => 'footer',
                        'menu'           => 'Нижнее меню 3',
                        'depth'          => 1,
                        'container'      => false,
                        'fallback_cb'    => false,
                        'echo'           => true,
                        'walker'         => new BEM_Walker_Nav_Menu(),
                        'bem_block'      => 'f-nav',
                        'items_wrap'     => '<nav class="footer__nav f-nav"><ul class="f-nav__list">%3$s</ul></nav>'
                    );
                    wp_nav_menu($default);
                    ?>
                </div>

            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="footer__copy">2022. <?= __('Все права защищены. Звукорежиссер', 'audioproducer') ?></div>
        </div>
    </div>

</footer>

<?php wp_footer() ?>

<?php if (get_theme_mod('theme_code_before_close_body_handle')) : ?>
    <?= get_theme_mod('theme_code_before_close_body_handle') ?>
<?php endif; ?>

</body>

</html>