<?php

// News Carousel 
function news_carousel_shortcode($args, $content)
{
    ob_start();

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

    $my_query = new WP_Query($args);

    ?>
    <!-- <section class="section section-news" id="news"> -->
    <section class="section section-news" data-target="news">
        <div class="container">


            <div class="news-box">
                <div class="slider-news swiper-container">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <?php if ($my_query->have_posts()):
                            while ($my_query->have_posts()):
                                $my_query->the_post();
                                    get_template_part('template-parts/new-carousel-item');
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
                <div class="button-swiper new-button-prev"></div>
                <div class="button-swiper new-button-next"></div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function () {
            var speed = 4000;
            if (jQuery('.slider-news').length) {
                new Swiper(".slider-news", {
                    effect: 'slide',
                    loop: true,
                    speed: 600,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                    watchOverflow: true,
                    autoplay: {
                        delay: speed,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1: {
                            slidesPerView: 1,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        450: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 30
                        }
                    },
                    on: {
                        init: function () {
                        }, transitionStart: function () {
                        }, transitionEnd: function () {
                        }
                    },
                    navigation: {
                        nextEl: '.slider-news .new-button-next',
                        prevEl: '.slider-news .new-button-prev',
                    },
                    pagination: {
                        el: '.slider-news .swiper-pagination',
                    },
                    a11y: {
                        enabled: true
                    }
                });

            }
        })

    </script>

    <?php
    $content = ob_get_clean();
    return $content;
}


add_shortcode('news_carousel', 'news_carousel_shortcode');


// Social Media Carousel 
function social_media_carousel_shortcode($args, $content)
{
    ob_start();

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'social_media',
        'post_status' => 'publish'
    );

    $my_query = new WP_Query($args);

    ?>
    <!-- <section class="section section-news" id="news"> -->
    <section class="section section-social-media" data-target="social-media">
        <div class="container">
            <div class="news-box">
                <div class="slider-social-media swiper-container">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <?php if ($my_query->have_posts()):
                            while ($my_query->have_posts()):
                                $my_query->the_post(); ?>
                                <div class="swiper-slide">
                                    <article class="new-carousel-item">
                                        <?php
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
                                                    $categories = get_the_terms(get_the_ID(), 'category_social_media');
                                                    // $terms = get_the_terms($post->ID, 'product_svl');
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
                                                    <div class="inner-block"><a href="">
                                                            <?php the_title(); ?>
                                                        </a></div>
                                                </h2>
                                                <div class="new-item-excerpt">
                                                    <?php echo the_excerpt() ?>
                                                </div>
                                                <div class="new-item-date">
                                                    <div class="inner-block">
                                                        <span>08:00am, 23/11/2023</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
                <div class="button-swiper new-button-prev"></div>
                <div class="button-swiper new-button-next"></div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function () {
            var speed = 4000;
            if (jQuery('.slider-social-media').length) {
                new Swiper(".slider-social-media", {
                    effect: 'slide',
                    loop: true,
                    speed: 600,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                    watchOverflow: true,
                    autoplay: {
                        delay: speed,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1: {
                            slidesPerView: 1,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        450: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 30
                        }
                    },
                    on: {
                        init: function () {
                        }, transitionStart: function () {
                        }, transitionEnd: function () {
                        }
                    },
                    navigation: {
                        nextEl: '.slider-social-media .new-button-next',
                        prevEl: '.slider-social-media .new-button-prev',
                    },
                    pagination: {
                        el: '.slider-social-media .swiper-pagination',
                    },
                    a11y: {
                        enabled: true
                    }
                });

            }
        })

    </script>

    <?php
    $content = ob_get_clean();
    return $content;
}


add_shortcode('social_media_carousel', 'social_media_carousel_shortcode');





