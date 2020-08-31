<?php

  // Déclaration des variables
  $command_name = "youtube-dl -e " . escapeshellarg($_POST['link']);

  $command_id = "youtube-dl --get-id " . escapeshellarg($_POST['link']);

  $command_dl_mp4 = "youtube-dl -f mp4 " . escapeshellarg($_POST['link']);

  // Si aucun lien n'est passé en post, rediriger vers la page d'acceuil
  if (!isset($_POST['link'])) {
    header('Location: youtube-dl.php');
  }

  // Sinon on continue
  else {

    // Récupération de l'id de la musique
    $id = shell_exec($command_id);

    // Récupération du nom de la musique
    $name = shell_exec($command_name) . "-" . $id . ".mp4";

    // Téléchargement
    $output_dl = shell_exec($command_dl_mp4);
    echo "<pre>$output_dl</pre>";

    // Déplacement dans le répertoire musiques
    $output_move = shell_exec('mv *.mp4 videos/');

?>
