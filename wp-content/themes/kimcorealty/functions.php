<?php

/**
* Wordpress Naked, a very minimal wordpress theme designed to be used as a base for other themes.
*
* @licence LGPL
* @author Darren Beale - http://siftware.co.uk - bealers@gmail.com - @bealers
* 
* Project URL http://code.google.com/p/wordpress-naked/
*/

/**
* naked_nav()
*
* @desc a wrapper for the wordpress wp_list_pages() function that
* will display one or two unordered lists:
* 1) primary nav, a ul with css id #nav - always shown even if empty
* 2) Optional secondary nav, a ul with css id #subNav
*
* @todo default css provided to allow space for both nav 'bars' one below the other to stop the page jig
*
* @param obj post
* @return string (html)
*/
function naked_nav($post = 0)
{
  $output = "";
  $subNav = "";
  $params = "title_li=&depth=1&echo=0";

  // always show top level
  $output .= '<ul id="nav">';
  $output .= wp_list_pages($params);
  $output .= '</ul>';

  // second level?
  if($post->post_parent)
  {
    $params .= "&child_of=" . $post->post_parent;
  }
  else
  {
    $params .= "&child_of=" . $post->ID;
  }
  $subNav = wp_list_pages($params);

  if ($subNav)
  {
    $output .= '<ul id="subNav">';
    $output .= $subNav;
    $output .= '</ul>';
  }
  return $output;
}

/**
* @desc make the site's heading & tagline an h1 on the homepage and an h4 on internal pages
* Naked's default CSS should make the two different states look identical
*/
function do_heading()
{
  $output = "";

  if(is_home()) $output .= "<h1>"; else  $output .= "<h4>";

  $output .= "<a href='"  . get_bloginfo('url') . "'>" . get_bloginfo('name') . "</a> <span>" . get_bloginfo('description') . "</span>";

  if(is_home()) $output .= "</h1>"; else  $output .= "</h4>";

  return $output;
}

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
  	'name' => 'Left Sidebar',
    'before_widget' => '<div class="sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
  
  register_sidebar(array(
  	'name' => 'Right Sidebar',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
}

/**
* Check to see if this page will paginate
* 
* @return boolean
*/
function will_paginate() 
{
  global $wp_query;
  
  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}

add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 203, 161 );
add_image_size( 'single-post-thumbnail', 554, 334 ); // Permalink thumbnail size


function fix_privAndCurrPost()
{
    // Register the script like this for a plugin:
    //wp_register_script( 'customPostFixes', plugins_url( '/js/customPostFixes.js'), array( 'jquery', 'jquery-ui-core' ), '20150911', true );
    // or
    // Register the script like this for a theme:
    wp_register_script( 'customPostFixes', get_template_directory_uri() . '/js/customPostFixes.js', array( 'jquery'), '20150911', true );
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'customPostFixes' );
}
add_action( 'wp_enqueue_scripts', 'fix_privAndCurrPost' );

/*
EXPERIMENTAL LOAD MORE CODE
*/

function getArchives($offset, $catnum, $tag){
	
	if (is_category('category-slug')): 

	 query_posts(array('category_name' => 'category-slug', 'posts_per_page' => -1 )); 

endif;
		if($catnum != ''){
			//CATEGORY PAGES
			query_posts('posts_per_page=1&offset='.$offset.'&cat='.$catnum);
		}
		else if ($tag != ''){
			// TAG PAGES
			query_posts('posts_per_page=1&offset='.$offset.'&tag='.$tag);	
		}
		else{
			//HOME
			query_posts('posts_per_page=1&offset='.$offset);
		}
			
	
	
	$posts = array();

	if(have_posts()) : while(have_posts()) : the_post();
		
		$category = get_the_category();
		$permalink = get_permalink($post->ID);
		
		$tags = get_the_tags();
		$tagcount = count($tags);
		$curtag = 0;
		
		if($tags){
			$html .= '<br />Tags: ';
			foreach ($tags as $tag){
				$curtag++;
				$tag_link = get_tag_link($tag->term_id);
						
				$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
				$html .= "{$tag->name}</a>";
				if($curtag != $tagcount){ $html .= ', ';}
			}
		}
		
		$photo = '<img width="11" src="' . get_settings('home') . '/wp-content/uploads/userphoto/' . get_the_author_meta( 'ID' ) . '.thumbnail.jpg" />';

		$item = 
						'<div id="post-' .  get_the_ID() . '" class="magic_clipping clipping">
						<div class="top"></div>
						<div class="title cat-item-' . $category[0]->cat_ID . '">
							<a href="?cat=' . $category[0]->cat_ID . '" class="cat_link">' .  $category[0]->cat_name . '</a>
							<div class="title_content">
								<h4><a href="' . $permalink . '">' . get_the_title() . '</a></h4>
								<div class="author_date">Posted by <a href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '">' . $photo . ' ' . get_the_author_meta('display_name') . '</a><br />on ' . get_the_date() . '</div>
							</div>
						</div>
						<div class="clipping_content">
							<div class="blurb">
								' . get_the_excerpt() . '
							</div>
							<div class="bottom">
								<div class="comments"><?php comments_popup_link(__("0 Comments"), __("1 Comment"), __("% Comments")) ?></div>
								<div class="category_tags">
									<p>Categories: <a href="?cat=' . $category[0]->cat_ID . '">' .  $category[0]->cat_name . '</a>' . $html .  '</p>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>';
					
	array_push($posts,$item); endwhile; endif;

	return $posts;
}

?>