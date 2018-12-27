<!DOCTYPE html>
<html>
<head>
    <title>Insertion</title>
</head>
<body>
<div class="header">
    <h1>Events</h1>

</div>

<form action="insert_events.php" method="POST">
    <table>
        <tr>
            <td>Event Date</td>
            <td><input type="date" name="EVE_D"></td>
        </tr>

        <tr>
            <td>Place</td>
            <td><input type="text" name="Place" class="textInput"></td>
        </tr>

        <tr>
            <td>Cost</td>
            <td><input type="number" name="Cost" class="textInput"></td>
        </tr>

        <tr>
            <td>Type</td>
            <td><input type="text" name="Type"class="textInput"></td>
        </tr>

        <tr>
            <td>NO_OF_PEOPLE</td>
            <td><input type="number" name="No_P" class="textInput"></td>
        </tr>

        <tr>
            <td>SPONSORDED_BY</td>
            <td><input type="text" name="Sponsor" class="textInput"></td>
        </tr>

        <tr>

            <td><input type="submit" name="ok" value="Insert"></td>
        </tr>

    </table>

</form>

</body>
</html>
