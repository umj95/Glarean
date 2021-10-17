<?php
    session_start();
    $pageLang = $_SESSION['lang'];
    include("../../includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
          <p>Inhalte folgen noch.</p>
        </div>
      </section>
    </div>
    <?php
      include("../../includes/de/footer.php");
    ?>