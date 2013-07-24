<?php // User Submitted Posts - HTML5 Submission Form

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
<div id="user-submitted-posts">

	<?php if ($usp_options['usp_form_content'] !== '') {
		echo $usp_options['usp_form_content'];
	} ?>

	<form id="usp_form" method="post" data-validate="parsley" enctype="multipart/form-data" action="" novalidate>

		<?php if (isset($_GET['submission-error']) && $_GET['submission-error'] == '1') { ?>
		<div id="usp-error-message"><?php echo $usp_options['error-message']; ?></div>
		<?php } ?>

		<?php if (isset($_GET['success']) && $_GET['success'] == '1') { ?>
		<div id="usp-success-message"><?php echo $usp_options['success-message']; ?></div>
		<?php } else { ?>

		<?php if (($usp_options['usp_name'] == 'show') && ($usp_options['usp_use_author'] == false)) { ?>
		<fieldset class="usp-name">
			<label for="user-submitted-name"><?php _e('Your Name', 'usp'); ?></label>
			<input name="user-submitted-name" type="text" value="" data-required="true" placeholder="<?php _e('Your Name', 'usp'); ?>" class="usp-input">
		</fieldset>
		<?php } if (($usp_options['usp_url'] == 'show') && ($usp_options['usp_use_url'] == false)) { ?>
		<fieldset class="usp-url">
			<label for="user-submitted-url"><?php _e('Your URL', 'usp'); ?></label>
			<input name="user-submitted-url" type="text" value="" data-required="true" data-type="url" placeholder="<?php _e('Your URL', 'usp'); ?>" class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_title'] == 'show') { ?>
		<fieldset class="usp-title">
			<label for="user-submitted-title"><?php _e('Post Title', 'usp'); ?></label>
			<input name="user-submitted-title" type="text" value="" data-required="true" placeholder="<?php _e('Post Title', 'usp'); ?>" class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_tags'] == 'show') { ?>
		<fieldset class="usp-tags">
			<label for="user-submitted-tags"><?php _e('Post Tags', 'usp'); ?></label>
			<input name="user-submitted-tags" id="user-submitted-tags" data-required="true" type="text" value="" placeholder="<?php _e('Post Tags', 'usp'); ?>" class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_captcha'] == 'show') { ?>
		<fieldset class="usp-captcha">
			<label for="user-submitted-captcha"><?php echo $usp_options['usp_question']; ?></label>
			<input name="user-submitted-captcha" type="text" value="" data-required="true" placeholder="<?php _e('Antispam Question', 'usp'); ?>" class="usp-input" id="user-submitted-captcha">
		</fieldset>
		<?php } if (($usp_options['usp_category'] == 'show') && ($usp_options['usp_use_cat'] == false)) { ?>
		<fieldset class="usp-category">
			<label for="user-submitted-category"><?php _e('Post Category', 'usp'); ?></label>
			<select name="user-submitted-category">
				<?php foreach($usp_options['categories'] as $categoryId) { $category = get_category($categoryId); if(!$category) { continue; } ?>
				<option value="<?php echo $categoryId; ?>"><?php $category = get_category($categoryId); echo htmlentities($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
				<?php } ?>
			</select>
		</fieldset>
		<?php } if ($usp_options['usp_content'] == 'show') { ?>
		<fieldset class="usp-content">
			<?php if ($usp_options['usp_richtext_editor'] == true) { ?>
			<div class="usp_text-editor">
				<?php wp_editor('', 'uspContent', array('textarea_rows'=>'10','textarea_name'=>'user-submitted-content','editor_class'=>'usp-rich-textarea')); ?>
			</div>
			<?php } else { ?>
				<label for="user-submitted-content"><?php _e('Post Content', 'usp'); ?></label>
				<textarea name="user-submitted-content" rows="5" data-required="true" placeholder="<?php _e('Post Content', 'usp'); ?>" class="usp-textarea"></textarea>
			<?php } ?>
		</fieldset>
		<?php } if ($usp_options['usp_images'] == 'show') { ?>
		<?php if ($usp_options['max-images'] !== 0) { ?>
		<fieldset class="usp-images">
			<label for="user-submitted-image"><?php _e('Upload an Image', 'usp'); ?></label>
			<div id="usp-upload-message"><?php echo $usp_options['upload-message']; ?></div>
			<div id="user-submitted-image">
				<?php if($usp_options['min-images'] < 1) {
					$numberImages = 1;
				} else {
					$numberImages = $usp_options['min-images'];
				} for($i = 0; $i < $numberImages; $i++) { ?>
				<input name="user-submitted-image[]" type="file" size="25" class="usp-input usp-clone">
				<?php } ?>
				<a href="#" id="usp_add-another"><?php _e('Add another image', 'usp'); ?></a>
			</div>
			<input class="hidden" type="hidden" name="usp-image-limit" id="usp-image-limit" value="<?php echo $usp_options['max-images']; ?>">
			<input class="hidden" type="hidden" name="usp-image-count" id="usp-image-count" value="1">
		</fieldset>
		<?php } ?>
		<?php } ?>
		<fieldset id="coldform_verify" style="display:none;">
			<label for="user-submitted-verify"><?php _e('Human verification: leave this field empty.', 'usp'); ?></label>
			<input name="user-submitted-verify" type="text" value="">
		</fieldset>
		<div id="usp-submit">
			<?php if (!empty($usp_options['redirect-url'])) { ?>
			<input type="hidden" name="redirect-override" value="<?php echo $usp_options['redirect-url']; ?>">
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
			<input name="user-submitted-post" id="user-submitted-post" type="submit" value="<?php _e('Submit Post', 'usp'); ?>">
		</div>

		<?php } ?>

	</form>
</div>
<script>(function(){var e = document.getElementById("coldform_verify"); if(e) e.parentNode.removeChild(e);})();</script>
<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->