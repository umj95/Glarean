window.addEventListener("load", function() { 

  var path = pathToMusic;
  var meiNumber = document.getElementsByClassName("meiBody");     // the iterator is defined by the amount of meiBody elements to be filled
  console.log("number = " + meiNumber.length);
  var tk = [];
  var svg = [];

  for(var i = 0 ; i < meiNumber.length ; i++) {
    fileLocation = meiNumber[i].parentNode.id;                    // the file location is determined by the id of the container (div class="music")
    console.log("file location is " + fileLocation);
    Module.onRuntimeInitialized = async_ => {                     // for every meiBody Element, a new toolkit is set up
      tk[i] = new verovio.toolkit();
      console.log("Verovio has loaded!");

      var zoom = 30;                                              //  declare Options
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
      tk[i].setOptions(options);                                  // set Options

      fetch(path + "modern/" + fileLocation)                      //  get MEI file
      .then((response) => response.text())
      .then((meiXML) => {
        svg[i]= tk[i].renderData(meiXML,{});
        document.getElementById(fileLocation + "-body").innerHTML = svg[i];      //  render in meiBody-div
      });
    }
  }
});