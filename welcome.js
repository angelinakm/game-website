function check_length_short(name) {
  if(name.length < 4){
     return true;
   }else{
   return false;
   }
 }
 function check_length_long(name){
   if (name.length > 40) {
     return true;
 }else{
 return false;
 }
 }
 
 let semicolon = new RegExp(";");
 let spaces = new RegExp(" ");
 let commas = new RegExp(",");
 
 function check_semicolon(name) {
   if (semicolon.test(name)) {
     return true;
   } else {
     return false;
   }
 }
 
 function check_spaces(name) {
   if (spaces.test(name)) {
     return true;
   } else {
     return false;
   }
 }
 
 let characters = /^[a-zA-Z0-9&~?/|@%^:!#._-]+$/;
 let expiration = new Date();
 expiration.setHours(expiration.getHours() + 1);
 
 const textbox = document.getElementById("username");
 
 function check_commas(name) {
   if (commas.test(name)) {
     return true;
   } else {
     return false;
   }
 }
 let warning_str = "";
 
 
 const submit_button = document.getElementById("button");
 submit_button.addEventListener("click", function () {
   if (check_length_short(textbox.value)) {
     warning_str += "Length must be 5 characters or longer.  ";
   }
   if (check_length_long(textbox.value)) {
     warning_str += "Length must be 40 characters or shorter.  ";
   }
   if (check_semicolon(textbox.value)) {
     warning_str += "Username cannot contain semicolons.  ";
   }
   if (check_commas(textbox.value)) {
     warning_str += "Username cannot contain commas. ";
   }
   if (check_spaces(textbox.value)) {
     warning_str += "Username cannot contain spaces.  ";
   }
   if (!textbox.value.match(characters)) {
     warning_str +=
       "Username can contain only characters from the following string:abcdfghijklmnopqrstuvwxyzABCDFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()-_=+[]{}:'|`~<.>/?  ";
   }
   if (warning_str != "") {
     alert(warning_str);
     warning_str = "";
   } else {
     document.cookie = `username=${textbox.value}; expires=${expiration.toUTCString}`;
     window.location = "shut_the_box.php";
   }
 });
 
   const request = new XMLHttpRequest();
 
   request.onload = function() {
     if (this.status === 200) {
       textbox.value = get_username(document.cookie, "username");
     }
   };
 
   request.open('POST', 'welcome.php');
   request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   request.send();