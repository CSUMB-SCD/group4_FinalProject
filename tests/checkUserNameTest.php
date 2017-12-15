<?php


use PHPUnit\Framework\TestCase;

final class usernameClassTest extends TestCase
{
    function test_username() {
        $expected = username("Jessie");
        $this->assertJsonStringEqualsJsonString(
            $expected,
            json_encode(['username' => 'Jessie'])
        );
    }
}//EOF

?>