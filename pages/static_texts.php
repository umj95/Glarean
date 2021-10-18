<?php
/* Header */
$GLOBALS['headerGerman'] = '<header id="header">
<div id="container">
  <h1><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span></h1>
  <a href="javascript:void(0);" class="hamburger" onclick="topNavExpand()">&#x2630;</a>
  <nav id="topnav" class="main">
    <a href="index.php">Home</a>
    <a href="pages/chapter_select.php">Kapitel</a>
    <a href="pages/about.php">Über dieses Projekt</a>
    <a href="pages/edition.php">Editionsrichtlinien</a>
    <a href="pages/bibliography.php">Bibliographie</a>
    <a href="pages/impressum.php">Impressum</a>
    <a href="pages/contact.php">Kontakt</a>'
;

$GLOBALS['headerEnglish'] = '<header id="header">
<div id="container">
  <h1><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span></h1>
  <a href="javascript:void(0);" class="hamburger" onclick="topNavExpand()">&#x2630;</a>
  <nav id="topnav" class="main">
    <a href="index.php">Home</a>
    <a href="pages/chapter_select.php">Chapters</a>
    <a href="pages/about.php">About</a>
    <a href="pages/edition.php">Edition Guidelines</a>
    <a href="pages/bibliography.php">Bibliography</a>
    <a href="pages/impressum.php">Impressum</a>
    <a href="pages/contact.php">Contact</a>'
;

/* Footer */

$GLOBALS['footerGerman'] = '<footer>
<p><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span> · Wird aktuell entwickelt · Bitte verwenden Sie diese Ressourcen nur zu Testzwecken! <br> 
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/80x15.png" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
</footer>';

$GLOBALS['footerEnglish'] = '<footer>
<p><span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span> · Under active development · Only to be used for testing purposes! <br> 
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/80x15.png" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
</footer>';

/* Home */

$homeTextGerman = '<h2>Home</h2>
<p>Willkommen auf der Seite des <em>Glarean-Projekts</em>! Diese Seite wird noch mit Inhalten gefüllt. Auch die Links funktionieren noch nicht alle. <a href="pages/chapter_select.php">Hier</a> kommen Sie auf eine Liste der schon erarbeiteten Kapitel.</p>
<h3>Diese Edition benutzen</h3>
<p>Aufbau und Ideen hinter diesem Projekt werden in Kürze genauer in <a href="pages/about.php">Über dieses Projekt</a> beschrieben werden. Hier einstweilen einige Hinweise zu den schon vorhandenen Inhalten:</p>
<p>Alle Kapitel der drei Bücher des <em>Dodekachordon</em> werden auf der Seite <a href="pages/chapter_select.php">Kapitel</a> aufgelistet. Bereits transkribierte Kapitel (aktuell 1.1 &amp; 3.26) sind schwarz hervorgehoben. Jedes Kapitel kann entweder auf Latein oder Deutsch gelesen werden. Die Ansicht der Kapitel kann mit dem blauen Knopf am linken Bildschirmrand personalisiert werden. Folgende Optionen stehen aktuell zur Auswahl:</p>
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
<p>Insbesondere die Musikbeispiele sind noch sehr rudimentär. Viele sind noch nicht transkribiert. In diesem Fall wird das jeweils letzte Musiskbeispiel auch in die folgenden, leeren Positionen geladen. Weder Kommentare, Varianten, noch Abspielmöglichkeiten sind bisher implementiert. Des Weiteren sind auch graphisch noch viele Ecken nicht abgerundet. Insbesondere die mobile Version der Website ist noch nicht wirklich verwendbar.</p>'
;

