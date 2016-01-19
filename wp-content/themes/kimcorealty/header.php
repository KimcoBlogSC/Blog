<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

<?php
wp_get_archives('type=monthly&format=link');
wp_head();
?>
<script>var $ = jQuery.noConflict();</script>

<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/garamond.font.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/gilsans.font.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/gilsans-light.font.js"></script>
<script type="text/javascript">
Cufon.replace('h3', { hover: true, fontFamily: 'Gil' });
Cufon.replace('h4', { hover: true, fontFamily: 'Gil' });
<?php if(is_front_page() != 'true'){?>
Cufon.replace('h5', { hover: true, fontFamily: 'Gil' });
<?php } ?>
</script>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.labelify.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("input:text").labelify({labelledClass: "labelinside"});
	$('a.cat_link').each(function(){
		$(this).css('padding-top', $(this).parent().css('height'));
	});
	
	/*CATEGORY COLOR ASSIGNMENTS*/
	<?php
	$category_ids = get_all_category_ids();
	$catcounter=0;
	foreach($category_ids as $cat_id) {
		$catcounter++;
		$cat_name = get_cat_name($cat_id);
		//SIDEBAR
		echo '$(".sidebar_categories li.cat-item-' . $cat_id . '").css("background-image", "url(' . get_stylesheet_directory_uri() . '/images/cat_color_' . $catcounter . '.png)");' . "\n";
		//CLIPPINGS
		echo '$(".cat-item-' . $cat_id . ' a.cat_link").css("background-image", "url(' . get_stylesheet_directory_uri() . '/images/cat_color_' . $catcounter . '.png)");' . "\n";
	}
	?>
	
	//RESIZE OBJECT TAGS (IE NON-COMPATIBILITY BUG)
	$('.clipping embed').each(function(){
		var width = $(this).width();
		var ratio = $(this).width() / 203;
		var height = $(this).height() / ratio;
		//NON-IE
		$(this).parent().css('width', '203px');
		$(this).parent().css('height', height);
		//IE
		$(this).css('width', '203px');
		$(this).css('height', height);
		
	});
	
});

</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

<!--CONTAINER-->
<div id="container">
	<!--HEADER-->
	<div id="header">
		<div id="header_logo">
			<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		</div>
		<!--SEARCH-->
		<div id="header_search">
			<?php get_search_form(); ?>
		</div>
		<!--/SEARCH-->
		<div class="clear"></div>
	</div>
	<!--/HEADER-->
	<div class="clear"></div>