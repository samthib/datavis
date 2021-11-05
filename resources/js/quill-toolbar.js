// Only where #quill-editor exists
if (document.querySelector('#quill-editor')) {
/**
 * Initialize Quill editor
 * @type {Array}
 */
var quillToolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

  /**
  * Quill object
  * @type {Quill}
  */
  var quill = new Quill('#quill-editor', {
    modules: {
      toolbar: quillToolbarOptions
    },
    theme: 'snow'
  });


  // Populate hidden textarea on change
  quill.on('text-change', function() {
    let message =  document.querySelector('#message');
    message.innerHTML = quill.root.innerHTML;
  });
}
