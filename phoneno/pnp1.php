<?php

echo '<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Insertion</title>
</head>
<body>
  <div class="header">
       <h1>Govering Boby Phone number</h1>
  	
  </div>
   
   <form action="pninsert.php"  method="POST">
   	<table>
   		<tr>
   		    <td>Govering body ID</td>
   			<td><input type="text" name="G_ID" class="textInput"></td>
   		</tr>

   		<tr>
   		    <td>Phone Number</td>
   			<td><input type="text" name="phnno" class="textInput"></td>
   		</tr>


   		<tr>  
   			<td><input type="submit" name="ok" value="Insert"></td>
   		</tr>

   	</table>

   </form>

</body>
</html>';

?>