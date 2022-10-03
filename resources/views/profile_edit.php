<?php 
    include_once("components/header.php") ?>
<?php $user_profile = $data ?>


<body class="brand-bg-primary">
    <?php include_once("components/navbar.php") ?>

    <div id="formsection" class="d-flex justify-content-center align-items-center containter-lg w-50 p-lg-5 p-md-3 p-sm-2 mx-auto my-3">
        <form class="update-form col-sm-12 col-md-12 col-lg-12 mx-auto my-5">
            <fieldset>
                <legend class="text-white">
                    <div class="h3">Edit Profile...</div>
                </legend>
                <div class="form-floating mb-3 text-dark">
                    <input type="text" class="form-control is-valid" id="username" name="username" placeholder="must have value" value="<?php echo $user_profile->username ?>" required>
                    <label for="username" class="form-label">Username:</label>
                    <div class="invalid-feedback text-warning">This username is already in use!</div>
                </div>

                <div class="form-floating mb-3 text-dark">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Where are you from">
                    <label for="phone" class="form-label">Phone Number:</label>
                </div>

                <div class="mb-3  md-f md-form md-outline form-floating input-with-post-icon datepicker">
                    <input placeholder="Select date" type="date" id="birthdate" name="birthday" class="form-control">
                    <label for="birthdate">Birthday:</label>
                </div>

                <div class="form-floating mb-3 text-dark" style="height: 100px;">
                    <textarea name="bio" id="bio" class="form-control h-100"></textarea>
                    <label for="bio" class="form-label">Bio:</label>
                </div>

                <div class="form-floating mb-3 text-dark">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Where are you from">
                    <label for="location" class="form-label">Location:</label>
                </div>

                <div class="form-group mb-3 text-white">
                    <label for="profile_photo" class="form-label">Profile Photo:</label>
                    <input type="file" class="form-control-file" id="profile_photo" accept="image/*">
                </div>

                <div class="form-group mb-3 text-white">
                    <label for="cover_photo" class="form-label">Cover Photo:</label>
                    <input type="file" class="form-control-file" id="cover_photo" name="cover_photo" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="disabled submit btn btn-outline-success text-capitalize" data-mdb-ripple-color="white"
                        style="z-index: 1;">Save profile
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <script>
        const updateForm = document.querySelector(".update-form")
        const submitForm = document.querySelector(".update-form .submit");
        const inputs = document.querySelectorAll("input");
        const currentUsername = document.querySelector("#username").value

        const formValid = {
            'username' : false
        }

        isFormValid = () => {
            formValid.username = document.querySelector(".update-form #username").classList.contains("is-valid") ? true : false;
            const valid = formValid.username
            
            if(valid) {
                if(submitForm.classList.contains("disabled")) {
                    submitForm.classList.remove("disabled")
                }
            } else {
                if(!submitForm.classList.contains("disabled")) {
                    submitForm.classList.add("disabled")
                }
            }
        }

        inputs.forEach(input => {
            input.onfocus = (e) => {
                const target = e.target
                removeValidationClass(target)
                isFormValid()
            }
            input.onchange = (e) => {
                isFormValid()
            }
            input.onblur = (e) => {
                isFormValid()
                const target = e.target
                const targetValue = e.target.value
                
                if(target.name === "username" & targetValue != currentUsername) {
                    userExists(targetValue, target)
                    isFormValid()
                } 
                
            }    
        });

        removeValidationClass = (element) => {
            if(element.classList.contains("is-valid")) {
                element.classList.remove("is-valid")
            }
            if(element.classList.contains("is-invalid")) {
                element.classList.remove("is-invalid")
            }
        }

        userExists = (userParam, input) => {
            if(userParam === "") return
            let xhr = new XMLHttpRequest()
            xhr.open("GET", "/user/check?user="+userParam, true)
            xhr.send()
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE) {
                    let response = JSON.parse(xhr.response)
                    if(response.data) {
                        if(input.classList.contains("is-valid")) {
                            input.classList.remove("is-valid")
                            input.classList.add("is-invalid")
                        } else {
                            input.classList.add("is-invalid")
                        }
                    } else if(response.error) {
                        if(input.classList.contains("is-invalid")) {
                            input.classList.remove("is-invalid")
                            input.classList.add("is-valid")
                        } else {
                            input.classList.add("is-valid")
                        }
                    }
                }
            }
        }

        updateForm.onsubmit = (e) => {
            e.preventDefault();
            console.log('former username ', currentUsername) 
            
            // let xhr = new XMLHttpRequest()
            // xhr.open("POST", "/user/update", true)
            // const formData = new FormData(signUpForm)
            // xhr.send(formData)
            // xhr.onload = () => {
            //     if(xhr.readyState === XMLHttpRequest.LOADING) {
            //         console.log("loading")
            //     } else if(xhr.readyState === XMLHttpRequest.DONE) {
            //         let response = JSON.parse(xhr.response)
            //         if(response.data) {
            //             location = "/signin" 
            //         } else if(response.error) {
            //             alert("error")
            //         }
            //     }
            // } 
        }
    </script>
    </body>
</html>