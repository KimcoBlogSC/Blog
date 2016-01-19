<?php get_header(); ?>

	<!--CONTENT-->
	<div id="content">
		
		<!--SIDEBAR-->
		<div id="sidebar_left">
			<?php get_sidebar(); ?>
		</div>
		<!--/SIDEBAR-->
		
		<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
		
		<!--MAIN-->
		<div id="main">
			
			<!--AUTHOR INFORMATION-->
			<div id="author">
				<div class="author_content">
					<h4><?php echo $curauth->display_name; ?></h4>
					<?php if(userphoto_exists($curauth)) userphoto($curauth); else echo '<div class="user_photo">' . get_avatar($curauth->ID, 64) . '</div>'; ?>
					<?php if($curauth->user_description != ''){ ?>
					<p><?php echo $curauth->user_description; ?></p>
					<?php }else{ ?>
					<p><em>There is no information about this author.</em></p>
					<?php } ?>
					<div class="clear"></div>
				</div>
				<div class="bottom"></div>
			</div>
			<!--/AUTHOR INFORMATION-->
		
			<!--CLIPPINGS-->
			<?php include 'clippings.php'; ?>
			<!--/CLIPPINGS-->
			
			<!--FOOTER-->
			<?php get_footer(); ?>
			<!--/FOOTER-->
			
		</div>
		<!--/MAIN-->
		
	</div>
	<!--/CONTENT-->

</div>
<!--/CONTAINER-->

<?php wp_footer(); ?>

</body>
</html>