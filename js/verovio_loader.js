/*window.addEventListener("load", function() { 

  var path = pathToMusic;
  var meiNumber = document.getElementsByClassName("meiBody");     // the iterator is defined by the amount of meiBody elements to be filled
  var tk = [];
  var svg = [];

  for(var i = 0 ; i < meiNumber.length ; i++) {
    fileLocation = meiNumber[i].parentNode.id;                    // the file location is determined by the id of the container (div class="music")
    Module.onRuntimeInitialized = async_ => {                     // for every meiBody Element, a new toolkit is set up
      tk[i] = new verovio.toolkit();

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
});*/


var MEIDATA = {};
var TK;

$(document).ready(function () {
  TK = new verovio.toolkit();     //new toolkit and files
  var $testFiles = ['data/music/modern/3_Symph_1.mei', 'data/music/modern/3_Symph_2.mei'],
    $testWrap = $('#3_Symph_1.mei-body');  //not sure
  
  function getOptions (div) {    //get my options
    var zoom = 30;
    return({
      inputFormat: 'mei',
      border: 50,
      pageWidth: ($(div).width() * 100) / zoom,
      ignoreLayout: 1,
      adjustPageHeight: 1,
      scale: zoom
    });
  }

  function resize (tk, div, instance) {     //resizes the svg
    tk.setOptions(getOptions(div));
    var svg = tk.renderData(MEIDATA[instance], {});
    $(div).html(svg);
  }

  function loadData (meiData, div, tk) {     //loads the MEIDATA into DIV
    var instance = Math.floor(Math.random()*1000000),
      resizeTimer = null,
      svg;
    MEIDATA[instance] = meiData;
    tk.setOptions(getOptions(div));          //loads my options
    svg = tk.renderData(meiData, {})         //renders MEIDATA
    $(div).html(svg);                        //puts SVG in DIV

    $(window).on('resize.' + instance, function() {   //listens for resizes and triggers resize()
      if (resizeTimer) {
        clearTimeout(resizeTimer);
      }
      resizeTimer = setTimeout(function() {
        resize(tk, div, instance);
        resizeTimer = null;
      }, 500);
    });

  }
  
  function loadTestFile (file) {
    var div = $('<div class="mei-test"><p>Loading: ' + file + '</p></div>').appendTo($testWrap);
    $.ajax({
      url: file,
      type: 'get',
      dataType: 'text',
      success: function (text) {
        loadData(text, div, TK);
      },
      error: function (xhr) {
        $(div).html('<p>An error occurred.</p>')
      }
    });
  }
  
  for (var ix = 0; ix < $testFiles.length; ix++) {
    loadTestFile($testFiles[ix]);
  }

});