function product_service_carousel_shortcode($args, $content)
{
    ob_start();

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'social_media',
        'post_status' => 'publish'
    );

    $my_query = new WP_Query($args);

    ?>
    <!-- <section class="section section-news" id="news"> -->
    <section class="section section-product-service" data-target="product-service">
        <div class="container">
            <?php $terms = get_terms('category_product_service'); ?>

            <div class="product-service-box">
                <div class="slider-product-service swiper-container">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <?php foreach ($terms as $term) { ?>
                            <div class="swiper-slide">
                                <?php
                                $bg_color = get_field('categories_background_color', 'term_' . $term->term_id);
                                $categories_icon = get_field('categories_icon', 'term_' . $term->term_id);
                                $categories_icon_url = $categories_icon['url'];
                                $my_query = new WP_Query(
                                    array(
                                        'post_type' => 'product_service',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'category_product_service',
                                                'field' => 'slug',
                                                'terms' => array($term->slug),
                                                'operator' => 'IN'
                                            )
                                        ),
                                        'posts_per_page' => -1,
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'post_status' => 'publish',
                                    )
                                );

                                ?>

                                <article class="product-service-carousel-item">
                                    <div class="product-service-header">
                                        <div class="icon">
                                            <img src="<?= $categories_icon_url ?>" alt="">
                                        </div>
                                        <h3 class="title">
                                            <?php echo $term->name ?>
                                        </h3>
                                    </div>


                                    <div class="product-service-content" style="background-color: <?= $bg_color ?>">
                                        <div class="services">

                                            <?php if ($my_query->have_posts()):
                                                while ($my_query->have_posts()):
                                                    $my_query->the_post() ?>
                                                    <div class="item">
                                                        <?php $icon = get_field('icon', get_the_ID()); ?>
                                                        <div class="icon">
                                                            <img src="<?= $icon['url'] ?>" alt="">
                                                        </div>
                                                        <h5 class="title">
                                                            <?php the_title(); ?>
                                                        </h5>
                                                    </div>
                                                <?php endwhile; endif; ?>


                                            <?php
                                            $my_query = null;
                                            wp_reset_postdata();
                                            ?>

                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function () {
            var speed = 4000;
            if (jQuery('.slider-product-service').length) {
                new Swiper(".slider-product-service", {
                    effect: 'slide',
                    loop: true,
                    speed: 600,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                    watchOverflow: true,
                    autoplay: {
                        delay: speed,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1: {
                            slidesPerView: 1,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        450: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 30
                        }
                    },
                    on: {
                        init: function () {
                        }, transitionStart: function () {
                        }, transitionEnd: function () {
                        }
                    },
                    navigation: {

                    },
                    pagination: {
                        el: '.slider-product-service .swiper-pagination',
                    },
                    a11y: {
                        enabled: true
                    }
                });

            }
        })

    </script>

    <?php
    $content = ob_get_clean();
    return $content;
}


add_shortcode('product_service_carousel', 'product_service_carousel_shortcode');


function post_grid_shortcode($args, $content)
{
    ob_start();

    $posts_per_page = $args['posts_per_page'];
    $term_slug = $args['term_slug'];


    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $term_slug,
            )
        )
    );

    $my_query = new WP_Query($args); ?>


    <!-- Start section Post grid -->
    <section class="post-grid">

        <?php
        if ($my_query->have_posts()):
            while ($my_query->have_posts()):
                $my_query->the_post();
                get_template_part('template-parts/post-grid-item');
            endwhile;
        endif;
        $my_query = null;
        wp_reset_postdata();
        ?>

    </section>
    <!-- End section Post grid -->



    <?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('post_grid', 'post_grid_shortcode');



