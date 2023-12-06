<?php
    /**
     * Template part for displaying posts
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package WordPress
     */



    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    $permalink = get_permalink();

    $terms = wp_get_post_terms(get_the_ID(), array('category_article_type'));
    
	?>
    <div class="swiper-slide">
        <article class="post-grid-item-carousel" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-grid-item-inner">
                <div class="post-grid-media-wrap">
                    <div class="post-grid-media-inner">
                        <img src="<?= $thumbnail_url ?>" alt="">
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
                        <?php the_excerpt() ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
    

