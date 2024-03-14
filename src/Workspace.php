<?php

class Workspace
{
   // private string $url;
    public array $chats = [];
    public array $members = [];

    public function __construct(public string $url, Member $admin)
    {
        $this->setUrl($url);
        $this->setAdmin($admin);
    }

    public static string $urlDomain = '.flack.app';

    public function setUrl(string $subdomain)
    {
        $this->url = $subdomain . self::$urlDomain;
    }

    public function setAdmin(Member $admin)
    {
        $admin->role = Member::ADMIN_ROLE;

        $this->members[] = $admin;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getAdmin()
    {
        $search = array_filter($this->members, function ($member) {
            if ($member->role !== Member::ADMIN_ROLE) {
                return;
            }

            return $member;
        });

        return empty($search) ? false : $search[0];
    }

    public function hasMember(Member $member)
    {
        return in_array(
            $member->username,
            array_map(fn ($member) => $member->username, $this->members)
        );
    }
}
