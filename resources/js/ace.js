import 'ace-builds/src-min-noconflict/ace';
import 'ace-builds/webpack-resolver';
import 'ace-builds/src-min-noconflict/ext-language_tools';
import 'ace-builds/src-min-noconflict/ext-emmet';

// ace.config.set("basePath", "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/");// Load by base path
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
  enableEmmet: true,
};

// Only where #modifyCodeJS exists
if (document.querySelector('#modifyCodeJS')) {
  let editor = ace.edit("modifyCodeJS", options);// Initialize and pass options to ace.edit
  editor.session.setMode("ace/mode/javascript");// Set the mode to use

  editor.session.on('change', function(delta) {
    document.querySelector("#textareaJS").value = editor.getValue();
    // document.querySelector("#textareaJS").value = delta.lines.join('\n');
  });
}

// Only where #modifyCodeCSS exists
if (document.querySelector('#modifyCodeCSS')) {
  let editor = ace.edit("modifyCodeCSS", options);// Initialize and pass options to ace.edit
  editor.session.setMode("ace/mode/css");// Set the mode to use

  editor.session.on('change', function(delta) {
    document.querySelector("#textareaCSS").value = editor.getValue();
    // document.querySelector("#textareaCSS").value = delta.lines.join('\n');
  });
}
