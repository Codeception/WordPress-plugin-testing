<?php
$I = new WebGuy($scenario);
$I->wantTo('submitted a post by user and publish it as admin');
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

