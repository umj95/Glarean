<?php
  include("includes/header.php");
?>
  <div class="chapter">
    <section class="body-text">
      <div id="fulltext" class="text">
        <?php
          include "vendor/autoload.php";
          use Seboettg\CiteProc\StyleSheet;
          use Seboettg\CiteProc\CiteProc;
          
          $data = file_get_contents("data/site/sources.json");
          $style = StyleSheet::loadStyleSheet("din-1505-2");
          $citeProc = new CiteProc($style);
          echo $citeProc->render(json_decode($data), "bibliography");
        ?>
      </div>
    </section>
  </div>
<?php
  include("includes/footer.php");
?>