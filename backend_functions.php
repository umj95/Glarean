<?php
    /* Parses page display options passed by GET values into an array, returns array */
    function parseGETintoChapterOptions(){
        $chapterOptions = array();
        foreach($_GET as $key => $value) {
        $chapterOptions[$key] = $value;
        }
        return $chapterOptions;
    }

    /* converts $chapterOptions into a String */
    function parseOptionstoString($chapterOptions) {
        $passOptions = "";
        foreach($chapterOptions as $key => $option) {
            $name = $key;
            if(is_array($option)) {
                $subOptionList = array();
                foreach($option as $subOption) {
                array_push($subOptionList, $subOption);
                }
                $value = json_encode($subOptionList);
                $passOptions .= $name . "=" . "$value" . "; ";
            } else {
                $value = "$option";
                $passOptions .= $name . "=" . "\"$value\"" . "; ";
            }
        }
        return $passOptions;
    }

    /* Constructs the options panel with the various parameters passed, echoes the panel
        $chapOpt    -> chapterOptions, the parameters passed via GET (to tick boxes of current selection)
        $comOpt     -> commentOptions, the predefined array of Comments (TODO: Empty comments lead to warnings!)
        $langLi     -> languageList, the list of possible translation languages
        $pageL      -> pageLang, the display language of the page
        $langs      -> languages the array defining the expansions of the languages (_deu -> "deutsch" or "German")
    */
    function constructSidePanel($chapOpt, $comOpt, $langLi, $pageL, $langs){

        $languageOptions = array();                               // filter the current main language from the available languages
        for($i = 0; $i < count($langLi); $i++) {                  // global serverside variables such as $langLi are declared in header.php
          if($langLi[$i] != $chapOpt['mainLanguage']) {
            $languageOptions[$i] = $langLi[$i];
          }
        }

        echo '
        <button id="optionsButton" class="panel" onclick="openPanel(\'optionsPanel\')">&#9658;</button>
        <div id="optionsPanel" class="panel">
          <!-- <div id="closer">
            <a href="javascript:void(0)" class="closebtn" onclick="closePanel(\'optionsPanel\')">&times;</a>
          </div> -->
          <div id="content">
            <form method="POST">
              <fieldset>
                <!-- languages: options as previously defined in $languageOptions -->
                <legend><h2>';
                if($pageL == 'de'){echo "Übersetzungen";} else {echo "Translations";}
                echo '</h2></legend>
                <div class="control">';
                    $i = 0;
                    foreach($languageOptions as $language) {
                      echo "<label for=\"transl$language\">";
                      if($language == '_lat') {
                        if($pageL == 'de'){echo "Original auf " . $langs[$language] . " anbieten"; } else {echo "Offer original in " . $langs[$language];}
                      } else {
                        if($pageL == 'de'){echo "Übersetzung auf " . $langs[$language] . " anbieten"; } else {echo "Offer translation in " . $langs[$language];}
                      }
                      echo    "</label>\n"
                            . "<input id=\"transl$language\" type=\"checkbox\" name=\"secondaryLanguages[]\" value=\"$language\"";
                      if(in_array($language, $chapOpt['secondaryLanguages'])) {
                        echo  " checked ";
                      }
                      echo    "/><br/>\n";
                      $i++;
                    }
                echo '
                </div>
              </fieldset>
              <fieldset>
                <!-- Offer marginalia -->
                <legend><h2>';
                if($pageL == 'de'){echo "Anmerkungen";} else {echo "Annotations";}
                echo '</h2></legend>                     
                <div class="control">
                  <label for="margins">';
                if($pageL == 'de'){echo "Anmerkungen anzeigen";} else {echo "Show annotations";}
                echo '</label>';
                  echo    '<input id="margins" type="checkbox" name="marginalia" value="true"';
                  if($chapOpt['marginalia'] == 'true'){
                    echo  ' checked ';
                  }
                  echo    "/>\n
                </div>
              </fieldset>
              <fieldset>
                <!-- Offer commentary: available options are listed in comOpt (header.php) -->
                <legend><h2>";
                if($pageL == 'de'){echo "Kommentare";} else {echo "Commentary";}
                echo '</h2></legend>                      
                <div class="control">';
                  if (is_array($comOpt) || is_object($comOpt)) {
                    foreach($comOpt as $commentary) {
                      echo "<label for=\"$commentary\">";
                      if($commentary == "editorsComments") {
                        if($pageL == 'de'){echo "Kommentare der Herausgeber anbieten"; } else {echo "Offer editors’ comments";}
                      } else if($commentary == "additionalComments") {
                        if($pageL == 'de'){echo "Weitere Kommentare anbieten"; } else {echo "Offer further commentary";}
                      }
                      echo  "</label>\n"
                          ."<input id=\"$commentary\" type=\"checkbox\" name=\"comments[]\" value=\"$commentary\"";
                      if(in_array($commentary, $chapOpt['comments'])){
                        echo  ' checked ';
                      }
                      echo    "/><br/>\n";
                    }
                  }
                echo '</div>
              </fieldset>
              <!-- Submit selection -->
              <label for="margins">';
              if($pageL == 'de'){echo "Änderungen abschicken";} else {echo "Submit Changes";}
              echo '</label>           
              <input type="submit" name="submit" value="submit"/>
            </form>
            <p><a href="https://raw.githubusercontent.com/umj95/Glarean_Dodekachordon_Text/main/data/';
              $thisBook = $chapOpt['currentBook'];
              $thisChapter = $chapOpt['currentChapter'];
              $thisLanguage = $chapOpt['mainLanguage'];
              echo "$thisBook/$thisChapter/$thisBook"."_"."$thisChapter"."$thisLanguage.xml\"";
              echo " download>";
              if($pageL == 'de'){echo "Dieses Kapitel als TEI-Datei herunterladen";} else {echo "Download this chapter as a TEI file";}
              echo "</a></p>
          </div>
        </div>";
    }

    /* trigger form prossessing and page reload only after SUBMIT in the options panel is pressed */
    function RefreshURL($chapOp){
            unset($_POST['submit']);
            $custom = "&";                                        // $custom contains all values selectable via the form
            if($_POST['secondaryLanguages']) {                    // languages
            for($i = 0; $i < count($_POST['secondaryLanguages']); $i++) {
                $custom .= "secondaryLanguages[]=";
                $custom .= $_POST['secondaryLanguages'][$i];
                $custom .= "&";
            }
            }
            if($_POST['marginalia']) {                            // marginalia
            $custom .= "marginalia=true&";
            } else {$custom .= "marginalia=false&";}
            if($_POST['comments']) {
            for($i = 0; $i < count($_POST['comments']); $i++) {   // comments
                $custom .= "comments[]=" . $_POST['comments'][$i] . "&";
            }
            }
            $url = "<meta http-equiv=\"refresh\" content=\"0;url=chapter.php?currentBook=".$chapOp['currentBook']."&currentChapter=".$chapOp['currentChapter']."&mainLanguage=".$chapOp['mainLanguage'].$custom."\" />";
            echo $url;
        }

    function getVisIpAddr() {
    
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
?>