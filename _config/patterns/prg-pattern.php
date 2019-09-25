<?php
function prgRedirect() {
   // TODO: change to final URL
   $location = "https://dreiqbik.de/";
   if (!empty($_POST['prg-data'])) {
      $url = base64_decode($_POST['prg-data']);
      if (strstr($url, $location) !== false) {
         $location = $url;
      } else if (strstr($_SERVER['HTTP_REFERER'], $location) !== false) {
         $location = $_SERVER['HTTP_REFERER'];
      }
   }
   header("Location: " . $location, true, 302);
   exit();
}
prgRedirect();
