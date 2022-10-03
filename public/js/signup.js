const signupForm = document.querySelector(".signup-form");
const submitForm = document.querySelector(".signup-form .submit");

const inputs = document.querySelectorAll("input");
const email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?w+)*(\.\w{2,3})+$/;

const formValid = {
    'firstname' : false,
    'lastname' : false,
    'username' : false,
    'email' : false,
    'password' : false

}

isFormValid = () => {
    formValid.firstname = document.querySelector(".signup-form #firstname").value !== "" ? true : false
    formValid.lastname = document.querySelector(".signup-form #lastname").value !== "" ? true : false
    formValid.username = document.querySelector(".signup-form #username").classList.contains("is-valid") ? true : false
    formValid.email = document.querySelector(".signup-form #email").classList.contains("is-valid") ? true : false
    formValid.password = document.querySelector(".signup-form #pwd").value.match(/(\w|\d).{5,}/) ? true : false

    const set = new Set(Object.values(formValid))
    const valid = set.size === 1 && set.has(true)
    
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
        const target = e.target
        const targetValue = e.target.value
        
        if(target.name === "username") {
            userExists(targetValue, target)
        } else if(target.name === "email" && targetValue.match(email_format)) {
            userExists(targetValue, target)
        } else if(target.name === "password") {
            if(targetValue.match(/(\w|\d).{5,}/)) {
                target.classList.contains("is-invalid") ? 
                    target.classList.remove("is-invalid") :
                    target.classList.add("is-valid")

                target.classList.add("is-valid")
            } else {
                target.classList.contains("is-valid") ? 
                    target.classList.remove("is-valid") :
                    target.classList.add("is-invalid")
                    
                target.classList.add("is-invalid")
            }
        } 
        isFormValid()
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

signupForm.onsubmit = (e) => {
    e.preventDefault();
    
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "/user/create", true)
    const formData = new FormData(signupForm)
    xhr.send(formData)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.LOADING) {
            console.log("loading")
        } else if(xhr.readyState === XMLHttpRequest.DONE) {
            let response = JSON.parse(xhr.response)
            if(response.data) {
                location = "/signin" 
            } else if(response.error) {
                alert("error")
            }
        }
    } 
}