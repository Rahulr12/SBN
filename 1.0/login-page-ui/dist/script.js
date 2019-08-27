
// Password and username validation
function validate() {
  var password = document.getElementById("password");
  var name = document.getElementById("name");
        if (name.value < 5) {
          alert("You must type in at least 5 characters");
        }
  
        if (password.value < 5) {
          alert("You must type in at least 5 characters.");
        }
}