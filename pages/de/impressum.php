<?php
    session_start();
    $pageLang = $_SESSION['lang'];
    include("../../includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
        <div id="fulltext" class="text">
          <h2>Impressum</h2>
          <p>Auch wenn es noch in den Kinderschuhen steckt steht fest, dass dieses Projekt ohne eine Reihe an großartigen Ressourcen nicht realisierbar gewesen wäre:</p> 
          <p>In technischer Hinsicht beruht es auf dem TEI-Standard der <a href="https://tei-c.org/"  rel="noopener" target="_blank">Text Encoding Initiative</a>. Die Aufbereitung der Texte zur Ansicht im Webbrowser wird ermöglicht durch die <a href="https://github.com/TEIC/CETEIcean" target="_blank" rel="noopener">CETEIcean-Library</a>. Die Musikbeispiele sind dem <a href="https://music-encoding.org/" target="_blank" rel="noopener">MEI-Standard</a> entsprechend kodiert und werden mit Hilfe von <a href="https://www.verovio.org/" target="_blank" rel="noopener">Verovio</a> im Browser angezeigt. Die Verarbeitung der Bibliographischen Daten erfolgt mit Hilfe der <a href="https://citation.js.org" rel="noopener" target="_blank">Citation.js-Library</a>.</p>
          <p>Die lateinischen Texte beruhen auf der Version des <a href="https://chmtl.indiana.edu/tml/16th/GLADOD1" target="_blank" rel="noopener">Thesaurus Musicarum Latinarum</a>. Die (nur zu Demonstrationszwecken gedachte) deutsche Übersetzung habe ich unter Zuhilfenahme von Millers englischer Übersetzung erstellt. Weitere Quellenangaben und eine Literaturliste folgen noch.</p>
          <p>Das Projekt wird aktuell von der Uni Regensburg gehostet. Die verwendeten Schriften sind <emph>Crimson Text</emph>, geleitet von <a href="https://github.com/skosch/Crimson" target="_blank" rel="noopener">Sebastian Kosch</a> für die Editionstexte, <a href="https://software.sil.org/gentium/" rel="noopener" target="_blank">Gentium</a> von Victor Gaultney für handschriftliche Annotationen, sowie <a href="https://sourceforge.net/projects/linuxlibertine/" target="_blank" rel="noopener">Linux Biolinum</a> von Philipp H. Poll.</p>
        </div>
      </section>
    </div>
    <?php
      include("../../includes/$pageLang/footer.php");
    ?>