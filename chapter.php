<?php
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
  
  $chapterOptions = array();
  foreach($_GET as $key => $value) {
    $chapterOptions[$key] = $value;
  }

  include("includes/header.php");
  include("includes/sidepanel.php");
?>
  <script><?php echo parseOptionsToString($chapterOptions);?></script>
  <div class="chapter">
    <section class="body-text">
        <div id="fulltext" class="text">
          <script>insertTEIChapter()</script>
        </div>
    </section>
    <div id="noteArea" class="notes">
    </div>
  </div>
<?php
  include("includes/footer.php");
?>