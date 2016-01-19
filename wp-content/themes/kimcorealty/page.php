<?php get_header(); ?>

	<!--CONTENT-->
	<div id="content">
		<!--SIDEBAR-->
		<div id="sidebar_left">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?><?php endif; ?>
		</div>
		<!--/SIDEBAR-->
		
		<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
		
		<!--PAGE INFORMATION-->
		<div id="page">
			<div class="page_content">
				<h4><?php the_title(); ?></h4>
				<div class="post"><?php the_content(__('(more...)')); ?></div>
      			<p class="postMeta"><?php edit_post_link(__('Edit'), ''); ?></p>
				<div class="clear"></div>
			</div>
			<div class="bottom"></div>
		</div>
		<!--/PAGE INFORMATION-->
	</div>
	<!--/CONTENT-->
	<?php get_footer(); ?>
</div>
<!--/CONTAINER-->
<?php wp_footer(); ?>
</body>
</html>