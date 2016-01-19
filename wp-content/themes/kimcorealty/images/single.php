<?php get_header(); ?>

	<!--CONTENT-->
	<div id="content">
		<!--SIDEBAR-->
		<div id="sidebar_left">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?><?php endif; ?>
		</div>
		<!--/SIDEBAR-->
		<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!--ARTICLE-->
		<div id="article" class="cat-<?php the_category_ID(); ?>">
			<div class="top"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?></div>
			<!--ARTICLE TITLE-->
			<div class="title">
				<a href="?cat=<?php the_category_ID(); ?>" class="cat_link"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a>
				<div class="title_content">
					<h4><?php the_title(); ?></h4>
					<div class="author_date">Posted by <?php the_author_posts_link(); ?>, <?php the_date(); ?></div>
				</div>
			</div>
			<!--/ARTICLE TITLE-->
			<div class="clear"></div>
			<!--ARTICLE CONTENT-->
			<div class="article_content">
				<?php the_content(__('(more...)')); ?>
				<div class="category_tags">
					<p>Categories: <?php the_category(', ') . " " . the_tags(__('<br />Tags: '), ', ', ' '); ?><?php edit_post_link(__('<br /><br />Edit Post'), ' '); ?></p>
				</div>
			</div>
			<!--/ARTICLE CONTENT-->
			<div class="clear"></div>
			<?php comments_template(); endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
			
			<?php get_footer(); ?>
			
		</div>
		<!--/ARTICLE-->
		<!--RIGHT SIDEBAR-->
		<div id="sidebar_right">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?><?php endif; ?>
		</div>
		<!--/RIGHT SIDEBAR-->
	</div>
	<!--/CONTENT-->
	<?php get_footer(); ?>
</div>
<!--/CONTAINER-->
<?php wp_footer(); ?>
</body>
</html>