<?php
    class vdb 
    {
        const DSN = "mysql:host=localhost;dbname=verkiezingenprj3";
        const USER = "root";
        const PASSWD = "";

        function GetPartijen() {	
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare("SELECT * FROM partij;");  
            
            $statement->execute(); 
            
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        }

        function GetPartijDetails($id) {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            $statement = $pdo->prepare("SELECT * FROM partij WHERE PartijId = $id;");  
            
            $statement->execute(); 
            
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows;
        }
    }
?>  
