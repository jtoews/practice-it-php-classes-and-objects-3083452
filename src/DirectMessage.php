<?php

class DirectMessage extends Chat
{
    public array $members = [];
    //private array $messages = [];
    //private string $title;

    public function hasMember(Member $member)
    {
        echo "DirectMessage: in hasMember \n";
        echonl($member);
        echonl($this->members);

        return in_array(
            $member->username,
            array_map(fn ($member) => $member->username, $this->members)
        );
    }

    public function addMember(Member $member)
    {
        $this->members[] = $member;
    }

    public function getMessages(Member $member)
    {

        if (!$this->hasMember($member)) {
            echonl('Member must belong to ' . $this->getTitle() . ' to read its direct messages');
            return;
        }

        return $this->messages;
    }

    public function getTitle()
    {
        $title = '';
        foreach ($this->members as $member) {
            $title = $title . $member->username . ",";
        }
        return $title;
    }
}
