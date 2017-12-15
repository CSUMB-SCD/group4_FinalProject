<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class usernameTest extends TestCase
{
    function test_username() {
        $this->assertJsonStringEqualsJsonString(
            json_encode(['username' => 'Jessie'])
        );
    }
}//EOF

?>