<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ressources/style.css">
  </head>
  <body>
<?php
//Commentaire 2
  $command_name = "youtube-dl -e " . escapeshellarg($_POST['link']);

  $command_id = "youtube-dl --get-id " . escapeshellarg($_POST['link']);

  $command_dl = "youtube-dl -x --audio-format mp3 " . escapeshellarg($_POST['link']);

  if (!isset($_POST['link'])) {
?>
    <img src="ressources/yt-logo.png" style="width:100px;height:100px;">

    <h1>Youtube MP3 Downloader</h1>

    <form method="post" action="youtube-dl.php">

      <input type="text" name="link"/>
      <input type="submit" name="Valider"/>

    </form>
<?php
  }
  else {
    //Récupération de l'id de la musique
    $id = shell_exec($command_id);

    // Récupération du nom de la musique
    $name = shell_exec($command_name) . "-" . $id . ".mp3";

    // Téléchargement
    $output_dl = shell_exec($command_dl);
    echo "<pre>$output_dl</pre>";

    // Déplacement dans le répertoire musiques
    $output_move = shell_exec('mv *.mp3 musiques/');
    ?>
    <a href="./musiques/<?php echo $name ?>" download="<?php echo $name ?>">Télécharger la musique<a><br><br>
      <a href="./youtube-dl.php">Retour à l'acceuil<a>
    <?php
  }
?>
</body>
</html>
