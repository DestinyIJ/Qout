<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

    require_once 'Controller.php';

    class UserController extends Controller
    {
        public function index() 
        {
            $this->view('welcome');
        }

        public function create() 
        {
            $user = new User();

            $user->first_name = $_POST['firstname'];
            $user->last_name = $_POST['lastname'];
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            
            if($user->save()) {
                echo json_encode([
                    'data' => $user
                ]);
                return;
            }

            echo json_encode([
                'error' => 'sign up error'
            ]);
            return;
        }

        public function show() 
        {
            $this->view('homepage');
        }

        public function single() 
        {
            $id_username_email = $_GET['user'];
            $id = null;
            $email = null;
            $username = null;
            
            filter_var($id_username_email, FILTER_VALIDATE_INT) ? 
                $id = $id_username_email : 
                (filter_var($id_username_email, FILTER_VALIDATE_EMAIL) ? 
                    $email = $id_username_email : 
                    $username = $id_username_email);
            
            if($id) {
                $user = User::findOrFail($id);
            }
            if($email) {
                $user = User::where('email', $email)->first();
            }
            if($username) {
                $user = User::where('username', $username)->first();
            }

            if($user) {
                echo json_encode([
                    'data' => $user
                ]);
                return;
            }

            echo json_encode([
                'error' => 'user does not exist'
            ]);

            return;
        }

        public function update() 
        {
            $user = new User();

            $user->first_name = $_POST['firstname'];
            $user->last_name = $_POST['lastname'];
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            
            if($user->save()) {
                echo json_encode([
                    'data' => $user
                ]);
                return;
            }

            echo json_encode([
                'error' => 'update error'
            ]);
            return;
        }

    }