function post_grid_carousel_shortcode($args, $content)
{
    ob_start();

    $posts_per_page = $args['posts_per_page'];


    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',

    );

    $my_query = new WP_Query($args); ?>


    <!-- Start section Post grid -->
    <section class="post-grid-carousel">
        <div class="swiper-post-grid-carousel swiper-container">
            <div class="swiper-wrapper">
                <?php
                if ($my_query->have_posts()):
                    while ($my_query->have_posts()):
                        $my_query->the_post();
                        get_template_part('template-parts/post-grid-item-slide');
                    endwhile;
                endif;
                $my_query = null;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <!-- End section Post grid -->
    <script>
        jQuery(document).ready(function () {
            var speed = 4000;
            if (jQuery('.swiper-post-grid-carousel').length) {
                new Swiper(".swiper-post-grid-carousel", {
                    effect: 'slide',
                    loop: true,
                    speed: 600,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                    watchOverflow: true,
                    autoplay: {
                        delay: speed,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1: {
                            slidesPerView: 1,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        450: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 1,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 30
                        }
                    },
                    on: {
                        init: function () {
                        }, transitionStart: function () {
                        }, transitionEnd: function () {
                        }
                    },
                    navigation: {

                    },
                    pagination: {
                        el: '.slider-product-service .swiper-pagination',
                    },
                    a11y: {
                        enabled: true
                    }
                });

            }
        })

    </script>
    <?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('post_grid_carousel', 'post_grid_carousel_shortcode');




function post_grid_feature_shortcode($args, $content)
{
    ob_start();

    $posts_per_page = $args['posts_per_page'];

    $prefix = WPFP_META_PREFIX;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        
    );
    $args['meta_query'] = array(
        array(
            'key' => $prefix . 'featured_post',
            'value' => 1,
            'compare' => '=',
        )
    );

    $my_query = new WP_Query($args); ?>

    <section class="post-grid-feature-shortcode">
        <div class="post-grid-feature-single">
            <?php
                $first = 1;
                if ($my_query->have_posts()):
                    while ($my_query->have_posts() && $first == 1):
                        $my_query->the_post();
                        get_template_part('template-parts/post-grid-feature-single');
                        $first++;
                    endwhile;
                endif;

            ?>
            
        </div>
        <div class="post-grid-feature-list">
            <div class="post-list-scroll">

                <?php
                    $first = 1;
                    if ($my_query->have_posts()):
                        while ($my_query->have_posts()):
                            $my_query->the_post();
                            if($first > 1){
                                get_template_part('template-parts/post-grid-feature-list');
                            }
                            $first++;
                        endwhile;
                    endif;

                ?>

            </div>
        </div>
    </section>

    <?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('post_grid_feature', 'post_grid_feature_shortcode');



function post_grid_pagination_shortcode($args, $content)
{
    ob_start();

    
    ?>
    <?php $search_query = get_search_query();
    echo 'Search Query '.$search_query;
            ?>
    <section class="post-grid">
        <?php

            $posts_per_page = $args['posts_per_page'];
            $term_slug = $args['term_slug'];

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $term_slug,
                    )
                )
            );
        $loop = new WP_Query($args); ?>
        <?php  if ($loop->have_posts()): while ( $loop->have_posts() ) : $loop->the_post(); ?>
        
            <?php get_template_part('template-parts/post-grid-item'); ?>


        <?php endwhile; endif;
            $my_query = null;
            wp_reset_postdata();
        ?>  

        <div class="post-pagination">
        <?php

            $big = 999999999; // need an unlikely integer
            echo paginate_links(
                array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $loop->max_num_pages
                )
            ) ?>
        </div>    
                

    </section>
     <?php
    
    $content = ob_get_clean();
    return $content;
}

add_shortcode('post_grid_pagination', 'post_grid_pagination_shortcode');


function post_grid_search_pagination_shortcode($args, $content) {
    ob_start();

    $search_query = get_search_query();
    ?>
       
        <section class="post-grid">
            <div class="key-search">Tìm kiếm với từ khóa: <strong><?= $search_query; ?></strong> </div>
            <?php

            $posts_per_page = $args['posts_per_page'];

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'title_filter' => $search_query,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
               
            );
            $loop = new WP_Query($args); ?>
            <?php if($loop->have_posts()) {
                while($loop->have_posts()):
                    $loop->the_post(); ?>
        
                        <?php get_template_part('template-parts/post-grid-item'); ?>


                <?php endwhile; 
            } else {
                get_template_part('template-parts/post-not-found');
            }
            $my_query = null;
            wp_reset_postdata();
            ?>  

            <div class="post-pagination">
            <?php

            $big = 999999999; // need an unlikely integer
            echo paginate_links(
                array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $loop->max_num_pages
                )
            ) ?>
            </div>    
                

        </section>
         <?php

         $content = ob_get_clean();
         return $content;
}

