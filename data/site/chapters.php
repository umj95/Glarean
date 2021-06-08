<?php
  if(isset($_GET['_lat'])) {
      echo "This is Button1 that is selected";
  }
  if(isset($_GET['_deu'])) {
      echo "This is Button2 that is selected";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Testpage</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="stylesheet" href="css/panels.css"/>
    <link rel="stylesheet" href="css/chapter.css"/>
    <script type="text/javascript" src="js/CETEI.js"></script>
    <script type="text/javascript" src="js/page_functions.js"></script>
    <script type="text/javascript" src="http://www.verovio.org/javascript/latest/verovio-toolkit-wasm.js" defer></script>
    <script type="text/javascript" src="https://www.verovio.org/javascript/jquery.min.js"></script>
  </head>
  <body>
    <header id="header">
        <h1>&#xEF91;<span class="grc">ΔΟΔΕΚΑΧΟΡΔΟΝ</span>&#xEF92;</h1>
        <nav class="main">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="chapters.html">Kapitel</a></li>
            <li>Über dieses Projekt</li>
            <li>Impressum</li>
            <li>Kontakt</li>
          </ul>
        </nav>
    </header>
      <button class="leftpanel" onclick="openNav()">ᐳ</button>
    <div id="leftpanel" class="leftpanel">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <p>This is the left sidepanel</p>
    </div>
    <div class="chapter">
      <section class="body-text">
          <div id="fulltext" class="text">
          <h2>Kapitel</h2>
          <p>Bitte wählen Sie hier Kapitel und Sprache aus. Sie können auch innerhalb eines Kapitels Passagen in der Übersetzung / im Original lesen.</p>
          <p>Bisher wurde das folgende Kapitel aufbereitet:</p>
          <ul>
            <li><emph>De Symphonetarum Ingenio</emph><br/>
              <form method="GET">
                <input type="submit" name="_lat"
                value=" Dieses Kapitel auf Latein lesen"/>
                <input type="submit" name="_deu"
                value="Dieses Kapitel auf Deutsch lesen"/>
              </form>
            </li>
          </ul>
          </div>
        </div>
      </section>
    </div>
    <footer>
      <p>This is the footer</p>
    </footer>
    <script>
      </script>
  </body>
</html>