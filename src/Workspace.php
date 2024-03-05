<?php
Class Workspace {
    public array $members;
    public array $chats;
    public string $url;

    public function addMember (Member $member){
        $this->members[] = $member;
    }
    
}
