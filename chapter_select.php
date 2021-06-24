<?php
  /*=========================
  This page offers the available chapters in their available languages.
  It loads the chapter.php file with the appropriate $_GET variables upon submission
  =========================*/
  /*if(isset($_GET['3_Symph_lat'])) {
    $currentChapter = "3_Symph";
    $mainLanguage = "_lat";
    echo  "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php".
          "?currentChapter=$currentChapter&mainLanguage=$mainLanguage\" />";
  }
  if(isset($_GET['3_Symph_deu'])) {
    $currentChapter = "3_Symph";
    $mainLanguage = "_deu";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentChapter=$currentChapter&mainLanguage=$mainLanguage\" />";
  }*/
?>
  <?php
    include("includes/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
          <div id="fulltext" class="text">
          <h2>Kapitel</h2>
          <p>Bitte wählen Sie hier Kapitel und Sprache aus. Sie können auch innerhalb eines Kapitels Passagen in der Übersetzung / im Original lesen.</p>
          <p>Bisher wurde das folgende Kapitel aufbereitet:</p>
          <ul>
            <li><em>De Symphonetarum Ingenio</em> · <span class="tooltip"><a href="chapter.php?currentChapter=3_Symph&mainLanguage=_lat">LAT</a><span class="tiptext">Dieses Kapitel auf lateinisch Lesen</span></span> · <span class="tooltip"><a href="chapter.php?currentChapter=3_Symph&mainLanguage=_deu">DEU</a><span class="tiptext">Dieses Kapitel auf deutsch lesen</span></span></li>
          </ul>
          </div>
        </div>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>