add_shortcode('post_grid_search_pagination', 'post_grid_search_pagination_shortcode');

function event_carousel_shortcode($args, $content)
{
    ob_start();

    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

    $my_query = new WP_Query($args);

    ?>
        <!-- <section class="section section-news" id="news"> -->
        <section class="section section-events" data-target="events">
            <div class="container">


                <div class="events-box">
                    <div class="slider-events swiper-container">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <?php if ($my_query->have_posts()):
                                while ($my_query->have_posts()):
                                    $my_query->the_post(); ?>
                                            <div class="swiper-slide">
                                                <article class="events-carousel-item">
                                                    <?php
                                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                                    ?>
                                                    <div class="new-item-inner">
                                                        <div class="new-media-wrap">
                                                            <div class="featured-img" data-src="<?= $featured_img_url ?>">
                                                                <img src="<?= $featured_img_url ?>" alt="<?php the_title(); ?>"
                                                                    class="wpr-anim-timing-ease-default">
                                                            </div>
                                                            
                                                            <h3 class="new-item-title">
                                                                <a href="">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>
                                                       
                                                    </div>
                                                </article>
                                            </div>
                                    <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                    <div class="button-swiper new-button-prev"></div>
                    <div class="button-swiper new-button-next"></div>
                </div>
            </div>
        </section>

        <script>
            jQuery(document).ready(function () {
                var speed = 4000000;
                if (jQuery('.slider-events').length) {
                    new Swiper(".slider-events", {
                        effect: 'slide',
                        loop: true,
                        speed: 600,
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 20,
                        watchOverflow: true,
                        autoplay: {
                            delay: speed,
                            disableOnInteraction: false,
                        },
                        on: {
                            init: function () {
                            }, transitionStart: function () {
                            }, transitionEnd: function () {
                            }
                        },
                        navigation: {
                            nextEl: '.slider-events .new-button-next',
                            prevEl: '.slider-events .new-button-prev',
                        },
                        pagination: {
                            el: '.slider-events .swiper-pagination',
                        },
                        a11y: {
                            enabled: true
                        }
                    });

                }
            })

        </script>

        <?php
        $content = ob_get_clean();
        return $content;
}


add_shortcode('event_carousel', 'event_carousel_shortcode');



