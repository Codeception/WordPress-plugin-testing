<?php // User Submitted Posts - Template Tags

if (!function_exists('add_action')) die('&Delta;');

/* 
	Returns a boolean value indicating whether the specified post is a public submission
	Usage: <?php if (function_exists('usp_is_public_submission')) usp_is_public_submission(); ?>
*/
function usp_is_public_submission($postId = false) {
	global $usp_post_meta_IsSubmission;
	if (false === $postId) {
		global $post;
		$postId = $post->ID;
	}
	if (get_post_meta($postId, $usp_post_meta_IsSubmission, true) == true) {
		return true;
	} else {
		return false;
	}
}

/* 
	Returns an array of URLs for the specified post image
	Usage: <?php $images = usp_get_post_images(); foreach ($images as $image) { echo $image; } ?>
*/
function usp_get_post_images($postId = false) {
	global $usp_post_meta_Image;
	if (usp_is_public_submission($postId)) {
		if (false === $postId) {
			global $post;
			$postId = $post->ID;
		}
		return get_post_meta($postId, $usp_post_meta_Image);
	} else {
		return array();
	}
}

/*
	Prints the URLs for all post attachments.
	Usage:  <?php if (function_exists('usp_post_attachments')) usp_post_attachments(); ?>
	Syntax: <?php if (function_exists('usp_post_attachments')) usp_post_attachments($size, $beforeUrl, $afterUrl, $numberImages, $postId); ?>
	Parameters:
		$size         = image size as thumbnail, medium, large or full -> default = full
		$beforeUrl    = text/markup displayed before the image URL     -> default = <img src="
		$afterUrl     = text/markup displayed after the image URL      -> default = " />
		$numberImages = the number of images to display for each post  -> default = false (display all)
		$postId       = an optional post ID to use                     -> default = uses global post
*/
function usp_post_attachments($size = 'full', $beforeUrl = '<img src="', $afterUrl = '" />', $numberImages = false, $postId = false) {
	if (false === $postId) {
		global $post;
		$postId = $post->ID;
	}
	/*if (!in_array($size, array('thumbnail', 'medium', 'large', 'full'))) {
		$size = 'full';
	}*/
	if (false === $numberImages || !is_numeric($numberImages)) {
		$numberImages = 99;
	}
	$attachments = get_posts(array('post_type'=>'attachment', 'post_parent'=>$postId, 'post_status'=>'inherit', 'numberposts'=>$numberImages));
	foreach ($attachments as $attachment) {
		$info = wp_get_attachment_image_src($attachment->ID, $size);

		echo $beforeUrl . $info[0] . $afterUrl;
	}
}

/*
	For public-submitted posts, this tag displays the author's name as a link (if URL provided) or plain text (if URL not provided)
	For normal posts, this tag displays the author's name as a link to their author's post page
	Usage: <?php if (function_exists('usp_author_link')) usp_author_link(); ?>
*/
function usp_author_link() {
	global $post, $usp_post_meta_IsSubmission, $usp_post_meta_Submitter, $usp_post_meta_SubmitterUrl;

	$isSubmission     = get_post_meta($post->ID, $usp_post_meta_IsSubmission, true);
	$submissionAuthor = get_post_meta($post->ID, $usp_post_meta_Submitter, true);
	$submissionLink   = get_post_meta($post->ID, $usp_post_meta_SubmitterUrl, true);

	if ($isSubmission && !empty($submissionAuthor)) {
		if (empty($submissionLink)) {
			echo '<span class="usp-author-link">' . $submissionAuthor . '</span>';
		} else {
			echo '<span class="usp-author-link"><a href="' . $submissionLink . '">' . $submissionAuthor . '</a></span>';
		}
	} else {
		the_author_posts_link();
	}
}
