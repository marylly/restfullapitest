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
     * Database table name
     */
    protected $table = "users";

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

    /*
     * Add new User
     */
    public function addNew($json) {
        $insert_obj = (object) $json;
        $fields = $this->getTableFields($this->table);
        if(($key = array_search("id", $fields)) !== false) unset($fields[$key]);
        $query = "INSERT INTO " . $this->table . " ( " . implode($fields, ', ') . ") VALUES (" . implode(array_map(function($value) { return ':' . $value; }, $fields),', ') . ");";

        $stmt = $this->db->prepare($query);

        foreach($fields as $field) {
            $stmt->bindParam(':' . $field, $insert_obj->$field, \PDO::PARAM_STR);
        }
        return $stmt->execute();
    }

    public function getTableFields($tableName) {
        $q = $this->db->prepare("DESCRIBE " . $tableName);
        $q->execute();
        return $q->fetchAll(\PDO::FETCH_COLUMN);
    }
}