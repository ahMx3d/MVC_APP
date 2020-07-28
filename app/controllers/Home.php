<?php

    class Home extends Controller
    {
        function __construct()
        {

        }
        public function index()
        {
            // App Home Page.
            $this->view('home\index');
        }
    }
    