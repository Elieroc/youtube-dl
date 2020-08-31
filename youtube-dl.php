<!DOCTYPE html>
<html>
  <head>
    <title>Youtube MP3 Downloader</title>
    <!-- An open source project by Elieroc -->
    <!-- Github of the project : -->
    <!-- https://github.com/Elieroc/youtube-dl -->
    <link rel="stylesheet" type="text/css" href="ressources/style.css">
  </head>
  <body>
    <?php

      // Si il n'y a pas de lien indiqué, afficher la page d'acceuil
      if (!isset($_POST['link'])) {
    ?>

    <img src="ressources/yt-logo.png" style="width:100px;height:100px;">

    <h1>Youtube MP3 Downloader</h1>

      <form method="post" action="youtube-dl.php">

        <!-- Input lien -->
        <input class="input" type="text" placeholder="Coller le lien" name="link"/>

        <!-- Choix du format mp3/mp4 -->
        <form method="post" action="youtube-dl.php">

          <select name="choix">
            <option value="mp3">MP3</option>
            <option value="mp4">MP4</option>
          </select>

        </form>

        <!-- Bouton "GO" -->
        <div class="container">
          <button class="btn button" type="submit">GO</button>
        </div>

      </form>

    <?php
      }

      // Sinon, si le lien est indiqué et en MP3 alors :
      elseif (isset($_POST['mp3'])) {

        // Récupération de l'id de la musique
        $id = shell_exec($command_id);

        // Récupération du nom de la musique
        $name = shell_exec($command_name) . "-" . $id . ".mp3";

        // Téléchargement
        $output_dl = shell_exec($command_dl_mp3);
        echo "<pre>$output_dl</pre>";

        // Déplacement dans le répertoire musiques
        $output_move = shell_exec('mv *.mp3 musiques/');
      }

      else {

        // Récupération de l'id de la vidéo
        $id = shell_exec($command_id);

        // Récupération du nom de la vidéo
        $name = shell_exec($command_name) . "-" . $id . ".mp4";

        // Téléchargement
        $output_dl = shell_exec($command_dl_mp4);
        echo "<pre>$output_dl</pre>";

        // Déplacement dans le répertoire musiques
        $output_move = shell_exec('mv *.mp4 videos/');

    ?>
    <!-- Génération du lien pour télécharger la musique -->
    <a href="./musiques/<?php echo $name ?>" download="<?php echo $name ?>">Télécharger la musique<a><br><br>

    <!-- Bouton pour retourner à la page d'acceuil -->
    <a href="./youtube-dl.php">Retour à l'acceuil<a>

    <?php
      }
    ?>
  </body>
</html>
