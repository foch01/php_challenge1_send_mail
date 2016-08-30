<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <meta charset="utf-8">
</head>

<body>
    <div class="container-fluid">

        <div class="absolute background"></div>
        <div class="absolute filtre"></div>
        <h3 class="police-3 text-center">Thomas Sanceo</h3>
        <h2 class="police-2 text-center">Contact me</h2>
        <form class="absolute centrage text-center" method="POST" action="">
            <input type="text" class="form-control input-lg" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" />
            <br />
            <br />
            <input type="email" class="form-control input-lg" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" />
            <br />
            <label for="sel2"></label>
            <select class="form-control input-lg" name="objet">
                <option value="1"  <?php if ($_POST['objet']=='1') {echo "selected='selected'";}?>>Versement d'argent</option>
                <option value="2" <?php if ($_POST['objet']=='2') {echo "selected='selected'";}?>>Demande adresse paypal</option>
                <option value="3" <?php if ($_POST['objet']=='3') {echo "selected='selected'";}?>>Virement bancaire</option>
                <option value="4" <?php if ($_POST['objet']=='4') {echo "selected='selected'";}?>>Versement bitcoin</option>
            </select>
            <br />
            <br />
            <textarea class="form-control" name="message" placeholder="Votre message" cols="175" rows="18">

            </textarea>
            <br />
            <br />
            <input type="submit" class="btn btn-primary btn-lg" value="Envoyer !" name="envoi" />
        </form>
    </div>


    <?php
session_start();
        
if(isset($_POST['envoi']))
{

if (!empty($_POST['nom']) AND !empty($_POST['mail']) AND ! empty($_POST['message']))
{
$header="MIME-Version: 1.0\r\n";
$header.='From:"Thomas"<totodu29310@gmail.com>'."\n";
$header.='Content-Type:multipart/mixed; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
// $objet = ($_POST['objet']); fonctionne pas


$message='
<html>
	<body>
		<div align="center">
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
		</div>
	</body>
</html>
';

mail("totodu29310@gmail.com", "CONTACT - SITE", $message, $header);
    $msg="Votre message a bien été envoyé !";
}
    else {
        $msg ="Tous les champs doivent être complétés";
    }

}
        
if(isset($msg)){
			echo $msg;
		}
		?>
</body>

</html>