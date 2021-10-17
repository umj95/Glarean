  <?php
    session_start();
    if(isset($_POST['recordSize'])) {                               // check for screen dimensions
      $height = $_POST['height'];
      $width = $_POST['width'];
      $_SESSION['screen_height'] = $height;
      $_SESSION['screen_width'] = $width;
    }
  
    $_SESSION['lang'] = "de";                                       // set the initial page language
    $pageLang = $_SESSION['lang'];
    include("includes/$pageLang/header.php");
  ?>
    <div class="chapter">
      <section class="body-text">
          <div id="fulltext" class="text">
            <?php
            if($_SESSION['lang'] == "de") {
            echo '
            <h2>Home</h2>
            <p>Willkommen auf der Seite des <em>Glarean-Projekts</em>! Diese Seite wird noch mit Inhalten gefüllt. Auch die Links funktionieren noch nicht alle. <a href="pages/de/chapter_select.php">Hier</a> kommen Sie auf eine Liste der schon erarbeiteten Kapitel.</p>
            <h3>Diese Edition benutzen</h3>
            <p>Aufbau und Ideen hinter diesem Projekt werden in Kürze genauer in <a href="pages/de/about.php">Über dieses Projekt</a> beschrieben werden. Hier einstweilen einige Hinweise zu den schon vorhandenen Inhalten:</p>
            <p>Alle Kapitel der drei Bücher des <em>Dodekachordon</em> werden auf der Seite <a href="pages/de/chapter_select.php">Kapitel</a> aufgelistet. Bereits transkribierte Kapitel (aktuell 1.1 &amp; 3.26) sind schwarz hervorgehoben. Jedes Kapitel kann entweder auf Latein oder Deutsch gelesen werden. Die Ansicht der Kapitel kann mit dem blauen Knopf am linken Bildschirmrand personalisiert werden. Folgende Optionen stehen aktuell zur Auswahl:</p>
            <ul>
              <li>Übersetzungen: Wenn diese Box angeklickt wird, erscheint links neben jedem Absatz ein blauer Knopf, der, wenn gedrückt, den entsprechenden Absatz in der gewählten Sprache neben dem Haupttext anzeigt.</li>
              <li>Annotationen: Diese Edition beruht auf einem Exemplar des <em>Dodecachordon</em> aus dem Besitz Johannes Algoers. Wenn diese Box ausgewählt ist, werden die teils sehr ausführlichen Hervorhebungen, Verbesserungen und Kommentare Algoers angezeigt. Aktuell sind Annotationen jedoch nur im lateinischen Text verfügbar.</li>
              <li>Kommentare: Hier lassen sich Kommentarapparate hinzuschalten. Dieses Element ist so ausgelegt, dass potentiell beliebig viele Kommentatoren den Text kommentieren können und Leser selektiv auswählen könnnen, wessen Kommentare sie vorgeschlagen haben möchten. Aktuell beinhalten nur die „Kommentare der Herausgeber“ ‚richtige‘ Kommentare (Die aber auch wenig gehaltvoll sind und – wie alles auf dieser Seite – momentan nur dazu dienen, Elemente zu testen). Wenn ausgewählt werden Kommentare im Text mit &deg; markiert. Kommenare öffnen sich, wie Übersetzungen, rechts neben dem Haupttext.</li>
            </ul>
            <p>Weitere Hinweise:</p>
            <ul>
              <li>Das jeweilige Kapitel kann in diesem Optionsfenster auch als TEI-Datei heruntergeladen werden.</li>
              <li>Durch anklicken der Pfeile neben den Seitenzahlen gelangt man auf die entsprechende Seite des von der Universität Freiburg bereitgestellten Digitalisats.</li>
              <li>Griechische Passagen werden transliteriert angeboten. Der Text wird durch hovern über dem Griechischen angezeigt.</li>
              <li>Im Errata-Verzeichnis aufgeführte Druckfehler sind dunkelrot hervorgehoben. die Verbesserung wird durch hovern angezeigt.</li>
              <li>Das Kommentar-Fenster, das über den blauen Knopf am rechten Bildschirmrand aufrufbar ist, sich jedoch auch öffnet, wenn ein Kommentar oder eine Übersetzung aufgerufen wird, kann geschlossen werden, ohne dass die offenen Elemente verloren gehen. Die Idee hierbei ist, dass beliebig viele Kommentare, Übersetzungen, etc. aufgerufen werden können, ohne den Lesefluss des Haupttextes zu stören. Sie können zu jedem Zeitpunkt „abgearbeitet“ und dann einzeln geschlossen werden. Nur wenn die Seite neu geladen wird, werden alle Elemente im Kommentarfenster automatisch geschlossen. Die Elemente werden hier in der Reihenfolge angezeigt, in der sie aufgerufen wurden, nicht in einer mit dem Text korrespondierenden.</li>
            </ul>
            <h3>Was noch nicht funktioniert</h3>
            <p>Insbesondere die Musikbeispiele sind noch sehr rudimentär. Viele sind noch nicht transkribiert. In diesem Fall wird das jeweils letzte Musiskbeispiel auch in die folgenden, leeren Positionen geladen. Weder Kommentare, Varianten, noch Abspielmöglichkeiten sind bisher implementiert. Des Weiteren sind auch graphisch noch viele Ecken nicht abgerundet. Insbesondere die mobile Version der Website ist noch nicht wirklich verwendbar.</p>
            ';
            } else if($_SESSION['lang'] == "en") {
              echo '
              <h2>Home</h2>
              <p>Welcome on the home page of the <em>Glarean Project</em>! This page is still being filled with content and some of the links might not be working yet as well. <a href="pages/en/chapter_select.php">Here</a> you will get to a list of the chapters that are already available.</p>
              <h3>How to use this edition</h3>
              <p>The ideas behind this project will shortly be explained in more detail in the <a href="pages/en/about.php">about</a> section. For now, here are some tips concerning the content that is already available now:</p>
              <p>All chapters of the three books of the <em>Dodekachordon</em> are being listed on the <a href="pages/en/chapter_select.php">Chapters</a> page. Already transcribed chapters (currently 1.1 and 3.26 are highlighted. Each chapter can be read in either Latin or German. The display of the chapter can be personalised over the blue button on the left edge of the window. The following options are supported so far:</p>
              <ul>
                <li>Translations: If this box is ticked, a blue button appears to the left of each paragraph. If clicked, it will present the translation of the corresponding paragraph next to the main text.</li>
                <li>Annotations: This edition is based on the specimen of the <em>Dodekachordon</em> that once belonged to Johannes Algoer. If this box is ticked, the sometimes quite extensive highlights, comments and corretions by Algoer are being displayed. Currently, annotations are only supported in the Latin version of the text.</li>
                <li>Commentary: Here you can view editorial comments. This feature is intended to be able to support a varying number of distinct commentaries that can be chosen selectively by the reader. Currently, only the “Editors’ comments” contain ‘proper’ commentary (which, however, is not particularly substantial either – as everything on this page, it is intended mainly to test functionalities). If ticked, comments are being marked in the text with &deg; and open, like translations, to the right of the main text.</li>
              </ul>
              <h3>Other Notes</h3>
              <ul>
                <li>The current chapter can be downloaded as a TEI file in the options pane</li>
                <li>By clicking on the arrows next to the page numbers, you can access corresponding page of the digitalised version of the book that is hosted by the university of Freiburg.</li>
                <li>Greek text is being offered in transliteration, which can be seen by hovering over the text</li>
                <li>Printing errors that are marked in the Errata index are highlighted in dark red. The correction can be seen by hovering over the text</li>
                <li>The commentary pane opens automatically when a commentary or translation is being queried. It can however also be opened by clicking on the blue button on the right edge of the window. It can be closed without losing the open elements. The idea behind this is that any number of items can be loaded here and tucked away without disrupting the reading experience. They can be worked through at the reader’s discretion and be closed individually. Only when the page is reloaded, all commentary/translations will be closed. The elements are being shown in the order in which they were queried, not necessarily in the order of the corresponding text.</li>
              </ul>
              <h3>What is still unfinished</h3>
              <p>The musical examples in particular are still very rudimentary. Many are not yet transcribed. In that case, the last available example is being loaded into the following, empty slots. None of the planned features, variants, commentary, or playback options, are implemented yet. Furthermore, many graphical elements still need work – especially the mobile version of the site is barely usable as of now.</p>
              ';
            }
            ?>
          </div>
        </div>
      </section>
    </div>
    <?php
      include("includes/de/footer.php");
    ?>