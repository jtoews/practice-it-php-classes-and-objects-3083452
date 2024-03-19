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

echo 'app.php URL is ' . $workspace->getUrl() . "\n";

$directMessage = new DirectMessage("");

$directMessage->addMember($admin);

echo "app.php added member to directMessage\n";

echonl($directMessage);

echo "app.php now start posting to DM as admin\n";

$admin->postMessageToDirectMessage('!!!some DM!!!', $directMessage);

echo "now start posting to DM as member\n";

$member->postMessageToDirectMessage('!!!member DM!!!', $directMessage);

echo "app.php now start reading to DM as admin\n";

echonl($directMessage->getMessages($admin));

echo "app.php now start reading to DM as member\n";

echonl($directMessage->getMessages($member));

echo "app.php done.\n\n";
