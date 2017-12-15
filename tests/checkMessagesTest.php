<?php
use PHPUnit\Framework\TestCase;
final class checkMessagesTest extends TestCase
{
    
    
    function CensorshipTestIsNotNull()
    {
        $mock = $this->getMockBuilder('\checkMessage')
        ->getMock();
        $this->isNull(
            'myMessage',
            checkMessage::censorship($swearWord)
        );
    }
    
    function CensorshipTestassertEquals()
    {
        $mock = $this->getMockBuilder('\checkMessage')
        ->getMock();
        $this->assertEquals(
            'apple',
            checkMessage::findSwearwords($message)
        );
    }
}
?>