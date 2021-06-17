/* ========================================================================== Global Variables ================ */

  var currentChapter = "";           // the current main Chapter to be displayed

  var languages = [];

    languages['_lat'] = "lateinisch";
    languages['_deu'] = "deutsch";
    languages['_eng'] = "englisch";

  var mainLanguage = "";                 // the language of the main document

  var secondaryLanguages = [];            // the translation languages

  var pathToText = "data/text/";         // the (relative) path to the text data folder

  var pathToMusic = "data/music/";         // the (relative) path to the music data folder
  
  var comments = {};                       // the comment Object

  var noteNr = 0;                           // track the Number of Notes

  var fullTextBehaviors = {"tei":{            // all CETEIcean behaviors are defined here
    // Overrides the default ptr behavior, displaying a short link
    //"ptr": function(elt) {
    //  var link = document.createElement("a");
    //  link.innerHTML = elt.getAttribute("target").replace(/https?:\/\/([^\/]+)\/.*/, "$1");
    //  link.href = elt.getAttribute("target");
    //  return link;
    //},
    // Adds a new handler for <term>, wrapping it in an HTML <b>
    // Note that you could just do `term: ["<b>","</b>"]` instead.
    "term": 
      function(elt) {
        var term = document.createElement("span");
        term.setAttribute("class", "term");
        if (elt.hasAttribute("ref")) {
          var ref = document.createElement("a");
          ref.setAttribute("class", "term");
          ref.setAttribute("href", elt.getAttribute("ref"));
          ref.setAttribute("target", "_blank");
          ref.innerHTML = elt.innerHTML;
          elt.replaceWith(ref);
        }
        term.innerHTML = elt.innerHTML;
        return term;
      },

    "name": [
      ["[ref]", ["<a href=\"$rw@ref\" target=\"_blank\">","</a>"]]
    ],

    "head": function(e) {
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

    "pb": function(elt) {
      var pb = document.createElement("div");
      pb.setAttribute("class", "pb");
      pb.innerHTML = elt.getAttribute("n");
      //pb.appendChild(document.createElement("br"));
      return pb;
    },

    "figure": function(fig) {
      if (fig.getAttribute("type") === "music") {
        var children = fig.children;                                  //  Get information about mei file / title
        var title = children[0].textContent;
        var meiFile = children[1].getAttribute("corresp");
        var mei = document.createElement("div");                      //  Build container 
        mei.setAttribute("class", "music");
        mei.setAttribute("id", meiFile);
        var meiHead = document.createElement("div");                  //  Build Header
        mei.appendChild(meiHead);
        meiHead.setAttribute("class", "meiHead");
        meiHead.setAttribute("id", meiFile + "-head");
        meiHead.innerHTML = title;
        var meiBody = document.createElement("div");                  //  Build Body
        mei.appendChild(meiBody);
        meiBody.setAttribute("class", "meiBody");
        meiBody.setAttribute("id", meiFile + "-body");
        return mei;
      }
    },

    "choice": function(choice) {
      if(choice.getAttribute("ana") === "transl") {
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
      else if(choice.getAttribute("ana") === "abbr") {
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

    "foreign": function(foreign) {
      var otherLang = document.createElement("span");
      otherLang.setAttribute("class", foreign.getAttribute("xml:lang"))
      otherLang.innerHTML = foreign.innerHTML;
      return otherLang;
    },

    "seg": function(initial) {
      if(initial.getAttribute("type") === "initial-caps") {
        var init = document.createElement("span");
        init.setAttribute("class", "initial");
        init.innerHTML = initial.innerHTML;
        return init;
      }
    },

    // "note": function(note) {
    //   var margin = document.createElement("span");
    //   margin.setAttribute("class", "margin");
    //   margin.innerHTML = note.innerHTML;
    //   return margin;
    // },

    "p": function(para) {
      if(para.hasAttribute("xml:id")) {
        var paragraph = document.createElement("p");
        paragraph.innerHTML = para.innerHTML;

        if(secondaryLanguages){
          for(let language of secondaryLanguages){
            var container = document.createElement("div");
            container.setAttribute("class", "transl-button tooltip");
            var label = document.createElement("span");
            label.setAttribute("class", "tiptext");
            label.innerHTML = "Diesen Absatz auf " + languages[language] + " übersetzen";
            var button1 = document.createElement("button");
            button1.setAttribute("class", "transl");
            button1.setAttribute('onclick', 'createNote("transl", "' + para.getAttribute("xml:id") + '", "' + language + '")');
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

  var translTextBehaviors = {"tei":{            // all CETEIcean behaviors for translated texts
    // Overrides the default ptr behavior, displaying a short link
    //"ptr": function(elt) {
    //  var link = document.createElement("a");
    //  link.innerHTML = elt.getAttribute("target").replace(/https?:\/\/([^\/]+)\/.*/, "$1");
    //  link.href = elt.getAttribute("target");
    //  return link;
    //},
    // Adds a new handler for <term>, wrapping it in an HTML <b>
    // Note that you could just do `term: ["<b>","</b>"]` instead.
    "term": 
      function(elt) {
        var term = document.createElement("span");
        term.setAttribute("class", "term");
        term.innerHTML = elt.innerHTML;
        return term;
      },

    "name": [
      ["[ref]", ["<a href=\"$rw@ref\" target=\"_blank\">","</a>"]]
    ],

    "head": function(e) {
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

    "pb": function(elt) {
      var pb = document.createElement("div");
      pb.setAttribute("class", "pb");
      pb.innerHTML = elt.getAttribute("n");
      //pb.appendChild(document.createElement("br"));
      return pb;
    },

    "choice": function(choice) {
      if(choice.getAttribute("ana") === "transl") {
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
      else if(choice.getAttribute("ana") === "abbr") {
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

    "foreign": function(foreign) {
      var otherLang = document.createElement("span");
      otherLang.setAttribute("class", foreign.getAttribute("xml:lang"))
      otherLang.innerHTML = foreign.innerHTML;
      return otherLang;
    },

    "seg": function(initial) {
      if(initial.getAttribute("type") === "initial-caps") {
        var init = document.createElement("span");
        init.setAttribute("class", "initial");
        init.innerHTML = initial.innerHTML;
        return init;
      }
    },

    "note": function(note) {
      note.innerHTML = "";
      return note;
    },

    "p": function(para) {
      if(para.hasAttribute("xml:id")) {
        var paragraph = document.createElement("p");
        paragraph.innerHTML = para.innerHTML;
        return para;
      }
    },
            }   //  these three belong to c.addBehaviors -> DO NOT DELETE!
  };
/* ================================================================================= Functions ================= */


  function insertTEIChapter() {               // inserts a full TEI document with name FILENAME in CONTAINERID
    let path = pathToText + currentChapter + "/" + currentChapter + mainLanguage + ".xml";
    c.getHTML5(path, function(data) {
      document.getElementById("fulltext").innerHTML = "";
      document.getElementById("fulltext").appendChild(data);
    });
  }

  function optionalBehaviors(optionsList) {
    Object.keys(optionsList).forEach(function(key){
      if(key === "marginalia" && optionsList[key] === "true") {
        fullTextBehaviors["tei"]["note"] = function(note) {
          var margin = document.createElement("span");
          margin.setAttribute("class", "margin");
          margin.innerHTML = note.innerHTML;
          return margin;
        };
      } else if(key === "marginalia" && optionsList[key] != "true") {
        c.removeBehavior("note");
      }
    })

    console.log(fullTextBehaviors);
  }

  function openPanel(form) {
    console.log(form);                                              // opens the left Panel
    if(form == 'optionsPanel') {
      if($(window).width() > 600){
        document.getElementById("optionsPanel").style.width = "40%";
      } else if($(window).width() > 1200){
          document.getElementById("optionsPanel").style.width = "30%";
      } else {
        document.getElementById("optionsPanel").style.height = "100vh";
      }
    } else if(form == 'notesPanel') {
      if($(window).width() > 600){
        document.getElementById("noteArea").style.width = "40%";
        document.getElementById("noteArea").style.marginLeft = "60%";
        //document.getElementById("body-text").style.marginRight = "30%";
      } else {
        document.getElementById("noteArea").style.height = "50vh";
        document.getElementById("noteArea").style.marginTop = "50vh";
      }
    }
  }

  function closePanel(form) {                                             // closes the left Panel
    if(form === "optionsPanel") {
      if($(window).width() > 600){
        document.getElementById("optionsPanel").style.width = "0";
      } else {
        document.getElementById("optionsPanel").style.height = "0";
      }
    } else if(form === "notesPanel") {
      if($(window).width() > 600){
        document.getElementById("noteArea").style.width = "0";
        document.getElementById("noteArea").style.marginLeft = "100%";
      } else {
        document.getElementById("noteArea").style.height = "0";
      }
    }
  }

  function topNavExpand() {                                             //make menu items look better on mobile
    var x = document.getElementById("topnav");
    if (x.className === "main") {
      x.className += " responsive";
    } else {
      x.className = "main";
    }
  }

  function createNote(kind, key, specifierA = "") {                                   // creates a new Note
    // KIND is the sort of note (translation, person, etc 
    // – determines the styling) and KEY is the 
    // identifier that is used to load the data.
    noteNr++;
    var noteID = "note_" + noteNr;
    var newNote = document.createElement("div"); //create Note
    newNote.setAttribute("class", "note");
    newNote.setAttribute("id", noteID);

    document.getElementById("notesContent").appendChild(newNote);
  
    if(kind === "transl") {                                                              // makes note for translated paragraph
      newNote.setAttribute("class", "note transl");
      var title = document.createElement("div");  // create Title
      title.setAttribute("class", "noteTitle");
      var titling = document.createElement("span");
      var noteTitle = "Übersetzung";
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
      
      waitForEl("#noteBody_" + noteID, fetchParagraph(key, "noteBody_" + noteID, specifierA));
    }
    else if(kind === "comment") {                                                      // makes note for comment
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
    if($(window).width() < 1200) {
      openPanel('notesPanel');
    }
  }
  
  function deleteNote(noteId) {                                      // deletes a Note wit ID NOTEID
    var elem = document.getElementById(noteId);
    document.getElementById("notesContent").removeChild(elem);
    if($(window).width() < 600) {
      closePanel("notesPanel");
    }
  }
  
  function fetchParagraph(paraID, noteBodyID, langSpecifier) {
    console.log(langSpecifier);
    let path = pathToText + currentChapter + "/" + currentChapter + langSpecifier + ".xml";
    console.log(path);
    d.getHTML5(path, function(data) {
      const noteBody = document.getElementById(noteBodyID);
      for (const p of Array.from(data.getElementsByTagName("tei-p"))) {
        if(p.getAttribute("id") === paraID) {
          document.adoptNode(p);
          noteBody.appendChild(p);
        }
      }
    });
  }

  async function insertComments(commentaryFile) {       //inserts comment links in the body text
    let path = pathToText + currentChapter + "/" + commentaryFile + ".json"

    var rawCommentary = await fetch(path);
    comments[commentaryFile] = await rawCommentary.json();

    
    for (var key in comments[commentaryFile]) {
      if(comments[commentaryFile].hasOwnProperty(key)) {
        var id = comments[commentaryFile][key].id;
        var target = document.getElementById(comments[commentaryFile][key].target);
        var comment = document.createElement("span");
        comment.setAttribute("class", "comment");
        comment.setAttribute("id", "comment_" + comments[commentaryFile][key].id)
        var commentLink = document.createElement("a");
        commentLink.setAttribute("class", "commentLink ");
        commentLink.setAttribute("href", "#");
        commentLink.setAttribute('onclick', 'createNote("comment", "' + id + '", "' + commentaryFile + '")');
        commentLink.innerHTML = " &#xE736;";
        comment.appendChild(commentLink);
        target.appendChild(comment);
      }
    }
  }

  function fetchComment(commentId, noteBodyID, commentCorpus) {        // inserts comment into note
    //comments = JSON.parse(comments);

    commentText = document.createElement("div");
    commentText.setAttribute("class", "commentText");

    for (var key in comments[commentCorpus]) {
      if(comments[commentCorpus][key].id === commentId) {
        var commentAuthor = comments[commentCorpus][key].author;
        var commentTitle = comments[commentCorpus][key].title;
        var commentContent = comments[commentCorpus][key].content;
        var commentsReferences = comments[commentCorpus][key].references;
      }
    }
    var title = document.createElement("h5");               // note title
    title.setAttribute("class", "commentTitle");
    title.innerHTML = commentTitle;

    var author = document.createElement("span");            // note author
    author.setAttribute("class", "commentAuthor");
    author.innerHTML = commentAuthor;

    var content = document.createElement("div");            // note content
    content.setAttribute("class", "commentContent");
    content.innerHTML = commentContent;

    var references = document.createElement("div");         // note references
    references.setAttribute("class", "commentReferences");
    var referenceList = document.createElement("ul");
    for(var i = 0; i < commentsReferences.length; i++) {
      var item = document.createElement("li");
      item.innerHTML = commentsReferences[i];
      referenceList.appendChild(item);
    }
    references.appendChild(referenceList);

    commentText.appendChild(title);
    commentText.appendChild(author);
    commentText.appendChild(content);
    commentText.appendChild(references);

    return commentText;
  }

  function waitForEl(selector, callback) {      //gives document time to build objects that are targeted by functions
    if (jQuery(selector).length) {
      callback;
    } else {
      setTimeout(function() {
        waitForEl(selector, callback);
      }, 100);
    }
  }