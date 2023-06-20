
<?php include "config/database.php" ?>

<?php 



$serial_no = $_GET["serial_no"] ?? null;

if(!$serial_no){
    header('location: info.php');
    exit;
}



$statement = $conn->prepare("SELECT * FROM devices WHERE serial_no = :serial_no");
$statement->bindValue(':serial_no', $serial_no);
$statement ->execute();
$device = $statement->fetch(PDO::FETCH_ASSOC);



$serial_no = $device['serial_no'];
$tag_no =  $device['tag_no'];
$device_type = $device['device_type'];
$model = $device['model'];
$office = $device['office'];
$allocated_to = $device['allocated_to']; 
$status =$device['status'];   
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $serial_no = $_POST['serial_no'];
    $tag_no = $_POST['tag_no'];
    $device_type = $_POST['device_type'];  
    $model = $_POST['model'];
    $office = $_POST['office'];
    $allocated_to = $_POST['allocated_to'];
    $status  = $_POST['status'];
    
    
    
    
    $statement = $conn->prepare(
        "UPDATE devices SET tag_no = :tag_no, device_type =:device_type ,
        model = :model, office = :office, allocated_to = :allocated_to, status = :status
          WHERE serial_no = :serial_no       "
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
        <title>Tracking Form Demo</title>
    </head>
    <body>
        <form action="update.php" method="post">
            <div class="tracking form">
                <h2>update</h2>
                <div class="form-img">
                    <img src ="kma logo.jpg" alt="">
                </div>
                                   
                <div class="input-group">
                    <input type="text" name="serial_no" value="<?php echo $device['serial_no'] ?>"  required>
                    <label for="serialnumber">Serial Number</label>
                </div>
                <div class="input-group">
                    <input type="text" name="tag_no" value="<?php echo $device['tag_no'] ?>" required>
                    <label for="tagnumber">Tag Number</label>
                </div>
                <div class="input-group">
                    <input type="text" name="device_type" value="<?php echo $device['device_type'] ?>"  required>
                    <label for="tagnumber">Device Type</label>
                </div>
                <div class="input-group">
                    <input type="text" name="model"  value="<?php echo $device['model'] ?>" required>
                    <label for="tagnumber">model</label>
                </div>
                <div class="input-group">
                    <input type="text" name="office"  value="<?php echo $device['office'] ?>" required>
                    <label for="tagnumber">office</label>
                </div>
                <div class="input-group">
                    <input type="text" name="allocated_to" value="<?php echo $device['allocated_to'] ?>" required>
                    <label for="tagnumber">allocated</label>
                </div>
                <div class="input-group">
                    <input type="text" name="status"  value="<?php echo $device['status'] ?>" required>
                    <label for="tagnumber">status</label>
                </div>
               
                       
                <div class="input-group lui  ">
                    <!-- <input type="button" value="SUBMIT" class="submit-btn"> -->

                    <button type="submit" class="submit-btn">submit</button>
                </form>
                </div>               
        </div>
        