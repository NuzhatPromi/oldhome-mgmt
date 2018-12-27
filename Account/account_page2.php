<!DOCTYPE html>
<html>
<head>
    <title>Insertion</title>
</head>
<body>
<div class="header">
    <h1>Account</h1>

</div>

<form action="insert_account.php" method="POST">
    <table>
        <tr>
            <td>TRANSACTION_ID</td>
            <td><input type="text" name="TR_ID" class="textInput"></td>
        </tr>

        <tr>
            <td>TRANSACTION_TYPE</td>
            <td><input type="text" name="TR_TYPE" class="textInput"></td>
        </tr>

        <tr>
            <td>ACC_AMOUNT</td>
            <td><input type="number" name="ACC_AM" class="textInput"></td>
        </tr>

        <tr>
            <td>ACC_DATE</td>
            <td><input type="date" name="ACC_D"></td>
        </tr>


        <tr>

            <td><input type="submit" name="ok" value="Insert"></td>
        </tr>

    </table>

</form>

</body>
</html>
