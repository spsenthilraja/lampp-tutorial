<?php
require('common/db.php');
$saved = false;
if(isset($_POST['save_button'])){
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $about_me = $_POST['about_me'];

  $conn = connectDb();
  $sql = "INSERT INTO students SET first_name = '$firstName', last_name='$lastName', email = '$email', gender = '$gender', about_me='$about_me' ";
  $result = $conn->query($sql);
  if($conn->affected_rows>0){
    $saved = true;
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Students Manager</title>
  </head>
  <body>
    <h1>Students Manager</h1>
    <?php
    if($saved){
      echo "Saved successfully!";
    }
    ?>
    <form action="index.php" method="post">

      <label>First Name</label>
      <input type="text" name="first_name" />
      <br />

      <label>Last Name</label>
      <input type="text" name="last_name" />
      <br />

      <label>Email</label>
      <input type="email" name="email" />
      <br />

      <label>Gender</label>
      <input type="radio" value="male" name="gender" />Male
      <input type="radio" value="female" name="gender" />Female
      <br />

      <label>About Me</label>
      <textarea name="about_me"></textarea>
      <br />

      <input type="submit" value="Save" name="save_button" />
    </form>
  </body>
</html>