function outstanding_offers_carousel_shortcode($args, $content)
{
    ob_start();

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

    $my_query = new WP_Query($args);

    ?>
        <!-- <section class="section section-news" id="news"> -->
        <section class="section section-outstanding-offers" data-target="news">
            <div class="container">


                <div class="outstanding-offers-box">
                    <div class="slider-outstanding-offers swiper-container">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <?php if ($my_query->have_posts()):
                                while ($my_query->have_posts()):
                                    $my_query->the_post();
                                        get_template_part('template-parts/post-grid-item-outstanding-offers-slide');
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                    <div class="button-swiper new-button-prev"></div>
                    <div class="button-swiper new-button-next"></div>
                </div>
            </div>
        </section>

        <script>
            jQuery(document).ready(function () {
                var speed = 4000;
                if (jQuery('.slider-outstanding-offers').length) {
                    new Swiper(".slider-outstanding-offers", {
                        effect: 'slide',
                        loop: true,
                        speed: 600,
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 20,
                        watchOverflow: true,
                        autoplay: {
                            delay: speed,
                            disableOnInteraction: false,
                        },
                        breakpoints: {
                            1: {
                                slidesPerView: 1,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            450: {
                                slidesPerView: 2,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            768: {
                                slidesPerView: 2,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            1024: {
                                slidesPerView: 3,
                                slidesPerGroup: 3,
                                spaceBetween: 30
                            }
                        },
                        on: {
                            init: function () {
                            }, transitionStart: function () {
                            }, transitionEnd: function () {
                            }
                        },
                        navigation: {
                            nextEl: '.slider-outstanding-offers .new-button-next',
                            prevEl: '.slider-outstanding-offers .new-button-prev',
                        },
                        pagination: {
                            el: '.slider-outstanding-offers .swiper-pagination',
                        },
                        a11y: {
                            enabled: true
                        }
                    });

                }
            })

        </script>

        <?php
        $content = ob_get_clean();
        return $content;
}


add_shortcode('outstanding_offers_carousel', 'outstanding_offers_carousel_shortcode');


function contact_form_register_shortcode(){
    ob_start();

    echo do_shortcode('[contact-form-7 id="237be58" title="Đăng ký trải nghiệm"]');

    ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
            method: "GET", 
            responseType: "application/json", 
            };
        var promise = axios(Parameter);
        promise.then(function (result) {
         renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function () {
                district.length = 1;
                ward.length = 1;
                if(this.value != ""){
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function () {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>
    <?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('contact_form_register', 'contact_form_register_shortcode');

function contact_form_join_agama_shortcode(){
    ob_start();

    echo do_shortcode('[contact-form-7 id="ec816fc" title="Tham gia Agama"]');

    
    $content = ob_get_clean();
    return $content;
}

add_shortcode('contact_form_join_agama', 'contact_form_join_agama_shortcode');

function contact_form_join_platform_agama_shortcode(){
    ob_start();

    echo do_shortcode('[contact-form-7 id="40cac39" title="Tham gia nền tảng Agama"]');

    
    $content = ob_get_clean();
    return $content;
}

add_shortcode('contact_form_join_platform_agama', 'contact_form_join_platform_agama_shortcode');


function related_post_carousel_shortcode($args, $content) {
    ob_start();
    $post_id = $args['post_id'];
    $terms = wp_get_post_terms($post_id, array('category_article_type'));
    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date',
        'category__in' => wp_get_post_categories($post_id),
        'post__not_in' => array($post_id),
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category_article_type',
                'field' => 'id',
                'terms' => $terms[0]->term_id,
            )
        )
    );

    $my_query = new WP_Query($args);

    ?>
        <!-- <section class="section section-news" id="news"> -->
        <section class="section section-post-related" data-target="post-related">
            <div class="container">


                <div class="post-related-box">
                    <div class="slider-post-related swiper-container">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <?php if($my_query->have_posts()):
                                while($my_query->have_posts()):
                                    $my_query->the_post();
                                    get_template_part('template-parts/post-related');
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                        
                    </div>
                     <div class="button-swiper new-button-prev"></div>
                    <div class="button-swiper new-button-next"></div>        
                   
                </div>
            </div>
        </section>

        <script>
            jQuery(document).ready(function () {
                var speed = 4000;
                if (jQuery('.slider-post-related').length) {
                    new Swiper(".slider-post-related", {
                        effect: 'slide',
                        loop: true,
                        speed: 600,
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 20,
                        watchOverflow: true,
                        autoplay: {
                            delay: speed,
                            disableOnInteraction: false,
                        },
                        breakpoints: {
                            1: {
                                slidesPerView: 1,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            450: {
                                slidesPerView: 2,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            768: {
                                slidesPerView: 2,
                                slidesPerGroup: 1,
                                spaceBetween: 20
                            },
                            1024: {
                                slidesPerView: 3,
                                slidesPerGroup: 3,
                                spaceBetween: 30
                            }
                        },
                        on: {
                            init: function () {
                            }, transitionStart: function () {
                            }, transitionEnd: function () {
                            }
                        },
                        navigation: {
                            nextEl: '.post-related-box .new-button-next',
                            prevEl: '.post-related-box .new-button-prev',
                        },
                        pagination: {
                            el: '.post-related-box .swiper-pagination',
                        },
                        a11y: {
                            enabled: true
                        }
                    });

                }
            })

        </script>

        <?php
        $content = ob_get_clean();
        return $content;
}


add_shortcode('related_post_carousel', 'related_post_carousel_shortcode');