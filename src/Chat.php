<?php

class Chat
{
    protected array $messages = [];

    public function __construct(protected string $title)
    {
    }

    public function getMessages(Member $member)
    {
        return $this->messages;
    }
    public function addMessage($message)
    {
        $this->messages[] = $message;
        echo "in Chat->addMessage \n";
        echonl($this->messages);
    }
}
