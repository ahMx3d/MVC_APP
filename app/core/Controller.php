<?php

    abstract class Controller
    {
        // Model Instantiation
        protected function model($modelName)
        {
            require_once(
                '..\app\models\\'
                .$modelName.
                '.php'
            );
            return new $modelName();
        }

        // Involve View With Data.
        protected function view($viewName, $data= [])
        {
            require_once(
                '..\app\views\\'
                .$viewName.
                '.php'
            );
        }
    }
    