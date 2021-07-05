<h2>Editionsrichtlinien</h2>
<p>Diese Richtlinien sind, wie alle Inhalte dieser Seite, „work in progress“. Insbesondere Bereiche der Edition, die noch in der Entwicklungsphase sind (zum jetzigen Zeitpunkt insbesondere Musikbeispiele und Annotationen) können und werden sich noch ändern!</p>
<h3>Textgrundlage</h3>
<p>Diese Edition von Heinrich Glareans <em class="title">Dodecachordon</em> basiert auf dem von der Universitätsbibliothek Freiburg bereitgestellten <a href="http://dl.ub.uni-freiburg.de/diglit/glareanus1547" rel="noopener" target="_blank">Scan</a> (URN: <a href="urn:nbn:de:bsz:25-digilib-6262" rel="noopener" target="_blank">urn:nbn:de:bsz:25-digilib-6262</a>) der Erstausgabe des Werkes. Da es sich bei dieser Edition, wie auf der Seite <a href="about.php" target="_blank">Über dieses Projekt</a> beschrieben, um ein rein didaktisches Projekt handelt, wurde dieses Exemplar auch aus rein didaktischen Beweggründen zum Referenzpunkt der Edition erklärt. Es verfügt über einen reichen Schatz an Anmerkungen, wohl aus der Feder seines ehemaligen Besitzers, Johannes Algoers, der vermutlich während seiner Zeit als Student in Freiburg selbst bei Glarean studiert hat.</p>
<h3>Lateinischer Text</h3>
<p>Der lateinische Text basiert auf der vom <em>Thesaurus Musicarum Latinarum</em> bereitgestellten <a href="https://chmtl.indiana.edu/tml/16th/GLADOD1_TEXT.html" rel="noopener" target="_blank">Transkription</a>. Wo immer diese vom Freiburger Exemplar abweicht, wurde der Freiburger Version der Vorzug gegeben. Abkürzungen, Digraphe, etc. wurden nach dem Vorbild des TML stillschweigend aufgelöst. Ebenso sind Allographe (z.B. langes s – „ſ“) modernisiert, mit Ausnahme – wieder der Praxis des TML folgend – der Buchstaben u und v, die dem Freiburger Exemplar folgend beibehalten wurden. Griechische Passagen sind originalgetreu transkribiert, lateinische Transliterationen sind im TEI-Dokument gegeben. In der Browseransicht können diese per Mouse-hover angezeigt werden. Übersetzungen in Form von Anmerkungen sind geplant. Paragraphen folgen der Textaufteilung im Original.Der Textsatz orientiert sich am Freiburger Original, aktuell steht jedoch noch nicht fest, zu welchem Maße er davon abweichen wird. So werden z.B. aktuell Werktitel kursiviert, was im Original nicht der Fall ist. Ebenso werden Links in Kapitälchen gekennzeichnet, was natürlich auch im Original nicht so ist.</p>
<h3>Deutscher Text</h3>
<p>Der deutsche Text ist eine zu Demonstrationszwecken angefertigte, vorläufige Übersetzung und sollte somit mit Vorsicht genossen werden! Die Paragraphenaufteilung folgt dem Lateinischen Text, was entscheidend ist, da anhand der IDs der Paragraphen die jeweiligen Texte für Übersetzungen identifiziert werden.</p>
<h3>Handschriftliche Anmerkungen</h3>
<p>Die handschriftlichen Annotationen werden als Marginalien wiedergegeben. Abkürzungen sollen hierbei beibehalten werden, da es sich hier, im Gegensatz zu den Abkürzungen des lateinischen Texts nicht um ein fixes und reproduzierbares Set an Abkürzungen handelt, sondern die jeweilige Disposition des Schreibers wiedergibt. Auflösungen der Anmerkungen sollen, wo möglich, per hover verfügbar gemacht werden.</p>
<h2>Liste der verwendeten Auszeichnungen im TEI-Dokument</h2>
<h3>Allgemeines</h3>
<ul>
  <li>Zur individuellen Identifizierung eines <emph>einzelnen</emph> tags pro Dokument wird das Attribut <pre>@xml:id</pre> verwendet</li>
  <li>Zur Identifizierung eines Begriffes oder Namens, der im Dokument mehrfach vorkommen könnte, wird das Attribut <pre>@ref</pre> verwendet</li>
  <li>Nummerierbare Elemente (Seitenzahlen, Abschnitte, Abschnittstitel, Paragraphen, etc) werden anhand des Attributs <pre>@n</pre> hochgezählt</li>
  <li>Hierarchie (z.B. Unterkapitel) wird anhand des <pre>@n</pre>-Attributs gekennzeichnet: <pre>&lt;div type="chapter" n="1"&gt;&lt;div type="section" n="1.1"&gt;&lt;/div&gt;&lt;/div&gt;</pre></li>
