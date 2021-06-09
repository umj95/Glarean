<?php
  $currentChapter = $_GET['currentChapter'];

  //check what language was chosen and set the corresponding variables
  $mainLanguage = $_GET['mainLanguage'];
  $languageOptions = array();
  for($i = 0; $i < count($languageList); $i++) {
    if($languageList[$i] != $mainLanguage) {
      $languageOptions[$i] = $languageList[$i];
    }
  }

  //load options
  $chapterOptions = array();
  //$chapterOptions['secondaryLanguages'] = array();
  //$chapterOptions['comments'] = array();
  foreach($_GET as $key => $value) {
    /*if(substr($key, 0, 6) == "transl") {
      array_push($chapterOptions['secondaryLanguages'], $value);
    }
    elseif(substr($key, 0, 8) == "comments") {
      array_push($chapterOptions['comments'], $value);
    }*/
    $chapterOptions[$key] = $value; 
  }
?>
<button class="leftpanel" onclick="openNav()">ᐳ</button>
<div id="leftpanel" class="leftpanel">
  <div id="closer">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
                    . "<input id=\"transl$language\" type=\"checkbox\" name=\"secondaryLanguages[]\" value=\"$language\"/>\n";
              $i++;
            }
          ?>
        </div>
      </fieldset>
      <fieldset>
        <legend><h2>Marginalien</h2></legend>
        <div class="control">
          <label for="margins">Marginalien anzeigen</label>
          <input id="margins" type="radio" name="marginalia" value="true"/>
        </div>
      </fieldset>
      <fieldset>
        <legend><h2>Kommentare</h2></legend>
        <div class="control">
          <label for="comments">Kommentarfunktion anbieten</label>
          <input id="comments" type="checkbox" name="comments[]" value="editorsNotes"/>
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
    $url = "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentChapter=".$currentChapter."&mainLanguage=".$mainLanguage.$custom."\" />";
    echo $url;
  }
?>