//  File Name: task2script.js
//   Description: this file handles the form validation process
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 12/03/2025 

let form = document.querySelectorAll("id , listform")
form.addEventListener("submit", (f)=>{
    let isConfirmed = window.confirm("Are you sure you want to submit the form?");
    
    // If user clicks "Cancel", prevent form submission
    if (!isConfirmed) {
        f.preventDefault();
        return; // Exit the function
    }
    // setCustomValidity() is a predefined function to show custom error message while subitting form
    
});

// this clear the custom validity after enter correct date of birth (must be before today) validation
