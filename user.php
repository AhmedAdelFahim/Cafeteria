<?php
require_once("utils/DBConnection.php") ;
$name  = $email = $passwordTxt = $cPassword = $roomNo = $EXT = $profileImg = "" ;
$errName  = $errEmail = $errPasswordTxt = $errCPassword = $errRoom = $errEXT= $errProfileImg = "" ;
if( $_SERVER["REQUEST_METHOD"] == "POST")
{ 
    if(isset($_POST["name"]))
    {
        $name = $_POST["name"] ;
    }
    if(isset($_POST["email"]))
    {
        $email = $_POST["email"] ;
    }
    if(isset($_POST["pass"]))
    {
        $passwordTxt = $_POST["pass"] ;
    }
    if(isset($_POST["cpass"]))
    {
        $cPassword = $_POST["cpass"] ;
    }
    if(isset($_POST["roomNo"]))
    {
        $roomNo = $_POST["roomNo"] ;
    }
    if(isset($_POST["ext"]))
    {
        $EXT = $_POST["ext"] ;
    }
    if(isset($_FILES["profil"]))
    {
        $profileImg = $_FILES['profil'] ;
        if(isset($_FILES['profil']))
            {
                $errors = array() ;
                $file_name = $_FILES['profil']['name'] ;
                $file_size = $_FILES['profil']['size'] ;
                $file_tmp = $_FILES['profil']['tmp_name'] ;
                $file_type = $_FILES['profil']['type'] ;
                $ext = explode ('.',$_FILES['profil']['name']) ;
                $file_ext = strtolower(end($ext)) ;
                $extensions = array("jpeg" , "jpg" , "png" ) ;
                if(in_array($file_ext , $extensions) === false)
                {
                    $errors[] = "extension not allowed , plsease enter only image" ;
                    echo $errors ;
                }
                if($file_size > 20658795210456)
                {
                    $errors[] = "file size must be excately 2 MB" ;
                }
                if(empty($errors === true))
                {
                    move_uploaded_file($file_tmp , "files/".$file_name) ;
                    echo "success"."<br>" ;
                }
                else
                {
                    print_r($errors) ;
                }
            }   
    }
}
if($errName=="" && $errEmail=="" && $errPasswordTxt=="" && $errCPassword=="" && $errRoom=="" && $errProfileImg == "")
{
    $db = \database_connection\DBConnection::getInstance() ;
    $insertQuery = "insert into users(name , email , password , roomNo , ext , picture , privilege , `created_at` , `updated_at`) values (? , ? , ? , ? , ? , ? , ? , ? , ?)" ;
    $stmt = $db->prepare($insertQuery) ;
    $stmt->execute([$name , $email , $passwordTxt , $roomNo , $EXT , "upload/".$_FILES['profil']['name'] , 1 , NULL , NULL]) ;
 
}