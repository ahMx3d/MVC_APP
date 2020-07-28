<?php

    class System
    {
        // Display Message.
        public static function displayMsg()
        {
            // Session Message Check.
            if (!empty($_SESSION['MSG'])) {
                // Assign Message Variable.
                $msg = $_SESSION['MSG'];

                // Assign Message Type Variable.
                if (!empty($_SESSION['MSG_TYPE'])) {
                    // Assign Message Type Varaibel.
                    $msgTyp = $_SESSION['MSG_TYPE'];

                    // Error Message Check.
                    if ($msgTyp == 'error') {
                        echo '
                            <div class="alert alert-danger text-center">'
                            .$msg.
                            '</div>
                        ';
                    }

                    // Success Message Check.
                    if ($msgTyp == 'success') {
                        echo '
                            <div class="alert alert-success text-center">'
                            .$msg.
                            '</div>
                        ';
                    }
                }
                
                // Remove Session Message.
                unset($_SESSION['MSG']);
                // Remove Session Message Type.
                unset($_SESSION['MSG_TYPE']);
            }
        }
        
        // Redirection With Message.
        public static function redirectWithMsg($url= false, $msg= null, $msgTyp= null)
        {
            // Page Check.
            if (is_string($url)) {
                // Define Location Variable.
                $location = $url;
            } else {
                // Define Location Variable.
                $location = $_SERVER['SCRIPT_NAME'];
            }
            
            // Message Check.
            if ($msg != null) {
                // Assign Session Message.
                $_SESSION['MSG'] = $msg;
            }

            // Message Type Check.
            if ($msgTyp != null) {
                // Assign Session Message Type.
                $_SESSION['MSG_TYPE'] = $msgTyp;
            }

            // Redirect.
            header('Location: ' .URL_ROOT.$location);
            exit;
        }

        // Set Message.
        public static function setMsg($msg= null, $msgTyp= null)
        {
            // Message Check.
            if ($msg != null) {
                // Assign Session Message.
                $_SESSION['MSG'] = $msg;
            }

            // Message type Check.
            if ($msgTyp != null) {
                $_SESSION['MSG_TYPE'] = $msgTyp;
            }
        }

        // Redirection
        public static function redirect($url)
        {
            header('Location: ' .URL_ROOT.$url);
            exit;
        }
    }
    