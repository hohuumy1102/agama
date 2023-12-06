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
						
						<ul class="breadcrumb">
							<li><a href="<?= get_permalink(get_page_by_path('trung-tam-ho-tro'));?>">Trung tâm hỗ trợ</a></li>
					
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
		
	

</div><!-- .main-container -->

<?php get_footer(); ?>