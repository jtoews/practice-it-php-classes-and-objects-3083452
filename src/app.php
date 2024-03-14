<?php

include '_includes.php';

$admin = new Member('Mr. Admin man');
//$admin->role = $admin->$ADMIN_ROLE;
//$admin->username = 'Mr. Admin man';

$member = new Member('Ms Member person');
//$member->username = 'Ms Member person';


$workspace = $admin->createWorkspace('example.com');

//$workspace->setAdmin($admin);

$admin->addWorkspaceMember($member, $workspace);

$chat = $admin->createChat('some chat', $workspace);

$member->postMessageToChat('Howdey How DEE', $chat);

echonl($workspace->members);

echo 'URL is '.$workspace->getUrl();
