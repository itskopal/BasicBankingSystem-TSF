<?php 
// Include the database connection and header files
include 'config.php';

// Check if the submit button is clicked
if(isset($_POST['submit']))
{
    // Get the sender's ID from the URL parameter and
    // the recipient's ID and the transfer amount from the submitted form
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    // Retrieve the sender's details from the database
    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    // Retrieve the recipient's details from the database
    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);


    // Check if the transfer amount is negative
    if (($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")'; 
        echo '</script>';
    }
 
     // Check if the sender's balance is less than the transfer amount
    else if($amount > $sql1['balance']) 
    {
        
    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")'; 
    echo '</script>';
    }

    // Check if the transfer amount is zero
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }

    // If all checks pass, proceed with the transfer
    else {     
            
        // Update the sender's balance by subtracting the transfer amount
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn,$sql);
        
        // Update the recipient's balance by adding the transfer amount
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn,$sql);
        
        // Insert a transaction record in the database with the sender's and recipient's names and the transfer amount
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        // Show a success message and redirect to the transaction history page
        if($query){
            echo "<script> alert('Transaction Successful');
                    window.location='transactions.php';
                 </script>";     
        }

        $newbalance= 0;
        $amount =0;
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/jpeg" sizes="32x32" href="./img/mt1.jpeg">

    <title>Bank System: Transfer Money</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <!-- header section -->
        <?php
          include'header.php';
        ?>

        <main>
            <section class="customer_table">
                <h1>TRANSACTION</h1>
 
                <?php
                  include 'config.php';

                  if(isset($_GET['id'])) {
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM users where id=$sid";
                    $result = mysqli_query($conn,$sql);
                    if(!$result)
                    {
                    echo "Error: ".$sql."<br>".mysqli_error($conn);
                    }
                    $rows=mysqli_fetch_assoc($result);
                }
                else {
                    // handle the case when the 'id' parameter is not set
                    echo "Error: ID parameter is not set.";
                    exit();
                }
                ?>

                <form method="post" name="customers">
                    <div class="records">
                        <table class="customer">
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> E-mail </th>
                                <th> Balance </th>
                            </tr>

                            <tr>
                                <td><?php echo $rows['id'] ?></td>
                                <td><?php echo $rows['name']?></td>
                                <td><?php echo $rows['email']?></td>
                                <td><?php echo $rows['balance']?></td>
                            </tr>         
                        </table>
                    </div>

                    <div class="labels">
                        <label><b>Transfer To:</b></label>
                        <select name="to" class="form-control" required>
                            <option value="" disabled selected>Select the User</option>
                            <?php
                                include 'config.php';
                                $sid = $_GET['id'];
                                $sql = "SELECT * FROM users where id!=$sid";
                                $result = mysqli_query($conn,$sql);
                                if(!$result)
                                {
                                    echo "Error: ".$sql."<br>".mysqli_error($conn);
                                }
                                while($rows = mysqli_fetch_assoc($result)){
                            ?>
                               <option class="table" value="<?php echo $rows['id'];?>" >
                                <?php echo $rows['name'] ;?> (Balance: <?php echo $rows['balance'] ;?> )
                               </option>
                            <?php
                                }
                            ?> 
                        </select>
                        
                        <label><b>Amount:</b></label>
                        <input type="number" class="form-control" name="amount" required>   
                    </div>

                    <div class="sendbtn">
                        <button class="btn-primary" name="submit" type="submit" id="myBtn" >Transfer</button>
                    </div>

                </form>

            </section>
        </main>

    
    <!-- footer -->
    <?php
     include'footer.php';
    ?>
