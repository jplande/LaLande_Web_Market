<?php  include 'connection.php';


if ( $_GET[ 'h' ] == 'addtocart') 
{
    $qty = $_POST['qty'];

	$up = mysqli_query($conn,"SELECT * from cart WHERE product_id='{$_POST['id']}'");
	if(mysqli_num_rows($up)){
		$upD = mysqli_query($conn,"UPDATE cart set qty=qty+'$qty' WHERE product_id='{$_POST['id']}' and ip_address='$ip_server'");
	} else {
		$in = mysqli_query($conn,"INSERT into cart (product_id,qty,ip_address) VALUES ('{$_POST['id']}','{$qty}','{$ip_server}')");
	}	
}


if ( $_GET[ 'h' ] == 'removeproduct') 
{
	$in = mysqli_query($conn,"DELETE from cart WHERE id='{$_POST['id']}' and ip_address='$ip_server'");

}



if ( $_GET[ 'h' ] == 'view_cart') 
{
	$totalprice = '';
	$grand = '';
	$up = mysqli_query($conn,"SELECT * from cart WHERE ip_address='$ip_server'");
	while($row = mysqli_fetch_assoc($up)) {

		$upD = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from products WHERE id='{$row['product_id']}'"));

		echo '<img src="images/'.$upD['image'].'" style="width:70px" >';
		echo '<span style="color:white"> '.$upD['name'].' &nbsp;  &nbsp;  x   &nbsp;  &nbsp; '.$row['qty'].'  </span> <br><br>';

	
	}
} 

 ?>