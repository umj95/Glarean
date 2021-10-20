<?php
  $currentFile = basename(__FILE__);
  session_start();
  $pageLang = $_SESSION['lang'];
  include("backend_functions");
  include("static_texts.php");
  include("includes/header.php");
?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
        <?php
          include("data/site/editionsrichtlinien.php");
        ?>
        </div>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>