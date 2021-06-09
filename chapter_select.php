<?php
  if(isset($_GET['3_Symph_lat'])) {
    $currentChapter = "3_Symph";
    $mainLanguage = "_lat";
    echo  "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php".
          "?currentChapter=$currentChapter&mainLanguage=$mainLanguage\" />";
  }
  if(isset($_GET['3_Symph_deu'])) {
    $currentChapter = "3_Symph";
    $mainLanguage = "_deu";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentChapter=$currentChapter&mainLanguage=$mainLanguage\" />";
  }
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
            <li><emph>De Symphonetarum Ingenio</emph><br/>
              <form method="GET">
                <input type="submit" name="3_Symph_lat"
                value="Dieses Kapitel auf Latein lesen"/>
                <input type="submit" name="3_Symph_deu"
                value="Dieses Kapitel auf Deutsch lesen"/>
              </form>
            </li>
          </ul>
          </div>
        </div>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>