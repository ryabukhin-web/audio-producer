<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="<?= get_stylesheet_directory_uri() ?>/favicon.svg" />
    <?php wp_head() ?>

    <?php if (is_front_page()) : ?>
        <?php //Special codes for front page 
        ?>
    <?php endif; ?>

    <?php if (get_theme_mod('theme_code_header_handle')) : ?>
        <?= get_theme_mod('theme_code_header_handle') ?>
    <?php endif; ?>

</head>

<body <?php body_class() ?>>

    <?php if (get_theme_mod('theme_code_after_body_handle')) : ?>
        <?= get_theme_mod('theme_code_after_body_handle') ?>
    <?php endif; ?>

    <header class="header<?php if (is_front_page()) : ?> header--front<?php endif ?>">
        <div class="container header__container">

            <div class="header__logo logo logo_header">
                <a class="logo__link" href="/">
                    <img class="logo__image logo__image--dark" src="<?= get_stylesheet_directory_uri() ?>/images/logo.png" width="167" height="41" alt="<?php bloginfo('name') ?>">
                </a>

                <a class="logo__link" href="https://rmu.org.ru/">
                    <img class="logo__image logo__image--dark" src="<?= get_stylesheet_directory_uri() ?>/images/logo-rmu.png" width="92" height="43" alt="Российский Музыкальный Союз">
                </a>
            </div>

            <?php
            $default = array(
                'theme_location' => 'header',
                'menu'           => 'Главное меню',
                'depth'          => 2,
                'container'      => false,
                'fallback_cb'    => false,
                'echo'           => true,
                'walker'         => new BEM_Walker_Nav_Menu(),
                'bem_block'      => 'nav',
                'items_wrap'     => '<nav class="header__nav nav"><ul class="nav__list">%3$s</ul></nav>'
            );
            wp_nav_menu($default);
            ?>

            <div class="header__panel">
                <div class="header__search icon-search js-search"></div>
                <div class="header__mobile-menu icon-menu action-menu"></div>
            </div>

        </div>
    </header>

    <div class="search-modal">
        <form role="search-form" method="get" class="search-form" action="/">
            <input value="" name="s" class="search-form__input" type="text" placeholder="<?= __('Поиск по сайту', 'audioproducer') ?>" autocomplete="off">
            <button class="search-form__button icon-search"></button>
        </form>
        <div class="search-modal__back js-search"></div>
    </div>