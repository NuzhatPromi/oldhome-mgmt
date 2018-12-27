<!DOCTYPE html>
<html>
<head>
    <title>Insertion</title>
</head>
<body>
<div class="header">
    <h1>Employee</h1>

</div>

<form action="insert_emp.php" method="POST">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="ID" class="textInput"></td>
        </tr>

        <tr>
            <td>Name</td>
            <td><input type="text" name="Name" class="textInput"></td>
        </tr>

        <tr>
            <td>NationalID</td>
            <td><input type="text" name="NID" class="textInput"></td>
        </tr>


        <tr>
            <td>Date of Birth</td>
            <td><input type="date" name="BD"></td>
        </tr>


        <tr>
            <td>PERSENT Address</td>
            <td><input type="text" name="PAddress" class="textInput"></td>
        </tr>


        <tr>
            <td>PERMANENT Address</td>
            <td><input type="text" name="Address" class="textInput"></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type="text" name="Email" class="textInput"></td>
        </tr>

        <tr>
            <td>Blood Group</td>
            <td><input type="text" name="Blood_group" class="textInput"></td>
        </tr>

        <tr>
            <td>EDUCATION</td>
            <td><input type="text" name="EDUCATION" class="textInput"></td>
        </tr>

        <tr>
            <td>EXPERIENCE</td>
            <td><input type="text" name="EXPERIENCE" class="textInput"></td>
        </tr>

        <tr>
            <td>Joining Date</td>
            <td><input type="date" name="J_Day"></td>
        </tr>

        <tr>
            <td>Leaving Date</td>
            <td><input type="date" name="L_Day"></td>
        </tr>

        <tr>
            <td>Salary</td>
            <td><input type="number" name="SALARY" class="textInput"></td>
        </tr>

        <tr>
            <td>Type</td>
            <td><input type="text" name="TYPE" class="textInput"></td>
        </tr>
        

        <tr>

            <td><input type="submit" name="ok" value="Insert"></td>
        </tr>

    </table>

</form>

</body>
</html>