<?php
class base {
    private $dbname = "autoclash";
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    public function connect() {
        $dsn = "mysql:dbname={$this->dbname};host={$this->host}";
        try {
            $c = new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $ex) {
            printf("Erreur de connexion à la base de données: %s", $ex->getMessage());
            exit();
        }
        return $c;
    }



    public function disconect (&$c){
        $c = null;
    }
    public function request ($c , $query){
        $result = $c->query($query);
        return $result;

    }
    public function execute($query){
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
        
         
    }
    public function execute2($query){
        // Execute the prepared statement
        $query->execute();
    
        // Fetch all rows as an associative array
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
        // Return the result
        return $result;
    }
}

?>