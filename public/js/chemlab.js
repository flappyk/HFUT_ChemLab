$(".delete").on("submit", function(){
    return confirm("确定要删除？");
});

 tinymce.init({
     selector: 'textarea',
     height: 360,
     file_browser_callback : elFinderBrowser,
     plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
     toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
 });

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: '/admin/resources/files/tinymce4',// use an absolute path!
    title: 'elFinder 2.0',
    width: 900,
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}
