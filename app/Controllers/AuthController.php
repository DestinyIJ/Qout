<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

    require_once 'Controller.php';

    class AuthController extends Controller
    {
        public function login() 
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::where("email", $email)->first();
            if($user) {
                if($user->password === $password) {
                    session_start();
                    $_SESSION['user'] = $user;
                    echo json_encode([
                        'message' => 'ok'
                    ]);
                    return;
                }
                echo json_encode([
                    'message' => 'error'
                ]);
                return;
            }

            echo json_encode([
                'message' => 'error'
            ]);
            return;

            
            
        }

        public function logout() 
        {
            session_unset();
            $_SESSION = array();
        }
    }
