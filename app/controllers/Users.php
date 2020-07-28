<?php

    class Users extends Controller
    {
        
        // Constructor.
        function __construct()
        {
            // Model Instance.
            $this->userModel = $this->model('User');
        }

        // Users Main Method.
        public function index()
        {
        	// Registeration Method.
        	$this->register();
        }

        // Logout.
        public function logout()
        {
            // Unset Session.
            session_unset();
            // Destroy Session.
            session_destroy();
            // Login Redirect.
            System::redirect('users/login');
        }

        // Login.
        public function login()
        {
        	// Session Check.
            if (isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN'] == true) {
                // Redirect To Home Page
                System::redirect('home/index');
            }
            
            // Request Check.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize Inputs.
                $_POST = filter_input_array(
                    INPUT_POST,
                    FILTER_SANITIZE_STRING
                );

                // Logging Data.
                $data = [
                    'mail' => $_POST['log-mail'],   // Logging Email.
                    'pass' => $_POST['log-pass'],   // Logging Password.
                    'merr' => '',   // Email Error Message.
                    'perr' => ''    // Password Error Message.
                ];

                // Email Registered Check.
                if (
                    !$this->userModel->getUserByEmail($data['mail'])
                ) $data['merr'] = 'No such user';

                // Empty Validation Checks.
                if (empty($data['mail'])) $data['merr'] = 'Email must be filled in';
                if (empty($data['pass'])) $data['perr'] = 'Password must be filled in';

                // Empty Error Checks.
                if (
                    empty($data['merr']) &&
                    empty($data['perr'])
                ) {
                    // Database Logging Instance.
                    $user = $this->userModel->login(
                        $data['mail'],
                        $data['pass']
                    );
                    // Datababse Logging Check.
                    if ($user) {
                        // Session Set.
                        $_SESSION['IS_LOGGED_IN'] = true;
                        $_SESSION['USER_DATA'] = [
                            'id'    => $user->id,
                            'name'  => $user->name,
                            'mail'  => $user->mail
                        ];
                        // Success.
                        System::redirect('home/index');
                    } else {
                        // Error.
                        $data['perr'] = 'Incorrect Password';
                        // Logging View.
                        $this->view(
                            'users/login',
                            $data
                        );
                    }
                } else {
                    // Error.
                    $this->view(
                        'users/login',
                        $data
                    );
                }
            } else {
                // Logging Data.
                $data = [
                    'mail' => '',   // Logging Email.
                    'pass' => '',   // Logging Password.
                    'merr' => '',   // Email Error Message.
                    'perr' => ''    // Password Error Message.
                ];

                // Logging view.
                $this->view(
                    'users/login',
                    $data
                );
            }
        }

        // Registeration.
        public function register()
        {
        	// Session Check.
            if (isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN'] == true) {
                // Redirect To Home Page
                System::redirect('home/index');
            }
            
            // Request Check.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize Inputs.
                $_POST = filter_input_array(
                    INPUT_POST,
                    FILTER_SANITIZE_STRING
                );

                // Registeration Data.
                $data = [
                    'name' => $_POST['reg-name'],   // Registeration Name.
                    'mail' => $_POST['reg-mail'],   // Registeration Email.
                    'pass' => $_POST['reg-pass'],   // Registeration Password.
                    'conf' => $_POST['reg-conf'],   // Registeration Confirmation Password.
                    'nerr' => '',   // Name Error Message.
                    'merr' => '',   // Email Error Message.
                    'perr' => '',   // Password Error Message.
                    'cerr' => ''    // Confirmation Password Error Message.
                ];

                // Empty Validation Checks.
                if (empty($data['name'])) $data['nerr'] = 'Name is Mandatory';
                if (empty($data['mail'])) $data['merr'] = 'Email is Mandatory';
                if (empty($data['pass'])) $data['perr'] = 'Password is Mandatory';
                if (empty($data['conf'])) $data['cerr'] = 'confirmation is Mandatory';

                // Passwords Validation Check.
                if ($data['pass'] !== $data['conf']) $data['cerr'] = 'Passwords don\'t match';

                // Email Registered Check.
                if (
                    $this->userModel->getUserByEmail($data['mail'])
                ) $data['merr'] = 'Email already registered';

                // Empty Errors Check.
                if (
                    empty($data['nerr']) &&
                    empty($data['merr']) &&
                    empty($data['perr']) &&
                    empty($data['cerr'])
                ) {
                    // Encrypt Password.
                    $data['pass'] = password_hash(
                        $data['pass'],
                        PASSWORD_DEFAULT
                    );

                    // Database Registeration Check.
                    if (
                        $this->userModel->register(
                            $data['name'],
                            $data['mail'],
                            $data['pass']
                        )
                    ) {
                        // Success.
                        System::redirectWithMsg(
                            'users/login',
                            'You \'ve just been registered with: "' .$data['mail']. '"',
                            'success'
                        );
                    } else {
                        // Error.
                        System::redirectWithMsg(
                            'users/register',
                            'Something went terribly wrong!!',
                            'error'
                        );
                    }
                } else {
                    // Error.
                    $this->view(
                        'users\register',
                        $data
                    );
                }
                
            } else {
                // Registeration Data.
                $data = [
                    'name' => '',   // Registeration Name.
                    'mail' => '',   // Registeration Email.
                    'pass' => '',   // Registeration Password.
                    'conf' => '',   // Registeration Confirmation Password.
                    'nerr' => '',   // Name Error Message.
                    'merr' => '',   // Email Error Message.
                    'perr' => '',   // Password Error Message.
                    'cerr' => ''    // Confirmation Password Error Message.
                ];

                // Registeration View.
                $this->view(
                    'users\register',
                    $data
                );
            }
        }
    }
    