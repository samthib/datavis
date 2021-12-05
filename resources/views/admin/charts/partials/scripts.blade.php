<script>
    window.onload = function () {
    editorToTextarea('modifyCodeJS', 'textareaJS', 'javascript');
    editorToTextarea('modifyCodeCSS', 'textareaCSS', 'css');
  }
</script>

<script>
    window.toggleLinks = function (select, dataAttribute, containerId) {
    var options = Array.from(select.selectedOptions).map(option => option);
  
    var container = document.getElementById(containerId);
    container.innerHTML = "";
    
    options.forEach(element => {
    var newAlert = `<div class="alert alert-primary mt-2 mb-0 text-break" role="alert">
                      <a id="data-link" href="`+element.getAttribute(dataAttribute)+`" class="alert-link text-break" target="blank">`+element.getAttribute(dataAttribute)+`</a>
                    </div>`;
    container.insertAdjacentHTML("beforeend", newAlert);
    });
  }
</script>