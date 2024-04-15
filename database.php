<?php
    // session_start();
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="users";
    $conn=" ";
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    // if($conn)
    // {
    //     echo"connected";
    // }
    // else{
    //     echo "not Connected";
    // }
    try{
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
        echo "connected!!!";
        // header("location:index.html");
    }
    catch(mysqli_sql_exception){
        echo "could not connect";
    }
    echo "hello";
    
    // if($_SERVER["REQUEST_METHOD"]=="post")
    if(isset($_POST["sign_up"]))
    {
        echo "here";
        $first_name=filter_input(INPUT_POST,"first_name",FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name=filter_input(INPUT_POST,"last_name",FILTER_SANITIZE_SPECIAL_CHARS);
        $dob=filter_input(INPUT_POST,"dob",FILTER_SANITIZE_NUMBER_INT);
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password=filter_input(INPUT_POST,"confirm_password",FILTER_SANITIZE_SPECIAL_CHARS);
        echo "here";

        // $first_name=$_POST["first_name"];
        // $last_name=$_POST["last_name"];
        // $dob=$_POST["dob"];
        // $username=$_POST["username"];
        // $email=$_POST["email"];
        // $password=$_POST["password"];
        // $confirm_password=$_POST["confirm_password"];

        // echo "$first_name";
        // header("location:index.html");

        $sql="INSERT INTO USER(first_name,last_name,dob,username,email,password,confirm_password)VALUES('$first_name','$last_name','$dob','$username','$email','$password','$confirm_password')";
        try{
            mysqli_query($conn,$sql);
            echo "Yor are now registerd";
            // echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
            sleep(2);
            
            header("location:index.html");
        }
        catch(mysqli_sql_exception)
        {
            echo "username taken!!!";
            header("location:create_account.html");
        }
        
    }
    mysqli_close($conn);
?>