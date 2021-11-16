// Load by base path
ace.config.set("basePath", "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/");

/**
* Write the code of an element to an other
* @param  {String} fromID               id of element with the code
* @param  {String} toID                 id of the element to push the code
* @param  {String} mode                 mode for Ace editor: javascript, css, ...
* @return {Void}
*/
window.editorToTextarea = function(fromID, toID, mode) {

  let editor = ace.edit(fromID, options(mode, "monokai"));

  editor.session.on('change', function(delta) {
    document.getElementById(toID).value = editor.getValue();
  });
}

/**
 * Initialize Ace editor to display only
 * @param  {String} fromID               id of element with the code
 * @param  {String} mode                 mode for Ace editor: javascript, css, ...
 * @return {Object}                      Ace editor created
 */
window.editorDisplay = function(fromID, mode) {
  return ace.edit(fromID, options(mode, "monokai", true));
}

/**
 * Set the options for Ace editors
 * @param  {String} mode                mode for Ace editor: javascript, css, ...
 * @param  {String} theme               theme for Ace editor: monokai, ...
 * @param  {Boolean} readOnly           Ace editor in read only : true | false
 * @return {Object}                     the options list as an object
 */
window.options = function(mode, theme = "monokai", readOnly = false) {
  return {
    mode: "ace/mode/"+mode,
    theme: "ace/theme/"+theme,
    readOnly: readOnly,
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    enableSnippets: true,
    copyWithEmptySelection: true,
    enableEmmet: true,
  };
}
