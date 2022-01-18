<?php
session_start();

  /*=========================
  This header contains the boilerplate header for all pages.
  Additionally, it contains global variables for php.
  =========================*/ 

/* --------------------------------------------------------------  Global Variables  ------------------- */

  if(isset($_POST['recordSize'])) {                               // check for screen dimensions
    $height = $_POST['height'];
    $width = $_POST['width'];
    $_SESSION['screen_height'] = $height;
    $_SESSION['screen_width'] = $width;
  }

  /* Geolocation processing follows this tutorial: 
  https://www.geeksforgeeks.org/how-to-get-visitors-country-from-their-ip-in-php/ */
  
  if(!isset($_SESSION['lang'])){
    $ip = getVisIpAddr();                                           // get user's IP for language setting

    $ipdat = @json_decode(file_get_contents(                        // get country from IP with https://www.geoplugin.com API
      "http://www.geoplugin.net/json.gp?ip=" . $ip));

    $visitorCountry = $ipdat->geoplugin_countryName;

    if($visitorCountry == 'Germany' || $visitorCountry == 'Austria') {
      $_SESSION['lang'] = "de";
    } else {
      $_SESSION['lang'] = "en";
    }
  }

  $pageLang = $_SESSION['lang'];

  if(isset($_POST['lang'])) {                                     // reload page after language change
    $_SESSION['lang'] = $_POST['lang'];

    $pageLang = $_SESSION['lang'];
    $page = $_SERVER['PHP_SELF'];
    header("Refresh: url=$page");
  }
 
  $languageList = array('_lat', '_deu');                          // the available languages for translations
  
  if($_SESSION['lang'] == "de") {                                 // expand the languages for labels etc. according to language variable
    $languages    = array( '_lat' => 'lateinisch',
                           '_deu' => 'deutsch');
  } elseif($_SESSION['lang'] == "en") {
    $languages    = array( '_lat' => 'Latin',
                           '_deu' => 'German');
  }

  $commentaryOptions = array( 'editorsComments', 
                              'additionalComments');              // commentary options to offer

  $chapterOptions = parseGETintoChapterOptions();

  $bibliography = file_get_contents("data/site/sources.json");    // the bibliography as a json object
 
/* ----------------------------------------------------------------------------------------------------- */
?>
<!DOCTYPE html>
<html lang="<?php echo $pageLang;?>">
  <head>
    <meta charset="UTF-8">
    <title>ΔΟΔΕΚΑΧΟΡΔΟΝ</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description"/
          content="A digital edition of excerpts from Heinrich Glarean's Dodekachordon
                   with translations into German, as well as commentary and musical examples"/>
    <meta name="keywords"
          content="Glarean, Dodekachordon, Digital Edition, Musicology, Music Theory, Music History"/>
    <meta name="author"
          content="Janosch Umbreit"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/glarean.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet"> 
    <link rel="icon" type="image/ico" href="favicon.ico">
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/CETEI.js"></script>
    <script type="text/javascript" src="js/page_functions.js"></script>
    <?php 
    
      /* if(!isset($_SESSION['screen_height'])) {                    // check for screen dimensions but only on first load
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
      } */
    ?>
    <script type="text/javascript">
      pageLanguage = "<?php echo $pageLang; ?>";                  // pass page language choice to JS

      if(pageLanguage != 'de') {
        languages['_lat'] = "Latin";
        languages['_deu'] = "German";
        languages['_eng'] = "English";
      }

      bibliography = <?php echo $bibliography;?>;
    </script>
  </head>
  <body>
    <?php if($pageLang == 'de') {
      echo $GLOBALS['headerGerman'];
    } else if($pageLang == 'en') {
      echo $GLOBALS['headerEnglish'];
    } else {
      echo "Error: No language specified. SessionLang = $pageLang\n";
    }
    ?>
<div id="languages">
      <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <button class="languageSwitcher" type="submit" name="lang" value="de">🇩🇪</button>
      </form>
      <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <button class="languageSwitcher" type="submit" name="lang" value="en">🇬🇧</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"> 
  scrollSensitiveHeader();
</script>
</header>
