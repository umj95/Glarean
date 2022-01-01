<?php
  $currentFile = basename(__FILE__);
  session_start();
  $pageLang = $_SESSION['lang'];
  include("backend_functions.php");
  include("static_texts.php");
  include("includes/header.php");
  if($pageLang == 'de') {
    echo $editionGuidelinesGerman;
  } else if($pageLang == 'en') {
    echo $editionGuidelinesEnglish;
  } else {
    echo "Error: No language specified!";
  }
  include("includes/footer.php");
?>