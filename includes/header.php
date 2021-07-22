<?php
  /*=========================
  This header contains the boilerplate header for all pages.
  Additionally, it contains global variables for php.
  =========================*/
  session_start();
  if(isset($_POST['recordSize'])) {                               // check for screen dimensions
    $height = $_POST['height'];
    $width = $_POST['width'];
    $_SESSION['screen_height'] = $height;
    $_SESSION['screen_width'] = $width;
  }
    
  function parseOptionstoString($chapterOptions) {                // converts $chapterOptions into a String
    $passOptions = "";
    foreach($chapterOptions as $key => $option) {
      $name = $key;
      if(is_array($option)) {
        $subOptionList = array();
        foreach($option as $subOption) {
          array_push($subOptionList, $subOption);
        }
        $value = json_encode($subOptionList);
        $passOptions .= $name . "=" . "$value" . "; ";
      } else {
        $value = "$option";
        $passOptions .= $name . "=" . "\"$value\"" . "; ";
      }
    }
    return $passOptions;
  }


  /* --------------------------------------------------------------  Global Variables  ------------------- */
  $languageList = array('_lat', '_deu');                  // the available languages for translations
  
  $languages    = array( '_lat' => 'lateinisch',                  // expand the languages for labels etc.
                         '_deu' => 'deutsch');

  $commentaryOptions = array('editorsComments', 'additionalComments');  // commentary options to offer

  $chapterOptions = array();                                      // load chapter options from GET -> into $chapterOptions -> also used extensively in chapter.php
  foreach($_GET as $key => $value) {
    $chapterOptions[$key] = $value;
  }

  $bibliography = file_get_contents('data/site/sources.json');   // the bibliography as a json object

  /* ----------------------------------------------------------------------------------------------------- */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ΔΟΔΕΚΑΧΟΡΔΟΝ</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="css/glarean.css"/>
    <link rel="icon" type="image/ico" href="favicon.ico">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/CETEI.js"></script>
    <!-- <script type="text/javascript" src="https://www.verovio.org/javascript/latest/verovio-toolkit-wasm.js" defer></script> -->
    <script type="text/javascript" src="js/page_functions.js"></script>
    <!-- <script type="text/javascript" src="js/verovio_loader.js"></script> -->
    <?php 
      if(!isset($_SESSION['screen_height'])) {                    // check for screen dimensions but only on first load
        echo "
          <script>\n
            $(document).ready( function() {\n
                var height = $(window).height();\n
                var width = $(window).width();\n
                $.ajax({\n
                    url: 'includes/header.php',\n
                    type: 'post',\n
                    data: { 'width' : width, 'height' : height, 'recordSize' : 'true' },\n
                    success: function(response) {\n
                        $(\"body\").html(response);\n
                    }\n
                });\n
            });\n
          </script>\n";
      }
    ?>
  </head>
  <body>
    <header id="header">
      <div id="container">
        <h1><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span></h1>
        <a href="javascript:void(0);" class="hamburger" onclick="topNavExpand()">&#x2630;</a>
        <nav id="topnav" class="main">
          <a href="index.php">Home</a>
          <a href="chapter_select.php">Kapitel</a>
          <a href="about.php">Über dieses Projekt</a>
          <a href="edition.php">Editionsrichtlinien</a>
          <a href="bibliography.php">Bibliographie</a>
          <a href="impressum.php">Impressum</a>
          <a href="contact.php">Kontakt</a>
        </nav>
      </div>
      <script type="text/javascript"> 
        let prevScrollpos = window.pageYOffset;                    // make header disappear on scroll
        window.onscroll = function() {
          let currentScrollPos = window.pageYOffset;
          if (prevScrollpos > currentScrollPos) {
            document.getElementById("header").style.top = "0";
          } else {
            document.getElementById("header").style.top = "-0.8in";
          }
          prevScrollpos = currentScrollPos;
        }

        bibliography = <?php echo $bibliography;?>
      </script>
    </header>
    