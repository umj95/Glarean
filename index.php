<?php
session_start();
    $currentFile = basename(__FILE__);

    include("backend_functions.php");
    include("static_texts.php");
    include("includes/header.php");
  ?>
    <div class="chapter">
      <section id="body-text" class="body-text">
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
        <script type="text/javascript">
          window.onhashchange = function () {
            window.onload
            let hash = window.location.hash;
            if(hash == "#tutorial") {
              constructTip(0);
            }
          };
        </script>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>