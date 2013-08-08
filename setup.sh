#!/usr/bin/env bash
curl http://wp-cli.org/installer.sh > wp-installer.sh
INSTALL_DIR='.wp-cli' bash wp-installer.sh
ln -s .wp-cli/bin/wp wp

# installing WP. Important to set URL same for acceptance tests
./wp db create
./wp core install --url="http://127.0.0.1:4000" --title="UnTestEd" --admin_password="admin" --admin_email="davert.php@mailican.com"

# activating test plugin
./wp plugin install user-submitted-posts
./wp plugin activate user-submitted-posts

# preparing data for test
./wp term create "Game of Drones" category
./wp post create --post_type=page --post_status=publish --post_title='Submit a Post' --post_content="[user-submitted-posts]"

# updating plugin options: enabling "Game of Drones" category, disabling captcha
./wp option set usp_options '{"default_options":0,"author":1,"categories":["1","2"],"number-approved":-1,"redirect-url":"","error-message":"There was an error. Please ensure that you have added a title, some content, and that you have uploaded only images.","min-images":0,"max-images":1,"min-image-height":0,"min-image-width":0,"max-image-height":1500,"max-image-width":1500,"usp_name":"show","usp_url":"show","usp_title":"show","usp_tags":"show","usp_category":"show","usp_images":"hide","upload-message":"Please select your image(s) to upload.","usp_form_width":"300","usp_question":"1 + 1 =","usp_response":"2","usp_casing":0,"usp_captcha":"hide","usp_content":"show","success-message":"Success! Thank you for your submission.","usp_form_version":"current","usp_email_alerts":1,"usp_email_address":"davert.php@mailican.com","usp_use_author":0,"usp_use_url":0,"usp_use_cat":0,"usp_use_cat_id":"","usp_include_js":1,"usp_display_url":"","usp_form_content":"","usp_richtext_editor":0,"usp_featured_images":0}' --format=json
