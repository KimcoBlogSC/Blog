<?php get_header(); ?>

<script type="text/javascript">
$(document).ready(function(){
	<?php
	//GETS TOTAL POSTS
	$numposts = wp_count_posts()->publish;
	
	//GETS POSTS IN CURRENT CATEGORY
	function wt_get_category_count($input = '') {
		global $wpdb;
		if($input == ''){
			$category = get_the_category();
			return $category[0]->category_count;
		}
		elseif(is_numeric($input)){
			$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
			return $wpdb->get_var($SQL);
		}
		else{
			$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
			return $wpdb->get_var($SQL);
		}
	}
	
	/*----------------------------------------------------------------------*/
	
	//GETS CATEGORY OR TAG NUMBER FOR PASSING TO AJAX
	$catnum = get_query_var('cat');

	$tag = get_query_var('tag');

	if($catnum != ''){
		print 'var catnum = ' . get_query_var('cat') . ';' . "\n";
	}
	
	if($tag != ''){
		print "var tag = '" . get_query_var('tag') . "';" . "\n";
	}
	
	//GETS TOTAL NUMBER OF POSTS
	if ( is_home() ) {
		//HOME
		print 'var numposts = ' . $numposts . ';';
	} 
	else if (is_category()) {
		//CATEGORY PAGE
		$cat = get_query_var('cat');
		$yourcat = get_category($cat);
		print 'var numposts = ' . wt_get_category_count($yourcat->slug) . ';';
	}
	else{
		//TAG PAGE
		$tag= get_query_var('tag');
		$yourtag = get_category($tag);
		
		$taxonomy = "post_tag";
		$term = get_term_by('slug', $yourtag->slug, $taxonomy);
		$yourtag = $wp_query->get_queried_object();
		print 'var numposts= ' . $yourtag->count . ';';
	}
	?>
	
	var offset = 8;
	var col = 0;
	var counter = 0;
	
	<!--MORE LINK-->
	$('#more_link').click(function() {
		ajaxLoad(col, offset);
	});
	
	<!--REMOVES 'MORE' ON LOAD IF POSTS ARE < 9-->
	if(numposts <= 9){
		$("#more").css('display', 'none');
	}
	
	<!--LOADS AJAX-->
	function ajaxLoad(){
		col++;
		if(col==4){
			col=1;
		}
		offset++;
		ajaxGet(col, offset);
	}
	
	<!--PERFORMS AJAX-->
	function ajaxGet(col, offset){
		counter++;
		$.ajax({
			url: "<?php echo get_settings('home'); ?>/wp-content/themes/kimcorealty/get_posts.php?offset="+offset<?php if($catnum != ''){print '+"&catnum="+catnum';} if($tag != ''){print '+"&tag="+tag';} ?>,
			cache: false,
			success: function(html){
				$("#clippings_col"+col).append(html);
				
				<?php
				$category_ids = get_all_category_ids();
				$catcounter=0;
				foreach($category_ids as $cat_id) {
					$catcounter++;
					$cat_name = get_cat_name($cat_id);
					echo '$(".cat-item-' . $cat_id . '").css("background-image", "url(' . get_stylesheet_directory_uri() . '/images/cat_color_' . $catcounter . '.png)");' . "\n";
				}
				?>
				
				$('a.cat_link').each(function(){
					$(this).css('padding-top', $(this).parent().css('height'));
				});
				
				Cufon.replace('h4', { hover: true, fontFamily: 'Gil' });
				
				$(".magic_clipping").stop().animate({"opacity": "1"}, 400, function(){});
				
				if(offset+1 >= numposts){
					$("#more").css('display', 'none');
				}
				if(counter % 9 != 0 && offset < numposts){
					ajaxLoad();
				}
			}
		});
	}
});
</script>
	
	<!--CONTENT-->
	<div id="content">
		
		<!--SIDEBAR-->
		<div id="sidebar_left">
			<?php get_sidebar(); ?>
		</div>
		<!--/SIDEBAR-->
		
		<!--MAIN-->
		<div id="main">
			
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