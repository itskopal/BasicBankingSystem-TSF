<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="./img/mt1.jpeg">

    <title>Bank System: Customers</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        include 'config.php';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);
    ?>

    <div class="container">
        <!-- header section -->
        <?php
          include'header.php';
        ?>

        <main>
            <section class="customer_table">
                <h1>CUSTOMERS</h1>

                <div class="records">
                    <table class="customer">
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> E-mail </th>
                            <th> Balance (Rs.) </th>
                            <th> Operation </th>
                        </tr>

                        <tbody>
                            <?php 
                                while($rows=mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $rows['id'] ?></td>
                                    <td><?php echo $rows['name']?></td>
                                    <td><?php echo $rows['email']?></td>
                                    <td><?php echo $rows['balance']?></td>
                                    <td><a href="transfermoney.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn-secondary">Transfer</button></a></td> 
                                </tr>
                            <?php
                                }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </section>
        </main>

        
    <!-- footer -->
    <?php
    include'footer.php';
    ?>