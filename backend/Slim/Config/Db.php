<?php

    namespace Slim\Config;
    use PDO;
    use PDOException;
      
    class Db
    {
        const DRIVER = 'mysql';
        const HOST = 'localhost';
        const DATABASE = 'participations';
        const USERNAME = 'root';
        const PASSWORD = '';
        const CHARSET = 'utf8';
        const COLLATION = 'utf8_unicode_ci';
        const PREFIX = '';

        public static function getConn()
        {
            try {
                // Configure a conexão com o banco de dados
                $dsn = self::DRIVER . ':host=' . self::HOST . ';dbname=' . self::DATABASE . ';charset=' . self::CHARSET;
                $user = self::USERNAME;
                $pass = self::PASSWORD;
                
                $conn = new PDO($dsn, $user, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $erro['ERROR'] = $e->getMessage();
                echo json_encode($erro);
                exit;
            }
        
            return $conn;
        }
    }

?>

