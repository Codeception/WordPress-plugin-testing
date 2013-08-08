#!/usr/bin/env bash
curl http://wp-cli.org/installer.sh > wp-installer.sh
INSTALL_DIR='.wp-cli' bash wp-installer.sh
ln -s .wp-cli/bin/wp wp

# installing WP. Important to set URL same for acceptance tests
./wp db create
./wp core install --url="http://127.0.0.1:4000" --title="UnTestEd" --admin_password="admin" --admin_email="davert.php@mailican.com"

# activating test plugin
./wp plugin activate user-submitted-posts

# preparing data for test
./wp term create "Game of Drones" category
./wp post create --post_type=page --post_status=publish --post_title='Submit a Post' --post_content="[user-submitted-posts]"

# enabling "Game of Drones" category for user to submit post
./wp option update usp_options '{"categories": [1,2]}' --format=json
./wp option update usp_options '{"usp_captcha": "hide"}' --format=json
./wp option update usp_options '{"usp_name": "show"}' --format=json