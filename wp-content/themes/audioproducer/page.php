<?php get_header() ?>

<main class="main">
    <div class="container">

        <div class="main__pathway">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('||', $page_lang); ?>
        </div>

        <article class="article article_page">

            <h1 class="article__title article__title_page"><span class="icon-elepse"></span><?php the_title() ?></h1>

            <?php the_content() ?>

        </article>
        
    </div>
</main>

<?php get_footer() ?>