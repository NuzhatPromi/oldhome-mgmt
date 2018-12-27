
<?php

echo '<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>Insertion</title>
</head>
<body>
  <div class="header">
       <h1>Govering body Email address</h1>
    
  </div>
   
   <form action="einsert.php"  method="POST">
    <table>
      <tr>
          <td>Govering body ID</td>
        <td><input type="text" name="G_ID" class="textInput"></td>
      </tr>

      <tr>
          <td>Email Address</td>
        <td><input type="text" name="eno" class="textInput"></td>
      </tr>


      <tr>  
        <td><input type="submit" name="ok" value="Insert"></td>
      </tr>

    </table>

   </form>

</body>
</html>';

?>