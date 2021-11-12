// Only where #modifyCodeJS exists
if (document.querySelector('#modifyCodeJS')) {
  ace.config.set("basePath", "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/");// Load by base path
  // ace.config.setModuleUrl("ace/theme/monokai", "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/theme-monokai.min.js");// Load by module
  // ace.config.setModuleUrl("ace/mode/javascript", "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/mode-javascript.min.js");// Load by module

  // trigger extension
  // ace.require("https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/ext-language_tools.min.js");

  // Define options
  const options = {
    theme:"ace/theme/monokai",
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    enableSnippets: true,
    copyWithEmptySelection: true,
  };

  // Initialize and pass options to ace.edit
  var editorJS = ace.edit("modifyCodeJS", options);
  var editorCSS = ace.edit("modifyCodeCSS", options);

  // Set the mode to use
  editorJS.session.setMode("ace/mode/javascript");
  editorCSS.session.setMode("ace/mode/css");

  editorJS.session.on('change', function(delta) {
    document.querySelector("#textareaJS").value = delta.lines.join('\n');
    // document.querySelector("#textareaJS").value = editorJS.getValue();
  });
}
