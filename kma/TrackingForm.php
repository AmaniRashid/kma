
<?php include "config/database.php" ?>

<?php 

$serial_no = $tag_no = $device_type = $model = $office =$allocated_to = $status ='';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $serial_no = $_POST['serial_no'];
    $tag_no = $_POST['tag_no'];
    $device_type = $_POST['device_type'];  
    $model = $_POST['model'];
    $office = $_POST['office'];
    $allocated_to = $_POST['allocated_to'];
    $status  = $_POST['status'];
    
    
    
    
    $statement = $conn->prepare(
        "INSERT INTO  devices (serial_no, tag_no, device_type ,model, office, allocated_to,status) 
        VALUES (:serial_no, :tag_no, :device_type ,:model, :office, :allocated_to, :status)
        "
    );
    
    $statement->bindValue(':serial_no',$serial_no);
    $statement->bindValue(':tag_no', $tag_no);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':device_type', $device_type);
    $statement->bindValue(':office', $office);
    $statement->bindValue(':allocated_to', $allocated_to);
    $statement->bindValue(':status', $status);
    $statement->execute();

    header("location: info.php");
}

?>


<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style1.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Tracking Form Demo</title>
    </head>
    <body>




    <p>

        <a href="info.php" class="btn btn-secondary">back to information</a>
    </p>
        <form action="TrackingForm.php" method="POST">
            <div class="tracking form">
                <h2>Tracking Form</h2>
                <div class="form-img">
                    <img src ="kma logo.jpg" alt="">
                </div>
                                   
                <div class="input-group">
                    <input type="text" name="serial_no"   required>
                    <label for="serialnumber">Serial Number</label>
                </div>
                <div class="input-group">
                    <input type="text" name="tag_no" required>
                    <label for="tagnumber">Tag Number</label>
                </div>
                <div class="input-group">
                    <input type="text" name="device_type"   required>
                    <label for="tagnumber">Device Type</label>
                </div>
                <div class="input-group">
                    <input type="text" name="model"   required>
                    <label for="tagnumber">model</label>
                </div>
                <div class="input-group">
                    <input type="text" name="office"   required>
                    <label for="tagnumber">office</label>
                </div>
                <div class="input-group">
                    <input type="text" name="allocated_to" required>
                    <label for="tagnumber">allocated</label>
                </div>
                <div class="input-group">
                    <input type="text" name="status"   required>
                    <label for="tagnumber">status</label>
                </div>
               
                       
                <div class="input-group lui  ">
                    <!-- <input type="button" value="SUBMIT" class="submit-btn"> -->

                    <button type="submit" class="submit-btn">submit</button>
                </form>
                </div>               
        </div>
        