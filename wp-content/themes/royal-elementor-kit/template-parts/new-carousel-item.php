<div class="swiper-slide">
    <article class="new-carousel-item">
        <?php
        $permalink = get_permalink();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        ?>
        <div class="new-item-inner">
            <div class="new-media-wrap">
                <div class="featured-img" data-src="<?= $featured_img_url ?>">
                    <img src="<?= $featured_img_url ?>" alt="<?php the_title(); ?>"
                        class="wpr-anim-timing-ease-default">
                </div>
                <div class="new-image-category">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $bg_color = get_field('categories_background_color', 'term_' . $categories[0]->term_id);
                        $text_color = get_field('categories_color', 'term_' . $categories[0]->term_id);
                        echo '<a style="background-color:' . $bg_color . '; color: ' . $text_color . '"  href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="new-item-below-content">
                <h2 class="new-item-title">
                    <div class="inner-block">
                        <a href="<?= $permalink ?>">
                            <?php the_title(); ?>
                        </a>
                    </div>
                </h2>
                <div class="new-item-excerpt">
                    <?php echo the_excerpt() ?>
                </div>
                <div class="new-item-date">
                    <div class="inner-block">
                        <span>  <?php echo get_the_time(''); ?>
                     <?php echo get_the_date('d/m/Y') ?></span>
                    </div>
                </div>

            </div>
        </div>
    </article>
</div>