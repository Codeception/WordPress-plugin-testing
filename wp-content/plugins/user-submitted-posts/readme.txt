=== User Submitted Posts ===

Plugin Name: User Submitted Posts
Plugin URI: http://perishablepress.com/user-submitted-posts/
Description: Enables your visitors to submit posts and images from anywhere on your site.
Tags: submit, public, news, share, upload, images, posts, users, user-submit, community
Author URI: http://monzilla.biz/
Author: Jeff Starr
Donate link: http://m0n.co/donate
Contributors: specialk
Requires at least: 3.3
Tested up to: 3.5
Version: 20130720
Stable tag: trunk
License: GPL v2 or later

User Submitted Posts enables your visitors to submit posts and images from anywhere on your site.

== Description ==  

Adds a simple form via template tag or shortcode that enables your visitors to submit posts. User-submitted posts optionally include tags, categories, post titles, and more. You can set submitted posts as draft, publish immediately, or after some number of approved posts. Also enables users to upload multiple images when submitting a post. Everything super-easy to customize via Admin Settings page.

**Features**

* Let visitors submit posts from anywhere on your site
* NEW option to set submitted images as featured images
* NEW option to use WP's built-in rich text editor for post content
* Use template tag or shortcode to display the submission form anywhere
* Includes input validation and customizable captcha and hidden field to stop spam
* Post submissions may include title, tags, category, author, url, post and image(s)
* Redirect user to anywhere or return to current page after successful post submission
* Includes a set of template tags for displaying and customizing user-submitted posts
* New HTML5 submission form with streamlined CSS styles

**More Features**

* Option to receive email alert for new submitted posts
* Option to set logged-in username as submitted-post author
* Option to set logged-in user&rsquo;s URL as the submitted URL
* Option to set a default submission category via hidden field
* Option to disable loading of external JavaScript file
* Option to specify URL for targeted resource loading

**Image Uploads**

* Optionally allow/require visitors to upload any number of images
* Specify minimum and maximum width and height for uploaded images
* Specicy minimum and maximum number of allowed image uploads for each post
* Includes jQuery snippet for easy choosing of multiple images
 
**Customization**

* Control which fields are displayed in the submission form
* Choose which categories users are allowed to select
* Assign submitted posts to any registered user
* Customizable success, error, and upload messages
* Plus options for the captcha, auto-publish, and redirect-URL
* Option to use classic form, HTML5 form, or disable only the stylesheet

**Post Management**

* Custom-fields saved with each post: name, IP, URL, and any image URLs
* Set submitted posts to any status: Draft, Publish, or Moderate
* One-click post-filtering of user-submitted posts on the Admin Posts page
* Includes template tags for easy display of post attachments and images

== Installation ==

**Overview**

1. Upload the `/user-submitted-posts/` directory to your plugins folder and activate
2. Go to the "User Submitted Posts" Settings Page and customize your options
3. Display the submission form on your page(s) using template tag or shortcode

**Important**

NOTE that this plugin attaches uploaded images as custom fields to submitted posts. Attached images are not displayed automatically in posts, but rather may be displayed using template tags, either WP's built-in tags or the USP template tags (explained below). This provides maximum flexibility in terms of customizing the display of uploaded images. 

UPDATE: as of version 20130720, submitted images may be set as Featured Images for posts (visit the "Options" panel in the plugin settings for more info).

**Displaying the submission form**

* To display the form on a post or page, use the shortcode: `[user-submitted-posts]`
* To display the form anywhere in your theme, use the template tag:

	&lt;?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?&gt;

**Customizing the submission form**

* To style the submission form, use the included CSS file located at: `/resources/usp.css`
* To add custom JavaScript, use the included JS file located at: `/resources/usp.js`

**Customizing user-submitted posts**

User-submitted posts are just like any other post, with the exception that they each contain a set of custom fields. The custom fields include extra information about the post:

* `is_submission` - indicates that the post is in fact user-submitted
* `user_submit_image` - the URL of the submitted image (one custom field per image)
* `user_submit_ip` - the IP address of the submitted-post author
* `user_submit_name` - the name of the submitted-post author
* `user_submit_url` - the submitted URL

So when user-submitted posts are displayed on your website, say on the home page or single-view, these custom fields are available to you in your theme files. This enables you to customize the user-submitted posts by displaying the submitted name, URL, images, and so forth. Here are two articles for those new to using WordPress custom-fields:

