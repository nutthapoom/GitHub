<?php
  include_once('conect.php');
  if(isset($_POST))
  {
      $Destination = 'slide';
      if(!isset($_FILES['my_image']) || !is_uploaded_file($_FILES['my_image']['tmp_name']))
      {
          die('Something went wrong with Upload!');
      }
      $allowedExts = array("jpg", "jpeg", "gif", "png");

      $RandomNum   = rand(0, 9999999999);

      $ImageName      = str_replace(' ','-',strtolower($_FILES['my_image']['name']));
      $ImageType      = $_FILES['my_image']['type']; //"image/png", image/jpeg etc.

      $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt = str_replace('.','',$ImageExt);
      if(!in_array($ImageExt, $allowedExts))
      {
          die('Invalid file format only <b>"jpg", "jpeg", "gif", "png"</b> allowed.');
      }
      $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
      //Create new image name (with random number added).
      $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
      if(move_uploaded_file($_FILES['my_image']['tmp_name'], "$Destination/$NewImageName"))
      {
//           $sql = "INSERT INTO tbl_slide (image)
// VALUES ('".$_FILES["my_image"]["name"]."'))";

      		echo "Copy/Upload Complete<br>";

      		$strSQL = "INSERT INTO tbl_slide ";
      		$strSQL .="(image)";
      		$strSQL .="VALUES ";
      		$strSQL .="('".$_FILES["my_image"]["$NewImageName"]."')";
      		$objQuery = mysqli_query($strSQL);

      }
    }
?>
