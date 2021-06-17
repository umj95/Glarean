<?php
  include("includes/header.php");
  include("includes/sidepanel.php");

  $optionsToJSON = json_encode($chapterOptions);
?>
  <script>
    var chapterOptions = <?php echo $optionsToJSON;?>;  // extract custom behaviors
    mainLanguage = chapterOptions.mainLanguage;
    currentChapter = chapterOptions.currentChapter;
    secondaryLanguages = chapterOptions.secondaryLanguages;
    marginalia = chapterOptions.marginalia;
    //commentaryOptions = chapterOptions.comments;
    
  optionalBehaviors(chapterOptions);                    // Load custom TEI behaviors
          
  var c = new CETEI();                                  // the primary CETEIcean object
          
  var d = new CETEI();                                  // the secondary CETEIcean object (for translations)
          
  d.addBehaviors(translTextBehaviors);                  // add behaviors to CETEIcean instances

  c.addBehaviors(fullTextBehaviors);

  </script>
  <div class="chapter">
    <section id="body-text" class="body-text">
      <div id="fulltext" class="text">
        <script>insertTEIChapter()</script>
      </div>
    </section>
    <button class="panel" id="notesButton" onclick="openPanel('notesPanel')"></button>
    <div id="noteArea" class="panel">
      <div id="closer">
        <a href="javascript:void(0)" class="closebtn" onclick="closePanel('notesPanel')">&times;</a>
      </div>
      <div id="notesContent">
      </div>
    </div>
    <script>
    window.addEventListener("load", function() { 
      if(chapterOptions.comments) {
        for(let i in chapterOptions.comments) {
          insertComments(chapterOptions.comments[i]);
        }
        }
      })
    </script>
  </div>
<?php
  include("includes/footer.php");
?>