<?php
use PHPUnit\Framework\TestCase;
final class usernameClassTest extends TestCase
{
    function test_username() {
        $this->assertJsonStringEqualsJsonString(
            json_encode(['username' => 'Jessie'])
        );
    }
}//EOF

?>