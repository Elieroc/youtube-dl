<?php

  // Déclaration des variables
  $command_name = "youtube-dl -e " . escapeshellarg($_GET['link']);

  $command_id = "youtube-dl --get-id " . escapeshellarg($_GET['link']);

  $command_dl_mp4 = "youtube-dl -f mp4 " . escapeshellarg($_GET['link']);

  // Si aucun lien n'est passé en post, rediriger vers la page d'acceuil
  if (!isset($_GET['link'])) {
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

  <!-- Génération du lien pour télécharger la musique -->
  <a href="./musiques/<?php echo $name ?>" download="<?php echo $name ?>">Télécharger la vidéo<a><br><br>

  <!-- Bouton pour retourner à la page d'acceuil -->
  <a href="./youtube-dl.php">Retour à l'acceuil<a>

<?php
  }
?>
