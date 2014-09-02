<html>
<title></title>

<body bgcolor = "gray">
<form action="project.php" method="post">
<input type="submit" name="university" value="University">
</form>

<?php

 $con = pg_connect("host=ec2-54-204-35-114.compute-1.amazonaws.com   dbname=dbam19skhoh0fu     user=vuhbpfyiutxfgu    password=8zz2hhonBRPjl8wPPY2wyG-dQN")
 or die("Could not connect:".pg_last_error());

$query  = "select * from university";


$result = pg_query($query) or die("Query failed:".pg_last_error());

echo "<table>\n";

while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($con);

?>


</body>

</html>
