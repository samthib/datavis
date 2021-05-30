/**
* Create a PDF from an <iframe> with titles
* @param  {int} id id of the chart and title
*/
window.graphToPDF = function (id) {
  // Only one graph
  if (id > 0) {
    // Select the content of <iframe>
    var iframe = document.querySelectorAll('#iframe-'+id);
    //Get Graph title from the H1
    var titles = document.querySelectorAll('#title-'+id);
  // Multiple graphs
  } else {
    // Select the content of <iframe>
    var iframe = document.querySelectorAll('.iframe-chart');
    //Get Graph title from the H1
    var titles = document.querySelectorAll('.title-chart');
  }

  var graph = [];
  var title = [];

  // Create arrays of graphs and titles
  iframe.forEach((item, i) => {
    graph[i] = item.contentDocument.querySelector('#graph');
    title[i] = titles[i].innerText;
  });

  generatePDF(graph, title);
}

/**
* create the pdf based on the image
* @param  {array} graph array of graphs in javascripts
* @param  {array} title array of title text format
*/
window.generatePDF = async function (graph, title) {

  const doc = new jsPDF({
    orientation: 'landscape',
    unit: 'mm',
    format: 'a4'
  });

  doc.setFontSize(30);

  // Proportions 16/9 ratio
  var heightDoc = 162;
  var widthDoc = 288;
  // Position with shift from title
  var positionX = (doc.internal.pageSize.getWidth()-widthDoc)/2;
  var positionY = (doc.internal.pageSize.getHeight()-heightDoc)/2+10;

  var image = [];
  const length = graph.length;

  for (let i = 0; i < length; i++) {
    // scale:1 to get all the chart without cropping
    await html2canvas(graph[i], { scale: 1 }).then(function (canvas) {
      // Create new image based on the graphic
      image[i] = canvas.toDataURL('image/jpeg');

      //Add image and title
      doc.addImage(image[i], "JPEG", positionX, positionY, widthDoc, heightDoc);
      doc.text(title[i], doc.internal.pageSize.getWidth()/2, 20, { align: "center" });

      // Add new page if necessary
      if (i < (length-1)) {
        doc.addPage();
      }
    });
  }

  // Save on the last page
  doc.save('MyPdf.pdf');
}
