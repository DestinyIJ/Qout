<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qout" | Sign-Up</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body class="brand-bg-primary">
    <div id="formsection" class="d-flex justify-content-center align-items-center containter-lg w-75 p-lg-5 p-md-3 p-sm-2 mx-auto my-5">
        <form class="signup-form col-sm-12 col-md-12 col-lg-12 mx-auto my-5">
            <fieldset>
                <legend class="text-white">
                    <div class="h1">Come Join Us!</div>
                    <div class="h6 text-muted">Friends are waiting...</div>
                </legend>
                <div class="input-group my-3">
                    <span class="input-group-text" style="width: 70px !important;">Name:</span>
                    <div class="form-floating text-dark" style="width: calc(50% - 35px) !important;">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                        <label for="firstname" class="form-label">First Name:</label>
                        <div class="invalid-feedback text-warning">Please fill out this field.</div>
                    </div>
                    <div class="form-floating text-dark" style="width: calc(50% - 35px) !important;">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                        <label for="lastname" class="form-label">Last Name:</label>
                        <div class="invalid-feedback text-warning">Please fill out this field.</div>
                    </div>
                </div>

                <div class="form-floating mb-3 text-dark">
                    <input type="text" class="form-control" id="username" name="username" placeholder="must have value" required>
                    <label for="username" class="form-label">Username:</label>
                    <div class="valid-feedback">You are good to go!</div>
                    <div class="invalid-feedback text-warning">This username is already in use!</div>
                </div>

                <div class="form-floating mb-3 text-dark">
                    <input type="email" class="form-control email" id="email" name="email" placeholder="must have value" required>
                    <label for="email" class="form-label">Email:</label>
                    <div class="valid-feedback">You are good to go!</div>
                    <div class="invalid-feedback text-warning">This email is already in use!</div>
                </div>

                <div class="form-floating  mb-3 text-dark">
                    <input 
                        type="password" 
                        class="form-control" 
                        id="pwd" name="password" 
                        placeholder="must have value" 
                        pattern="(\w|\d).{5,}"
                        title="Password must be at least six characters in length"
                        required>
                    <label for="pwd" class="form-label">Password:</label>
                    <div class="valid-feedback">You are good to go!</div>
                    <div class="invalid-feedback text-warning">Password must be at least six(6) characters in length</div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="disabled submit btn btn-primary text-uppercase">Sign up</button>
                    <span><a href="/signin" class="nav-link text-uppercase text-decoration-underline">Sign In</a></span>
                </div>
                
            </fieldset>
        </form>
    </div>

    <script src="js/signup.js"></script>
</body>
</html>