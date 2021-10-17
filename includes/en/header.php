<?php
  /*=========================
  This header contains the boilerplate header for all pages.
  Additionally, it contains global variables for php.
  =========================*
    
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
  $languageList = array('_lat', '_deu');                          // the available languages for translations
  
  if($_SESSION['lang'] == "de") {                                 // expand the languages for labels etc. according to language variable
    $languages    = array( '_lat' => 'lateinisch',                  
                           '_deu' => 'deutsch');
  } elseif($_SESSION['lang'] == "en") {
    $languages    = array( '_lat' => 'Latin',
                           '_deu' => 'German');
  }
  
  $commentaryOptions = array('editorsComments', 'additionalComments');  // commentary options to offer

  $chapterOptions = array();                                      // load chapter options from GET -> into $chapterOptions -> also used extensively in chapter.php
  foreach($_GET as $key => $value) {
    $chapterOptions[$key] = $value;
  }

  $bibliography = file_get_contents('../../data/site/sources.json');    // the bibliography as a json object

  /* ----------------------------------------------------------------------------------------------------- */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ΔΟΔΕΚΑΧΟΡΔΟΝ</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="/css/glarean.css"/>
    <link rel="icon" type="image/ico" href="/favicon.ico">
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="/js/CETEI.js"></script>
    <!-- <script type="text/javascript" src="https://www.verovio.org/javascript/latest/verovio-toolkit-wasm.js" defer></script> -->
    <script type="text/javascript" src="/js/page_functions.js"></script>
    <!-- <script type="text/javascript" src="js/verovio_loader.js"></script> -->
    <?php 
      if(!isset($_SESSION['screen_height'])) {                    // check for screen dimensions but only on first load
        echo "
          <script>\n
            $(document).ready( function() {\n
                var height = $(window).height();\n
                var width = $(window).width();\n
                $.ajax({\n
                    url: '/includes/header.php',\n
                    type: 'post',\n
                    data: { 'width' : width, 'height' : height, 'recordSize' : 'true' },\n
                    success: function(response) {\n
                        $(\"body\").html(response);\n
                    }\n
                });\n
            });\n
          </script>\n";
      }
      if(isset($_POST['lang'])) {                                 // reload page after language change
        $_SESSION['lang'] = $_POST['lang'];

        $pageLang = $_SESSION['lang'];
        $domain = "localhost:8000";//$_SERVER['SERVER_NAME'];

        if($currentFile!= "index.php"){
          $page = "http://$domain/pages/$pageLang/$currentFile";
        } else {
          $page = $_SERVER['PHP_SELF'];
        }
        $sec = "10";
        header("Refresh: $sec; url=$page");
      }
    ?>
  </head>
  <body>
    <header id="header">
      <div id="container">
        <h1><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span></h1>
        <a href="javascript:void(0);" class="hamburger" onclick="topNavExpand()">&#x2630;</a>
        <nav id="topnav" class="main">
          <a href="/index.php">Home</a>
          <a href="/pages/<?php echo "$pageLang";?>/chapter_select.php">Chapters</a>
          <a href="/pages/<?php echo "$pageLang";?>/about.php">About</a>
          <a href="/pages/<?php echo "$pageLang";?>/edition.php">Edition Guidelines</a>
          <a href="/pages/<?php echo "$pageLang";?>/bibliography.php">Bibliography</a>
          <a href="/pages/<?php echo "$pageLang";?>/impressum.php">Impressum</a>
          <a href="/pages/<?php echo "$pageLang";?>/contact.php">Contact</a>
          <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <button type="submit" name="lang" value="de">Deutsch</button>
            <button type="submit" name="lang" value="en">English</button>
          </form>
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
      </script>
      <script type="text/javascript">
      bibliography = <?php echo $bibliography;?>
      </script>
    </header>
    