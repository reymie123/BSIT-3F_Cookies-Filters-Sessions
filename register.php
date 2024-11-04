<?php 
include 'connect.php';

// start of the session
session_start();

// function to filter data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//in this command it will help us retrieve all info/data we put in the signUp form
if(isset($_POST['signUp'])){
    $firstName = sanitize_input($_POST['fName']);
    $lastName = sanitize_input($_POST['lName']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $password = md5($password);

    // this command will check if the email already exists in the database
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
     
    // this command will show an error message if the email exists
    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
        if($conn->query($insertQuery) === TRUE){
            // cookie and session for successful sign-up
            setcookie("user", $email, time() + (86400 * 30), "/"); // The cookie is valid for only 1 month
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $password = md5($password);
    
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];

        // cookie for successful log in
        setcookie("user", $email, time() + (86400 * 30), "/"); // The cookie is valid for only 1 month

        header("Location: homepage.php");
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
?>
