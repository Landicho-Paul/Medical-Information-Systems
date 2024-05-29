<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM addtocart WHERE cart_id= :medid");
	$result->bindParam(':medid', $id);
	$result->execute();
?>