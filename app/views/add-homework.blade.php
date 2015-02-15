@extends('templates.default')

@section('content')

    @include('common.back')
    <h1>Huiswerk toevoegen</h1>
    @include('common.error')
    {{Form::open(['route' => 'create-homework', 'role' => 'form'])}}
        <div class="form-group">
            {{Form::label('title', 'Titel: ')}}
            {{Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
        {{Form::label('subject_id', 'Vak: ')}}
            {{Form::select('subject_id', $subjects, Input::old('subject_id'), ['class' => 'form-control'] )}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'Beschrijving: ')}}
            {{Form::textarea('content', Input::old('content'), [ 'id' => 'summernote', 'class' => 'form-control', 'placeholder' => 'content'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Deadline: ')}}
            {{Form::text('deadline', null, [
              'class' => 'form-control datepicker',
              'data-value' => Input::old('deadline'),
              'placeholder' => 'Raak dit veld aan om een datum te kiezen'
            ])}}
        </div>
        <div class="form-group text-right">
            {{Form::submit('Toevoegen', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop

@section('js')
    <script>

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
    </script>
@stop