* [WordPress Custom Fields, Part I: The Basics](http://perishablepress.com/wordpress-custom-fields-tutorial/)
* [WordPress Custom Fields, Part II: Tips and Tricks](http://perishablepress.com/wordpress-custom-fields-tips-tricks/)

**Template Tags**

Additionally, the USP plugin also includes a set of template tags for customizing your user-submitted posts:

	usp_is_public_submission()
	Returns a boolean value indicating whether the specified post is a public submission
	Usage: <?php if (function_exists('usp_is_public_submission')) usp_is_public_submission(); ?>

	usp_get_post_images()
	Returns an array of URLs for the specified post image
	Usage: <?php $images = usp_get_post_images(); foreach ($images as $image) { echo $image; } ?>

	usp_post_attachments()
	Prints the URLs for all post attachments.
	Usage:  <?php if (function_exists('usp_post_attachments')) usp_post_attachments(); ?>
	Syntax: <?php if (function_exists('usp_post_attachments')) usp_post_attachments($size, $beforeUrl, $afterUrl, $numberImages, $postId); ?>
	Parameters:
		$size         = image size as thumbnail, medium, large or full -> default = full
		$beforeUrl    = text/markup displayed before the image URL     -> default = &lt;img src="
		$afterUrl     = text/markup displayed after the image URL      -> default = " /&gt;
		$numberImages = the number of images to display for each post  -> default = false (display all)
		$postId       = an optional post ID to use                     -> default = uses global post

	usp_author_link()
	For public-submitted posts, this tag displays the author's name as a link (if URL provided) or plain text (if URL not provided)
	For normal posts, this tag displays the author's name as a link to their author's post page
	Usage: <?php if (function_exists('usp_author_link')) usp_author_link(); ?>

These template tags should work out of the box when included in your theme template file(s). Keep in mind that for some of the tags to work, there must be some existing submitted posts and/or images available. 

For more information, check out the template-tag file at: `/library/template-tags.php`

== Upgrade Notice ==

__Important!__ Many things have changed in the new version of the plugin. Please copy/paste your current USP settings to a safe place. Then update the plugin as usual, using your saved settings while configuring the new version.

== Screenshots ==

Screenshots available at the [USP Homepage](http://perishablepress.com/user-submitted-posts/)

== Changelog ==

= 20130720 =

* Added option to set attachment as featured image
* Improved localization support (.mo and .po)
* Added optional use of WP's built-in rich text editor
* Added custom stylesheet for WP's rich text editor
* Replace antispam placeholder in submission-form.php
* Improved jQuery for "add another image" functionality
* Added jQuery script to remember form input values via cookies
* Added data validation for input fields via Parsley @ http://parsleyjs.org
* Overview and Updates panels now toggled open by default
* Updated CSS styles for HTML5 and Classic forms
* Improved logic for form verification JavaScript
* Resolved numerous PHP notices and warnings
* Updated readme.txt with more infos
* General code check n clean

= 20130104 =

* Added explanation of plugin functionality in readme.txt
* Fixed character encoding issue for author name
* Added margins to submit buttons (to fix WP's new CSS)
* Removed "anti-spam" text from captcha placeholder attribute
* usp_post_attachments() tag now accepts custom sizes
* Added temp fix for warning: "getimagesize(): Filename cannot be empty"
* Restyled USP filter button on admin Posts pages

= 20121120 =

* added id to tag input field in submission-form.php
* enabled option to disable loading of external JavaScript file
* enabled option to specify URL for targeted resource loading
* added `fieldset { border: 0; }` to usp.css stylesheet
* increased width of anti-spam input field (via usp.css)
* changed the order of input fields in submission-form.php
* fixed loading of resources on success and error pages
* added field for custom content to display before the USP form
* enable HMTL for success, error, and upload messages
* fixed issue with content not getting included in posts

= 20121119 =

* increased default image width and height
* comment out output start in three files
* remove echo output for input value attributes
* cleaned up placeholders with clearer infos
* remove usp_validateContent() function
* remove conditional if for content in usp_checkForPublicSubmission() [1]
* [1] default text no longer added to posts when empty
* remove content validation in usp_createPublicSubmission()
* added option to receive email alert for new submissions
* added option to set author as current user
* added option to set author url as usp url
* added option to set category as hidden
* submission-form.php &amp; submission-form-classic.php: changed markup output for success &amp; error messages

= 20121108 =

* Fixed non-submission when title and other fields are hidden

= 20121107 =

* Rebuilt plugin and optimized code using current WP API
* Redesigned settings page, toggling panels, better structure, more info, etc.
* Errors now redirect to specified page (if set) or current page
* Fixed bug to allow for unlimited number of uploaded images
* Cleaned up template tags, added inline comments
* Optimized/enhanced the user-submission form
* Added option to restore default settings
* Added settings link from Plugins page
* Renamed CSS and JavaScript files
* Added challenge question captcha
* Added hidden field for security
* Added option for custom success message
* Submission form now retains entered value if error
* Added placeholder attributes to the form fields
* Submissions including invalid upload files now redirect to form with error message
* Fixed default author of submitted posts
* the_author_link is not filterable, so created new function usp_author_link
* moved admin styles from form stylesheet to admin-only stylesheet
* Added new HTML5 form and stylesheet, kept originals as "classic" version

= 1.0 =

* Initial release

== Frequently Asked Questions ==

**Can you add this feature or that feature?**

Please check the premium version of the plugin, which includes many of the most commonly requested features from users. The free version may incorporate some new features as well in future updates.

**Images are not uploaded or displaying**

There are several things that can interfere with uploading files:

* Check the permission settings on the upload folder(s) by ensuring that you can successfully upload image files thru the Media Uploader. 
* Double-check that all the image-upload settings make sense, and that the images being uploaded meet the specified requirements.

Note: when changing permissions on files and folders, it is important to use the least-restrictive settings possible. If you have to use more permissive settings, it is important to secure the directory against malicious activity. For more information check out: [Secure Media Uploads](http://digwp.com/2012/09/secure-media-uploads/)

**How to set submitted image as the featured image?**

Visit the "Options" panel in the plugin settings and select "Set Uploaded Image as Featured Image". Note that this setting merely assigns the submitted image as the Featured Image for the post; it's up to your theme's single.php file to include `the_post_thumbnail()` to display the Featured Images.

**How to require login?**

Here's a quick tutorial for [requiring user login for any plugin](http://wp-mix.com/require-user-login-any-plugin/).

Here is another way of doing it (customize as needed):

`if (is_user_logged_in()) {
	// the user is logged in, so display the submission form
	if (function_exists('user_submitted_posts')) user_submitted_posts();
} else { 
	// the user is not logged in, so redirect to any URL and exit
	header('Location: http://example.com/');
	exit;
}`

**How do I change the appearance of the submission form?**

Custom CSS may be used to change the appearance of the submission form. By default, there are two pre-styled forms (HTML5 and Classic) that may be selected from the "Options" panel. Once you've selected one of these, you may customize the CSS by editing either "usp.css" (for HTML5 form) or "usp-classic.css" (for Classic form) located in the plugin's `/resources/` directory. 

Alternately, check to disable the stylesheet for the "Form style" setting in the plugin's "Options" panel. That will ensure that any existing CSS styles are not applied, leaving you with a blank (unstyled) slate with which to work. Then you may customize the form's appearance by adding CSS to your theme's stylesheet, `style.css` (or elsewhere).

**How do I manually modify the submission form?**

To make changes to the submission form, edit either `submission-form-classic.php` or `submission-form.php`, depending on your settings (see "Form style" in the "Options" panel).

**Will this work with my theme**

USP is designed to work with any compatible theme running on WordPress version 3.3 or better.

**What about security and spam?**

USP uses the WordPress API to keep everything secure, and includes a captcha and hidden field to stop spam and bots.

**Can I include video?**

The free version of the plugin supports only image uploads, but some hosted videos may be included in the submitted content (textarea) by simply including the video URL on its own line. See [this page](http://codex.wordpress.org/Embeds) for more info.

**Other questions**

To ask a question, visit the [USP Homepage](http://perishablepress.com/user-submitted-posts/) or [contact me](http://perishablepress.com/contact/).

== Donations ==

I created this plugin with love for the WP community. To show support, consider purchasing one of my books: [The Tao of WordPress](http://wp-tao.com/), [Digging into WordPress](http://digwp.com/), or [.htaccess made easy](http://htaccessbook.com/).

Links, tweets and likes also appreciated. Thanks! :)
