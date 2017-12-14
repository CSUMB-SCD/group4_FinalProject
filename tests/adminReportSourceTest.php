<?php
use PHPUnit\Framework\TestCase;
//include 'inc/adminReportSource.php';

function test_numUser()
{
    //should return a base number
    //currently have 3 admin and 2 user
    $this->assertCount(0, numUser());
}

?>