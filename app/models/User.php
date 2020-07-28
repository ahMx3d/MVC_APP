<?php

    class User
    {
        // Database Variable.
        private $db;
        
        // Constructor.
        public function __construct()
        {
            // Database Instance.
            $this->db = new Model;
        }

        // Find Database Users.
        public function login($mail, $pass)
        {
            // Select Statement.
            $this->db->query('
                SELECT
                    *
                FROM
                    `users`
                WHERE
                    `mail` = :log_mail
                LIMIT
                    1
            ');

            // Bind Params.
            $this->db->bind(
                ':log_mail',
                $mail
            );

            // Execute Satement.
            $row = $this->db->fetch();
            // Database Hashed Password.
            $hash = $row->pass;

            // Password Vefified Check
            if (
                password_verify(
                    $pass,
                    $hash
                )
            ) {
                return $row;
            } else {
                return false;
            }
        }

        // Check Database Emails.
        public function getUserByEmail($mail)
        {
            // Select Statement.
            $this->db->query('
                SELECT
                    *
                FROM
                    `users`
                WHERE
                    `mail` = :reg_mail
                LIMIT
                    1
            ');
            // Bind Param.
            $this->db->bind(
                ':reg_mail',
                $mail
            );
            // Execute Statement.
            $this->db->execute();

            // Row Count Check.
            if (
                $this->db->rowCount()
            ) {
                return true;
            } else {
                return false;
            }
        }

        // Database Registeration.
        public function register($name, $mail, $pass)
        {
            // Insert Statement.
            $this->db->query('
                INSERT INTO
                    `users`
                        (
                            `name`,
                            `mail`,
                            `pass`,
                            `reg_date`
                        )
                VALUES
                    (
                        :reg_name,
                        :reg_mail,
                        :reg_pass,
                        :reg_date
                    )
            ');

            // Bind Params.
            $this->db->bind(
                ':reg_name',
                $name
            );
            $this->db->bind(
                ':reg_mail',
                $mail
            );
            $this->db->bind(
                ':reg_pass',
                $pass
            );
            $this->db->bind(
                ':reg_date',
                date("Y-m-d H:i:s")
            );

            // Execute Statement.
            $this->db->execute();

            // Insertion Check.
            if ($this->db->lastInsertId()) {
                // Success.
                return true;
            } else {
                // Error.
                return false;
            }
        }
    }
    