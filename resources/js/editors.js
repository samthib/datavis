/**
 * Write the code of the div to the textarea befor submit
 * @param  {Object} fromElement The actual <div> object
 * @param  {string} toId        The id of the textarea to fill
 * @return {void}
 */
window.codeToTextarea = function(fromElement, toId) {
  document.getElementById(toId).value = fromElement.innerText;
}
