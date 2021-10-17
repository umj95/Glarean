<?php
    $currentFile = basename(__FILE__);
    session_start();
    $pageLang = $_SESSION['lang'];
    include("../../includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
          <h2>Contact</h2>
          <p>This project is being hosted <a href="https://www.github.com/umj95/Glarean" rel="noopener" target="_blank">here</a> on Github. If you notice any errors, have comments, or feedback, please open an <a href="https://docs.github.com/en/issues/tracking-your-work-with-issues/creating-an-issue" rel="noopener" target="_blank">issue</a> there.</p>
        </div>
      </section>
    </div>
    <?php
      include("../../includes/$pageLang/footer.php");
    ?>