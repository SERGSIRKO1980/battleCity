<?php
    class MySQLConnector {
        private static $dbName = 'autoblog';
        private static $user = 'root';
        private static $password = '';
        private static $host = 'autoblog.com';
        private static $connection = null;

       public static function openConnection() {
            self::$connection = mysqli_connect(self::$host, self::$user, self::$password, self::$dbName);
            if (self::$connection)
                return self::$connection;
            else
                return mysqli_error($connection);
        }

        public static function closeConnection() {
            mysqli_close(self::$connection);
        }
    }
?>