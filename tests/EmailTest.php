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
    public function testIsNotNull()
    {
        $this->isNull(
            'myMessage',
            Email::alert($msg)
        );
    }
    
=======
>>>>>>> ea35ab853634968ddb63f67a79ea275bc8b63e5f
    
    
}//EOF

?>