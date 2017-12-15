<?php
use PHPUnit\Framework\TestCase;
final class checkMessagesTest extends TestCase
{
    
    
    public function CensorshipTestIsNotNull()
    {
        $this->isNull(
            'myMessage',
            checkMessage::censorship($swearWord)
        );
    }
    
    public function CensorshipTestassertEquals()
    {
        $this->assertEquals(
            'apple',
            checkMessage::findSwearwords($message)
        );
    }
}
?>