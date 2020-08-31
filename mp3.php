<?php

  // Déclaration des variables
  $command_name = "youtube-dl -e " . escapeshellarg($_POST['link']);

  $command_id = "youtube-dl --get-id " . escapeshellarg($_POST['link']);

  $command_dl_mp3 = "youtube-dl -x --audio-format mp3 " . escapeshellarg($_POST['link']);

  // Si aucun lien n'est passé en post, rediriger vers la page d'acceuil
  if (!isset($_POST['link'])) {
    header('Location: youtube-dl.php');
  }

  // Sinon on continue
  else {

    // Récupération de l'id de la musique
    $id = shell_exec($command_id);

    // Récupération du nom de la musique
    $name = shell_exec($command_name) . "-" . $id . ".mp3";

    // Téléchargement
    $output_dl = shell_exec($command_dl_mp3);
    echo "<pre>$output_dl</pre>";

    // Déplacement dans le répertoire musiques
    $output_move = shell_exec('mv *.mp3 musiques/');
    
?>

    <!-- Génération du lien pour télécharger la musique -->
    <a href="./musiques/<?php echo $name ?>" download="<?php echo $name ?>">Télécharger la musique<a><br><br>

    <!-- Bouton pour retourner à la page d'acceuil -->
    <a href="./youtube-dl.php">Retour à l'acceuil<a>
<?php
  }
?>
