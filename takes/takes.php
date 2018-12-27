<?php

echo '<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Insertion</title>
</head>
<body>
  <div class="header">
       <h1>Takes</h1>
  	
  </div>
   
   <form action="tinsert.php"  method="POST">
   	<table>
      <tr>
            <td>Old_People_ID</td>
            <td><input type="text" name="ID" class="textInput"></td>
      </tr>
   		<tr>
   		    <td>medicine_quantity</td>
   			<td><input type="text" name="medicine_quantity" class="textInput"></td>
   		</tr>

   		<tr>
   		    <td>medicine_name</td>
   			<td><input type="text" name="Name" class="textInput"></td>
   		</tr>

       <tr>

            <td><input type="submit" name="ok" value="Insert"></td>
        </tr>


   	 
   	</table>

   </form>

</body>
</html>';

?>