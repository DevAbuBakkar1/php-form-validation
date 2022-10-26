# php-form-validation
# Registration Page : 
1. Create a database named : php_practice
2. Create table named : crued
3. Create table row and col named : id , first_name , last_name , email , password
4. design a table using bootstrap and set action & method
5. store data via $_post before insert  
6. Convert password via md5()
7. check empty
8. show value
9. not empty check and pass === confirm pass check 
10. insert data 
11. redirect to login page and show a message 


# Login page Steps : 
12. check login page empty and save value 
13. store data and check empty
14. connect with database
15.check data with database data 
16.send him to the dashboard 

# TO Validate Form Data 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

# Validate Name : 
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameError = "শুধুমাত্র অক্ষর(letters) এবং white space ইনপুট দিতে পারেন।";
}
# Validate Email: 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailError = "ইমেইল ফরম্যাট ভ্যালিড নয়";
}
