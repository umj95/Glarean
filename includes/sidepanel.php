<?php
  /*=========================
  This included section allows for the customisation of the selected chapter text, with things like translations and commentary.
  Pre-existant selections, such as the current chapter, are retrieved from GET. Once the Submit button is pressed, all selections are transported via GET
  and the page gets reloaded.
  =========================*/
  $languageOptions = array();                                     // filter the current main language from the available languages
  for($i = 0; $i < count($languageList); $i++) {                  // global serverside variables such as $languageList are declared in header.php
    if($languageList[$i] != $chapterOptions['mainLanguage']) {
      $languageOptions[$i] = $languageList[$i];
    }
  }
?>
<button class="panel" onclick="openPanel('optionsPanel')"></button>
<div id="optionsPanel" class="panel">
  <div id="closer">
    <a href="javascript:void(0)" class="closebtn" onclick="closePanel('optionsPanel')">&times;</a>
  </div>
  <div id="content">
    <form method="POST">
      <fieldset>                                                  <!-- languages: options as previously defined in $languageOptions -->
        <legend><h2>Übersetzungen</h2></legend>
        <div class="control">
          <?php
            $i = 0;
            foreach($languageOptions as $language) {
              echo "<label for=\"transl$language\">";
              if($language == '_lat') {
                echo "Original auf " . $languages[$language] . " anbieten";
              } else {
                echo "Übersetzung auf " . $languages[$language] . " anbieten";
              }
              echo    "</label>\n"
                    . "<input id=\"transl$language\" type=\"checkbox\" name=\"secondaryLanguages[]\" value=\"$language\"";
              if(in_array($language, $chapterOptions['secondaryLanguages'])) {
                echo  "checked ";
              }
              echo    "/><br/>\n";
              $i++;
            }
          ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><h2>Annotationen</h2></legend>                     <!-- Offer marginalia -->
        <div class="control">
          <label for="margins">Annotationen anzeigen</label>
          <?php
          echo    '<input id="margins" type="checkbox" name="marginalia" value="true"';
          if($chapterOptions['marginalia'] == 'true'){
            echo  ' checked ';
          }
          echo    "/>\n";
          ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><h2>Kommentare</h2></legend>                      <!-- Offer commentary: available options are listed in $commentaryOptions (header.php) -->
        <div class="control">
          <?php
          if (is_array($commentaryOptions) || is_object($commentaryOptions)) {
            foreach($commentaryOptions as $commentary) {
              echo "<label for=\"$commentary\">";
              if($commentary == "editorsComments") {
                echo "Kommentare der Herausgeber anbieten";
              } else if($commentary == "additionalComments") {
                echo "Weitere Kommentare anbieten";
              }
              echo  "</label>\n"
                  ."<input id=\"$commentary\" type=\"checkbox\" name=\"comments[]\" value=\"$commentary\"";
              if(in_array($commentary, $chapterOptions['comments'])){
                echo  ' checked ';
              }
              echo    "/><br/>\n";
            }
          }
          ?>
          
        </div>
      </fieldset>
      <label for="margins">Änderungen vornehmen</label>           <!-- Submit selection -->
      <input type="submit" name="submit" value="submit"/>
    </form>
    <p><a href="<?php 
      $thisBook = $chapterOptions['currentBook'];
      $thisChapter = $chapterOptions['currentChapter'];
      $thisLanguage = $chapterOptions['mainLanguage'];
      echo "/data/chapters/";
      echo "$thisBook/$thisChapter/$thisBook"."_"."$thisChapter"."$thisLanguage.xml";
    ?>" download>Dieses Kapitel als TEI-Datei Herunterladen</a></p>
  </div>
</div>
<?php
  if(isset($_POST['submit'])){                                    // trigger form prossessing and page reload only after SUBMIT is pressed
    unset($_POST['submit']);
    $custom = "&";                                                // $custom contains all values selectable via the form
    if($_POST['secondaryLanguages']) {                            // languages
      for($i = 0; $i < count($_POST['secondaryLanguages']); $i++) {
        $custom .= "secondaryLanguages[]=";
        $custom .= $_POST['secondaryLanguages'][$i];
        $custom .= "&";
      }
    }
    if($_POST['marginalia']) {                                    // marginalia
      $custom .= "marginalia=true&";
    } else {$custom .= "marginalia=false&";}
    if($_POST['comments']) {
      for($i = 0; $i < count($_POST['comments']); $i++) {         // comments
        $custom .= "comments[]=" . $_POST['comments'][$i] . "&";
      }
    }
    $url = "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentChapter=".$chapterOptions['currentChapter']."&mainLanguage=".$chapterOptions['mainLanguage'].$custom."\" />";
    echo $url;
  }
?>
<!-- Commit comment -->