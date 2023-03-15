<?php 
require_once 'header.php'; 
session_start(); 
?>
<html>
    <head>
        <title>messagerie</title>
        <link rel="stylesheet" href="css/chat.css">
        <meta charset="utf-8">
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="pseudo" placeholder="Pseudo" value="<?php echo $_SESSION['nom'] ?>"/><br />
        <label for="message">Entrez votre message:</label></br>
        <p><textarea name="message" rows="8" cols="45"></textarea></p>  
        <input type="submit" value="Envoyer" />
</form>
<?php
require_once 'inc/manager-db.php';
$message=getMessages();
$allmsg = $pdo->query('SELECT * FROM chat ORDER BY id DESC');
while($msg = $allmsg->fetch()){ 
echo "<h5>$msg->nom :</h5>";
echo $msg->message;
} ?>
</body>
</html>