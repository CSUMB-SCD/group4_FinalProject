<?php   //USE NAMEDPARAMETERS TO PREVENT SQL INJECTION

final class adminReport
{
    
    public function preExeFetSQL($sql){
        global $dbConn;
        
        $statement = $dbConn -> prepare ($sql);
        $statement -> execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    
    public function numUser(){
        $sql = "SELECT  count(*)
                FROM    user
                WHERE   admin = 0";
        return preExeFetSQL($sql);
    }
    
    public function numAdmin(){
        $sql = "SELECT  count(*)
                FROM    user
                WHERE   admin = 1";
        return preExeFetSQL($sql);
    }    
        
    public function mostUser(){
        $sql = "SELECT  username
                FROM    user
                WHERE   admin = 0
                GROUP BY username
                ORDER BY loginCount 
                DESC LIMIT 1";
        return preExeFetSQL($sql);
    }   
        
    public function mostAdmin(){
        $sql = "SELECT  username
                FROM    user
                WHERE   admin = 1
                GROUP BY username
                ORDER BY loginCount 
                DESC LIMIT 1";
        return preExeFetSQL($sql);
    }    
       
    public function mostDir(){
        $sql = "SELECT  name
                FROM    movie_people
                WHERE   roleID = 1
                GROUP BY name
                ORDER BY searchCount 
                DESC LIMIT 1";
        return preExeFetSQL($sql);
    }    
        
    public function mostAct(){
        $sql = "SELECT  name
                FROM    movie_people
                WHERE   roleID = 2
                GROUP BY name
                ORDER BY searchCount 
                DESC LIMIT 1";
        return preExeFetSQL($sql);
    }    
    
    public function mostMovie(){
        $sql = "SELECT  movieTitle
                FROM    movie_search
                ORDER BY searchCount 
                DESC LIMIT 1";
        return preExeFetSQL($sql);
    }
}
?>