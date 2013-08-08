#!/usr/bin/bash

# installing WP. Important to set URL same for acceptance tests
sh wp db create
sh wp core install --url="http://127.0.0.1:4000" --title="UnTestEd" --admin_password="admin" --admin_email="davert.php@mailican.com"

# activating test plugin
sh wp plugin activate user-submitted-posts

# preparing data for test
sh wp term create "Game of Drones" category
sh wp post create --post_type=page --post_status=publish --post_title='Submit a Post' --post_content="[user-submitted-posts]"

# enabling "Game of Drones" category for user to submit post
sh wp option update usp_options "{\"categories\": [1,2]}" --format=json'