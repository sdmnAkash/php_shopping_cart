<?php
   class Createdb{
    private $hostname;
    private $dbname;
    private $username;
    private $password;
    private $tablename;
    private $conn;

    // class constructor
    public function __construct(
      $dbname = 'newdb',
      $tablename = 'newtable',
      $hostname = 'localhost',
      $username = 'root',
      $password = ''
    ){
      $this->hostname = $hostname;
      $this->tablename = $tablename;
      $this->username = $username;
      $this->password = $password;
      $this->dbname = $dbname;

      //establish connection
      $this->conn = mysqli_connect($this->hostname, $this->username, $this->password);

      //check connection
      if(!$this->conn){
        die("connection failed: " . mysqli_connect_error());
      }

      //create database
      $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
      if(mysqli_query($this->conn, $sql)){
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);

        //create table
        $sql = "CREATE TABLE IF NOT EXISTS $this->tablename(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                                            product_name VARCHAR(25) NOT NULL,
                                                            product_price FLOAT,
                                                            product_img VARCHAR(100))";

        if(!mysqli_query($this->conn, $sql)){
          echo "Error creating table: " . mysqli_error($this->conn);
        }
      }else{
        return false;
      }
    }

    public function getData(){
      $sql = "SELECT * FROM $this->tablename";

      $result = mysqli_query($this->conn, $sql);

      if(mysqli_num_rows($result) > 0){
        return $result;
      }
    }
  } 
?>