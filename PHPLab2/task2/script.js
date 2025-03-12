// let height = document.getElementById("height").value; // here i access the height by using its id and the ".value is used t access its value"
// let weight  =document.getElementById("weight").value;
//  let submitButton = document.getElementById("submit");
//  let form = document.getElementById("form")

// // here is function to validate the form
// form.addEventListener(onsubmit,()=>{
//     if (height> 0 || weight > 0) {
//         return true;
//     }
//     else{
//         alert("please enter valid hieght and weight!");
//     }
    
// });
function validateForm() {
    let height = document.getElementById("height").value;
    let weight = document.getElementById("weight").value;
    
    if (height === "" || weight === "" || height <= 0 || weight <= 0) {
        alert("Please enter valid height and weight values.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
