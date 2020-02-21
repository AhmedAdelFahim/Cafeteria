<?php
    require_once ("utils/DBConnection.php");

    if (empty($_POST["product_name"])) {
        echo  "Product Name is required"."\n";
         echo "<br>";  
     }

     
     if (empty($_POST["price"])) {
         echo "price You must enter "."\n";
         echo "<br>";
         // fwrite($filesave,$errors);

     }
      
     if (empty($_POST["category"])) {
         echo "please enter category "."\n";
         echo "<br>";
         // fwrite($filesave,$errors);
     }

         if(isset($_FILES['Product_Picture'])){
         $errors= array();  
         // var_dump($_FILES);
         
         $file_name = $_FILES['Product_Picture']['name'];
         $file_size =$_FILES['Product_Picture']['size'];
         $file_tmp =$_FILES['Product_Picture']['tmp_name'];
         $file_type=$_FILES['Product_Picture']['type'];
         $ext=explode('.',$_FILES['Product_Picture']['name']);
         $file_ext=strtolower(end($ext));

         $extensions= array("jpeg","jpg","png");
         
         if(in_array($file_ext,$extensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file. \n";
             echo "ext";
         }
         if($file_size > 1097152){
             $errors[]='File size must be excately 1 MB \n';
             echo "size";
         }
         if(empty($errors)==true){
         // var_dump($_POST);
         try{
         $db=new PDO ($dsn,$user,$password);
         
    
         $productname="";
         $productname.=$_POST["name"];
        
         $price="";
         $price.=$_POST["price"];
         
         
         $categoryid="";
         $categoryid.=$_POST["category"];
         
         if(empty($errors)==true){
             $path="/var/www/html/".$file_name;
             // move_uploaded_file($file_tmp,"/var/www/html/".$file_name)
             // fwrite($filesave, "File Upload Success");

         }
         $query="INSERT INTO products (`name`, price, `picture`,category_id) VALUES (?,?,?,?)";     
         $stmt=$db->prepare($query);
         $stmt->execute([$productname,$price,$path,$categoryid]);
         $result=$stmt->fetchAll();
         // var_dump($result);
         // echo $result."<br>";
         $result->free_result();  
    }
    catch(PDOException $e){
     echo "Connection failed:".$e->getMessage();
 }
}    
}
?>