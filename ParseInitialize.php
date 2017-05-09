<?php

/**
 * Created by PhpStorm.
 * User: santh
 * Date: 5/8/2017
 * Time: 7:51 PM
 */

require_once ('vendor/autoload.php');
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;



class ParseInitialize
{
    private $APP_ID,$MASTER_KEY,$MONGODB_URI,$PARSE_MOUNT
    ,$SERVER_URL;

    private $currentUser;
    public function ParseInitialize()
    {
        $this->init();

    }

    private function init()
    {
        $this->APP_ID = "yourappidhere";
        $this->MASTER_KEY="yourmasterkeyhere";
        $this->MONGODB_URI="yourmongodburihere";
        $this->PARSE_MOUNT="yourparsemounthere";
        $this->SERVER_URL="yourserverurlhere";

        ParseClient::initialize($this->APP_ID,null,$this->MASTER_KEY);
        ParseClient::setServerURL($this->SERVER_URL,'parse');

    }

//This is required only when you've made it mandatory for users to 
    // if and only when they login. 
    private function loginUser($email,$password)
    {
        try {
            $user = ParseUser::logIn($email, $password);
            return true;
        }
        catch(ParseException $exception)
        {
         //   echo $exception->getMessage();
            return false;
        }


    }


//This works as an example that retrieves a user's todo tasks that are stored in the cloud through Parse. 
    public function retrieveTasks($email,$password)
    {

        if($this->loginUser($email,$password))
        {
           $this->currentUser = ParseUser::getCurrentUser();

           $allTasks = $this->findTasks($this->currentUser);

           if($allTasks!=null)
           {
               $tasksString = implode(',',$allTasks);
               return $tasksString;
           }
           else{
               $string = "You Don't Have Any Tasks. Check if you have entered your 
               email and password properly";
               return $string;
           }

        }




    }

    private function findTasks(ParseUser $currentUser)
    {
        $query = new ParseQuery("Tasks");
        $query->equalTo("user",$currentUser->getEmail());
        $results = $query->find();

        $array = array();

        for($counter=0;$counter<count($results);$counter++)
        {
            $array[] = $results[$counter]->get("task");

        }

    //    echo print_r($array);

        if(isset($array))
        {
            return $array;
        }
        else{
            return null;
        }


    }

    public function logout()
    {
        ParseUser::logOut();

    }





}

?>