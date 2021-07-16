
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
          /*const Cite = require('citation-js');
          let example = new Cite(bibliography);
          let output = example.format('bibliography', {
            format: 'html',
            template: 'apa',
            lang: 'en-US'
          });
          let bibList = document.getElementById("bibliography");
          bibList.innerHTML = output;*/
          for(let i = 0; i < bibliography.length; i++) {        // iterate over Bibliography

            let citeString = '';

            let source = bibliography[i];

            console.log(source);

            let id = source.id;                                   // meta
            let type = source.type;

            let author = '';
            let title = '';
            let publisher = '';
            let place = '';
            let year = '';
            let containerTitle = '';
            let editor = '';
            let pageRange = '';
            let volume = '';
            let issue = '';
            let isbn = '';
            let issn = '';
            let doi = '';

            /* ---------- Standards ------------ */

            if(source.hasOwnProperty('author')) {                 // determine Author
              if(source['author'].length == 1) {
                author += source['author'][0]['family'] + ', ' + source['author'][0]['given'];
              } 
              else {                                              // multiple Authors
                const authorList = source.author.length;
                for(j = 0; j < authorList; j++) {
                  if(j == 0) {
                    author += (source['author'][j]['family'] + ', ' + source['author'][j]['given']);
                  } else {author += (', ' + source['author'][j]['given'] + ' ' + source['author'][j]['family'])}
                }
              }
              console.log("Author: " + author);
            }
            if(source.hasOwnProperty('title')) {
            title += source.title;}
            if(source.hasOwnProperty('publisher')) {
            publisher += source.publisher;}
            if(source.hasOwnProperty('publisher-place')) {
            place += source['publisher-place'];}
            if(source.hasOwnProperty('issued')) {
            year += source.issued['date-parts'][0];}

            /* ---------- Container ------------ */

            if(source.hasOwnProperty('container-title')){
              containerTitle += source['container-title'];
            }
            if(source.hasOwnProperty('editor')){
              if(source.editor.length == 1) {                  // detemine Editor
                editor += source['editor'][0]['family'] + ', ' + source['editor'][0]['given'];
            } 
            else {                                              // multiple Editors
              const editorList = source.editor.length;
              for(j = 0; j < editorList; j++) {
                if(j == 0) {
                  editor += (source['editor'][j]['family'] + ', ' + source['editor'][j]['given']);
                } else {editor += (', ' + source['editor'][j]['given'] + ' ' + source['editor'][j]['family'])}
              }
            }
            }
            if(source.hasOwnProperty('page')){
              pageRange += source['page'];
            }
            if(source.hasOwnProperty('volume')){
              volume += source['volume'];
            }
            if(source.hasOwnProperty('issue')){
              issue += source['issue'];
            }

            /* ----------- Bibliographic Data --------- */

            if(source.hasOwnProperty('ISBN')){
              isbn += source['ISBN'];
            }
            if(source.hasOwnProperty('ISSN')){
              issn += source['ISSN'];
            }
            if(source.hasOwnProperty('DOI')){
              doi += source['DOI'];
            }

            switch(source.type) {
              case 'book':
                if(author != '') {citeString += author + '. ';}
                else if(editor != '') {citeString += editor + ' (Hg.). ';}
                citeString += '<em>' + title + '</em>. ' + place + ': ' + publisher + ', ' + year + '.';
                if(isbn){citeString += ' ISBN: ' + isbn + '. '};
                if(doi){citeString += ' DOI: ' + doi + '. '};
                break;
              case 'chapter':
                citeString += author + '. ' + '„' + title + '“. ' + '<em>' + containerTitle + '</em>. ' + editor + ' (Hg.). ' + place + ': ' + publisher + ', ' + year + '.' + pageRange + '. ';
                if(isbn){citeString += ' ISBN: ' + isbn+ '. '};
                if(doi){citeString += ' DOI: ' + doi + '. '};
                break;
              case 'article-journal':
                citeString += author + '. ' + '„' + title + '“. ' + '<em>' + containerTitle + '</em>. ' + volume + '.' + issue + '(' + year + '): ' + pageRange + '.';
                if(issn){citeString += ' ISSN: ' + isbn + '. '};
                if(doi){citeString += ' DOI: ' + doi + '. '};
              default:
                if(author != ''){citeString += author + '. ';}
                else if(editor != ''){citeString += editor + ' (Hg.). '}
                if(containerTitle != ''){citeString += '„' + title + '“. ' + '<em>' + containerTitle + '</em>. ';}
                else{citeString += '<em>' + title + '</em>. '};
                if(author != '' && editor != ''){citeString += editor + ' (Hg.). '};
                if(place != ''){citeString += place + ': ';}
                if(publisher != ''){citeString += publisher + '. ';}
                if(year != ''){citeString += year + '. ';}
                if(pageRange != ''){citeString += pageRange + '. ';}
                if(isbn){citeString += ' ISBN: ' + isbn + '. '};
                if(issn){citeString += ' ISSN: ' + issn + '. '};
                if(doi){citeString += ' DOI: ' + doi + '. '};
            }

            let entry = document.createElement('div');
            entry.setAttribute('class', 'csl-entry');
            entry.setAttribute('id', id);
            entry.innerHTML = citeString;
            document.getElementById('bibliography').appendChild(entry);
          }
        </script>
      </div>
    </section>
  </div>
<?php
  include("includes/footer.php");
?>