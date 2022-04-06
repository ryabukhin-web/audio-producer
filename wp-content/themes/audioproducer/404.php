<?php get_header() ?>

<main class="main">
    <div class="container">
        <div class="main__pathway">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('   ||   ', $page_lang); ?>
        </div>
        
        <div class="error-404">
            <h1 class="error-404__title"><?= __('404 Ошибка', 'audioproducer') ?></h1>
            <h3 class="error-404__text"><?= __('Такой страницы несуществует, попробуйте воспользоаться меню или поиском по сайту', 'audioproducer') ?></h3>
        </div>
    </div>
</main>

<?php get_footer() ?>