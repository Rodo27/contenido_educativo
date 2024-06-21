tinymce.init({
    selector: 'textarea.tinymce',  
    plugins: 'lists, advlist, autolink, link, image, charmap, preview, anchor, searchreplace, visualblocks, fullscreen, table',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist',
    menubar: false,
    content_style: `
        .mce-content-body {
            width: 100%;    
            height: 100px;  
        }
    `
});


