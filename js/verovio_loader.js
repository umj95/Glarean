function insertSVGs(toolkit, meiNumber, files) {                  // renders the files retrieved by getMEIFiles() and inserts them
  console.log("insertSVGs started");
  let svg = [];
  for(let i = 0; i < meiNumber.length; i++) {
    let fileLocation = meiNumber[i].id;                           // the id of the corresponding div
    if(files[i].charAt(0) != "<") {
      svg[i] = "This file could not be loaded – Maybe it isn't transcribed yet :(";
    } else {
      svg[i] = toolkit.renderData(files[i],{});
      console.log("SVG Nr " + i);
    }
    document.getElementById(fileLocation).innerHTML = svg[i];     // render in meiBody-div
  };
}

async function getMEIfiles(meiNumber) {                           // retrieves the mei-files, returns as array / promise
  console.log("getMEIfiles started");
  let path = `${pathToData}${currentBook}/${currentChapter}/`;
  let fetches = [];
  for (let i = 0; i < meiNumber.length; i++) {
    fileLocation = meiNumber[i].parentNode.id;
    fetches[i] = await fetch(path + "music/modern/" + fileLocation + ".mei");
    fetches[i] = await fetches[i].text();
  }
  return fetches;
}

function addVerovio(toolkit) {                                           // starts Verovio toolkit and calls helper functions
    console.log("addVerovio Started")

      let zoom = 40;                                              //  declare Options
      let pageHeight = 500;
      let pageWidth = 500;
      pageHeight = $(document).height() * 100 / zoom;
      windowWidth = $(document).width();
      if(windowWidth >= 1100) {
        pageWidth = windowWidth * 40 / zoom;
      } else {
        pageWidth = windowWidth * 60 / zoom;
      }
      options = {
        pageHeight: pageHeight,
        pageWidth: pageWidth,
        scale: zoom,
        adjustPageHeight: true,
      };

      toolkit.setOptions(options);
      let meiNumber = document.getElementsByClassName("containerModern"); // the iterator is defined by the amount of meiBody elements 
      console.log("MeiNumber: " + meiNumber.length);
      getMEIfiles(meiNumber).then(result => {
        insertSVGs(toolkit, meiNumber, result);
      });
    //}
}