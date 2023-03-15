<?php
require_once 'header.php';
require_once "inc/manager-db.php";
$id=$_GET['id'];
$pays=getpays($id);
?>
<form action="insert-new-donnees.php"  method="get" > 
<fieldset> 
<legend> <i>Mise à jour de la base</i></legend>
<input type="hidden" name="id" required value="<?php echo $pays->id; ?>" /> <br />
Nom:
<input type="text" name="nom" required value="<?php echo $pays->Name; ?>" /> <br />
Continent:
<select name="continent">
    <option value="<?php echo $pays->Continent; ?>"><?php echo $pays->Continent; ?></option>
	<option value="Europe">Europe</option>
	<option value="Asia">Asie</option>
	<option value="Africa">Afrique</option>
    <option value="Oceania">Océanie</option>
	<option value="Antarctica">Antarctique</option>
	<option value="North America">Amérique du Nord</option>
    <option value="South America">Amérique du Sud</option>
	</select>
	<br />
Région:
<input type="text" name="region" required value="<?php echo $pays->Region; ?>" /> <br />
Superficie:
<input type="text" name="superficie" required value="<?php echo $pays->SurfaceArea; ?>" /> <br />
Population:
<input type="text" name="population" required value="<?php echo $pays->Population; ?>" /> <br />
Espérance de vie:
<input type="text" name="esperance" required value="<?php echo $pays->LifeExpectancy; ?>" /> <br />
Produit national brut:
<input type="text" name="GNP" required value="<?php echo $pays->GNP; ?>" /> <br />
Nom local:
<input type="text" name="localname" required value="<?php echo $pays->LocalName; ?>" /> <br />
Gouvernement:
<input type="text" name="gouvernement" required value="<?php echo $pays->GovernmentForm; ?>" /> <br />
Personne à la tête de l'état:
<input type="text" name="dirigeant" required value="<?php echo $pays->HeadOfState; ?>" /> <br />
Capital:
<input type="text" name="capital" required value="<?php echo $pays->Capital; ?>" /> <br />
</fieldset> 
<input type="submit" value="mettre à jour" /> 
<input type="reset" value="Effacer" /> 
</form>





