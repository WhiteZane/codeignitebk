
  tinymce.init({
  selector: 'textarea', 
  height: 400,
  width: 580,
  plugins: 'code textcolor',
  toolbar: 'fontsizeselect fontselect bold italic alignleft aligncenter alignright bullist numlist outdent indent  forecolor backcolor',
  textcolor_cols: "6",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});