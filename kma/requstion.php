





<?php include "config/database.php" ?>

<?php 

$staff_no = $device = $quantity = $purpose = $start_date =$end_date = '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $staff_no = $_POST['staff_no'];
    $device = $_POST['device'];
    $quantity = $_POST['quantity'];  
    $purpose = $_POST['purpose'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
   
    
    
    $statement = $conn->prepare(
        "INSERT INTO  request(staff_no, device, quantity ,purpose, start_date, end_date) 
        VALUES (:staff_no, :device, :quantity,:purpose, :start_date, :end_date)
        "
    );
    
    $statement->bindValue(':staff_no',$staff_no);
    $statement->bindValue(':device', $device);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':purpose', $purpose);
    $statement->bindValue(':start_date', $start_date);
    $statement->bindValue(':end_date', $end_date);
    $statement->execute();

  header("location: requests.php");
}

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <div class="container p-4">

        <form   action="requstion.php" method="POST">
            <div class="mb-3">
              <label  class="form-label"     >Staff No </label>
              <input type="text"  name="staff_no"  class="form-control" >
              
            </div>
            <div class="mb-3">
              <label  class="form-label">device</label>
              <input type="device" name="device" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control">
                
              </div>
              <div class="mb-3">
                <label  class="form-label">purpose</label>
                <input type="text" name="purpose" class="form-control" >
              </div>
              <div class="mb-3">
                <label  class="form-label">start date</label>
                <input type="date" name="start_date" class="form-control" >
              </div>
              <div class="mb-3">
                <label  class="form-label">end date</label>
                <input type="date" name="end_date" class="form-control" >
              </div>

              
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
  </body>
</html>