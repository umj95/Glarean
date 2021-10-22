/* ================================================================================= Global Variables ================ */

  let currentBook = "";                                           // the current book

  let currentChapter = "";                                        // the current main Chapter to be displayed

  let languages = [];

    languages['_lat'] = "lateinisch";
    languages['_deu'] = "deutsch";
    languages['_eng'] = "englisch";

  let pageLanguage = "";                                          // the language in which static texts and page functions are displayed

  let mainLanguage = "";                                          // the language of the main document

  let secondaryLanguages = [];                                    // the translation languages

  let tutorial = false;

  const pathToData = "https://raw.githubusercontent.com/umj95/Glarean_Dodekachordon_Text/main/data/"; // the path to the text data folder, containing the chapter folders

  let bibliography = {};

  let comments = {};                                              // the comment Object -> commentary will be loaded in here one at a time
                                                                  // commentary exists in separate JSON files, so comments[editorsComments]
                                                                  // will point to the data from the JSON file containing editorial comments, 
                                                                  // whereas comments[errata] will point to the JSON file containing errata.
                                                                  // Every comment is linked to its target via the target's xml:id attribute.

  let noteNr = 0;                                                 // tracks the Number of Notes


  const fullText = new CETEI();                                          // the primary CETEIcean object
                                                                  // (two are specified because we need different sets of behaviors)
  const translText = new CETEI();                                          // the secondary CETEIcean object (for translations)

  let fullTextBehaviors = {
    "tei":{                                                       // all CETEIcean behaviors are defined here
      "term":                                                       // put a term in its own span container
        function(elt) {
          var term = document.createElement("span");
          term.setAttribute("class", "term");
          if (elt.hasAttribute("ref")) {
            var ref = document.createElement("a");                  // if it has a ref-attribute, link to it
            ref.setAttribute("class", "term");
            ref.setAttribute("href", elt.getAttribute("ref"));
            ref.setAttribute("target", "_blank");
            ref.innerHTML = elt.innerHTML;
            elt.replaceWith(ref);
          }
          term.innerHTML = elt.innerHTML;
          return term;
        },

      "name": [                                                     // if a name has a ref-attribute, link to it
        ["[ref]", ["<a href=\"$rw@ref\" target=\"_blank\">","</a>"]]
      ],

      "head": function(e) {                                         // heads get their corresponding <hx>-tags, depending on their depth
        if (e.hasAttribute("n")){
          var dot = /\./;
          if (dot.test(e.getAttribute("n"))){
            let depth = e.getAttribute("n").match(/\./g).length;
            var result = document.createElement("h" + (depth < 5 ? (depth + 2) : 6));
          } else {var result = document.createElement("h2");}
        } else {var result = document.createElement("h2");}
        for (let n of Array.from(e.childNodes)) {
          result.appendChild(n.cloneNode(true));
        }
        return result;
      },

      "pb": function(elt) {                                         // page breaks get their own div-container
        let page = document.createElement("div");
        page.setAttribute("class", "pb");

        let pageLink = document.createElement("a");
        freiburgPageNr = parseInt(elt.getAttribute("n")) + 24;
        let link = "";
        if(freiburgPageNr < 100) {
          link = "http://dl.ub.uni-freiburg.de/diglit/glareanus1547/00" + freiburgPageNr;
        } else {
          link = "http://dl.ub.uni-freiburg.de/diglit/glareanus1547/0" + freiburgPageNr;
        }
        pageLink.setAttribute("href", link);
        pageLink.setAttribute("rel", "noopener");
        pageLink.setAttribute("target", "_blank");
        pageLink.setAttribute("class", "tooltip");
        pageLink.innerHTML = "&rarr;";

        let pageTip = document.createElement("span");
        pageTip.setAttribute("class", "tiptext");
        if(pageLanguage == "de"){
          pageTip.innerHTML = "Digitalisat dieser Seite";
        } else {
          pageTip.innerHTML = "Digitalised version of this page";
        }

        pageLink.appendChild(pageTip);

        let pb = document.createElement("span");
        pb.innerHTML = elt.getAttribute("n");
        //pb.appendChild(document.createElement("br"));
        page.appendChild(pageLink);
        page.appendChild(pb);
        return page;
      },

      "figure": function(fig) {                                     // figure contains musical examples – it is built with a container,
                                                                    // a header containing the title
                                                                    // and a body that will be targeted by Verovio to render the corresp.
                                                                    // MEI file, identified by the figure's corresp-attribute
        if (fig.getAttribute("type") === "music") {
          var children = fig.children;                              //  Get information about mei file / title
          if(children.length > 1) {
            var title = children[0].textContent;
            var meiFile = children[1].getAttribute("corresp");
          } else {
            var title = "";
            var meiFile = children[0].getAttribute("corresp");
          }
          var mei = document.createElement("div");                  //  Build container 
          mei.setAttribute("class", "music");
          mei.setAttribute("id", meiFile);
          var meiHead = document.createElement("div");              //  Build Header
          mei.appendChild(meiHead);
          meiHead.setAttribute("class", "meiHead");
          meiHead.setAttribute("id", meiFile + "-head");
          meiHead.innerHTML = title;
          var meiBody = document.createElement("div");              //  Build Body
          mei.appendChild(meiBody);
          meiBody.setAttribute("class", "meiBody");
          meiBody.setAttribute("id", meiFile + "-body");            // the body's id attribute is the hook for Verovio to pick the right file
          return mei;
        } else if(fig.getAttribute("type") === "image") {
          let url = `${pathToData}${currentBook}/${currentChapter}/`;
          url += fig.children[0].getAttribute("url");
          image = document.createElement("img");
          image.setAttribute("src", url);
          return image;
        }
      },

      "choice": function(choice) {                                  // choice builds tooltips to display expansions, of abbreviations,
                                                                    // transliteration of greek script etc.
        if(choice.getAttribute("ana") === "transl") {               // transliterations
          let transl = document.createElement("span");
          transl.setAttribute("class", "transl tooltip")
          let orig = document.createElement("span");
          orig.setAttribute("class", "orig");
          orig.innerHTML = choice.children[0].innerHTML;
          let reg = document.createElement("span");
          reg.setAttribute("class", "reg tiptext");
          reg.innerHTML = choice.children[1].innerHTML;
          transl.appendChild(orig);
          transl.appendChild(reg);
          return transl;
        }
        else if(choice.getAttribute("ana") === "abbr") {            // abbreviations
          let abbr = document.createElement("span");
          abbr.setAttribute("class", "abbr tooltip")
          let orig = document.createElement("span");
          orig.setAttribute("class", "orig");
          orig.innerHTML = choice.children[0].innerHTML;
          let reg = document.createElement("span");
          reg.setAttribute("class", "reg tiptext");
          reg.innerHTML = choice.children[1].innerHTML;
          abbr.appendChild(orig);
          abbr.appendChild(reg);
          return abbr;
        }
        else if(choice.getAttribute("ana") === "errata") {          // errata
          let erratum = document.createElement("span");
          erratum.setAttribute("class", "errata tooltip")
          let sic = document.createElement("span");
          sic.setAttribute("class", "sic");
          sic.innerHTML = choice.children[0].innerHTML;
          let corr = document.createElement("span");
          corr.setAttribute("class", "corr tiptext");
          corr.innerHTML = "Erratum: ";
          corr.innerHTML += choice.children[1].innerHTML;
          erratum.appendChild(sic);
          erratum.appendChild(corr);
          return erratum;
        }
      },

      "foreign": function(foreign) {                                // foreign text get its own span container (i.e. Greek)
        var otherLang = document.createElement("span");
        otherLang.setAttribute("class", foreign.getAttribute("xml:lang"))
        otherLang.innerHTML = foreign.innerHTML;
        return otherLang;
      },

      "seg": function(initial) {                                    // initials can be marked here in order to create drop caps if desired
        if(initial.getAttribute("type") === "initial-caps") {
          var init = document.createElement("span");
          init.setAttribute("class", "initial");
          init.innerHTML = initial.innerHTML;
          return init;
        }
      },

      "emph": function(emph) {
        emphasis = document.createElement("em");
        if(emph.hasAttribute("style")) {
          emphasis.style.display = "block";
          emphasis.style.textAlign = emph.getAttribute("style");
        }
        if(emph.hasAttribute("rend")) {
          emphasis.style.fontStyle = emph.getAttribute("rend");
        }
        emphasis.innerHTML = emph.innerHTML;
        return emphasis;
      },

      "note": function(note) {
        var margin = document.createElement("span");
        margin.setAttribute("class", "margin");
        margin.innerHTML = note.innerHTML;
        return margin;
      },

      "p": function(para) {                                         // paragraphs with id (all of them) get their own <p>-tags
        if(para.hasAttribute("xml:id")) {
          let paragraph = document.createElement("p");
          paragraph.innerHTML = para.innerHTML;

          if(secondaryLanguages){                                   // if chapterOptions includes secondary languages, each paragraph gets
                                                                    // one or more translation buttons that triggers the createNote function
            for(let language of secondaryLanguages){
              var container = document.createElement("div");
              container.setAttribute("class", "transl-button tooltip");
              var label = document.createElement("span");
              label.setAttribute("class", "tiptext");
              if(pageLanguage == 'de'){
                label.innerHTML = "Diesen Absatz auf " + languages[language] + " übersetzen";
              } else {
                label.innerHTML = "Translate this paragraph to " + languages[language];
              }
              var button1 = document.createElement("button");
              button1.setAttribute("class", "transl");
              button1.setAttribute('onclick', 'createNote("transl", "' + para.getAttribute("xml:id") + '", "' + language + '")');
              if(language == '_deu'){
                button1.innerText = "🇩🇪";
              } else if(language == '_lat'){
                button1.innerText = "🇻🇦";
              }
              container.appendChild(label);
              container.appendChild(button1);
              paragraph.appendChild(container);
            }
          }
          return paragraph;
        }
      }
    }
  };

  let translTextBehaviors = {
    "tei-transl":{                                                  // all CETEIcean behaviors for translated texts
      "term": function(elt) {                                       // put a term in its own span container
          var term = document.createElement("span");
          term.setAttribute("class", "term");
          term.style.color = "red";
          term.innerHTML = elt.innerHTML;
          return term;
        },

      "name": [                                                     // if a name has a ref-attribute, link to it
        ["[ref]", ["<a href=\"$rw@ref\" target=\"_blank\" rel=\"noopener\">","</a>"]]
      ],

      "head": function(e) {                                         // heads get their corresponding <hx>-tags, depending on their depth
        if (e.hasAttribute("n")){
          var dot = /\./;
          if (dot.test(e.getAttribute("n"))){
            let depth = e.getAttribute("n").match(/\./g).length;
            var result = document.createElement("h" + (depth < 5 ? (depth + 2) : 6));
          } else {var result = document.createElement("h2");}
        } else {var result = document.createElement("h2");}
        for (let n of Array.from(e.childNodes)) {
          result.appendChild(n.cloneNode(true));
        }
        return result;
      },

      "pb": function(elt) {                                         // page breaks get their own div-container
        var pb = document.createElement("div");
        pb.setAttribute("class", "pb");
        pb.innerHTML = elt.getAttribute("n");
        return pb;
      },

      "choice": function(choice) {                                  // choice builds tooltips to display expansions, of abbreviations,
                                                                    // transliteration of greek script etc.
        if(choice.getAttribute("ana") === "transl") {               // transliterations
          var transl = document.createElement("span");
          transl.setAttribute("class", "transl tooltip")
          var orig = document.createElement("span");
          orig.setAttribute("class", "orig");
          orig.innerHTML = choice.children[0].innerHTML;
          var reg = document.createElement("span");
          reg.setAttribute("class", "reg tiptext");
          reg.innerHTML = choice.children[1].innerHTML;
          transl.appendChild(orig);
          transl.appendChild(reg);
          return transl;
        } 
        else if(choice.getAttribute("ana") === "abbr") {            // abbreviations
          var abbr = document.createElement("span");
          abbr.setAttribute("class", "abbr tooltip")
          var orig = document.createElement("span");
          orig.setAttribute("class", "orig");
          orig.innerHTML = choice.children[0].innerHTML;
          var reg = document.createElement("span");
          reg.setAttribute("class", "reg tiptext");
          reg.innerHTML = choice.children[1].innerHTML;
          abbr.appendChild(orig);
          abbr.appendChild(reg);
          return abbr;
        }
      },

      "foreign": function(foreign) {                                // foreign text get its own span container (i.e. Greek)
        var otherLang = document.createElement("span");
        otherLang.setAttribute("class", foreign.getAttribute("xml:lang"))
        otherLang.innerHTML = foreign.innerHTML;
        return otherLang;
      },

      "seg": function(initial) {                                    // initials can be marked here in order to create drop caps if desired
        if(initial.getAttribute("type") === "initial-caps") {
          var init = document.createElement("span");
          init.setAttribute("class", "initial");
          init.innerHTML = initial.innerHTML;
          return init;
        }
      },

      //"note": function(note) {
      //  note.innerHTML = "";
      //  return note;
      //},

      "p": function(para) {                                         // unlike the main text, paragraphs only get their tags, but no transl.-buttons
        if(para.hasAttribute("xml:id")) {
          let paragraph = document.createElement("p");
          paragraph.innerHTML = para.innerHTML;
          return para;
        }
      },
    }                                                               // these three belong to c.addBehaviors -> DO NOT DELETE!
  };
