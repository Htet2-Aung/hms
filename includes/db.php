<?php
    class Database{
        private static $host='localhost';
        private static $dbname='hms_new';
        private static $username='root';
        private static $password;

        private static $connection=null;

        public static function connect(){
            if(self::$connection==null){
                try {
                    self::$connection = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";port=3307",self::$username,self::$password);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            return self::$connection;
        }
        public static function disConnect(){
            self::$connection = null;
        }
    }
?>