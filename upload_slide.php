<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- PART 1: Your HTML form-->

        <form method="POST" action="" enctype="multipart/form-data">
            File:<input type="file" name="image"> <br> <br>
            <input type="submit" value="submit" name="submit">
            <input type="reset" value="reset">
        </form>
        <?php
        //PART 2: CONNECTING TO YOUR DATABASE
        require_once 'connect.php';//your file with the connection to your database

        $connection->set_charset('utf8');//if you want UTF-8, which I prefer

        if ($connection->connect_errno)
        {
          die ('There was the problem with your connection: '.$connection->connect_error());
        }

        //PART 3: Defining variables
        if (isset($_FILES['image']['name']))// do this, otherwise you'll have a notice message
        {$destination = 'Slider/'; //the folder that stores your image
        $original_filename = basename($_FILES['image']['name']);
        $filename_array = explode('.', $original_filename);
        $file_extension = end($filename_array);

        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $ImageName   = str_replace(' ','-',strtolower($_FILES['image']['name']));
        $ImageType = $_FILES['image']['type']; //"image/png", image/jpeg etc.
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt = str_replace('.','',$ImageExt);

        if(!in_array($ImageExt, $allowedExts))
        {
            die('Invalid file format only <b>"jpg", "jpeg", "gif", "png"</b> allowed.');
        }



        $RandomNum   = rand(0, 999999);
        $size = filesize($_FILES['image']['tmp_name']);
        $tmp_name = 'img_'.$RandomNum.'_'.md5($original_filename).'.'.$file_extension;
        $status = 0;
       //PART 4: Uploading image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination.$tmp_name))
        {
          $query = "INSERT INTO tbl_imgslide (image, status) VALUES ('$tmp_name',
                  '$status')";/*a possible look of your database to store references to image. My suggestion is that all these column
          be varchar - except */
          $result = $connection->query($query);
          echo 'The picture has been successfully uploaded!<br/>';
        }

        else {
            echo 'Something went wrong with your upload';

        }
        }
        // mysqli_close($connection);
        $connection->close();
        ?>
    </body>
</html>
