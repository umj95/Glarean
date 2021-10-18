<?php
  /*=========================
  This header contains the boilerplate header for all pages.
  Additionally, it contains global variables for php.
  =========================*/
    
  session_start();

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

  $commentaryOptions = array( 'editorsComments', 
                              'additionalComments');              // commentary options to offer

  $chapterOptions = array();                                      // load chapter options from GET -> into $chapterOptions -> also used extensively in chapter.php
  foreach($_GET as $key => $value) {
    $chapterOptions[$key] = $value;
  }

  $bibliography = file_get_contents("../data/site/sources.json");    // the bibliography as a json object
 
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
    <script type="text/javascript" src="/js/page_functions.js"></script>
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

      if(isset($_POST['lang'])) {                                 // reload page after language change
        $_SESSION['lang'] = $_POST['lang'];

        $pageLang = $_SESSION['lang'];
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: url=$page");
      }
    ?>
    <script type="text/javascript">
      pageLanguage = "<?php echo $pageLang; ?>";

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
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <button type="submit" name="lang" value="de">deutsch</button>
  </form>
  <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <button type="submit" name="lang" value="en">english</button>
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
</header>