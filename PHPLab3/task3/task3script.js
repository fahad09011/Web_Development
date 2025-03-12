//  File Name: task3script.js
//   Description: this file handles the form validation process
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 26/02/2025 

// here we access the form
let form = document.getElementById("form")
// DateOfBirth the varibles that stores the input(date of birth) 
let date_of_birth = document.getElementById("dob");

// datecheck is a function that checks/validate  the age of person as 16 or older than 16
let ageCheck= (enterdate)=>{
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


// ===== Name vaildation 
// here we access student name
let studentName = document.getElementById("name");

let nameValidation = (name)=>{
    
// pattern for name
let pattern = /^[A-Za-z ]+$/;
// test(): predefined function that checks if a string matches the regex pattern
 if(pattern.test(name)){
    return true;
}
else {
    return false;
}
};

// here we access student address
let studentAddress = document.getElementById("address");

let addressValidation = (address)=>{
    
// pattern for naddress
let pattern = /^[A-Za-z ]+$/;
// test(): predefined function that checks if a string matches the regex pattern
 if(pattern.test(address)){
    return true;
}
else {
    return false;
}
};

form.addEventListener("submit", (f)=>{
    // setCustomValidity() is a predefined function to show custom error message while subitting form
    date_of_birth.setCustomValidity("");
    let enter_date = new Date(date_of_birth.value)
    if (!ageCheck(enter_date)) {
        // preventDefault() :predefined function that prevents the form from submission if the age is not correct
        
        f.preventDefault();
        
        date_of_birth.setCustomValidity("Student must be 16+");
        // reportValidity() show the error/validation message immidiately when needed
        date_of_birth.reportValidity();
    }
    
    studentName.setCustomValidity("");
    let namevalue = studentName.value.trim();
    if (!nameValidation(namevalue)) {
    f.preventDefault();
    studentName.setCustomValidity("Name must contain only letters and spaces");
    studentName.reportValidity();
    }




    // validation for address
    studentAddress.setCustomValidity("");
    let addressvalue = studentAddress.value.trim();
    if (!addressValidation(addressvalue)) {
    f.preventDefault();
    studentAddress.setCustomValidity("Address must contain only letters and spaces");
    studentAddress.reportValidity();
    }
});

// this clear the custom validity after enter correct date of birth (must be before today) validation

date_of_birth.addEventListener("input", () => {
    let enterdate = new Date(date_of_birth.value);
    if (ageCheck(enterdate)) {
        date_of_birth.setCustomValidity(""); // Clear error when valid
    }
});

studentName.addEventListener("input", () => {
    let namevalue = studentName.value.trim();
    if (nameValidation(namevalue)) {
        studentName.setCustomValidity(""); // Clear error when valid
    }
});


studentAddress.addEventListener("input", () => {
    let addressvalue= studentAddress.value.trim();
    if (addressValidation(addressvalue)) {
        studentAddress.setCustomValidity(""); // Clear error when valid
    }
});
