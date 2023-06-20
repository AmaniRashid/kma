<?php include "config/database.php" ?>


<?php 

$statement = $conn->prepare(' SELECT * FROM  request ');
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="mainpage.css">
<div class="wrapper">
    <div class="sidebar">
      <div >

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
        <div class="header row justify-content-between ">

            <div class="col-4  pt-2">
              <h2 style="color:black;">REQUESTS</h2>
            </div>
            
            <div class="col-4 pt-2 pb-0">
                  <a href="info.php" class="btn" style="background-color: #241D4E; color: white;">VIEW AVAILABLE DEVICES</a>
            </div>
        </div>  
        <div class="info">
          <div class="container">
             <div>
                      <table class="table">
                    <thead> 
                      <tr>
                        <th scope="col">NO</th>
                        <th scope="col">STAFF NO</th>
                        <th scope="col">DEVICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PURPOSE </th>
                        <th scope="col">START DATE</th>
                        <th scope="col">END DATE </th>
                      
                      </tr>
                    </thead>
                    <tbody>

                    <?php foreach($requests as $i => $request){  ?>  

                      <tr>
                        <th scope="row"> <?php echo $i + 1 ?> </th>
                        <td class=""><?php echo $request['staff_no'] ?></td>
                        <td class=""><?php echo $request['device'] ?></td>
                        <td class=""><?php echo $request['quantity'] ?></td>
                        <td class=""><?php echo $request['purpose'] ?></td>
                        <td class=""><?php echo $request['start_date'] ?></td>
                        <td class=""><?php echo $request['end_date'] ?></td>
                                        
                    
                        </tr>

                    <?php }?>
                    </tbody>
                </table>
                </div>
              
            </div>
          
        </div>
          
      </div>
    </div>
</div>