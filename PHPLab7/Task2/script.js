 //  File Name: task1 lab7
//   Name: Muhmmad Fahad
//   Student ID : c00311349
//   Date: 20/03/2025  -->


document.addEventListener("DOMContentLoaded", () => {
  // accessing form by using document.get and store in form variable
  let form = document.getElementById("changeform");

  // accessing the new password feild by using document.get and store in password variable
  let password = document.getElementById("new_password");
  // accessing the confirm password feild by using document.get and store in confirm_password variable
  let confirm_password = document.getElementById("confirm_new_password");

  confirm_password.addEventListener("input", () => {
    if (password.value == confirm_password.value) {
      confirm_password.setCustomValidity("");
    } else {
      confirm_password.setCustomValidity("PassWord Should be Match!");
      confirm_password.reportValidity();
    }
  });



  form.addEventListener("submit",(e)=>{
    if (password.value !== confirm_password.value) {
        e.preventDefault();
        confirm_password.setCustomValidity("Email should be match!");
        confirm_password.reportValidity();
      }
  });
});
