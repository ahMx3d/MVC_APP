<?php

    class App
    {

        // Define URL Keys.
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        // Constructor.
        function __construct()
        {
            // Invoke URl Parser.
            $url = $this->parseURL();

            // Controller Check.
            if (isset($url[0])) {
                // Controller Exist.
                if (
                    file_exists(
                        '..\app\controllers\\'
                        .ucfirst(
                            strtolower($url[0])
                        ).
                        '.php'
                    )
                ) {
                    // Assign Controller Value.
                    $this->controller = ucfirst(
                        strtolower(
                            $url[0]
                        )
                    );
                    // Remove Controller Key.
                    unset($url[0]);
                }
            }

            // Involve Controller.
            require_once(
                '..\app\controllers\\'
                .$this->controller.
                '.php'
            );

            // Method Check.
            if (isset($url[1])) {
                // Method Exist.
                if (
                    method_exists(
                        $this->controller,
                        $url[1]
                    )
                ) {
                    // Assign Method Value.
                    $this->method = strtolower(
                        $url[1]
                    );
                    // Remove Method Key.
                    unset($url[1]);
                }
            }
            
            // Assign Params Value.
            $this->params = $url? array_values($url): [];

            // Define Controller Instance Variable.
            $route = new $this->controller;

            // Define Method Params.
            call_user_func_array(
                [
                    $route,
                    $this->method
                ],
                $this->params
            );
        }
        // URL Parser.
        public function parseURL()
        {
            // URL Check.
            if (isset($_GET['url'])) {
                return explode(
                    '/',
                    filter_var(
                        rtrim(
                            $_GET['url'],
                            '/'
                        ),
                        FILTER_SANITIZE_URL
                    )
                );
            }
            return null;
        }
    }
    