<?php
$con = MySQLi_connect(
    "localhost",
    "root",
    "",
    "railmaarg"
 );
 if (MySQLi_connect_errno()) {
    echo "Failed to connect to MySQL: " . MySQLi_connect_error();
 }
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $Query = "SELECT * FROM stations WHERE name LIKE '%$Name%'";
   $ExecQuery = MySQLi_query($con, $Query);
   echo '<ul class="suggestion-list">';
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
<li class="suggestion-item" onclick='fill("<?php echo $Result['name'] . ' - ' . $Result['code']; ?>", "fromStation")'>
    <a><?php echo $Result['name'] . ' - ' . $Result['code']; ?></a>
</li>



<?php
}}
echo '</ul>';
?>