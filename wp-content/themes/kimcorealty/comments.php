			<!--ARTICLE COMMENTS-->
			<div id="comments">
			<?php
			
			  /**
			  *@desc Included at the bottom of post.php and single.php, deals with all comment layout
			  */
			
			  if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) :
			?>
			
			<p><?php _e('Enter your password to view comments.'); ?></p>
			<?php return; endif; ?>
			
			<h5>
			<?php comments_number('<em>no</em> COMMENTS', '1 COMMENT','% COMMENTS'); ?>
			<?php if ( comments_open() ) : ?>
			<?php endif; ?>
			</h5>
			<?php if ( $comments ) : ?>
			
			
			<?php foreach ($comments as $comment) : ?>
			<div class="comment_bubble comment-<?php comment_ID() ?>">
				<div class="content">
					<?php if (0 == $comment->comment_approved) { ?>
						  <p><em><?php _e('This comment is awaiting moderation.', FB_BASIS_TEXTDOMAIN) ?></em></p>
					<?php }else{ comment_text(); } ?>
				</div>
				<div class="author">
					<div class="left"><p><?php comment_type(__(''), __('Trackback'), __('Pingback')); ?> <?php _e(''); ?> <?php comment_author_link() ?> <?php edit_comment_link(__("Edit"), ' | '); ?></p></div>
					<div class="right"><p><?php comment_date() ?></p></div>
				</div>
			</div>
			
			<?php endforeach; ?>
			
			<?php else : // If there are no comments yet ?>
				<p><em><?php _e('There are no comments yet.'); ?></em></p>
			<?php endif; ?>
			
			<?php if ( comments_open() ) : ?>
			<hr />
			<h5><?php _e('<em>leave a</em> COMMENT'); ?></h5>
			
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
			<?php else : ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			
			<?php if ( $user_ID ) : ?>
			
			<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php _e('Logout &raquo;'); ?></a></p>
			
			<?php else : ?>
			
			<!--ANONYMOUSE USER-->
			<input class="grey_field" type="text" name="author" id="" value="" size="22" tabindex="1" title="<?php _e('Name'); if ($req) _e(' (required)'); ?>" /><br />
			<input class="grey_field" type="text" name="email" id="" value="" size="22" tabindex="2" title="<?php _e('Email'); if ($req) _e(' (required)'); ?>" /><br />
			<input class="grey_field" type="text" name="url" id="" value="" size="22" tabindex="3" title="<?php _e('http://'); ?>"/><br />
			
			<?php endif; ?>
			
			<!--BOTH COMMENT-->
			<textarea name="comment" id="comment" class="grey_field" cols="90" rows="10" tabindex="4"></textarea>
			
			<!--BOTH SUBMIT-->
			<p><input name="submit" type="submit" id="submit" class="btn_submit" tabindex="5" value="<?php echo attribute_escape(__('Submit')); ?>" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			
			<?php do_action('comment_form', $post->ID); ?>
			</form>
			
			<?php endif; // If registration required and not logged in ?>
			
			<?php else : // Comments are closed ?>
			<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
			<?php endif; ?>
			
			</div>
			<!--/ARTICLE COMMENTS-->