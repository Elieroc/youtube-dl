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
      if (!isset($_GET['link'])) {
    ?>

    <img src="ressources/yt-logo.png" style="width:100px;height:100px;">

    <h1>Youtube MP3 Downloader</h1>

      <form method="get" action="youtube-dl.php">

        <!-- Input lien -->
        <input class="input" type="text" placeholder="Coller le lien" name="link"/>

        <!-- Choix du format mp3/mp4 -->

          <select name="choix">
            <option value="mp3">MP3</option>
            <option value="mp4">MP4</option>
          </select>

        <!-- Bouton "GO" -->
        <div class="container">
          <button class="btn button" type="submit">GO</button>
        </div>

      </form>

    <?php
      }

      // Sinon, si le lien est indiqué et en MP3 alors :
      elseif ($_GET['choix'] == 'mp3') {

        $mp3_redirect_link = "Location: mp3.php?link=" . $_GET['link'];

        header($mp3_redirect_link);

      }
      // Sinon c'est du mp4
      else {

        $mp4_redirect_link = "Location: mp4.php?link=" . $_GET['link'];
        header($mp4_redirect_link);

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
