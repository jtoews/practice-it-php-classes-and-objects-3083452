<?php
class Member
{
    public string $username;
    public string $role;
    static string $ADMIN_ROLE = "admin";
    static string $MEMBER_ROLE = "member";

    public function addMemberToWorkspace(Workspace $workspace)
    {
        if ($this->role == $this->ADMIN_ROLE) {
            $workspace->addMember($this);
        }
    }
    public function createWorkspace()
    {
        if ($this->role == $this->ADMIN_ROLE) {
            return new Workspace();
        }
    }
    public function createChat(Workspace $workspace)
    {
    }
    public function postMessageToChat(Message $message, Chat $chat)
    {
    }
}
