<!-- JQuery & Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!-- Charts.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Feather icons initialisation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script>feather.replace()</script>

<!-- load Ace -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/ace.min.js" integrity="sha512-jB1NOQkR0yLnWmEZQTUW4REqirbskxoYNltZE+8KzXqs9gHG5mrxLR5w3TwUn6AylXkhZZWTPP894xcX/X8Kbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- load Ace language tools -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.13/ext-language_tools.min.js" integrity="sha512-S7Whi8oQAQu/MK6AhBWufIJIyOvqORj+/1YDM9MaHeRalsZjzyYS7Usk4fsh+6J77PUhuk5v/BxaMDXRdWd1KA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom Javascript -->
<script src="{!! asset('js/app.js') !!}"></script>
{{-- <script>
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

</script> --}}
