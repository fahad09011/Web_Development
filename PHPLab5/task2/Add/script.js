//  File Name: script.js
//   Description: this file handles the form validation process
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 26/02/2025 
 // Ensure the script runs after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("form");
    let DateOfBirth = document.getElementById("dob");
    let phone = document.getElementById("phone");

    if (!form || !DateOfBirth || !phone) {
        console.error("Form, DateOfBirth, or Phone field not found!");
        return;
    }

    // Date validation function (age must be 16 or older)
    let datecheck = (enterdate) => {
        let today = new Date();
        let minimumDate = new Date(today.getFullYear() - 16, today.getMonth(), today.getDate());
        return enterdate <= minimumDate;
    };

    // Date validation on input
    DateOfBirth.addEventListener("input", () => {
        let enterdate = new Date(DateOfBirth.value);
        if (datecheck(enterdate)) {
            DateOfBirth.setCustomValidity(""); // Clear error
        } else {
            DateOfBirth.setCustomValidity("Age must be 16 or older");
            DateOfBirth.reportValidity(); // Show message instantly
        }
    });

    // Phone validation on input
    let pattern = /^\+?[0-9\s\-()]{10,20}$/;

    phone.addEventListener("input", function () {
        if (pattern.test(phone.value)) {
            phone.setCustomValidity(""); // Clear error
        } else {
            phone.setCustomValidity("Enter a valid phone number (10-20 digits).");
            phone.reportValidity(); // Show message instantly
        }
    });

    // Form submission validation
    form.addEventListener("submit", (e) => {
        let enterdate = new Date(DateOfBirth.value);
        
        if (!datecheck(enterdate)) {
            e.preventDefault();
            DateOfBirth.setCustomValidity("Age must be 16 or older");
            DateOfBirth.reportValidity();
        }

        if (!pattern.test(phone.value)) {
            e.preventDefault();
            phone.setCustomValidity("Enter a valid phone number (10-20 digits).");
            phone.reportValidity();
        }
    });
});
