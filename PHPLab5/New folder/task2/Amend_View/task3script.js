//  File Name: script.js
//   Description: this file handles the form validation process
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 26/02/2025 
 
// here we access the form
let form = document.getElementById("form")

// DateOfBirth the varibles that stores the input(date of birth) 
let DateOfBirth = document.getElementById("dob")

// datecheck is a function that checks/validate  the age of person as 16 or older than 16
let datecheck= (enterdate)=>{
    // Date () is predefined function for current date
    let today = new Date();

    // here we calculate the minimum age (16) for age vaildation
    let minimuDate = new Date(today.getFullYear()-16,today.getMonth(),today.getDate())
    // check the age while comparing it with minigage which calculate above
    // if its true then return otherwise fale
    if (enterdate <= minimuDate) {
        return true ;
    } else {
        return false ;
    }
}




// fucntion for form submission
form.addEventListener("submit",(e)=>{






    let phone = document.getElementById("phone"); // Ensure there's an input with id="phone"
    let pattern = /^\+?[0-9\s\-()]{10,20}$/;

    if (!phone) {
        console.error("Phone input field not found!");
        return;
    }

    phone.addEventListener("input", function () {
        if (pattern.test(phone.value)) {
            console.log("Valid phone number");
            phone.setCustomValidity(""); // Clear any previous error message
        } else {
            console.log("Invalid phone number");
            phone.setCustomValidity("Enter a valid phone number (10-20 digits).");
        }
    });

















// setCustomValidity() is a predefined function to show custom error message while subitting form
    DateOfBirth.setCustomValidity("");

let enterdate = new Date(DateOfBirth.value)
        if (!datecheck(enterdate)) {
            // preventDefault() :predefined function that prevents the form from submission if the age is not correct
        e.preventDefault();
        DateOfBirth.setCustomValidity("Age must be 16 or older")
        // reportValidity() show the error/validation message immidiately when needed
        DateOfBirth.reportValidity();
    } 
    
});


// this clear the custom validity after enter correct date of birth (age msut be 16 or older )
DateOfBirth.addEventListener("input", () => {
    let enterdate = new Date(DateOfBirth.value);
    if (datecheck(enterdate)) {
        DateOfBirth.setCustomValidity(""); // Clear error when valid
    }
});
