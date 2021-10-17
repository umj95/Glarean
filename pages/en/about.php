<?php
    $currentFile = basename(__FILE__);
    session_start();
    $pageLang = $_SESSION['lang'];
    include("../../includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
          <p>Content to follow.</p>
        </div>
      </section>
    </div>
    <?php
      include("../../includes/$pageLang/footer.php");
    ?>