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
    function test_mostAdmin() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('admin', adminReport::mostAdmin());
    }
    function test_mostDir() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('tim burton', adminReport::mostDir());
    }
    function test_mostAct() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('harrison ford', adminReport::mostAct());
    }
    function test_mostMovie() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\adminReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('reeeeee', adminReport::mostMovie());
    }
}//EOF

?>