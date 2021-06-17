<?php
  //load chapter options from GET
  $chapterOptions = array();
  foreach($_GET as $key => $value) {
    $chapterOptions[$key] = $value; 
  }
  //filter the current main language from the available languages
  $languageOptions = array();
  for($i = 0; $i < count($languageList); $i++) {
    if($languageList[$i] != $chapterOptions['mainLanguage']) {
      $languageOptions[$i] = $languageList[$i];
    }
  }
  // commentary options to offer
  $commentaryOptions   = array('editorsComments', 'additionalComments');

?>
<button class="panel" onclick="openPanel('optionsPanel')"></button>
<div id="optionsPanel" class="panel">
  <div id="closer">
    <a href="javascript:void(0)" class="closebtn" onclick="closePanel('optionsPanel')">&times;</a>
  </div>
  <div id="content">
    <form method="POST">
      <fieldset>
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
        <legend><h2>Marginalien</h2></legend>
        <div class="control">
          <label for="margins">Marginalien anzeigen</label>
          <?php
          echo    '<input id="margins" type="checkbox" name="marginalia" value="true"';
          if($chapterOptions['marginalia']){
            echo  ' checked ';
          }
          echo    "/>\n";
          ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><h2>Kommentare</h2></legend>
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
      <label for="margins">Änderungen vornehmen</label>
      <input type="submit" name="submit" value="submit"/>
    </form>
  </div>
</div>
<?php
  if(isset($_POST['submit'])){
    unset($_POST['submit']);
    $custom = "&";
    if($_POST['secondaryLanguages']) {
      for($i = 0; $i < count($_POST['secondaryLanguages']); $i++) {
        $custom .= "secondaryLanguages[]=";
        $custom .= $_POST['secondaryLanguages'][$i];
        $custom .= "&";
      }
    }
    if($_POST['marginalia']) {
      $custom .= "marginalia=true&";
    }
    if($_POST['comments']) {
      for($i = 0; $i < count($_POST['comments']); $i++) {
        $custom .= "comments[]=" . $_POST['comments'][$i] . "&";
      }
    }    
    $url = "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentChapter=".$chapterOptions['currentChapter']."&mainLanguage=".$chapterOptions['mainLanguage'].$custom."\" />";
    echo $url;
  }
?>