  <?php
    include('includes/header.php');
  ?>
    <div class="chapter">
      <section class="body-text">
          <div id="fulltext" class="text">
            <h2>Home</h2>
            <p>Willkommen auf der Seite des <em>Glarean-Projekts</em>! Diese Seite wird noch mit Inhalten gefüllt. Auch die Links funktionieren noch nicht alle. <a href="pages/chapter_select.php">Hier</a> kommen Sie auf eine Liste der schon erarbeiteten Kapitel.</p>
            <h3>Diese Edition benutzen</h3>
            <p>Aufbau und Ideen hinter diesem Projekt werden in Kürze genauer in <a href="pages/about.php">Über dieses Projekt</a> beschrieben werden. Hier einstweilen einige Hinweise zu den schon vorhandenen Inhalten:</p>
            <p>Alle Kapitel der drei Bücher des <em>Dodecachordon</em> werden auf der Seite <a href="pages/chapter_select.php">Kapitel</a> aufgelistet. Bereits transkribierte Kapitel (aktuell 1.1 &amp; 3.26) sind schwarz hervorgehoben. Jedes Kapitel kann entweder auf Latein oder Deutsch gelesen werden. Die Ansicht der Kapitel kann mit dem blauen Knopf am linken Bildschirmrand personalisiert werden. Folgende Optionen stehen aktuell zur Auswahl:</p>
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
          </div>
        </div>
      </section>
    </div>
    <?php
      include("includes/footer.php");
    ?>