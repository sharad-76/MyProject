<?php
    session_start();
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="users";
    $conn=" ";
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    try{
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
        echo "connected!!!";
        // header("location:index.html");
    }
    catch(mysqli_sql_exception){
        echo "could not connect";
    }
    

    if(isset($_POST["login"])){

        echo "hello";
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
       

        
        echo "hi $username";

        $sql="select * from user where username='$username'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);
            if($row["username"]==$username && $row["password"]==$password)
            {
                echo "successfully loged in";
                header("location:index.html");
            }
            else{
                header("location:login.html");
            }
        }
        else{
            echo "Not found";
        }

    }
   
    mysqli_query($conn,$sql);
    mysqli_close($conn);
?>