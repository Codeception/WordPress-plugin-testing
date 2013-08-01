<?php
$I = new WebGuy($scenario);
$I->wantTo('submitted a post by user and publish it as admin');

$I->amGoingTo('submit a post as a regular user');
$I->amOnPage('/');
$I->click('Submit a Post');
$I->fillField('Your Name', 'Michael');
$I->fillField('Your URL','http://drone-rules.com');
$I->fillField('Post Title', 'Game of Drones Review');
$I->fillField('Post Tags', 'review book rob-starkraft');
$I->selectOption('select[name=user-submitted-category]', 'Game of Drones');
$I->fillField('Post Content', 'This story is epic and characters are amazing.');
$I->click('Submit Post');
$I->see('Success! Thank you for your submission.');

$I->amGoingTo('log in as admin');
$I->amOnPage('/wp-login.php');
$I->fillField('Username', 'admin');
$I->fillField('Password','admin');
$I->click('Log In');
$I->see('Dashboard');

$I->expect('submitted post was added to a list');
$I->click('Posts');
$I->see('Game of Drones Review','table.posts');
$I->click('Game of Drones Review');

$I->amGoingTo('publish this post');
$I->see('Edit Post');
$I->click('#publish');
$I->see('Post published');

$I->expect('post is available on blog');
$I->click('View Post');
$I->see('Just another WordPress site');
$I->see('Game of Drones Review','.entry-title');
$I->see('This story is epic and characters are amazing.');
?>
