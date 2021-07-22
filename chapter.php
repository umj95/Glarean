<?php
  /*=========================
  This file takes the $chapterOptions colleted from $_GET in header.php and builds the chapter accordingly,
  using one CETEI object for the main text and one for the translations, both with their specific behaviors
  =========================*/
  include("includes/header.php");
  include("includes/sidepanel.php");

  $optionsToJSON = json_encode($chapterOptions);                  // $chapterOptions (assocArray collected from GET requests in sidepanel.php) 
                                                                  // is put into a JSON-Object for further use by Javascript
?>
  <script type="text/javascript" src="https://www.verovio.org/javascript/latest/verovio-toolkit-wasm.js" defer></script>
  <script type="text/javascript" src="js/verovio_loader.js"></script>
  <script>
    var chapterOptions = <?php echo $optionsToJSON;?>;            // extract chapter variables -> fill the global variables specified in js/page-functions
    mainLanguage = chapterOptions.mainLanguage;
    currentBook = chapterOptions.currentBook;
    currentChapter = chapterOptions.currentChapter;
    secondaryLanguages = chapterOptions.secondaryLanguages;
    marginalia = chapterOptions.marginalia;
    //commentaryOptions = chapterOptions.comments;

    optionalBehaviors(chapterOptions);                            // Load custom TEI behaviors
            
    d.addBehaviors(translTextBehaviors);                          // add behaviors to the translation text object

    c.addBehaviors(fullTextBehaviors);                            // add behaviors to the main language text object

    //getBibliography().then(result => bibliography = result);

  </script>
  <div class="chapter">
    <section id="body-text" class="body-text">
      <div id="fulltext" class="text">
        <script>insertTEIChapter()</script>                       <!-- insert the TEI document -->
      </div>
    </section>
    <button name="comments" class="panel" id="notesButton" onclick="openPanel('notesPanel')"></button>
    <div id="noteArea" class="panel">
      <div id="closer">
        <a href="javascript:void(0)" class="closebtn" onclick="closePanel('notesPanel')">&times;</a>
      </div>
      <div id="notesContent">
      </div>
    </div>
    <script>
    window.addEventListener("load", function() {                  // notes and Music are added after main text has loaded
      if(chapterOptions.comments) {                               // load selected commentaries AFTER the TEI document has been loaded
        for(let i in chapterOptions.comments) {                   // every set of commentary is inserted iteratively
          insertComments(chapterOptions.comments[i]);
        }
      }

      if(this.document.getElementsByClassName("music").length > 0) {  // if chapter has music examples, call verovio
        addVerovio();
      }
    });
    </script>
  </div>
<?php
  include("includes/footer.php");
?>