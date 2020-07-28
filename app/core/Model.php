<?php
    class Model
    {
        // PHP Date Object Params.
        private $dbHost = DB_HOST;    // DB Host Name Property.
        private $dbUser = DB_USER;    // DB Username Property.
        private $dbPass = DB_PASS;    // DB Password Property.
        private $dbName = DB_NAME;    // DB Name Property.
        private $dbh;                 // DB Handler Property.
        private $err;                 // DB Error Property.
        private $stmt;                // DB Statement Property.

        // Constructor.
        public function __construct()
        {
            // Set Data Source Name.
            $dsn = 'mysql:host=' .$this->dbHost.
            ';dbname=' .$this->dbName;

            // Set PHP Data Object Options.
            $opts = array(
                PDO::ATTR_PERSISTENT    => TRUE,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
            );
            
            // PHP Data Object Instance.
            try {
                // PHP Data Object Instance.
                $this->dbh = new PDO(
                    $dsn,
                    $this->dbUser,
                    $this->dbPass,
                    $opts
                );
            } catch (PDOException $e) {
                // Catch Error.
                $this->err = $e->getMessage();
            }
        }

        // Query Statement Method.
        public function query($qury)
        {
            $this->stmt = $this->dbh->prepare($qury);
        }
    
        // Parameter Bind Method.
        public function bind($param, $value, $type = null)
        {
            if (is_null($type)) {
                switch (true) {
                    case is_int ($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool ($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null ($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
    
        // Statement Execute Method.
        public function execute()
        {
            return $this->stmt->execute();
        }
    
        public function lastInsertId()
        {
            return $this->dbh->lastInsertId();
        }

        // Statement Fetch All Method.
        public function fetchAll()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Statement Fetch Method.
        public function fetch()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Row Count Method.
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }
    }
    