</ul>
<h3>Textstruktur</h3>
<ul>
  <li>Kapitel: <pre>&lt;div1 type="chapter" n="[x]"&gt;[Kapitel]&lt;/div&gt;</pre></li>
  <li>Unterkapitel: <pre>&lt;div2 type="section" n="1.1"&gt;[Unterkapitel]&lt;/div&gt;</pre></li>
  <li>Kapitel- / Unterkapitelüberschriften: <pre>&lt;head n="[corresp. n]"&gt;[Überschrift]&lt;/head&gt;</pre></li>
  <li>Seitenumbrüche: <pre>&lt;pb n="[Seitennummer im Original]"/&gt;</li>
  <li>Paragraphen: <pre>&lt;p xml:id="p[nummer, hochzählend]"&gt;[Paragraph]&lt;/p&gt;</pre></li>
</ul>
<h3>Semantische Auszeichnungen</h3>
<ul>
  <li>Namen: <pre>&lt;name type="[person, place, etc]"&gt;[Name]&lt;/name&gt;</pre></li>
  <li>Funktionsnamen (Beispiel: Ludwig XII, König von Frankreich): 
    <pre class="block">
      &lt;name&gt;
        &lt;roleName&gt;
          &lt;placeName&gt;Francorum&lt;/placeName&gt;
           Regem
        &lt;/roleName&gt;
         Lituichium XII
      &lt;/name&gt;
    </pre>
  </li>
  <li>Fachbegriffe: <pre>&lt;term&gt;[Fachbegriff]&lt;/term&gt;</pre></li>
  <li>Titel: <pre>&lt;title&gt;[Titel]&lt;/title&gt;</pre></li>
  <li>Fremdsprachen: <pre>&lt;foreign xml:lang="[Sprachküzel]&gt;[Text]&lt;/foreign&gt;"</pre></li>
</ul>
<h3>Musik</h3>
<ul>
  <li>Ein gesamtes Musikbeispiel wird eingeklammert von <pre>&lt;figure type="music"&gt;&lt;/figure&gt;</pre></li>
  <li>Ein im Original gegebener Titel des Musikbeispiels (!= Werktitel!) wird mit dem tag <pre>&lt;head&gt;&lt;/head&gt;</pre> angegeben</li>
  <li>Der Verweis auf die korrespondierende MEI-Datei erfolgt im tag <pre>&lt;notatedMusic corresp="[Dateiname]"&gt;&lt;notatedMusic&gt;</pre></li>
</ul>
<p>Beispiel:<br/>
  <pre class="block">
    &lt;figure type="music"&gt;
      &lt;head&gt;Fuga ad minimam.&lt;/head&gt;
      &lt;notatedMusic corresp="3_Symph_15.mei"&gt;&lt;/notatedMusic&gt;
    &lt;/figure&gt;
  </pre>
</p>
<h3>Annotationen</h3>
<ul>
  <li>Handschriftliche Addenda werden mit dem Tag <pre>&lt;add&gt;[Text]&lt;/add&gt;</pre> gekennzeichnet</li>
  <li>Marginalien werden mit dem Tag <pre>&lt;note&gt;[Text]&lt;/note&gt;</pre> gekennzeichnet</li>
  <li>Da Marginalien immer Handschriftlich sind, sind sie folglich immer: <pre>&lt;note&gt;&lt;add&gt;[Text]&lt;/add&gt;&lt;/note&gt;</pre></li>
</ul>
<h3>Transliterationen</h3>
<ul>
  <li>Transliterationen, bei denen Original und Transliteration angegeben werden, sind umspannt von einem <pre>choice</pre>-tag: <pre>&lt;choice ana="transl"&gt;[Original und Transliteration]&lt;/choice&gt;</pre></li>
  <li>Originaltext: <pre>&lt;orig&gt;[Text]&lt;/orig&gt;</pre></li>
  <li>Transliteration: <pre>&lt;reg&gt;[Text]&lt;/reg&gt;</pre></li>
</ul>
<p>Beispiel: <br/>
  <pre class="block">
    &lt;choice ana="transl"&gt;
      &lt;orig&gt;
        &lt;foreign xml:lang="grc"&gt;
          καθολικὰ
        &lt;/foreign&gt;
      &lt;/orig&gt;
      &lt;reg&gt;
        katholika
      &lt;/reg&gt;
    &lt;/choice&gt;
  </pre>
</p>
<p>Letzte Änderung: 05.07.2021</p>