<?php

echo '<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Insertion</title>
</head>
<body>
  <div class="header">
       <h1>Governing boby</h1>
  	
  </div>
   
   <form action="insert.php"  method="POST">
   	<table>
   		<tr>
   		    <td>ID</td>
   			<td><input type="text" name="ID" class="textInput"></td>
   		</tr>

   		<tr>
   		    <td>NationalID</td>
   			<td><input type="text" name="NID" class="textInput"></td>
   		</tr>

   		<tr>
   		    <td>Name</td>
   			<td><input type="text" name="Name" class="textInput"></td>
   		</tr>

   		<tr>
   		    <td>Address</td>
   			<td><input type="text" name="Address" class="textInput"></td>
   		</tr>

   		<tr>
   		    
   			<td><input type="submit" name="ok" value="Register"></td>
   		</tr>
   	</table>

   </form>

</body>
</html>';

?>