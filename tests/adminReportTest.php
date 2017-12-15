<?php
use PHPUnit\Framework\TestCase;
final class UnitTestingReportTest extends TestCase
{
    function test_numUser_to_see_how_many_users_have_signed_up(){
        //should return a base number
        //currently have 3 admin and 2 user
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertCount(2, UnitTestingReport::numUser());
    }
    
    function test_numAdmin_to_see_if_will_return_the_3_admin_users(){
        //should return a base number
        //currently have 3 admin and 2 user
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertCount(3, UnitTestingReport::numAdmin());
    }
    
    function test_mostUser_to_see_which_user_has_logged_in_the_most() {
        //returns username 
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('Jessie', UnitTestingReport::mostUser());
    }
    
    function test_mostAdminr_to_see_which_admin_has_logged_in_the_most() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('admin', UnitTestingReport::mostAdmin());
    }
    
    function test_mostDir_to_see_which_director_was_searched_up_the_most() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('tim burton', UnitTestingReport::mostDir());
    }
    
    function test_mostActr_to_see_which_actor_was_searched_up_the_most() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('harrison ford', UnitTestingReport::mostAct());
    }
    
    function test_mostMovier_to_see_which_movie_was_searched_up_the_most() {
        //returns admin username
        //returns username 
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetSQL'))
        ->getMock();
        $this->assertEquals('reeeeee', UnitTestingReport::mostMovie());
    }

    function test_checks_if_it_went_to_the_right_table(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetNOPARA'))
        ->getMock();
        $this->arrayHasKey("movieTitle", UnitTestingReport::getInfo("movie_search"));
    }
    
    function test_get_function(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetNOPARA'))
        ->getMock();
        $this->$this->assertCount(4, UnitTestingReport::get("user","name"));
    }
    
    function test_getUserInfo(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertCount(8, UnitTestingReport::getUserInfo(17));
    }
}//EOF

?>