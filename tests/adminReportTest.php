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
    
    function test_get_function_to_see_if_how_many_users_are_there(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->setMethods(array('preExeFetNOPARA'))
        ->getMock();
        $this->$this->assertCount(4, UnitTestingReport::get("user","name"));
    }
    
    function test_getUserInfo_from_the_table(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertCount(8, UnitTestingReport::getUserInfo(17));
    }
    
    
    function test_to_see_if_we_get_the_same_table(){
        $sql = "SELECT  username
        FROM    user
        WHERE   admin = 0
        GROUP BY username
        ORDER BY loginCount 
        DESC LIMIT 1";
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertEquals(UnitTestingReport::preExeFetSQL($sql), UnitTestingReport::preExeFetNOPARA($sql));
    }
    
    function test_search_movie_person_by_their_role_and_name(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertCount(6, UnitTestingReport::searchMoviePerson("george lucas", 1));
    }
    
    function test_get_the_movie_id_by_the_date_and_name_of_movie(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertEquals(14, UnitTestingReport::getMovieID("now you see me", "1212-12-04"));
    }
    
    function test_get_the_user_id_by_their_name_and_username(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertEquals(1, UnitTestingReport::getUserID("Vader", "admin2"));
    }
    
    function test_search_movie_person_id_by_their_role_and_name(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertCount(12, UnitTestingReport::getPersonID("george lucas", 1));
    }
    
    function test_search_movie_by_their_title(){
        $mock = $this->getMockBuilder('\UnitTestingReport')
        ->getMock();
        $this->$this->assertCount(4, UnitTestingReport::searchMovieSearch("thor"));
    }
    
}//EOF

?>