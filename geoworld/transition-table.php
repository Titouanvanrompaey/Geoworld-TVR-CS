<?php
require_once "manager-db.php";
$id=$_GET['id'];
$pays=getpays($id);
?>
Nom:
<input type="text" name="nom" required value="<?php echo $pays->Name; ?>" /> <br />
Continent:
<input type="text" name="continent" required value="<?php echo $pays->Continent; ?>" /> <br />
