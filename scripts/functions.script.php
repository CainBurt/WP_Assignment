<?php
//This file contains all functions that the other scripts files use.


//checks imputs arent left empty
function emptyInput($name, $userId, $email, $userPassword, $confirmPassword){

    if (empty($name) || empty($userId) || empty($email) || empty($userPassword) || empty($confirmPassword)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};

//checks username has valid characters only. eg a-z, A-Z and 0-9
function invalidUsername($userId){

    if (!preg_match("/^[a-zA-Z0-9]*$/", $userId)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};

//makes sure email is formatted correctly
function invalidEmail($email){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};


//checks if it has atleast 1 capital letter and one number and is greater than 5 chars
function securePassword($userPassword){
    if(preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $userPassword) && strlen($userPassword) >= 8){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
};

//checks the two passwords fields match for register
function passwordMatch($userPassword, $confirmPassword){

    if ($userPassword !== $confirmPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

// makes sure username is unique and checks if username already exists. Uses prepared statements for security
function usernameExists($connection, $userId, $email){

    $result = true;

    $sql = "SELECT * FROM users WHERE usersUid= ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    };

    mysqli_stmt_bind_param($stmt, "ss", $userId, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        //add some stuff here when get to login
        return $row;
    } else {
        $result = false;
        return $result;
    };

    mysqli_stmt_close($stmt);
};

//adds the user into the database with prepared statements for security after all inputs have come back as valid.
function createUser($connection, $name, $userId, $email, $userPassword){

    $sql = "INSERT INTO users (usersName, usersUid, usersEmail, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    };

    //hash the password for extra security
    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $userId, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
};

//checks login inputs arent empty
function emptyInputLogin($userId, $userPassword){

    if (empty($userId) || empty($userPassword)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};

//logs in user if all fields are correct
function loginUser($connection, $userId, $userPassword){
    //checks if username or email already exists
    $usernameExists = usernameExists($connection, $userId, $userId);

    if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
    };

    //check password with hashed password in database
    $passwordHashed = $usernameExists["usersPassword"];
    $checkpassword = password_verify($userPassword, $passwordHashed);

    if ($checkpassword === false) {

        header("location: ../login.php?error=wronglogin");
    } else if ($checkpassword == true) {

        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["username"] = $usernameExists["usersUid"];
        header("location: ../index.php");
        exit();
    };
};

//makes sure no inputs are empty when creating a post
function emptyInputPost($title, $body, $topic){

    if (empty($title) || empty($body) || empty($topic)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};


//posts a new blog post to the database 
function post($connection, $postsUserId, $title, $body, $topic){

    $sql = "INSERT INTO posts(usersId, postsTitle, postsBody, postsTopic) VALUES ('$postsUserId', '$title', '$body', '$topic');";

    if (mysqli_query($connection, $sql)) {
        header("location: ../index.php?error=none&message=createsuccess");
        exit();
    } else {
        header("location: ../createpost.php?error=postnotadded");
        exit();
    };
};

//updates an existing blog in the database
function updatePost($connection, $id, $updateTitle, $updateBody, $updateTopic){

    $sql = "UPDATE posts SET postsTitle='$updateTitle', postsBody='$updateBody', postsTopic='$updateTopic' WHERE postsId = '$id';";

    if (mysqli_query($connection, $sql)) {
        header("location: ../index.php?error=none&message=editsuccess");
        exit();
    } else {
        header("location: ../manageposts.php?error=postnotupdated");
        exit();
    };
};

//makes sure no field is empty when updating/editing a post.
function emptyUpdatePost($id, $updateTitle, $updateBody, $updateTopic){

    if (empty($id) || empty($updateTitle) || empty($updateBody) || empty($updateTopic)) {
        $result = true;
    } else {
        $result = false;
    };

    return $result;
};

//delete post function
function deletePost($connection, $deleteId)
{

    $sql = "DELETE FROM posts WHERE postsId = '$deleteId';";

    if (mysqli_query($connection, $sql)) {
        header("location: ../manageposts.php?error=none&message=deletesuccess");
        exit();
    } else {
        header("location: ../manageposts.php?error=postnotdeleted");
        exit();
    };
};

//santise data
function sanitiseInputs($msg){
    $msg = strip_tags($msg);
    $msg = trim($msg);
    $msg = stripslashes($msg);
    $msg = htmlspecialchars($msg);
    return $msg;
};

//authentication script if the user id matches the user who created the post return true
function authenticate($connection, $postId, $userId){

    $sql = "SELECT usersId FROM posts WHERE postsId = '$postId';";

    $result = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $uId = $row["usersId"];
    };

    if($userId == $uId){
        $authentication = true;
    }else{
        $authentication = false;
    };

    return $authentication;

}