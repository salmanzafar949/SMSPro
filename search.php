<?php

include 'db.php';
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT * FROM schools WHERE schoolname LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['schoolname'];
}
//return json data
echo json_encode($data);
// echo "hello";
//   if(isset($_POST['query']))
//   {
//   	$c_s = '';
//   	$q = $_POST['query'];
//   	$sql = "SELECT * FROM `schools` WHERE schoolname LIKE '%".$_POST["query"]."%'";
//   	$res = mysqli_query($conn, $sql);
//   	$c_s ='<ul class="list-unstyled">';
//   	if(mysqli_num_rows($res) > 0)
//   	{
//            while($row=mysqli_fetch_assoc($res))
//            {
//                 $c_s .="<li>". $row['schoolname'] ."</li>";
//            }
//   	}
//   	else
//   	{
//   		$c_s .= '<li>School Not found</li>';
//   	}

//   	 $c_s .="</ul>";
//   	 echo  $c_s;
//   }
?>