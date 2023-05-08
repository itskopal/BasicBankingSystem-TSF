<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="./img/mt1.jpeg">

    <title>Bank System: Transactions</title>

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
                <h1>TRANSACTIONS</h1>

                <div class="records">
                    <table class="customer">
                        <tr>
                            <th> S.No. </th>
                            <th> Sender's Name </th>
                            <th> Receiver's Name </th>
                            <th> Amount </th>
                            <th> Date & Time </th>
                        </tr>

                        <tbody>
                            <?php

                                include 'config.php';

                                $sql ="select * from transaction";

                                $query =mysqli_query($conn, $sql);

                                while($rows = mysqli_fetch_assoc($query))
                                {
                            ?>

                                <tr>
                                    <td><?php echo $rows['sno']; ?></td>
                                    <td><?php echo $rows['sender']; ?></td>
                                    <td><?php echo $rows['receiver']; ?></td>
                                    <td><?php echo $rows['balance']; ?> </td>
                                    <td><?php echo $rows['datetime']; ?> </td>
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