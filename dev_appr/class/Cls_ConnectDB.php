<?php

    ######### Class Connect Database ############
    class Cls_ConnectDB{
        var $con;
        var $result;
        var $host;
        var $username;
        var $password;
        var $dbname;
        var $dbselect;
        var $charset;
       
      
        
        function __construct($host="localhost",$username="root",$password="123456",$dbname="dev_approve",$charset='UTF8'){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->charset = $charset;
            $this->con=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
            $this->dbselect = mysqli_select_db($this->con,$this->dbname);
            if (!$this->con)
            {
                die('Could not connect: ' . $this->_error());
            }else{
                //echo "Connect Success !!1";
            }
            // mysql_query("SET NAMES ".$this->charset);
            // mysql_query("SET character_set_results=".$this->charset);
            mysqli_set_charset($this->con, $this->charset);
        }
        
        function ChangeConnect($host,$username,$password,$dbname,$charset){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->charset = $charset;
            $this->con=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
            $this->dbselect = mysqli_select_db($this->con,$this->dbname);
            if (!$this->con)
            {
                die('Could not connect: ' . $this->_error());
            }else{
                // echo "Connect Success !!";
            }
            // mysql_query("SET NAMES ".$this->charset);
            // mysql_query("SET character_set_results=".$this->charset);

               mysqli_set_charset($this->con, $this->charset);
        }
        
        function SetQuery($query){
            $this->result = mysqli_query($this->con,$query);
            return $this->result;
        }
        function GetResult(){
            if($this->result){
                return mysqli_fetch_array($this->result);
            }
            return 1;
        }
        function GetLastID(){
            return mysqli_insert_id($this->con);
        }

 
        # show Error
  
 
       
    }
?>

