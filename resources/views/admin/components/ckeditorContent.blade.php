{{-- CKeditor --}}
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
        }
    }
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        Heading,
        List,
        BlockQuote,
        Link,
        Image,
        ImageToolbar,
        ImageUpload,
        Table,
        MediaEmbed
    } from 'ckeditor5';

    ClassicEditor.create(document.querySelector('#content'), {
            plugins: [
                Essentials,
                Paragraph,
                Bold,
                Italic,
                Font,
                Heading,
                List,
                BlockQuote,
                Link,
                Image,
                ImageToolbar,
                ImageUpload,
                Table,
                MediaEmbed // Giữ lại plugin MediaEmbed
            ],
            // Cấu hình MediaEmbed để hỗ trợ iframe tùy chỉnh
            mediaEmbed: {
                previewsInData: true,
                extraProviders: [{
                    name: 'customIframe',
                    url: /.*/, // Cho phép nhúng từ mọi nguồn
                    html: match => `<iframe src="${match[0]}" frameborder="0" allowfullscreen></iframe>`
                }]
            },
            toolbar: {
                items: [
                    'heading',
                    '|', 'bold', 'italic', '|',
                    'numberedList', 'bulletedList', '|',
                    'link', 'blockquote', 'imageUpload', 'insertTable', 'mediaEmbed',
                    '|', // Thêm mediaEmbed vào toolbar
                    'undo', 'redo'
                ]
            },
            image: {
                toolbar: [
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side',
                    '|',
                    'toggleImageCaption',
                    'imageTextAlternative'
                ]
            },
            simpleUpload: {
                uploadUrl: '/your-upload-endpoint' // Đường dẫn upload ảnh của bạn
            }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    window.onload = function() {
        if (window.location.protocol === 'file:') {
            alert('This sample requires an HTTP server. Please serve this file with a web server.');
        }
    };
</script>
