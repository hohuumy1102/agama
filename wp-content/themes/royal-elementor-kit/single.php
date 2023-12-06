<?php get_header(); ?>

<!-- Main Container -->
<div class="main-container">
	<?php if (have_posts()):
		while (have_posts()):
			the_post(); ?>
		<!-- article single post  -->
		<article class="agama-single-post" id="post-<?php the_ID(); ?>" <?php post_class('re-theme-post'); ?>>
			<div class="container">
				<div class="elementor-container">
					<header class=" post-header">
						<?php
							$tax_post = wp_get_post_terms(get_the_ID(), 'category');
						?>
						<ul class="breadcrumb">
							<li><a href="<?= get_permalink(get_page_by_path('tin-tuc'));?>">Tin tức</a></li>
							<li><a href="<?= get_permalink(get_page_by_path($tax_post[0]->slug)); ?>"><?= $tax_post[0]->name ?></a></li>
							<li><?php the_title(); ?></li>
						</ul>
						<h1 class="post-title">
							<?php the_title(); ?>
						</h1>



						<div class="post-excerpt">

							<?php the_excerpt() ?>

						</div>

					</header>
					
					<div class="post-media">
						<?php the_post_thumbnail(); ?>
					</div>

					<div class=" post-content">
						<?php the_content(''); ?>
					</div>
				</div>
			</div>

		</article>
		<!-- .article single post  -->

	<?php
		endwhile; // Loop End
	endif; // have_posts()
	
	?>
		





	<div class="subscribe-newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-6">
					<div class="subscribe-content">
						<div class="icon">
	 						
							<img src="<?= getAssetsImage('/icon/icon-subscribe.png'); ?>" alt="">
						</div>
						<h3 class="title">
							Subscribe to our crypto<br/>news weekly newsletter!
						</h3>
					</div>
				</div>
				<div class="col-lg-5 col-md-6">
					<?php echo do_shortcode('[contact-form-7 id="37bdcb4" title="newsletter"]')?>
				</div>
			</div>
		</div>
	</div>


	<div class="related-posts">
		<div class="container">
			<h2 class="title text-center">Bài viết liên quan</h2>
			<?php echo do_shortcode('[related_post_carousel post_id="' . get_the_ID() . '"]') ?>
		</div>
	</div>

	

</div><!-- .main-container -->

<?php get_footer(); ?>