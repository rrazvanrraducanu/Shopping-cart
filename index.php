<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       require 'connect.php';
       $result=mysqli_query($con, 'select * from flowers');
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Nume</th>
                <th>Culoare</th>
                <th>Marime</th>
                <th>Pret</th>
                <th>Buy</th>
            </tr>
 <?php while($flower=  mysqli_fetch_object($result)){ ?>
            <tr>
            <td><?php echo $flower->id; ?></td>
            <td><?php echo $flower->nume; ?></td>
            <td><?php echo $flower->culoare; ?></td>
            <td><?php echo $flower->marime; ?></td>
            <td><?php echo $flower->pret; ?></td>
 <td><a href="cart.php?id=<?php echo $flower->id;?>"> Buy</a></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
