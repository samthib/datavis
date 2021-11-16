import { jsPDF } from "jspdf";
import html2canvas from "html2canvas";

/**
* Create a PDF from an <iframe> with titles
* @param  {String} iframeSelector         class or id of the iframe element
* @param  {String} titlesSelector         class or id of the title element
* @param  {String} graphSelector          class or id of the graph element
*/
window.graphToPDF = function (iframeSelector, titlesSelector, graphSelector) {
  // Select the content of <iframe>
  var iframe = document.querySelectorAll(iframeSelector);
  //Get Graph title from the H1
  var header = document.querySelectorAll(titlesSelector);

  var graphs = [];
  var titles = [];

  iframe.forEach((item, i) => {
    graphs[i] = item.contentDocument.querySelector(graphSelector);
    titles[i] = header[i].innerText;
  });

  generatePDF(graphs, titles);
}

/**
* create the pdf based on the image
* @param  {array} graphs array of graphs in javascripts
* @param  {array} titles array of titles text format
*/
window.generatePDF = async function (graphs, titles) {

  const doc = new jsPDF({
    orientation: 'landscape',
    unit: 'mm',
    format: 'a4'
  });

  doc.setFontSize(30);

  // Proportions 16/9 ratio
  var widthDoc = 297;
  var heightDoc = widthDoc * 9/16;

  // Position with shift from title
  var positionX = (doc.internal.pageSize.getWidth()-widthDoc)/2;
  var positionY = (doc.internal.pageSize.getHeight()-heightDoc)/2+10;

  var images = [];
  const length = graphs.length;

  for (let i = 0; i < length; i++) {
    // scale:1 to get all the chart without cropping
    await html2canvas(graphs[i], {scale: 1}).then(function (canvas) {
      // Create new image based on the graphic
      images[i] = canvas.toDataURL('image/jpeg');

      // Add image and title
      doc.text(titles[i], doc.internal.pageSize.getWidth()/2, 20, { align: "center" });
      doc.addImage(images[i], "JPEG", positionX, positionY, widthDoc, heightDoc);

      // Add new page if necessary
      if (i < (length-1)) {
        doc.addPage();
      }
    });
  }

  var docTitle = titles.length == 1 ? titles[0]+'.pdf' : titles[0]+','+titles[1]+',....pdf';

  // Save on the last page
  doc.save(docTitle)
}
