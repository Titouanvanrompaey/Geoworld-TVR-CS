<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=geoworld;charset=utf8", "root", "");
if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) 
AND !empty($_POST['pseudo']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    $insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUE(?, ?)');
    $insertmsg->execute(array($pseudo, $message));
}
?>
<html>
    <head>
        <title>messagerie</title>
        <meta charset="utf-8">
</head>
<body>
    <from method="post" action="">
        <input type="text" name="pseudo" placeholder="PSEUDO" value="<?php 
        if(isset($pseudo)) { echo $pseudo;}?>"/><br />
        <textarea type="text" name="message" placeholder="MESSAGE"></textearea><br />
        <input type="submit" value="Evoyer" />
</from>
<?php
$allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
while($msg = $allmsg->fetch())
{
?>
<b><?php echo $msg['pseudo']; ?> : </b><?php echo $msg['message']; ?><br />
<?php 
} ?>
</body>
</html>