<?php 
  if($pageLang == 'de') {
    echo $GLOBALS['footerGerman'];
  } else if($pageLang == 'en') {
    echo $GLOBALS['footerEnglish'];
  } else {
    echo "Error: No Language Specified";
  }
?>
  </body>
</html>