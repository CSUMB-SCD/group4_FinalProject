<?php
use PHPUnit\Framework\TestCase;
final class adminReportTest extends TestCase
{
    
    
    public function CensorshipTestIsNotNull()
    {
        $this->isNull(
            'myMessage',
            checkMessage::censorship($swearWord)
        );
    }
    
    public function CensorshipTestIsNotNull()
    {
        $this->assertEquals(
            'apple',
            checkMessage::findSwearwords($message)
        );
    }
}
?>