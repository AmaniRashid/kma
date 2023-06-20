<?php include "config/database.php" ?>


<?php 

$statement = $conn->prepare(' SELECT * FROM  devices ');
$statement->execute();
$devices = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <link rel="stylesheet" href="mainpage.css">
    <title>info</title>
</head>
<body>
<div class="container wrapper">
  <div class="sidebar">
      <div>
          <img src="kma logo.jpg" alt="" srcset="" width="200rem ">
      </div>
        <ul>
            <li><a href="requests.php">REQUESTS</a></li>
            <li><a href="info.php">INFORMATION </a></li>
            <li><a href="TrackingForm.php">TRACKING FORM</a></li>
            <li><a href="update.php">UPDATE INFORMATION</a></li>
            <li><a href="#">Contact</a></li>
           
        </ul> 
  </div>
  <div class="main_content">
        <div class="header row justify-content-between">
          <div class="col-4 pt-2">
            <h2 style="color:black;">ASSETS INFORMATION</h2>
          </div>
          <div class="col-4 pt-2">
            <a href="TrackingForm.php" type="button" style="background-color: #241D4E; color: white;"class="btn">Add device</a>
          </div>
        </div>

        <div class="info">
          <div class="container">
            <table class="table">
              <thead> 
                <tr>
                <th scope="col">no</th>
        
                  <th scope="col">serial No</th>
                  <th scope="col">Tag no</th>
                  <th scope="col">Device type</th>
                  <th scope="col">Model </th>
                  <th scope="col">Office</th>
                  <th scope="col">Allocated to</th>
                  <th scope="col">Status</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach($devices as $i => $device){  ?>  
                <tr>
                  <th scope="row"> <?php echo $i + 1 ?> </th>
                  <td><?php echo $device['serial_no'] ?></td>
                  <td><?php echo $device['tag_no'] ?></td>
                  <td><?php echo $device['device_type'] ?></td>
                  <td><?php echo $device['model'] ?></td>
                  <td><?php echo $device['office'] ?></td>
                  <td><?php echo $device['allocated_to'] ?></td>
                  <td><?php echo $device['status'] ?></td>
                  
              
                  <td>


                    <form  style="display: inline-block;" action="delete.php" method="post">
                          <input type="hidden" name="serial_no"  value="<?php echo $device['serial_no'] ?> ">
                          <button type="submit" class="btn btn-danger btn-sm">delete</button>
                    </form>
                
                    <a href="update.php?serial_no=<?php echo $device['serial_no'] ?> " class="btn  btn-sm btn-primary">update</a >
                  </td>
                </tr>

              <?php }?>
              </tbody>
            </table>
          </div>
        </div>
         </div>  
</div>

  
</body>
</html>