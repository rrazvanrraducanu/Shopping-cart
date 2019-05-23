<?php
session_start();
require 'connect.php';
require 'item.php';

if(isset($_GET['id'])){
$result=mysqli_query($con, 'select * from flowers where id='.$_GET['id']);
$flower=  mysqli_fetch_object($result);
    $item=new Item();
    $item->id=$flower->id;
    $item->nume=$flower->nume;
    $item->culoare=$flower->culoare;
    $item->marime=$flower->marime;
    $item->pret=$flower->pret;
    $item->cantitate=0;
    $_SESSION['cart'][]=$item;
    //Check if the product exist in the cart
      $index=-1;
$cart=unserialize(serialize($_SESSION['cart'])); 
    for($i=0;$i<count($cart);$i++)
      if($cart[$i]->id==$_GET['id']){
        $index=$i;
        break;
        }
   if($index==-1){
    $_SESSION['cart'][]=$item;
   }else{
       $cart[$index]->cantitate++;
       $_SESSION['cart']=$cart;
   }
}
//Delete product in cart
if(isset($_GET['index'])){
    $cart=unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart=array_values($cart);
    $_SESSION['cart']=$cart;
}
?>
<table cellspacing="2" cellpadding="2" border="1">
<tr>
<th>Option</th>
<th>Id</th>
<th>Nume</th>
<th>Culoare</th>
<th>Marime</th>
<th>Pret</th>
<th>Cantitate</th>
<th>Subtotal</th>
</tr>
<?php 
$cart=unserialize(serialize($_SESSION['cart'])); 
$s=0;
$index=0;
for($i=0;$i<count($cart);$i++){
    if($cart[$i]->cantitate!=0){
    $s+=$cart[$i]->pret * $cart[$i]->cantitate;
?>
<tr>
    <td><a href="cart.php?index=<?php echo $index; ?> " onclick="return confirm('Are you sure?')">Delete</a></td>
    <td><?php echo $cart[$i]->id; ?></td>
    <td><?php echo $cart[$i]->nume; ?></td>
    <td><?php echo $cart[$i]->culoare; ?></td>
    <td><?php echo $cart[$i]->marime; ?></td>
    <td><?php echo $cart[$i]->pret; ?></td>
    <td><?php echo $cart[$i]->cantitate; ?></td>
    <td><?php echo $cart[$i]->pret * $cart[$i]->cantitate; ?></td>
</tr>
<?php 
$index++;
}} ?>
<tr>
    <td colspan="7" align="right">Sum</td>
    <td align="left"><?php echo $s; ?></td>
</tr>
</table>
<br>
<a href="index.php">Continue shopping</a>