$homeTextEnglish = '<h2>Home</h2>
<p>Welcome to the home page of the <em>Glarean Project</em>! This page is still being filled with content and some of the links might not be working yet as well. <a href="pages/chapter_select.php">Here</a> you will get to a list of the chapters that are already available.</p>
<h3>How to use this edition</h3>
<p>The ideas behind this project will shortly be explained in more detail in the <a href="pages/about.php">about</a> section. For now, here are some tips concerning the content that is already available now:</p>
<p>All chapters of the three books of the <em>Dodekachordon</em> are being listed on the <a href="pages/chapter_select.php">Chapters</a> page. Already transcribed chapters (currently 1.1 and 3.26 are highlighted. Each chapter can be read in either Latin or German. The display of the chapter can be personalised over the blue button on the left edge of the window. The following options are supported so far:</p>
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
<p>The musical examples in particular are still very rudimentary. Many are not yet transcribed. In that case, the last available example is being loaded into the following, empty slots. None of the planned features, variants, commentary, or playback options, are implemented yet. Furthermore, many graphical elements still need work – especially the mobile version of the site is barely usable as of now.</p>'
;

/* ChapterSelect */
$chapterSelectTextGerman = '<div class="chapter">
<section class="body-text">
    <div id="fulltext" class="text">
    <h2>Kapitel</h2>
    <p>Bitte wählen Sie hier Kapitel und Sprache aus. Sie können auch innerhalb eines Kapitels Passagen in der Übersetzung / im Original lesen. Noch nicht freigegebene Kapitel sind grau markiert.</p>
    <h3>Libri primi Capita XXI.</h3>
    <ol class="chapter_select">
      <li class="released">De Musices diuisione ac definitione Caput I. · <span class="tooltip"><a href="/pages/chapter.php?currentBook=1&currentChapter=1&mainLanguage=_lat&marginalia=false">Latein</a><span class="tiptext">Dieses Kapitel auf latein Lesen</span></span> · <span class="tooltip"><a href="/pages/chapter.php?currentBook=1&currentChapter=1&mainLanguage=_deu&marginalia=false">Deutsch</a><span class="tiptext">Dieses Kapitel auf deutsch lesen</span></span></li></li>
      <li>De Elementis Practices Caput II.</li>
      <li>Quae in Guidonis typo rudibus huius artis consyderanda Caput III.</li>
      <li>De Clauibus et uocum deductionibus per easdem, de notularum item figuris Caput IIII.</li>
      <li>De Quinquae Tetrachordis et tribus Modulandi generibus Caput V.</li>
      <li>De uocum permutationibus per omneis claues Caput VI.</li>
      <li>De clauium signatarum siue Characteristicarum transpositione Caput VII.</li>
      <li>De Interuallis Musicis et quo. Interuallorum species sumendae Caput VIII.</li>
      <li>Quid Phthongus, Consonantia et dissonantia, Tum consonantiarum species quot apud Priscos, quot apud Neotericos Caput IX.</li>
      <li>De Toni partitione, eiusquae partium definitione Caput X.</li>
      <li>De Octo Modis musicis nostrae aetatis praeceptio Caput XI.</li>
      <li>De Cantuum fine in Modis Caput XII.</li>
      <li>De uulgari Modorum agnitione Caput XIII.</li>
      <li>De Modorum expatiatione ac permixtione Caput XIIII.</li>
      <li>De Modorum usu in Cantantium Choro Caput XV.</li>
      <li>Quaemadmodum Musicae Consonantiae in dubitanter aure dijudicari possint ex Boethio, atquae inibi de musicorum uocabulorum abusione Caput XVI.</li>
      <li>Quid Magas, Monochorum. Magadis, similesquae quorundam Musicorum instrumentorum appelationes Caput XVII.</li>
      <li>De triplici siue chordarum siue neruorum in scala musica diuisione Caput XVIII.</li>
      <li>Monochordi diuisio in genere Diatonico Caput XIX.</li>
      <li>De inueniendis Consonantijs per Citharae neruos Caput XX.</li>
      <li>Parasceue ad sequentis libri commentationem Caput XXI.</li>
    </ol>
    <h3>Libri secundi, Capita XXXIX</h3>
    <ol class="chapter_select">
    <li>Quo pacto uere Modorum discrimen sumendum Caput I.</li>
      <li>Quid systema, quae Modorum nomina, qui cuique Diapason Modus aptandus Caput II.</li>
      <li>Quomodo ex connexione Diatessaron ac diapente XXIIII Diapason species fiant, e quibus XII reijcantur, XII recipiantur Caput III.</li>
      <li>Quomodo ex XII Diapason speciebus septem duntaxat fiant Caput IIII.</li>
      <li>Quid aetas nostra immutasse in his Modis uideatur, et quatenus id fieri liceat. Caput V</li>
      <li>Quod necesse si XII ponere Modos, siquidem octauus noster recte ab alijs separatus est. Caput VI.</li>
      <li>De Modorum ordine, eorunque appellatione. Caput VII.</li>
      <li>De chordarum grauitate et acumine, ac secundum ea appellatione. Caput VIII.</li>
      <li>Quo pacto sumendi sint Modi, et quae prima omnium Modorum chorda. Caput IX.</li>
      <li>Authorum aliquot loca discussa, quae traditis a nobis hactenus praeceptis contraria uidentur. Caput X.</li>
      <li>De Modorum inuicem commutatioue. Caput XI.</li>
      <li>Cur septenarius numerus apud Authores tam frequens in rebus musicis. Caput XII.</li>
      <li>De sono in coelo duae opiniones, atque inibi Ciceronis Plinijque loci excussi. Caput XIII.</li>
      <li>Quid per IX Musas intelligendum. Caput XIIII.</li>
      <li>Anacephalaeosis parua de Modorum diuisione. Caput XV.</li>
      <li>De prima Diapason specie ac duobus eius Modis. Caput XVI.</li>
      <li>De Aeolio Modo. Caput XVII.</li>
      <li>De secunda specie diapason, ac uno eius proprio Modo. Caput XVIII.</li>
      <li>De tertia diapason specie, ac duobus eius Modis. Caput XIX.</li>
      <li>De Ionico siue Iastio Modo. Caput XX.</li>
      <li>De quarta Diapason specie, ac duobus eius Modis. Caput XXI.</li>
      <li>De Hypomixolydio siue Hyperiastio. Caput XXII.</li>
      <li>De quinta Diapason specie, ac duobus eius Modis. Caput XXIII.</li>
      <li>De Hypoaeolio Modo. Caput XXIIII.</li>
      <li>De sexta Diapason specie, ac uno eius proprio Modo. Caput XXV.</li>
      <li>De septima Diapason specie, ac duobus eius Modis. Caput XXVI.</li>
      <li>De Hypoionico Modo. Caput XXVII.</li>
      <li>De Modorum connexione ac per Diapente communione. Caput XXVIII.</li>
      <li>De 1. connexione, quae ex prima est Diapason specie ac quarta. Caput XXIX.</li>
      <li>De 2. connexione, quae ex secunda est Diapason specie ac quinta. Caput XXX.</li>
      <li>De 3. connexione, quae ex tertia est Diapason specie ac sexta. Caput XXXI.</li>
      <li>De 4. connexione, quae ex quarta est Diapason specie ac septima. Caput XXXII.</li>
      <li>De 5. connexione, quae ex quinta est Diapason specie ac octaua. Caput XXXIII.</li>
      <li>De 6. connexione, quae ex sexta est Diapason specie ac nona. Caput XXXIIII.</li>
      <li>De 7. connexione quae ex septima est Diapason specie ac decima. Caput XXXV.</li>
      <li>Quod Modi Diapason mediatione, quae fit per Diapente ac Diatessaron consonantias, potissimum noscantur. Caput XXXVI.</li>
      <li>Quod Modi non perpetuo impleant extremas chordas, sed phrasi noscantur, ac partim etiam finali claue. Caput XXXVII.</li>
      <li>De praestantia Phonasci ac Symphonetae, ac item de cantibus plano ac mensurali uter utri cedat. Caput XXXVIII.</li>
      <li>De inueniendis Tenoribus ad Phonascos admonitio. Caput XXXIX.</li>
    </ol>
    <h3>Libri tertij Capita XXVI.</h3>
    <ol class="chapter_select">
      <li>De notarum figuris. Caput I.</li>
      <li>De notarum ligaturis. Caput II.</li>
      <li>De Pausis. Caput III.</li>
      <li>De Punctis. Caput IIII.</li>
      <li>De Modi, Tempore, ac Prolatione. Caput V.</li>
      <li>De Signis. Caput VI.</li>
      <li>De tactu siue cantandi mensura. Caput VII.</li>
      <li>De Augmentatione, Diminutione, ac Semidiapente. Caput VIII.</li>
      <li>De Notularum imperfectione. Caput IX.</li>
      <li>De Alteratione. Caput X.</li>
      <li>De Syncope, et huius nouae in institutionis diuersitate querela, cum exemplis ad eam ostendendam opportunis. Denique de VI uocum Musicalium (quas uocant) deductionibus exempla. Caput XI.</li>
      <li>De Proportionibus Musicis. Caput XII.</li>
      <li>Duodecim Modorum exempla, ac primum Hypodorij ac Aeolij. Caput XIII.</li>
      <li>De Hypophrygio, et Hyperaeolio exempla. Caput XIIII.</li>
      <li>De Hypolydio, et eius exemplis. Caput XV.</li>
      <li>De Ionico exempla. Caput XVI.</li>
      <li>De Dorio Modo exempla. Caput XVII.</li>
      <li>De Hypomixolydio, et eius exempla. Caput XVIII.</li>
      <li>De Phrygio Modo exempla. Caput XIX.</li>
      <li>De Hypoaeolio Modo exempla. Caput XX</li>
      <li>De Lydij Hyperphrygijque Modorum exemplis. Caput XXI.</li>
      <li>De Mixolydio, ac eius exemplis. Caput XXII.</li>
      <li>De Hypoionico. Caput XXIII.</li>
      <li>De binorum Modorum connexione exempla, atque inibi obiter Iusquini Pratensis Encomium. Caput XXIIII</li>
      <li>De Tenoribus Diapason non explentibus. Caput XXV.</li>
      <li class="released">De Symphonetarum Ingenio Caput XXVI · <span class="tooltip"><a href="/pages/chapter.php?currentBook=3&currentChapter=26&mainLanguage=_lat&marginalia=false">Latein</a><span class="tiptext">Dieses Kapitel auf latein Lesen</span></span> · <span class="tooltip"><a href="/pages/chapter.php?currentBook=3&currentChapter=26&mainLanguage=_deu&marginalia=false">Deutsch</a><span class="tiptext">Dieses Kapitel auf deutsch lesen</span></span></li>
    </ol>
    </div>
  </div>
</section>
</div>'
;

$chapterSelectTextEnglish = '  <div class="chapter">
<section class="body-text">
    <div id="fulltext" class="text">
    <h2>Chapters</h2>
    <p>Please chose the chapter you want to read, as well as the main language you want to read in. You will still be able to view and compare single paragraphs in another language from within the viewer. Chapters that have not been released yet are marked grey.</p>
    <h3>Libri primi Capita XXI.</h3>
    <ol class="chapter_select">
      <li class="released">De Musices diuisione ac definitione Caput I. · <span class="tooltip"><a href="/pages/chapter.php?currentBook=1&currentChapter=1&mainLanguage=_lat&marginalia=false">Latin</a><span class="tiptext">Read this chapter in Latin</span></span> · <span class="tooltip"><a href="/pages/chapter.php?currentBook=1&currentChapter=1&mainLanguage=_deu&marginalia=false">German</a><span class="tiptext">Read this chapter in German</span></span></li></li>
      <li>De Elementis Practices Caput II.</li>
      <li>Quae in Guidonis typo rudibus huius artis consyderanda Caput III.</li>
      <li>De Clauibus et uocum deductionibus per easdem, de notularum item figuris Caput IIII.</li>
      <li>De Quinquae Tetrachordis et tribus Modulandi generibus Caput V.</li>
      <li>De uocum permutationibus per omneis claues Caput VI.</li>
      <li>De clauium signatarum siue Characteristicarum transpositione Caput VII.</li>
      <li>De Interuallis Musicis et quo. Interuallorum species sumendae Caput VIII.</li>
      <li>Quid Phthongus, Consonantia et dissonantia, Tum consonantiarum species quot apud Priscos, quot apud Neotericos Caput IX.</li>
      <li>De Toni partitione, eiusquae partium definitione Caput X.</li>
      <li>De Octo Modis musicis nostrae aetatis praeceptio Caput XI.</li>
      <li>De Cantuum fine in Modis Caput XII.</li>
      <li>De uulgari Modorum agnitione Caput XIII.</li>
      <li>De Modorum expatiatione ac permixtione Caput XIIII.</li>
      <li>De Modorum usu in Cantantium Choro Caput XV.</li>
      <li>Quaemadmodum Musicae Consonantiae in dubitanter aure dijudicari possint ex Boethio, atquae inibi de musicorum uocabulorum abusione Caput XVI.</li>
      <li>Quid Magas, Monochorum. Magadis, similesquae quorundam Musicorum instrumentorum appelationes Caput XVII.</li>
      <li>De triplici siue chordarum siue neruorum in scala musica diuisione Caput XVIII.</li>
      <li>Monochordi diuisio in genere Diatonico Caput XIX.</li>
      <li>De inueniendis Consonantijs per Citharae neruos Caput XX.</li>
      <li>Parasceue ad sequentis libri commentationem Caput XXI.</li>
    </ol>
    <h3>Libri secundi, Capita XXXIX</h3>
    <ol class="chapter_select">
    <li>Quo pacto uere Modorum discrimen sumendum Caput I.</li>
      <li>Quid systema, quae Modorum nomina, qui cuique Diapason Modus aptandus Caput II.</li>
      <li>Quomodo ex connexione Diatessaron ac diapente XXIIII Diapason species fiant, e quibus XII reijcantur, XII recipiantur Caput III.</li>
      <li>Quomodo ex XII Diapason speciebus septem duntaxat fiant Caput IIII.</li>
      <li>Quid aetas nostra immutasse in his Modis uideatur, et quatenus id fieri liceat. Caput V</li>
      <li>Quod necesse si XII ponere Modos, siquidem octauus noster recte ab alijs separatus est. Caput VI.</li>
      <li>De Modorum ordine, eorunque appellatione. Caput VII.</li>
      <li>De chordarum grauitate et acumine, ac secundum ea appellatione. Caput VIII.</li>
      <li>Quo pacto sumendi sint Modi, et quae prima omnium Modorum chorda. Caput IX.</li>
      <li>Authorum aliquot loca discussa, quae traditis a nobis hactenus praeceptis contraria uidentur. Caput X.</li>
      <li>De Modorum inuicem commutatioue. Caput XI.</li>
      <li>Cur septenarius numerus apud Authores tam frequens in rebus musicis. Caput XII.</li>
      <li>De sono in coelo duae opiniones, atque inibi Ciceronis Plinijque loci excussi. Caput XIII.</li>
      <li>Quid per IX Musas intelligendum. Caput XIIII.</li>
      <li>Anacephalaeosis parua de Modorum diuisione. Caput XV.</li>
      <li>De prima Diapason specie ac duobus eius Modis. Caput XVI.</li>
      <li>De Aeolio Modo. Caput XVII.</li>
      <li>De secunda specie diapason, ac uno eius proprio Modo. Caput XVIII.</li>
      <li>De tertia diapason specie, ac duobus eius Modis. Caput XIX.</li>
      <li>De Ionico siue Iastio Modo. Caput XX.</li>
      <li>De quarta Diapason specie, ac duobus eius Modis. Caput XXI.</li>
      <li>De Hypomixolydio siue Hyperiastio. Caput XXII.</li>
      <li>De quinta Diapason specie, ac duobus eius Modis. Caput XXIII.</li>
      <li>De Hypoaeolio Modo. Caput XXIIII.</li>
      <li>De sexta Diapason specie, ac uno eius proprio Modo. Caput XXV.</li>
      <li>De septima Diapason specie, ac duobus eius Modis. Caput XXVI.</li>
      <li>De Hypoionico Modo. Caput XXVII.</li>
      <li>De Modorum connexione ac per Diapente communione. Caput XXVIII.</li>
      <li>De 1. connexione, quae ex prima est Diapason specie ac quarta. Caput XXIX.</li>
      <li>De 2. connexione, quae ex secunda est Diapason specie ac quinta. Caput XXX.</li>
      <li>De 3. connexione, quae ex tertia est Diapason specie ac sexta. Caput XXXI.</li>
      <li>De 4. connexione, quae ex quarta est Diapason specie ac septima. Caput XXXII.</li>
      <li>De 5. connexione, quae ex quinta est Diapason specie ac octaua. Caput XXXIII.</li>
      <li>De 6. connexione, quae ex sexta est Diapason specie ac nona. Caput XXXIIII.</li>
      <li>De 7. connexione quae ex septima est Diapason specie ac decima. Caput XXXV.</li>
      <li>Quod Modi Diapason mediatione, quae fit per Diapente ac Diatessaron consonantias, potissimum noscantur. Caput XXXVI.</li>
      <li>Quod Modi non perpetuo impleant extremas chordas, sed phrasi noscantur, ac partim etiam finali claue. Caput XXXVII.</li>
      <li>De praestantia Phonasci ac Symphonetae, ac item de cantibus plano ac mensurali uter utri cedat. Caput XXXVIII.</li>
      <li>De inueniendis Tenoribus ad Phonascos admonitio. Caput XXXIX.</li>
    </ol>
    <h3>Libri tertij Capita XXVI.</h3>
    <ol class="chapter_select">
      <li>De notarum figuris. Caput I.</li>
      <li>De notarum ligaturis. Caput II.</li>
      <li>De Pausis. Caput III.</li>
      <li>De Punctis. Caput IIII.</li>
      <li>De Modi, Tempore, ac Prolatione. Caput V.</li>
      <li>De Signis. Caput VI.</li>
      <li>De tactu siue cantandi mensura. Caput VII.</li>
      <li>De Augmentatione, Diminutione, ac Semidiapente. Caput VIII.</li>
      <li>De Notularum imperfectione. Caput IX.</li>
      <li>De Alteratione. Caput X.</li>
      <li>De Syncope, et huius nouae in institutionis diuersitate querela, cum exemplis ad eam ostendendam opportunis. Denique de VI uocum Musicalium (quas uocant) deductionibus exempla. Caput XI.</li>
      <li>De Proportionibus Musicis. Caput XII.</li>
      <li>Duodecim Modorum exempla, ac primum Hypodorij ac Aeolij. Caput XIII.</li>
      <li>De Hypophrygio, et Hyperaeolio exempla. Caput XIIII.</li>
      <li>De Hypolydio, et eius exemplis. Caput XV.</li>
      <li>De Ionico exempla. Caput XVI.</li>
      <li>De Dorio Modo exempla. Caput XVII.</li>
      <li>De Hypomixolydio, et eius exempla. Caput XVIII.</li>
      <li>De Phrygio Modo exempla. Caput XIX.</li>
      <li>De Hypoaeolio Modo exempla. Caput XX</li>
      <li>De Lydij Hyperphrygijque Modorum exemplis. Caput XXI.</li>
      <li>De Mixolydio, ac eius exemplis. Caput XXII.</li>
      <li>De Hypoionico. Caput XXIII.</li>
      <li>De binorum Modorum connexione exempla, atque inibi obiter Iusquini Pratensis Encomium. Caput XXIIII</li>
      <li>De Tenoribus Diapason non explentibus. Caput XXV.</li>
      <li class="released">De Symphonetarum Ingenio Caput XXVI · <span class="tooltip"><a href="/pages/chapter.php?currentBook=3&currentChapter=26&mainLanguage=_lat&marginalia=false">Latin</a><span class="tiptext">Read this chapter in Latin</span></span> · <span class="tooltip"><a href="/pages/chapter.php?currentBook=3&currentChapter=26&mainLanguage=_deu&marginalia=false">German</a><span class="tiptext">Read this chapter in German</span></span></li>
    </ol>
    </div>
  </div>
</section>
</div>'
;

/* About */

$aboutTextGerman = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <p>Inhalte folgen noch.</p>
  </div>
</section>
</div>'
;

$aboutTextEnglish = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <p>Content still to follow.</p>
  </div>
</section>
</div>'
;

/* Edition Guidelines */

$editionGuidelinesGerman = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
  <?php
    include("../../data/site/editionsrichtlinien.php");
  ?>
  </div>
</section>
</div>'
;

$editionGuidelinesEnglish = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
  <?php
    include("../../data/site/editionsrichtlinien.php");
  ?>
  </div>
</section>
</div>'
;

/* Bibliography */

$bibliographyGerman = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Bibliographie</h2>
    <p>Diese Literaturliste Herunterladen:<br/>
    <a href="javascript:void(0)" onclick="printBibliography(\'pdf\')">pdf</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'csl\')">csl-json</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'tex\')">bibtex</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'txt\')">txt</a></p>
    <div id="bibliography" class="bibliography"></div>'
;

$bibliographyEnglish = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Bibliography</h2>
    <p>Download this bibliography:<br/>
    <a href="javascript:void(0)" onclick="printBibliography(\'pdf\')">pdf</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'csl\')">csl-json</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'tex\')">bibtex</a> · 
    <a href="javascript:void(0)" onclick="printBibliography(\'txt\')">txt</a></p>
    <div id="bibliography" class="bibliography"></div>'
;

/* Impressum */

$impressumGerman = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Impressum</h2>
    <p>Auch wenn es noch in den Kinderschuhen steckt steht fest, dass dieses Projekt ohne eine Reihe an großartigen Ressourcen nicht realisierbar gewesen wäre:</p> 
    <p>In technischer Hinsicht beruht es auf dem TEI-Standard der <a href="https://tei-c.org/"  rel="noopener" target="_blank">Text Encoding Initiative</a>. Die Aufbereitung der Texte zur Ansicht im Webbrowser wird ermöglicht durch die <a href="https://github.com/TEIC/CETEIcean" target="_blank" rel="noopener">CETEIcean-Library</a>. Die Musikbeispiele sind dem <a href="https://music-encoding.org/" target="_blank" rel="noopener">MEI-Standard</a> entsprechend kodiert und werden mit Hilfe von <a href="https://www.verovio.org/" target="_blank" rel="noopener">Verovio</a> im Browser angezeigt. Die Verarbeitung der Bibliographischen Daten erfolgt mit Hilfe der <a href="https://citation.js.org" rel="noopener" target="_blank">Citation.js-Library</a>.</p>
    <p>Die lateinischen Texte beruhen auf der Version des <a href="https://chmtl.indiana.edu/tml/16th/GLADOD1" target="_blank" rel="noopener">Thesaurus Musicarum Latinarum</a>. Die (nur zu Demonstrationszwecken gedachte) deutsche Übersetzung habe ich unter Zuhilfenahme von Millers englischer Übersetzung erstellt. Weitere Quellenangaben und eine Literaturliste folgen noch.</p>
    <p>Das Projekt wird aktuell von der Uni Regensburg gehostet. Die verwendeten Schriften sind <emph>Crimson Text</emph>, geleitet von <a href="https://github.com/skosch/Crimson" target="_blank" rel="noopener">Sebastian Kosch</a> für die Editionstexte, <a href="https://software.sil.org/gentium/" rel="noopener" target="_blank">Gentium</a> von Victor Gaultney für handschriftliche Annotationen, sowie <a href="https://sourceforge.net/projects/linuxlibertine/" target="_blank" rel="noopener">Linux Biolinum</a> von Philipp H. Poll.</p>
  </div>
</section>
</div>'
;

$impressumEnglish = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Impressum</h2>
    <p>Even in its infancy, it is evident that this project would never have been possible without a number of wonderful ressources:</p> 
    <p>Technically, the text is based on the TEI standard as published by the <a href="https://tei-c.org/"  rel="noopener" target="_blank">Text Encoding Initiative</a>. The presentation of the texts in the browser is made possible with the help of the <a href="https://github.com/TEIC/CETEIcean" target="_blank" rel="noopener">CETEIcean library</a>. The musical examples are encoded according to the <a href="https://music-encoding.org/" target="_blank" rel="noopener">MEI standard</a> and are rendered with the help of <a href="https://www.verovio.org/" target="_blank" rel="noopener">Verovio</a>. The processing of the bibliographic data happens thanks to the <a href="https://citation.js.org" rel="noopener" target="_blank">Citation.js library</a>.</p>
    <p>The Latin texts are based on the edition by the <a href="https://chmtl.indiana.edu/tml/16th/GLADOD1" target="_blank" rel="noopener">Thesaurus Musicarum Latinarum</a>. The German translation (which is intended only as a demonstration) was created by me with the help of Miller’s English translation.</p>
    <p>The project is being hosted by the Regensburg university. the fonts used are <emph>Crimson Text</emph>, developed by <a href="https://github.com/skosch/Crimson" target="_blank" rel="noopener">Sebastian Kosch</a> for the texts of the edition, <a href="https://software.sil.org/gentium/" rel="noopener" target="_blank">Gentium</a> by Victor Gaultney for handwritten annotations, as well as <a href="https://sourceforge.net/projects/linuxlibertine/" target="_blank" rel="noopener">Linux Biolinum</a> by Philipp H. Poll.</p>
  </div>
</section>
</div>'
;

/* Contact */

$contactGerman = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Kontakt</h2>
    <p>Das Projekt wird <a href="https://www.github.com/umj95/Glarean" rel="noopener" target="_blank">hier</a> auf Github gehostet. Wenn Ihnen Fehler auffallen, Sie Feedback oder Anmerkungen haben, öffnen Sie einfach dort eine <a href="https://docs.github.com/en/issues/tracking-your-work-with-issues/creating-an-issue" rel="noopener" target="_blank">Issue</a>.</p>
  </div>
</section>
</div>';

$contactEnglish = '<div class="chapter">
<section class="body-text">
  <div id="fulltext" class="text">
    <h2>Contact</h2>
    <p>This project is being hosted <a href="https://www.github.com/umj95/Glarean" rel="noopener" target="_blank">here</a> on Github. If you notice any errors, have comments, or feedback, please open an <a href="https://docs.github.com/en/issues/tracking-your-work-with-issues/creating-an-issue" rel="noopener" target="_blank">issue</a> there.</p>
  </div>
</section>
</div>';
?>