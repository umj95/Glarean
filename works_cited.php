
<?php
  include("includes/header.php");
?>
  <div class="chapter">
    <section class="body-text">
      <div id="fulltext" class="text">
        <h2>Bibliographie</h2>
        <p>Diese Literaturliste Herunterladen:<br/>
        <a href="javascript:void(0)" onclick="printBibliography('pdf')">pdf</a> · 
        <a href="javascript:void(0)" onclick="printBibliography('csl')">csl-json</a> · 
        <a href="javascript:void(0)" onclick="printBibliography('tex')">bibtex</a> · 
        <a href="javascript:void(0)" onclick="printBibliography('txt')">txt</a></p>
        <div id="bibliography" class="bibliography"></div>
        <script src="js/citation.js" type="text/javascript"></script>
        <script>
          getBibliography()
          .then(result => result.json())
          .then((bibliography) => {
            
            const Cite = require('citation-js');
            let example = new Cite(bibliography);
            let output = example.format('bibliography', {
              format: 'html',
              template: 'apa',
              lang: 'en-US'
            });
            let bibList = document.getElementById("bibliography");
            bibList.innerHTML = output;
          });
        </script>
      </div>
    </section>
  </div>
<?php
  include("includes/footer.php");
?>