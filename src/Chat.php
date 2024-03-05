<?php
class Chat
{
    public array $messages;
    public string $title;

    public function addMessage(Message $message)
    {
        $this->messages[] = $message;
    }
}
