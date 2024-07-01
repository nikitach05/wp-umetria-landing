<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<script>
    document.querySelector('.header').setAttribute('data-white', '');
</script>

<section class="page-404">
    <div class="container">
        <div class="page-404__inner">
            <div class="page-404__title">
                <h1>404</h1>
            </div>
            <div class="page-404__text"><? pll_e('Page not found'); ?></div>
            <a href="/" class="page-404__btn btn btn--black"><? pll_e('Home page'); ?></a>
        </div>
    </div>
</section>

<?php
get_footer();
