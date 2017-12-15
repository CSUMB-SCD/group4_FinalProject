<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
    
<<<<<<< HEAD
//==================
    public function alertTestIsNotNull()
=======
    public function testIsNotNull()
>>>>>>> b3b243fd30e478dc75b7df9fac342cc4ae3cdab9
    {
        $this->isNull(
            'myMessage',
            Email::alert($msg)
        );
    }
    
    public function alertTestIsZero()
    {
        $msg = 'alert';
        $this->assertNotEmpty([ Email::alert($msg) ]);
    }
    
    
    
    

}//EOF

?>