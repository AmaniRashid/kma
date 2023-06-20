<?php include "config/database.php" ?>


<?php 

$statement = $conn->prepare(' SELECT * FROM  request ');
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style2.css">
    <title>requests</title>
</head>
<body>
<div class="container">
    
    <div>
        <h2>Assets information</h2>

        <a href="info.php" class="btn btn-secondary">view avaible devicesinformation</a>
    </div>
    <div>
          <table class="table">
        <thead> 
          <tr>
          <th scope="col">no</th>
   
            <th scope="col">staff no</th>
            <th scope="col">device</th>
            <th scope="col">quantity</th>
            <th scope="col">purpose </th>
            <th scope="col">start date</th>
            <th scope="col">end date</th>
          
          </tr>
        </thead>
        <tbody>



     

        <?php foreach($requests as $i => $request){  ?>  

          <tr>
            <th scope="row"> <?php echo $i + 1 ?> </th>
            <td><?php echo $request['staff_no'] ?></td>
            <td><?php echo $request['device'] ?></td>
            <td><?php echo $request['quantity'] ?></td>
            <td><?php echo $request['purpose'] ?></td>
            <td><?php echo $request['start_date'] ?></td>
            <td><?php echo $request['end_date'] ?></td>
           
            
        
            </tr>

        <?php }?>


         
        </tbody>
    </table>
    </div>
  
</div>

  
</body>
</html>