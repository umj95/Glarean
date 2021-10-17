<?php
    $currentFile = basename(__FILE__);
    session_start();
    $pageLang = $_SESSION['lang'];
    include("../../includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
          <h2>Impressum</h2>
          <p>Even in its infancy, it is evident that this project would never have been possible without a number of wonderful ressources:</p> 
          <p>Technically, the text is based on the TEI standard as published by the <a href="https://tei-c.org/"  rel="noopener" target="_blank">Text Encoding Initiative</a>. The presentation of the texts in the browser is made possible with the help of the <a href="https://github.com/TEIC/CETEIcean" target="_blank" rel="noopener">CETEIcean library</a>. The musical examples are encoded according to the <a href="https://music-encoding.org/" target="_blank" rel="noopener">MEI standard</a> and are rendered with the help of <a href="https://www.verovio.org/" target="_blank" rel="noopener">Verovio</a>. The processing of the bibliographic data happens thanks to the <a href="https://citation.js.org" rel="noopener" target="_blank">Citation.js library</a>.</p>
          <p>The Latin texts are based on the edition by the <a href="https://chmtl.indiana.edu/tml/16th/GLADOD1" target="_blank" rel="noopener">Thesaurus Musicarum Latinarum</a>. The German translation (which is intended only as a demonstration) was created by me with the help of Miller’s English translation.</p>
          <p>The project is being hosted by the Regensburg university. the fonts used are <emph>Crimson Text</emph>, developed by <a href="https://github.com/skosch/Crimson" target="_blank" rel="noopener">Sebastian Kosch</a> for the texts of the edition, <a href="https://software.sil.org/gentium/" rel="noopener" target="_blank">Gentium</a> by Victor Gaultney for handwritten annotations, as well as <a href="https://sourceforge.net/projects/linuxlibertine/" target="_blank" rel="noopener">Linux Biolinum</a> by Philipp H. Poll.</p>
        </div>
      </section>
    </div>
    <?php
      include("../../includes/$pageLang/footer.php");
    ?>