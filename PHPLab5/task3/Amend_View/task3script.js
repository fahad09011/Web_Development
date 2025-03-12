// File Name: script.js
// Description: This file handles the form validation process
// Name: Muhammad Fahad
// Student ID: c00311349
// Date: 26/02/2025

// Access the form
let form = document.getElementById("form");

// Access the phone input field
let phone = document.getElementById("phone");

// Access the date of birth input field
let DateOfBirth = document.getElementById("dob");

// Regex pattern for phone number validation
let phonePattern = /^\+?[0-9\s\-()]{10,20}$/;

// Function to validate phone number
function validatePhone() {
    if (!phonePattern.test(phone.value)) {
        phone.setCustomValidity("Enter a valid phone number (10-20 digits).");
        return false; // Invalid phone number
    } else {
        phone.setCustomValidity(""); // Clear any previous error message
        return true; // Valid phone number
    }
}

// Function to validate date of birth (age must be 16 or older)
function datecheck(enterdate) {
    let today = new Date();
    let minimumDate = new Date(today.getFullYear() - 16, today.getMonth(), today.getDate());
    return enterdate <= minimumDate; // Return true if age is 16 or older
}

// Add input event listener for phone validation
phone.addEventListener("input", function () {
    validatePhone();
});

// Add input event listener for date of birth validation
DateOfBirth.addEventListener("input", function () {
    let enterdate = new Date(DateOfBirth.value);
    if (!datecheck(enterdate)) {
        DateOfBirth.setCustomValidity("Age must be 16 or older.");
    } else {
        DateOfBirth.setCustomValidity(""); // Clear error when valid
    }
});

// Add submit event listener for form validation
form.addEventListener("submit", function (e) {
    // Validate phone number
    if (!validatePhone()) {
        e.preventDefault(); // Prevent form submission if phone is invalid
        phone.reportValidity(); // Show validation message
    }

    // Validate date of birth
    let enterdate = new Date(DateOfBirth.value);
    if (!datecheck(enterdate)) {
        e.preventDefault(); // Prevent form submission if age is invalid
        DateOfBirth.setCustomValidity("Age must be 16 or older.");
        DateOfBirth.reportValidity(); // Show validation message
    }
});