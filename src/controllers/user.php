<?php
namespace App\Controllers;
/*
 * User Class
 */
class User {
    /*
     * App Object
     */
    public $app;

    /*
     * PDO DB Instance
     */
    public $db;
    /*
     * User constructor method
     */
    function __construct($app){
        $this->app = $app;
        $this->db = $app->db;
        $this->db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO
    }

    /*
     * Get All Users
    */
    public function AllUsers(){
        $sth = $this->db->prepare("SELECT * FROM users;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}