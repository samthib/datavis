import 'ace-builds/src-min-noconflict/ace';
import 'ace-builds/src-min-noconflict/theme-monokai';
import 'ace-builds/src-min-noconflict/mode-javascript';
import 'ace-builds/src-min-noconflict/mode-css';
import 'ace-builds/src-min-noconflict/mode-json';
import 'ace-builds/src-min-noconflict/ext-language_tools';
import 'ace-builds/src-min-noconflict/ext-emmet';

/**
* Write the code of an element to an other
* @param  {String} fromID               id of element with the code
* @param  {String} toID                 id of the element to push the code
* @param  {String} mode                 mode or Ace editor: javascript, css, ...
* @return {Void}
*/
window.editorToTextarea = function(fromID, toID, mode) {
  // Initialize and pass options to ace.edit
  let editor = ace.edit(fromID, {
    mode: "ace/mode/"+mode,
    theme: "ace/theme/monokai",
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    enableSnippets: true,
    copyWithEmptySelection: true,
    enableEmmet: true,
  });

  editor.session.on('change', function(delta) {
    document.getElementById(toID).value = editor.getValue();
  });
}
