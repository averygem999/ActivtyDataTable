<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--- USING DATA table wesite-->
<!--
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
-->
<!--- USING DATA table file-->

<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatables.css">
<script type="text/javascript" charset="utf8" src="datatables.js"></script>

</head>
<body>
<script type="text/javascript">

  $(document).ready( function () {
      $('#myTable').DataTable();
  } );

</script>


<div class="container">
  <h2>Data Table with Php database</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>




<?php
$sql = "SELECT id, name, user_name, password FROM login_user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
?>
   <table id="myTable" class="table table-hover">
 <!--  <table  class="table table-dark table-striped" id="myTable">-->
       <thead class="thead-dark">
         <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Username</th>
           <th>Password</th>
         </tr>
       </thead>
       <tbody>

<?php
   while($row = $result->fetch_assoc()) {

    echo"<tr>";
      echo"<td>".$row["id"]."</td>";
      echo"<td>".$row["name"]."</td>";
      echo"<td>".$row["user_name"]."</td>";
      echo"<td>".$row["password"]."</td>";
    echo"</tr>";
  }

  ?>

</tbody>
</table>




<?php
} else {
   echo "0 results";
}
$conn->close();
?>


</div>
</body>
</html>
