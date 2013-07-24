<?php // User Submitted Posts - Classic Submission Form

if (!function_exists('add_action')) die('&Delta;');

global $usp_options, $current_user;

$author_ID  = $usp_options['author'];
$default_author = get_the_author_meta('display_name', $author_ID);
if (isset($authorName)) {
	if ($authorName == $default_author) {
		$authorName = '';
	} 
} ?>

<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->
<div id="usp">
	<form id="usp_form" method="post" data-validate="parsley" enctype="multipart/form-data" action="">
		
		<?php if (isset($_GET['submission-error']) && $_GET['submission-error'] == '1') { ?>
		<div id="usp-error-message"><?php echo $usp_options['error-message']; ?></div>
		<?php } ?>

		<?php if (isset($_GET['success']) && $_GET['success'] == '1') { ?>
		<div id="usp-success-message"><?php echo $usp_options['success-message']; ?></div>
		<?php } else { ?>

		<ul id="usp_list">
			<?php if (($usp_options['usp_name'] == 'show') && ($usp_options['usp_use_author'] == false)) { ?>
			<li class="usp_name">
				<label for="user-submitted-name" class="usp_label"><?php _e('Your Name', 'usp'); ?></label>
				<div>
					<input class="usp_input" type="text" name="user-submitted-name" id="user-submitted-name" value="" data-required="true" />
				</div>
			</li>
			<?php } if (($usp_options['usp_url'] == 'show') && ($usp_options['usp_use_url'] == false)) { ?>
			<li class="usp_url">
				<label for="user-submitted-url" class="usp_label"><?php _e('Your URL', 'usp'); ?></label>
				<div>
					<input class="usp_input" type="text" name="user-submitted-url" id="user-submitted-url" value="" data-required="true" data-type="url" />
				</div>
			</li>
			<?php } if ($usp_options['usp_title'] == 'show') { ?>
			<li class="usp_title">
				<label for="user-submitted-title" class="usp_label"><?php _e('Post Title', 'usp'); ?></label>
				<div>
					<input class="usp_input" type="text" name="user-submitted-title" id="user-submitted-title" value="" data-required="true" />
				</div>
			</li>
			<?php } if ($usp_options['usp_tags'] == 'show') { ?>
			<li class="usp_tags">
				<label for="user-submitted-tags" class="usp_label"><?php _e('Post Tags', 'usp'); ?> <small><?php _e('(separate with commas)', 'usp'); ?></small></label>
				<div>
					<input class="usp_input" type="text" name="user-submitted-tags" id="user-submitted-tags" value="" data-required="true" />
				</div>
			</li>
			<?php } if (($usp_options['usp_category'] == 'show') && ($usp_options['usp_use_cat'] == false)) { ?>
			<li class="usp_category">
				<label for="user-submitted-category" class="usp_label"><?php _e('Post Category', 'usp'); ?></label>
				<div> 
					<select class="usp_select" name="user-submitted-category" id="user-submitted-category">
						
						<?php foreach($usp_options['categories'] as $categoryId) { $category = get_category($categoryId); if(!$category) { continue; } ?>
						<option class="usp_option" value="<?php echo $categoryId; ?>"><?php $category = get_category($categoryId); echo htmlentities($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
						<?php } ?>
					</select>
				</div>
			</li>
			<?php } if ($usp_options['usp_captcha'] == 'show') { ?>
			<li class="usp_captcha">
				<label for="user-submitted-captcha" class="usp_label"><?php echo $usp_options['usp_question']; ?></label>
				<div>
					<input class="usp_input" type="text" name="user-submitted-captcha" id="user-submitted-captcha" value="" data-required="true" />
				</div>
			</li>
			<?php } if ($usp_options['usp_content'] == 'show') { ?>
			<li class="usp_content">
				<?php if ($usp_options['usp_richtext_editor'] == true) { ?>
				<div class="usp_text-editor">
					<?php wp_editor('', 'uspContent', array('textarea_rows'=>'10','textarea_name'=>'user-submitted-content','editor_class'=>'usp-rich-textarea')); ?>
				</div>
				<?php } else { ?>
				<label for="user-submitted-content" class="usp_label"><?php _e('Post Content', 'usp'); ?></label>
				<div>
					<textarea class="usp_textarea" name="user-submitted-content" id="user-submitted-content" rows="5" data-required="true"></textarea>
				</div>
				<?php } ?>
			</li>
			<?php } if ($usp_options['usp_images'] == 'show') { ?>
				<?php if($usp_options['max-images'] !== 0) { ?>
				<li class="usp_images">
					<label for="user-submitted-image" class="usp_label"><?php _e('Upload an Image', 'usp'); ?></label>
					<div id="usp_upload-message"><?php echo $usp_options['upload-message']; ?></div>
					<div>
						<?php 
						if($usp_options['min-images'] < 1) {
							$numberImages = 1;
						} else {
							$numberImages = $usp_options['min-images'];
						}
						for($i = 0; $i < $numberImages; $i++) { ?>
						<input class="usp_input usp_clone" type="file" size="25" id="user-submitted-image" name="user-submitted-image[]" />
						<?php } ?>
						<a href="#" id="usp_add-another"><?php _e('Add another image', 'usp'); ?></a>
					</div>
					<input class="hidden" type="hidden" name="usp-image-limit" id="usp-image-limit" value="<?php echo $usp_options['max-images']; ?>" />
					<input class="hidden" type="hidden" name="usp-image-count" id="usp-image-count" value="1" />
				</li>
				<?php } ?>
			<?php } ?>
			<li id="coldform_verify" style="display:none;">
				<label for="user-submitted-verify"><?php _e('Human verification: leave this field empty.', 'usp'); ?></label>
				<input name="user-submitted-verify" type="text" value="" />
			</li>
			<li class="usp_submit">
				<?php if(!empty($usp_options['redirect-url'])) { ?>
				<input type="hidden" name="redirect-override" value="<?php echo $usp_options['redirect-url']; ?>" />
				<?php } ?>
				<?php if ($usp_options['usp_use_author'] == true) { ?>
				<input class="hidden" type="hidden" name="user-submitted-name" value="<?php echo $current_user->user_login; ?>">
				<?php } ?>
				<?php if ($usp_options['usp_use_url'] == true) { ?>
				<input class="hidden" type="hidden" name="user-submitted-url" value="<?php echo $current_user->user_url; ?>">
				<?php } ?>
				<?php if ($usp_options['usp_use_cat'] == true) { ?>
				<input class="hidden" type="hidden" name="user-submitted-category" value="<?php echo $usp_options['usp_use_cat_id']; ?>">
				<?php } ?>
				<input class="usp_input" type="submit" name="user-submitted-post" id="user-submitted-post" value="<?php _e('Submit Post', 'usp'); ?>" />
			</li>
		</ul>

		<?php } ?>

	</form>
</div>
<div style="clear:both;"></div>
<script>(function(){var e = document.getElementById("coldform_verify"); if(e) e.parentNode.removeChild(e);})();</script>
<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->