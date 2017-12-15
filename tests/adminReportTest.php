<?php


use PHPUnit\Framework\TestCase;
final class adminReportTest extends TestCase
{
    function test_numUser()
    {
        //should return a base number
        //currently have 3 admin and 2 user
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertCount(5, adminReport::numUser());
    }
}//EOF

?>