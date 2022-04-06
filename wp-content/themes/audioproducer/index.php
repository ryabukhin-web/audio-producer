<?php get_header() ?>

<main class="main">
    <div class="container">
        <?php $cat = get_the_category(); ?>
        <div class="main-title main-title--single">
            <h2 class="main-title__title title title--uppercase"><?= the_title() ?></h2>
            <div class="main-title__icon">
                <span class="icon-card"></span>
            </div>
        </div>

        <div class="page-container authors-advice">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="authors-advice__article article">
                        <?php the_content() ?>
                    </div>

                <?php endwhile ?>
            <?php else : ?>
                <p><?= __('Page in development', 'mora') ?></p>
            <?php endif ?>
        </div>
    </div>
</main>

<?php get_footer() ?>