;( function($){
    $(document).ready(function() {
        function uploadImage(file, editor, $editable){
            var data = new FormData();
            data.append("file", file);

            $.ajax({
                data: data,
                type: "POST",
                url: base + '/image-upload',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {

                    if( data.error == 1){
                        alert(data.message);

                        return false;
                    }

                    editor.insertImage($editable, data.link);
                }
            });
        }

        $('#summernote').summernote({

            toolbar: [
                //[groupname, [button list]]

                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['insert', ['picture']],
                ['para', ['ul', 'ol']],
                ['misc', ['fullscreen', 'codeview']]
            ],
            onImageUpload: function(files, editor, $editable) {

                uploadImage(files[0], editor, $editable);

            },
            oninit: function(){
                $('.note-editable').css('min-height','8em');
            }

        });
    });
} )(jQuery);