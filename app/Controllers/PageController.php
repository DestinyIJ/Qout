<?php
    require_once 'Controller.php';

    class PageController extends Controller
    {
        public function index() 
        {
            session_start();
            if(!(isset($_SESSION["user"]))) {
                header("Location: signin");
                die();
            } 
            session_abort();
            $this->view('homepage');
        }

        public function error() 
        {
            //
            $this->view('404');
        }

        public function about() 
        {
            //
            $this->view('about');
        }

        public function signup() 
        {
            //
            $this->view('signup');
        }

        public function signin() 
        {
            //
            $this->view('signin');
        }

        public function profile() 
        {
            session_start();
            if(!(isset($_SESSION["user"]))) {
                header("Location: signin");
                die();
            } 
            session_abort();

            $username = $_GET["username"];
            $user = User::where("username", $username)->first();
            if($user) 
            {
                $this->view('profile', $data = $user);
                return;
            }
            $this->view('404');
        }

        public function profile_edit() 
        {
            session_start();
            if(!(isset($_SESSION["user"]))) {
                header("Location: signin");
                die();
            } 
            
            $id = $_SESSION["user"]->id;
            session_abort();
            $user = User::findOrFail($id);
            if($user) 
            {
                $this->view('profile_edit', $data = $user);
                return;
            }
            $this->view('404');
        }

        public function friends() 
        {
            //
            $this->view('friends');
        }

        public function quots() 
        {
            //
            $this->view('quots');
        }
    }
