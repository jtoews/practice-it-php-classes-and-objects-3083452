<?php

class Member
{
    const ADMIN_ROLE = 'admin';
    const DEFAULT_ROLE = 'member';

    public string $username;
    public string $role = self::DEFAULT_ROLE;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function addWorkspaceMember(Member $member, Workspace $workspace)
    {
        $admin = $workspace->getAdmin();

        if (!$admin || $admin->username !== $this->username) {
            echonl('An admin is required to add members to ' . $workspace->getUrl());
            return;
        }

        $workspace->members[] = $member;
    }

    public function createChat(string $title, Workspace $workspace)
    {
        if (!$workspace->hasMember($this)) {
            echonl('Member must belong to ' . $workspace->getUrl() . ' to create a chat');
            return;
        }

        $chat = new Chat($title);
        //$chat->title = $title;
        $workspace->chats[] = $chat;

        return $chat;
    }

    public function createWorkspace(string $subdomain)
    {
        $workspace = new Workspace($subdomain, $this);
        // $workspace->setUrl($subdomain);
        // $workspace->setAdmin($this);

        return $workspace;
    }

    public function postMessageToChat(string $content, Chat $chat)
    {
        $message = new Message($content, $this->username, date('m/d/Y'));
        // $message->content = $content;
        // $message->author = $this->username;
        // $message->date = date('m/d/Y');

        $chat->messages[] = $message;
        echonl($chat, TRUE);
    }

    public function postMessageToChannel(string $content, Channel $channel)
    {
        $message = new Message($content, $this->username, date('m/d/Y'));
        // $message->content = $content;
        // $message->author = $this->username;
        // $message->date = date('m/d/Y');

        $chat->messages[] = $message;
        echonl($chat, TRUE);
    }
}
