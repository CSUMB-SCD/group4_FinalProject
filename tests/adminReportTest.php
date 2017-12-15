<?php
use PHPUnit\Framework\TestCase;
include "../src/adminReportSource.php";
final class adminReportTest extends TestCase
{
    function test_numUser()
    {
        //should return a base number
        //currently have 3 admin and 2 user
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertCount(2, adminReport::numUser());
    }
    function test_numAdmin()
    {
        //should return a base number
        //currently have 3 admin and 2 user
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertCount(3, adminReport::numAdmin());
    }
    function test_mostUser() {
        //returns username 
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('Jessie', adminReport::mostUser());
    }
}//EOF

?>