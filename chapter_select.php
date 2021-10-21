<?php
  $currentFile = basename(__FILE__);
  session_start();
  $pageLang = $_SESSION['lang'];
  include("backend_functions.php");
  include("static_texts.php");
  include("includes/header.php");
  if($pageLang == 'de') {
    echo $chapterSelectTextGerman;
  } else if($pageLang == 'en') {
    echo $chapterSelectTextEnglish;
  } else {
    echo "Error: No language specified.";
  }
  echo '<script type="text/javascript">
  let hash = window.location.hash;
  if(hash == "#tutorial") {
    constructTip(3);
  }
  </script>';
  include("includes/footer.php");
?>