<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */



$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$permalink = get_permalink();

$terms = wp_get_post_terms(get_the_ID(), array('category_article_type'));
?>


<article class="post-grid-item" id="post-2028">
    <div class="post-grid-item-inner">
        <div class="post-grid-media-wrap">
            <div class="post-grid-media-inner">
                <img decoding="async" src="<?= $thumbnail_url ?>" alt="<?php the_title() ?>">            
            </div>

            <div class="post-grid-item-category">
                <?php foreach ($terms as $term) { ?>
                    <?php
                    $bg_color = get_field('categories_background_color', 'term_' . $term->term_id);
                    $text_color = get_field('categories_color', 'term_' . $term->term_id);
                    $style = 'background-color:' . $bg_color . '; color: ' . $text_color . ';';
                    ?>
                        <span class="tax-item" style="<?= $style; ?>">
                            <?= $term->name ?>
                        </span>
                <?php } ?>
            </div>
        </div>

        <div class="post-grid-content-wrap">

            <h3 class="post-grid-item-title">
                <a href="<?= $permalink ?>" target="_self">
                    <?php the_title() ?>
                </a>
            </h3>
            <div class="post-grid-item-excerpt">
                <?php echo get_the_excerpt() ?>
            </div>

            <div class="post-grid-item-datetime">
                <?php echo get_the_date('d/m/Y') ?>
            </div>
        </div>
</article>