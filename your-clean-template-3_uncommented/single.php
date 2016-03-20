<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?>">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="meta">
						<p>Опубликовано: <?php the_time('F j, Y в H:i'); ?></p>
						<p>Автор:  <?php the_author_posts_link(); ?></p>
						<p>Категории: <?php the_category(',') ?></p>
						<?php the_tags('<p>Тэги: ', ',', '</p>'); ?>
					</div>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
			<?php previous_post_link('%link', '<- Предыдущий пост: %title', TRUE); ?> 
			<?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); ?> 
			<?php if (comments_open() || get_comments_number()) comments_template('', true); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>