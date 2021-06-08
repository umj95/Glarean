window.addEventListener("load", function() {
  var meiNumber = document.getElementsByClassName("meiBody");
  console.log("number =" + meiNumber.length);
  var tk = [];
  var svg = [];
  for(var i = 0 ; i < meiNumber.length ; i++) {
    fileLocation = meiNumber[i].parentNode.id;
    console.log("file location is " + fileLocation);
    Module.onRuntimeInitialized = async_ => {
      tk[i] = new verovio.toolkit();
      console.log("Verovio has loaded!");

      var zoom = 30;                                            //  declare Options
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
      tk[i].setOptions(options);

      fetch("data/" + fileLocation)                              //  get  MEI file
      .then((response) => response.text())
      .then((meiXML) => {
        svg[i]= tk[i].renderData(meiXML,{});
        document.getElementById(fileLocation + "-body").innerHTML = svg[i];      //  render in meiBody-div
      });
    }
  }
});