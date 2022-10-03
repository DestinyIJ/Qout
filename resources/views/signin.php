<?php
    session_start();
    session_unset();
    $_SESSION = array();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qout" | Sign-In</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>


<body class="brand-bg-primary">
    <div id="formsection" class=" d-flex justify-content-center align-items-center containter-fluid w-100 mx-auto my-5" style="max-width: 600px;">
        <form class="signin-form my-5 w-75">
            <fieldset class="">
                <legend class="text-white">
                    <div class="h1">Come on in!</div>
                    <div class="h6 text-muted">Friends are waiting...</div>
                </legend>
                <div class="form-floating mb-3 text-dark">
                    <input type="email" class="form-control" id="email" name="email" placeholder="must have value" required>
                    <label for="email" class="form-label">Email:</label>
                </div>
                <div class="form-floating  mb-3 text-dark">
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="must have value" required>
                    <label for="pwd" class="form-label">Password:</label>
                </div>
                <div class="mb-3 text-warning login-error d-none">
                    <span>Email or Password is incorrect!</span>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary text-uppercase">Sign in</button>
                    <span><a href="/signup" class="nav-link text-uppercase text-decoration-underline">Sign Up</a></span>
                </div>
            </fieldset>
        </form>

        <script src="js/signin.js"></script>

        <script>
            const signinForm = document.querySelector(".signin-form");
            const loginError = document.querySelector(".login-error");

            signinForm.onsubmit = (e) => {
                e.preventDefault();
                loginError.classList.add("d-none")
                
                let xhr = new XMLHttpRequest()
                xhr.open("POST", "/login", true)
                const formData = new FormData(signinForm)
                xhr.send(formData)
                xhr.onload = () => {
                    if(xhr.readyState === XMLHttpRequest.LOADING) {
                        console.log("loading")
                    } else if(xhr.readyState === XMLHttpRequest.DONE) {
                        const response = JSON.parse(xhr.response)
                        if(response.message === "ok") {
                            location = "/"
                        } else if(response.message === "error") {
                            loginError.classList.remove("d-none")
                            console.log("error")
                        }
                    }
                } 
            }
        </script>
</body>
</html>