/* ================================================================================= Functions ================= */


  function insertTEIChapter(chapter) {                            // inserts a full TEI document at location PATH in #FULLTEXT
    let path = `${pathToData}${currentBook}/${currentChapter}/${currentBook}_${currentChapter}${mainLanguage}.xml`;
    chapter.getHTML5(path, function(data) {
      document.getElementById("fulltext").innerHTML = "";
      document.getElementById("fulltext").appendChild(data);
    });
  }

  function optionalBehaviors(optionsList) {                       // takes the options list from the URL and adds the appropriate behaviors to the fulltextBehaviors object
    Object.keys(optionsList).forEach(function(key){
      if(key === "marginalia" && optionsList[key] === "true") {
        console.log("marginalia === true");
        fullTextBehaviors["tei"]["add"] = function(add) {
          let addition = document.createElement("span");
          addition.setAttribute("class", "addition");
          if(add.hasAttribute("rend")) {
            addition.style.color = add.getAttribute("rend");
          }
          if(add.getAttribute("type") === "heading") {
            addition.className += " heading";
          } else if(add.getAttribute("type") === "super") {
            addition.className += " superscript";
          }
          addition.innerHTML = add.innerHTML;
          return addition;
          //fullTextBehaviors["tei"]["note"] = function(note) {
          // var margin = document.createElement("span");
          // margin.setAttribute("class", "margin");
          // margin.innerHTML = note.innerHTML;
          // return margin;
        };
        fullTextBehaviors["tei"]["hi"] = function(hi) {
          let highlight = document.createElement("span");
          highlight.setAttribute("class", "highlight");
          if(hi.hasAttribute("rend")) {
            highlight.style.color = hi.getAttribute("rend");
          } else if(hi.hasAttribute("style")) {
            highlight.style.textDecoration = hi.getAttribute("style");
            highlight.style.textDecorationColor = "red";
          }
          highlight.innerHTML = hi.innerHTML;
          return highlight;
        }
      } else if(key === "marginalia" && optionsList[key] != "true"){
        console.log("marginalia != true");
        fullTextBehaviors["tei"]["add"] = function(add) {
          var addition = document.createElement("span");
          addition.setAttribute("class", "addition");
          addition.innerHTML = add.innerHTML;
          addition.innerHTML = "";
          return addition;
        // fullTextBehaviors["tei"]["note"] = function(note) {
        //   var margin = document.createElement("span");
        //   margin.setAttribute("class", "margin");
        //   margin.innerHTML = note.innerHTML;
        //   margin.innerHTML = "";
        //   return margin;
        };
      }
    })

    console.log(fullTextBehaviors);
    console.log(translTextBehaviors);
  }

  function openPanel(form) {                                      // opens a panel
    if(form == 'optionsPanel') {                                  // left panel

      let panel = document.getElementById("optionsPanel");
      let button = document.getElementById("optionsButton");

      if($(window).width() > 1200){
          panel.style.width = "25%";
          button.style.cssText = `
            left: 25%;
            border-radius: 150px 150px;
            z-index: 6;`;
      } else if($(window).width() > 600){
        panel.style.width = "40%";
        button.style.cssText = `
            left: 40%;
            border-radius: 150px 150px;
            z-index: 6;`;
      } else {
        panel.style.height = "100vh";
      }
      button.setAttribute("onclick", "closePanel('optionsPanel')");
      button.innerText = "◄";

    } else if(form == 'notesPanel') {                             // right Panel

      let panel = document.getElementById("noteArea");
      let button = document.getElementById("notesButton");

      if($(window).width() > 600){
        panel.style.cssText = `
          width: 30%;
          margin-left: 70%;`;
        button.style.cssText = `
          left: 70%;
          border-radius: 150px 150px;
          z-index: 6;`;
        button.setAttribute("onclick", "closePanel('notesPanel')");
        button.innerText = "►";
      } else {
        panel.style.height = "100%";
        panel.style.marginTop = "0vh";
        button.setAttribute("onclick", "closePanel('notesPanel')");
      }
    }
  }

  function closePanel(form) {                                     // closes a panel
    if(form === "optionsPanel") {                                 // left panel

      let panel = document.getElementById("optionsPanel");
      let button = document.getElementById("optionsButton");

      if($(window).width() > 600){
        panel.style.width = "0";
        button.style.cssText = `
            left: 0%;
            border-radius: 0 150px 150px 0;
            z-index: 2;`;
      } else {
        panel.style.height = "0";
      }
      button.setAttribute("onclick", "openPanel('optionsPanel')");
      button.innerText = "►";

    } else if(form === "notesPanel") {                            // right Panel

      let panel = document.getElementById("noteArea");
      let button = document.getElementById("notesButton");

      if($(window).width() > 600){
        panel.style.width = "0";
        button.style.cssText = `
          left: 100%;
          z-index: 2;`;
        button.setAttribute("onclick", "openPanel('notesPanel')");
        button.innerText = "◄";
      } else {
        panel.style.height = "0";
        button.setAttribute("onclick", "openPanel('notesPanel')");
      }
    }
  }

  function hamburgerExpand() {                                    //make menu items look better on mobile
    let x = document.getElementById("hamburgerExpand");
    if (x.className === "main") {
      x.className += " responsive";
    } else {
      x.className = "main";
    }
  }

  function createNote(kind, key, specifierA = "") {               // creates a new Note
    // KIND is the sort of note (translation, person, etc 
    // – determines the styling) and KEY is the 
    // identifier that is used to load the data.
    // specifierA is a generic variable, used for language in translations
    // and commentary specification in comments
    noteNr++;
    let noteID = "note_" + noteNr;
    let newNote = document.createElement("div"); //create Note
    newNote.setAttribute("class", "note");
    newNote.setAttribute("id", noteID);

    document.getElementById("notesContent").appendChild(newNote);
  
    if(kind === "transl") {                                       // makes note for translated paragraph
      newNote.setAttribute("class", "note transl");
      var title = document.createElement("div");  // create Title
      title.setAttribute("class", "noteTitle");
      var titling = document.createElement("span");
      if(pageLanguage == 'de') {
        var noteTitle = "Übersetzung";
      } else {
        var noteTitle = "Translation";
      }
      titling.innerHTML = noteTitle;
      var closeNote = document.createElement("button");   // close Button
      closeNote.setAttribute("class", "closebtn");
      closeNote.setAttribute('onclick', 'deleteNote("' + noteID + '")');
      closeNote.innerHTML = "&times;";
      title.appendChild(titling);
      title.appendChild(closeNote);
  
      var body = document.createElement("p");  // create Body
      body.setAttribute("class", "noteBody");
      body.setAttribute("id", "noteBody_" + noteID);
      var footer = document.createElement("p");  // create Footer
      footer.setAttribute("class", "noteFooter");
      footer.innerHTML = "";
      
      waitForEl("#noteBody_" + noteID, fetchParagraph(translText, key, "noteBody_" + noteID, specifierA));
    }
    else if(kind === "comment") {                                 // makes note for comment
      newNote.setAttribute("class", "note comment");
      var title = document.createElement("div");          // create Title
      title.setAttribute("class", "noteTitle");
      var titling = document.createElement("span");
      var noteTitle = "Kommentar";
      titling.innerHTML = noteTitle;
      var closeNote = document.createElement("button");   // close Button
      closeNote.setAttribute("class", "closebtn");
      closeNote.setAttribute('onclick', 'deleteNote("' + noteID + '")');
      closeNote.innerHTML = "&times;";
      title.appendChild(titling);
      title.appendChild(closeNote);
  
      var body = document.createElement("div");  // create Body
      body.setAttribute("class", "noteBody");
      body.setAttribute("id", "noteBody_" + noteID);
      var footer = document.createElement("p");  // create Footer
      footer.setAttribute("class", "noteFooter");
      footer.innerHTML = "";
      
      var content = fetchComment(key, "noteBody_" + noteID, specifierA);
      body.appendChild(content);
    }
  
    newNote.appendChild(title);
    newNote.appendChild(body);
    newNote.appendChild(footer);
    alertText();
    openPanel('notesPanel');
  }
  
  function deleteNote(noteId) {                                   // deletes a Note with ID NOTEID
    var elem = document.getElementById(noteId);
    document.getElementById("notesContent").removeChild(elem);
    /* if($(window).width() < 600) {
      closePanel("notesPanel");
    } */
    alertText();
  }
  
  function fetchParagraph(translCETEI, paraID, noteBodyID, langSpecifier) {    // fetches a paragraph with id PARAID from a file at location PATH
    let path = `${pathToData}${currentBook}/${currentChapter}/${currentBook}_${currentChapter}${langSpecifier}.xml`;
    translCETEI.getHTML5(path, function(transl) {
      let noteBody = document.getElementById(noteBodyID);
      for (const p of Array.from(transl.getElementsByTagName("tei-p"))) {
        if(p.getAttribute("id") === paraID) {
          document.adoptNode(p);
          noteBody.appendChild(p);
        }
      }
    });
  }

  async function insertComments(commentaryFile) {                 //inserts comment links in the body text at all targets specified in COMMENTARYFILE
    let path = `${pathToData}${currentBook}/${currentChapter}/${commentaryFile}.json`;

    let rawCommentary = await fetch(path);
    comments[commentaryFile] = await rawCommentary.json();
    
    for (let key in comments[commentaryFile]) {

      if(comments[commentaryFile].hasOwnProperty(key)) {
        let id = comments[commentaryFile][key].id;                // get Appropriate IDs
        let target = document.getElementById(comments[commentaryFile][key].target);
        console.log(target);

        if(target.id.includes("add") && chapterOptions['marginalia'] == "false") {
          console.log("it has add!")
        }  // dont add comments to annotations that are not displayed
        else {
          let commentTip = document.createElement("span");          // create Comment + Tooltip
          commentTip.setAttribute("class", "tiptext");
          if(pageLanguage == 'de') {
            commentTip.innerHTML = "Kommentar öffnen";
          } else {
            commentTip.innerHTML = "Open commentary";
          }
          let comment = document.createElement("span");
          comment.setAttribute("class", "comment tooltip");
          comment.setAttribute("id", "comment_" + comments[commentaryFile][key].id)
          let commentLink = document.createElement("a");
          commentLink.setAttribute("class", "commentLink ");
          commentLink.setAttribute("href", "#");
          commentLink.setAttribute('onclick', 'createNote("comment", "' + id + '", "' + commentaryFile + '")');
          commentLink.innerHTML = "&#176;";
          comment.appendChild(commentTip);
          comment.appendChild(commentLink);
          target.appendChild(comment);
        }
      }
    }
  }

  function fetchComment(commentId, noteBodyID, commentCorpus) {   // inserts a comment from comments[COMMENTCORPUS] into a note
    //comments = JSON.parse(comments);

    commentText = document.createElement("div");
    commentText.setAttribute("class", "commentText");

    for (var key in comments[commentCorpus]) {
      if(comments[commentCorpus][key].id === commentId) {
        var commentAuthor = comments[commentCorpus][key].author;
        var commentTitle = comments[commentCorpus][key].title;
        var commentContent = comments[commentCorpus][key].content;
        var commentLinks = comments[commentCorpus][key].links;
        var commentReferences = comments[commentCorpus][key].references;
      }
    }
    var title = document.createElement("h5");                     // note title
    title.setAttribute("class", "commentTitle");
    title.innerHTML = commentTitle;

    var author = document.createElement("span");                  // note author
    author.setAttribute("class", "commentAuthor");
    author.innerHTML = commentAuthor;

    var content = document.createElement("div");                  // note content
    content.setAttribute("class", "commentContent");
    content.innerHTML = commentContent;

    if(commentLinks) {
      var links = document.createElement("div");                    // note links
      links.setAttribute("class", "commentLinks");
      links.innerHTML = "<h6>Weblinks</h6>"
      var linkList = document.createElement("ul");
      for(var i = 0; i < commentLinks.length; i++) {
        var item = document.createElement("li");
        item.innerHTML = '<a href="' + commentLinks[i] + '" target="_blank" rel="noopener">' + commentLinks[i] + '</a>';
        linkList.appendChild(item);
      }
      links.appendChild(linkList);
    }

    if(commentReferences){
      var references = document.createElement("div");               // note references
      references.setAttribute("class", "commentReferences");
      if(pageLanguage == 'de') {
        references.innerHTML = "<h6>Weiterführende Literatur</h6>";
      } else {
        references.innerHTML = "<h6>Further resources</h6>";
      }
      var referenceList = document.createElement("ul");
      for(var i = 0; i < commentReferences.length; i++) {
        var item = document.createElement("li");
        item.innerHTML = cite(commentReferences[i][0], commentReferences[i][1]);
        referenceList.appendChild(item);
      }
      references.appendChild(referenceList);
    }

    commentText.appendChild(title);
    commentText.appendChild(author);
    commentText.appendChild(content);
    if(links){commentText.appendChild(links);}
    if(references){commentText.appendChild(references);}

    return commentText;
  }

  function printBibliography(option) {                            // creates download links for bibliographies according to format specified in OPTION
    if(option === 'csl') {
      var a = document.createElement("a");
      a.href = "data/site/sources.json";
      a.setAttribute("download", "glarean_bibliography_csl.json");
      a.click();
    }
    else if(option === 'txt') {

    }
  }

  async function getCiteStyle() {                                 // fetches the citation style
    let csl = fetch('data/site/mla.csl');
    return csl;
  }

  function cite(citeKey, range = '') {                            // takes a citeKey and a range, returns a short citation
    for(let i = 0; i < bibliography.length; i++) {
      if(bibliography[i].id === citeKey) {                        // browse the bibliography
        let source = bibliography[i];
        let title = '';

        if(source.hasOwnProperty('title-short')){                 // determine title
          title = source['title-short'];
        } else { title = source.title;}
        let authors = '';

        const authorList = source.author.length;
        for(let i = 0; i < authorList; i++) {
          author = source.author[i]['family'];
          authors += author;
          if(i == (authorList - 1) || authorList == 1) {
            authors += ', ';
          } else {authors += ' &amp; ';}
        }
        if(pageLanguage == 'de') {
          var citation = '<span class="tooltip"><a href="bibliography.php#' + citeKey + '" rel="noopener" target="blank">' + authors + '</a><span class="tiptext">Zum Bibliographieeintrag</span></span>' + title;
        } else {
          var citation = '<span class="tooltip"><a href="bibliography.php#' + citeKey + '" rel="noopener" target="blank">' + authors + '</a><span class="tiptext">Jump to bibliography entry</span></span>' + title;
        }
        let citeString = '<span class="citation">' + citation + ', ' + range + '.</span>'
        return citeString;
      }
    }
  }

  function waitForEl(selector, callback) {                        // gives document time to build objects that are targeted by functions
    if (jQuery(selector).length) {
      callback;
    } else {
      setTimeout(function() {
        waitForEl(selector, callback);
      }, 100);
    }
  }

  function alertText() {                                           // creates an explanatory paragraph in the notes pane if no notes are open
    if(document.getElementsByClassName("note").length === 0) {
      let alert = document.createElement("p");
      alert.setAttribute("id", "note_alert");
      if(pageLanguage == 'de') {
        alert.innerHTML = "Hier werden Kommentare und Übersetzungen angezeigt. Momentan sind keine Elemente offen.";
      } else {
        alert.innerHTML = "This pane displays commentary and translations. No elements are currently open.";
      }
      document.getElementById("notesContent").appendChild(alert);
    }
    else if((document.getElementsByClassName("note").length > 0) && document.getElementById("note_alert")) {
      document.getElementById("notesContent").removeChild(document.getElementById("note_alert"));
    }
  }

  function scrollSensitiveHeader() {                              // make header disappear on scroll
    let prevScrollpos = window.pageYOffset;
    let headerHeight = document.getElementById("header").offsetHeight + 10;
    window.onscroll = function() {
      let currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("header").style.top = "0";
      } else {
        document.getElementById("header").style.top = "-" + headerHeight + "px";
      }
      prevScrollpos = currentScrollPos;
    }
  }

  function startTutorial() {
    window.location.href = "index.php#tutorial"
    tutorial = true;
    //constructTip(0);
  }

  function closeTutorial() {
    let tutorialDiv = document.getElementById("modalBackgr");
    tutorialDiv.remove();
    tutorial = false;
    window.location.href = "index.php";
  }

  function constructTip(number) {
    if(number > 0) {
      if(!!document.getElementById("modalBackgr")){
        document.getElementById("modalBackgr").remove();
      }
    }
    let modalBackgr = document.createElement("div");
    let modal       = document.createElement("div");
    let modalHeader = document.createElement("div");
    let modalBody   = document.createElement("div");
    let modalFooter = document.createElement("div");

    modalBackgr.setAttribute("class", "modalBackgr");
    modalBackgr.setAttribute("id", "modalBackgr");

    switch(number) {
      case 0:
        break;
      case 1:
        modal.style.marginLeft = "10%";
        modal.style.top = "calc(0.8in + 3rem)"
        break;
      case 2:
        modal.style.marginRight = "2.5%";
        modal.style.top = "calc(0.8in + 3rem)"
        modal.style.width = "25%";
        break;
      case 3:
        modal.style.marginLeft = "10%";
        modal.style.top = "60%";
        modal.style.width = "25%";
        break;
      case 4:
        modal.style.marginLeft = "5%";
        modal.style.top = "50%";
        modal.style.width = "25%";
        break;
      case 5:
        modal.style.marginLeft = "40%";
        modal.style.top = "50%";
        modal.style.width = "25%";
        break;
      case 6:
        modal.style.marginLeft = "40%";
        modal.style.top = "20%";
        modal.style.width = "25%";
        break;
      case 7:
        modal.style.marginLeft = "5%";
        modal.style.top = "20%";
        modal.style.width = "25%";
        break;
      case 8:
        modal.style.marginLeft = "40%";
        modal.style.top = "20%";
        modal.style.width = "25%";
        break;
    }

    modal.setAttribute("class", "note");
    modal.setAttribute("id", "tutorial");

    modalHeader.setAttribute("class", "noteTitle");
    modalBody.setAttribute("class", "noteBody");
    modalFooter.setAttribute("class", "noteFooter");

    modalHeader.innerHTML = "Tutorial";

    modal.appendChild(modalHeader);
    modal.appendChild(modalBody);
    modal.appendChild(modalFooter);

    modalBody.appendChild(tutorialText(number));

    modalBackgr.appendChild(modal);

    document.getElementById("body-text").appendChild(modalBackgr);
  }

  function tutorialText(nr) {
    let container   = document.createElement("div");
    let text        = document.createElement("p");

    let buttons     = document.createElement("div");
    let closeButton = document.createElement("button");
    let moveButton  = document.createElement("button");

    switch (nr) {
      case 0:                                                     // welcome
        if(pageLanguage == "de") {
          text.innerHTML = "Willkommen zum Tutorial! Klicken Sie auf „Weiter“ um fortzufahren oder auf „Schließen“ um jederzeit aus dem Tutorial auszusteigen und auf die Startseite zurückzukehren.";
        } else {
          text.innerHTML = "Welcome to the tutorial! Click “Next” to continue or “Close” to close to tutorial at any time and return to the home page.";
        }
        moveButton.setAttribute("onclick", "constructTip(1)");
        break;
      case 1:                                                     // home menu
        if(pageLanguage == "de") {
          text.innerHTML = "Im Hauptmenü finden Sie die Kapitelauswahl, die Bibliographie, sowie Impressum und Kontaktinformationen. Mit einem klick auf ΔΟΔΕΚΑΧΟΡΔΟΝ kommen Sie auf die Startseite zruück.";
        } else {
          text.innerHTML = "In the main menu you will find the chapter selection, a bibliography, as well as impressum and contact infos. By clicking on ΔΟΔΕΚΑΧΟΡΔΟΝ, you can return to the home page.";
        }
        moveButton.setAttribute("onclick", "constructTip(2)");
        break;
      case 2:                                                     // languages
        if(pageLanguage == "de") {
          text.innerHTML = "Per klick auf das entsprechende Flaggenicon können Sie die Anzeigesprache der Seite ändern. Durch klicken auf „Weiter“ kommen wir als Nächstes auf die Kapitelauswahl, die sonst über „Kapitel“ erreichbar ist";
        } else {
          text.innerHTML = "You can change the disply language of the page by clicking on the corresponding flag icon. By clicking on „Next“, we will now go to the chapter selection, which can normally be accessed via „Chapters“.";
        }
        moveButton.setAttribute('onclick', 'window.location.href = "chapter_select.php#tutorial"');
        tutorial = true;
        break;
      case 3:                                                     // chapter selection
        if(pageLanguage == "de") {
          text.innerHTML = "Auf dieser Seite können Sie auswählen, welches Kapitel Sie lesen möchten. Die verfügbaren Kapitel sind schwarz markiert. Sie können das Kapitel entweder im lateinischen Original oder in einer der verfügbaren Übersetzungen aufrufen, indem Sie auf die entsprechende Sprache klicken. Durch einen klick auf „Weiter“ kommen wir zum ersten Kapitel auf Latein.";
        } else {
          text.innerHTML = "On this page you can select which chapter you want to read. The available chapters are marked in black. You can access the chapter either in the original Latin or in one of the available translations by clicking on the appropriate language. Clicking on “Next” will take you to the first chapter in latin.";
        }
        moveButton.setAttribute("onclick", 'window.location.href = "chapter.php?currentBook=1&currentChapter=1&mainLanguage=_lat&marginalia=false#tutorial1"');
        break;
      case 4:                                                     // open panel
        if(pageLanguage == "de") {
          text.innerHTML = "Das ist die Kapitelansicht. Durch einen Klick auf den Knopf am linken Fensterrand können Sie verschiedene Anzeigeoptionen personalisieren.";
        } else {
          text.innerHTML = "This is the chapter view. By clicking the button on the left edge of the window you can personalize various display options.";
        }
        moveButton.setAttribute("onclick", "constructTip(5)");
        break;
      case 5:                                                     // check download Link
        openPanel('optionsPanel');
        if(pageLanguage == "de") {
          text.innerHTML = "Über dieses Feld können die verfügbaren Anzeigeoptionen eingestellt werden, wie etwa Übersetzungen, Annotationen und Kommentare. Darüberhinaus kann das aktuelle Kapitel über den Link unten als TEI-Datei heruntergeladen werden.";
        } else {
          text.innerHTML = "This field can be used to set the available display options, such as translations, annotations and comments. Furthermore, the current chapter can be downloaded as a TEI file via the link below.";
        }
        moveButton.setAttribute("onclick", "constructTip(6)");
        break;
      case 6:                                                     // try options
        if(pageLanguage == "de") {
          text.innerHTML = "Die verschiedenen Optionen können durch Anklicken der Checkbox ausgewählt werden. Mit einem Klick auf „Submit“ wird die Seite mit den gewünschten Optionen neu geladen. Für dieses Tutorial gehen wir davon aus, dass alle Optionen angewählt wurden. Per Klick auf „Weiter“ sehen Sie den Effekt.";
        } else {
          text.innerHTML = "The various options can be selected by clicking on the checkbox. Clicking on “Submit” reloads the page with the desired options. For this tutorial we assume that all options have been selected. By clicking on “Next” you can see the effect.";
        }
        moveButton.setAttribute("onclick", 'window.location.href = "chapter.php?currentBook=1&currentChapter=1&mainLanguage=_lat&secondaryLanguages[]=_deu&marginalia=true&comments[]=editorsComments&#tutorial2"');
        break;
      case 7:                                                     // open translation
        if(pageLanguage == "de") {
          text.innerHTML = "In dieser Ansicht ist nicht nur der Text, sondern auch die Anmerkungen eines Schülers Glareans, Johannes Algoers, sichtbar. Darüberhinaus können Sie sich Kommentare anzeigen lassen, indem Sie auf das °-Symbol im Text klicken. Die Übersetzungen einzelner Paragraphen kann über die kleinen Flaggenicons am linken Rand aufgerufen werden. Duch klick auf „Weiter“ öffnen wir eine solche Übersetzung.";
        } else {
          text.innerHTML = "In this view, not only the text is visible, but also the annotations of one of Glarean's students, Johannes Algoer. In addition, you can view comments by clicking on the ° symbol in the text. The translations of individual paragraphs can be accessed by clicking on the small flag icons in the left margin. By clicking on “Next” we open such a translation.";
        }
        moveButton.setAttribute("onclick", "constructTip(8)");
        break;
      case 8:                                                     // close the notes area
        createNote("transl", "p1", "_deu");
        if(pageLanguage == "de") {
          text.innerHTML = "Durch klicken auf den runden blauen Knopf an der Seite der Notizablage kann dieses Feld, genau so wie auch die Optionenauswahl, geschlossen werden. Offene Übersetzungen, Kommentare, etc. gehen dadurch nicht verloren, sondern können durch nochmaliges Klicken auf den blauen Knopf wieder aufgerufen werden. Diese Elemente können einzeln duch den Schließknopf oben rechts geschlossen werden. Nur wenn die Webseite selbst geschlossen wird, werden auch alle offenen Notizen geschlossen. Damit sind wir am Ende des Tutorials angekommen. Durch klick auf „Weiter“ kommen Sie zurück zur Startseite.";
        } else {
          text.innerHTML = "By clicking on the round blue button on the side of the note tray, this field can be closed, just like the option selection. Open translations, comments, etc. are not lost, but can be recalled by clicking the blue button again. These elements can be closed individually by clicking the close button in the upper right corner. Only when the web page itself is closed, all open notes will be closed as well. With this, we have reached the end of the tutorial. By clicking on “Next”, you will be taken back to the home page.";
        }
        moveButton.setAttribute("onclick", "closeTutorial()")
        break;
    }

    container.appendChild(text);

    closeButton.setAttribute("onclick", "closeTutorial()");
    if(pageLanguage == "de") {
      if(nr == 8) {
        moveButton.innerText = "Beenden";
      } else {
        moveButton.innerText = "Weiter";
      }
      closeButton.innerText = "Schließen";
    } else {
      closeButton.innerText = "Close";
      if(nr == 8) {
        moveButton.innerText = "Finish";
      } else {
        moveButton.innerText = "Next";
      }
    }

    buttons.appendChild(closeButton);
    buttons.appendChild(moveButton);

    buttons.setAttribute("class", "modalButtons");

    container.appendChild(buttons);
    
    return container;
  }