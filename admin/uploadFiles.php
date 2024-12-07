<?php
//error_reporting(0);
$con = new mysqli('localhost','root','','test');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <?php
   // $con = new mysqli('localhost','root','','vehiclerental_db');
      $sql = "SELECT * from image_table where id=7";
      $result= mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
      $img = $row['image'];
    ?>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadFile"><br><br>
        <input type="submit" name="submit" value="upload file">
    </form>
    <img src="<?php echo "images/".$row['image']; ?>" alt="" width="100px" height="90px">
</body>
</html>
<?php
/*  
 $filename= $_FILES["uploadFile"]["name"];
 $tempname= $_FILES["uploadFile"]["tmp_name"];
 $folder= "images/.$filename";
 echo $folder;

 move_uploaded_file($tempname,$folder);
 //print_r($_FILES["uploadFile"]);
 */
 if(isset($_POST['submit'])){
    $img = $_FILES['uploadFile']['name'];

    $sql = "INSERT into image_table(image)values('$img')";
    $result = mysqli_query($con,$sql);
    if($result){
        move_uploaded_file($_FILES['uploadFile']['tmp_name'], "images/".$_FILES['uploadFile']['name']);
        echo "Image uploaded Successfully";
    }else{
        die(mysqli_error($con));
    }
 }

?>