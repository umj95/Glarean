  <?php
    $currentFile = basename(__FILE__);
    session_start();
    if(isset($_POST['recordSize'])) {                               // check for screen dimensions
      $height = $_POST['height'];
      $width = $_POST['width'];
      $_SESSION['screen_height'] = $height;
      $_SESSION['screen_width'] = $width;
    }
  
    if(!isset($_SESSION['lang'])){
      $_SESSION['lang'] = "de";
    }                                       // set the initial page language
    $pageLang = $_SESSION['lang'];

    include("static_texts.php");
    include("includes/header.php");

    echo $pageLang;
  ?>
    <div class="chapter">
      <section class="body-text">
          <div id="fulltext" class="text">
            <?php
            if($_SESSION['lang'] == "de") {
            echo $homeTextGerman;
            } else if($_SESSION['lang'] == "en") {
              echo $homeTextEnglish;
            }
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>