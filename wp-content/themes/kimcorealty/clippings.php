		<div id="clippings">
		
			<?php /*UNLIMITED POSTS*/ ?>
			<?php if (is_search() || is_month() || is_author()) { $posts=query_posts($query_string . '&posts_per_page=-1'); } ?>
			
			<?php if (have_posts()): ?>
			
			<?php /*-------------COLUMN ONE-------------*/ ?>
			<div id="clippings_col1">
			<?php $postcounter1 = 0; ?>
			<?php while (have_posts()) : the_post(); $postcounter1++; ?>
			<?php if ($postcounter1 % 3 == 1 || $postcounter1 == 1){?>
				
				<!--/CLIPPING-->
				<div id="post-<?php the_ID(); ?>" class="clipping">
					<div class="top"></div>
					<div class="title cat-item-<?php the_category_ID(); ?>">
						<a href="?cat=<?php the_category_ID(); ?>" class="cat_link"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a>
						<div class="title_content">
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<div class="author_date">
							<?php 
								if ( class_exists( 'coauthors_plus' ) ) {
									$co_authors = get_coauthors();
									echo 'Posted by: ';
									foreach ( $co_authors as $key => $co_author ) {
										$co_author_classes = array(
											'co-author-wrap',
											'co-author-number-' . ( $key + 1 ),
										);							
										echo '<a href="' , get_author_posts_url( $co_author->ID) , '">' , userphoto_thumbnail( $co_author ) , ' ' , $co_author->display_name , '</a>';
										if (end($co_authors) !== $co_author)
										{
										echo ' and '; // not the last element
										}
									}						
								} 
								else {
									echo 'Posted by ';
									echo '<a href="', get_author_posts_url(get_the_author_meta( 'ID' )),  '">',  userphoto_the_author_thumbnail(),  '&nbsp;' , the_author_meta('display_name'),  '</a>';
								}					
								echo '<br />on ';
								echo the_date();
							?>
							</div>
						</div>
					</div>
					<div class="clipping_content">
						<?php the_post_thumbnail(); ?>
						<div class="blurb">
							<?php the_excerpt(); ?>
						</div>
						<div class="bottom">
							<div class="comments"><?php comments_popup_link('add comment', 'add comment', 'add comment') ?></div>
							<div class="category_tags">
								<p>Category: <?php the_category(', ') . " " . the_tags(__('<br />Tags: '), ', ', ' '); ?><?php edit_post_link(__('<br /><br />Edit Post'), ' '); ?></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<!--/CLIPPING-->
			
			<?php } ?>
			<?php endwhile; ?>
			</div>
			<?php /*-------------COLUMN ONE-------------*/ ?>
			
			<?php /*-------------COLUMN TWO-------------*/ ?>
			<div id="clippings_col2">
			<?php $postcounter2 = 1; ?>
			<?php while (have_posts()) : the_post(); $postcounter2++; ?>
			<?php if ($postcounter2 % 3 === 0){ ?>
				
				<!--/CLIPPING-->
				<div id="post-<?php the_ID(); ?>" class="clipping cat-<?php the_category_ID(); ?>">
					<div class="top"></div>
					<div class="title cat-item-<?php the_category_ID(); ?>">
						<a href="?cat=<?php the_category_ID(); ?>" class="cat_link"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a>
						<div class="title_content">
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<div class="author_date">
							<?php 
								if ( class_exists( 'coauthors_plus' ) ) {
									$co_authors = get_coauthors();
									echo 'Posted by: ';
									foreach ( $co_authors as $key => $co_author ) {
										$co_author_classes = array(
											'co-author-wrap',
											'co-author-number-' . ( $key + 1 ),
										);							
										echo '<a href="' , get_author_posts_url( $co_author->ID) , '">' , userphoto_thumbnail( $co_author ) , ' ' , $co_author->display_name , '</a>';
										if (end($co_authors) !== $co_author)
										{
										echo ' and '; // not the last element
										}
									}						
								} 
								else {
									echo 'Posted by ';
									echo '<a href="', get_author_posts_url(get_the_author_meta( 'ID' )),  '">',  userphoto_the_author_thumbnail(),  '&nbsp;' , the_author_meta('display_name'),  '</a>';
								}					
								echo '<br />on ';
								echo the_date();
							?>
							</div>
						</div>
					</div>
					<div class="clipping_content">
						<?php the_post_thumbnail(); ?>
						<div class="blurb">
							<?php the_excerpt(); ?>
						</div>
						<div class="bottom">
							<div class="comments"><?php comments_popup_link('add comment', 'add comment', 'add comment') ?></div>
							<div class="category_tags">
								<p>Category: <?php the_category(', ') . " " . the_tags(__('<br />Tags: '), ', ', ' '); ?><?php edit_post_link(__('<br /><br />Edit Post'), ' '); ?></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<!--/CLIPPING-->
				
				<?php } ?>
			<?php endwhile; ?>
			</div>
			<?php /*-------------COLUMN TWO-------------*/ ?>
			
			<?php /*-------------COLUMN THREE-------------*/ ?>
			<div id="clippings_col3">
			<?php $postcounter3 = 3; ?>
			<?php while (have_posts()) : the_post(); $postcounter3++; ?>
			<?php if ($postcounter3 % 3 === 0 ){ ?>
				
				<!--/CLIPPING-->
				<div id="post-<?php the_ID(); ?>" class="clipping cat-<?php the_category_ID(); ?>">
					<div class="top"></div>
					<div class="title cat-item-<?php the_category_ID(); ?>">
						<a href="?cat=<?php the_category_ID(); ?>" class="cat_link"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></a>
						<div class="title_content">
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<div class="author_date">
							<?php 
								if ( class_exists( 'coauthors_plus' ) ) {
									$co_authors = get_coauthors();
									echo 'Posted by: ';
									foreach ( $co_authors as $key => $co_author ) {
										$co_author_classes = array(
											'co-author-wrap',
											'co-author-number-' . ( $key + 1 ),
										);							
										echo '<a href="' , get_author_posts_url( $co_author->ID) , '">' , userphoto_thumbnail( $co_author ) , ' ' , $co_author->display_name , '</a>';
										if (end($co_authors) !== $co_author)
										{
										echo ' and '; // not the last element
										}
									}						
								} 
								else {
									echo 'Posted by ';
									echo '<a href="', get_author_posts_url(get_the_author_meta( 'ID' )),  '">',  userphoto_the_author_thumbnail(),  '&nbsp;' , the_author_meta('display_name'),  '</a>';
								}					
								echo '<br />on ';
								echo the_date();
							?>
							</div>
						</div>
					</div>
					<div class="clipping_content">
						<?php the_post_thumbnail(); ?>
						<div class="blurb">
							<?php the_excerpt(); ?>
						</div>
						<div class="bottom">
							<div class="comments"><?php comments_popup_link('add comment', 'add comment', 'add comment') ?></div>
							<div class="category_tags">
								<p>Category: <?php the_category(', ') . " " . the_tags(__('<br />Tags: '), ', ', ' '); ?><?php edit_post_link(__('<br /><br />Edit Post'), ' '); ?></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<!--/CLIPPING-->
				
				<?php } ?>
			<?php endwhile; ?>
			</div>
			<?php /*-------------COLUMN THREE-------------*/ ?>
			<div class="clear">
			
			<?php if (is_home() || is_category() || is_tag()) { ?>
			<!--"MORE" BUTTON-->
			<div id="more">
				<div id="more_link">Load More Articles</div>
			</div>
			<!--"MORE" BUTTON-->
			<?php } ?>
			
			<?php else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		
		</div>