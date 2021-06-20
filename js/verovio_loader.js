function insertSVGs(toolkit, meiNumber, files) {                  // renders the files retrieved by getMEIFiles() and inserts them
  var svg = [];
  for(let i = 0; i < meiNumber.length; i++) {
    let fileLocation = meiNumber[i].id;                           // the id of the corresponding div
    console.log(fileLocation);
    svg[i] = toolkit.renderData(files[i],{});
    console.log("SVG Nr " + i);
    document.getElementById(fileLocation).innerHTML = svg[i];     // render in meiBody-div
  };
}

async function getMEIfiles(meiNumber) {                           // retrieves the mei-files, returns as array / promise
  var path = pathToMusic;
  var fetches = [];
  for (let i = 0; i < meiNumber.length; i++) {
    fileLocation = meiNumber[i].parentNode.id;
    fetches[i] = await fetch(path + "modern/" + fileLocation);
    fetches[i] = await fetches[i].text();
  }
  return fetches;
}
  
window.addEventListener("load", function() {                      // start Verovio only after Window has loaded
  var tk;

  Module.onRuntimeInitialized = async_ => {

    tk = new verovio.toolkit();                                   // instantiate Toolkit

    var zoom = 30;                                                //  declare Options
    var pageHeight = 500;
    var pageWidth = 500;
    pageHeight = $(document).height() * 100 / zoom;
    pageWidth = $(".music").width() * 100 / zoom;
    options = {
                pageHeight: pageHeight,
                pageWidth: pageWidth,
                scale: zoom,
                adjustPageHeight: true
            };

    tk.setOptions(options);
    var meiNumber = document.getElementsByClassName("meiBody");     // the iterator is defined by the amount of meiBody elements 

    getMEIfiles(meiNumber).then(result => {                         // fetch MEI files, then insert them
      insertSVGs(tk, meiNumber, result);
    });
  }
}); 