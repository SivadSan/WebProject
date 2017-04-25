

<!DOCTYPE html>
<?php
$host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "imagetest";

 $conn = new mysqli($host,$username,$password,$database);
 $sql="SELECT * FROM images";
 
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        echo "<div id='img_div'>";
        echo "<img src='image/".$row['image']."'>";
        echo "<p>" .$row['text']."</p>";
        echo "</div>" ;
 }
 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <body>
 <form  method="POST" action="file.php" enctype="multipart/form-data">
        <!-- Form Name -->
        <legend>Profile Information</legend>
        <input type="hidden" name="size" value="1000000"/>
        <input type="file" name="image"/>
        <textarea name="text" cols="40" rows="4" placeholder="Say something?..."></textarea>
        <input type="submit" name="submit" value="submit"/>
        </form>
        </body>
</html>

<?php   
session_start();
 $host = "localhost";
    $username = "uwialumni";
    $password = "uwialumni";
    $database = "imagetest";

 $conn = new mysqli($host,$username,$password,$database);
$msg="";
 if(isset($_POST['submit'])){ 
     $target="image/" .basename($_FILES['image']['name']);
     $image=$_FILES['image']['name'];
     $text=$_POST['text'];

  //   $image=move_uploaded_file($imagetmp,"image/$image_name");
     $sql = "INSERT INTO images(image,text) VALUES ('$image','$text')";
     $conn->query($sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
echo $msg= "Image sucessfully uploaded";
    }
    else{
   echo      $msg="There was a problem uploading image";
    }
     
 }
?>

