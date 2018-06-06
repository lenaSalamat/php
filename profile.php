<?php include('server.php'); ?>
<DOCTYPE html>
	<html>
	<head>
	   <title>sign up</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	<div class="header">
    		<h2>profile page</h2>
    	</div>
        <form id ="imgform" action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="img">
    <input type="submit" name="submit" />
     <br></br>
     <div id ="img">
    <?php if (isset($_SESSION['username'])): ?>
             <p> Welcome<strong id="user">:<?php echo $_SESSION['username']; ?></strong></p>
              <p><a href="profile.php?logout='1'" style="color:blue;">Logout</a></p>
          <?php endif?>
        </form>
        <div id="imgform" >
        <?php 
        $dbb = mysqli_connect('localhost', 'root', '', 'hop');
        if(isset($_POST['submit'])){
            $filename= addslashes($_FILES["img"]["name"]);
            $tmpname = addslashes($_FILES["img"]["tmp_name"]);
            $filetype = addslashes($_FILES["img"]["type"]);
            $array = array('jpg','jpeg');
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
         if(!empty($filename)){
            if(in_array($ext, $array)){
            $sqll="INSERT INTO images(name,image) VALUES('$filename','$tmpname')";
            mysqli_query($dbb, $sqll);
            }else{
                echo "unsupported format";
            }
         } else{
            echo "please select the image";
         }  
         }
        //display the img
//          $res ="SELECT * FROM images ORDER BY id DESC";
//          $result = mysqli_query($dbb, $res);
//          while ($row =mysqli_fetch_array($result)) {
//             $displ = $row['image'];
//           echo '<img src="data:images/jpg;base64,'.base64_encode($displ).'width="220" height="220">';
// }  
                $query = "SELECT * FROM images";  
                $result = mysqli_query($dbb, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:images/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" "/>  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
    </div>
        </div>
        <div class="content">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php 
                         echo $_SESSION['success'];
                         unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
        </div>
    </body>
	</html>