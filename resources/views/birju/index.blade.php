@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <input type="file" name="photos[]" multiple id="photos">
            </div>

            <div class="row" id="photo-preview">

            </div>
        </div>
    </div>

    @verbatim
        <script id="photo-template" type="text/x-handlebars-template">
            <div class="col-md-2">
                <img src="{{src}}" alt="" class="img-fluid img-thumbnail processable-image" id="img{{id}}"
                     data-filename="{{name}}">
                <div class="control-box text-center" id="control-box{{id}}">
                    <span class="remove-photo rounded-circle bg-danger">&nbsp;X&nbsp;</span>
                    <div class="spinner-border text-dark" id="loader{{id}}" style="display: none; margin-top: 30%">
                    </div>
                </div>
            </div>
        </script>
    @endverbatim

    <script>
        function attachEventListeners() {
            $('.remove-photo').on('click', function () {
                $(this).parent().parent().remove();
            });
        }

        $(document).ready(function () {
            $('#photos').on('change', function (e) {
                var files = e.target.files;
                if (files.length < 1) return;

                var source = document.getElementById("photo-template").innerHTML;

                var template = Handlebars.compile(source);

                var photoPreviewContainer = $('#photo-preview');

                for (var i = 0; i < files.length; i++) {
                    var html = template({src: URL.createObjectURL(files[i]), id: i, name: files[i].name});

                    photoPreviewContainer.append(html);

                    var form = new FormData();

                    form.append('photo', files[i]);
                    form.append('clientId', i);

                    $('#loader' + i).show();
                    $('#control-box' + i).css('background-color', 'rgba(255, 255, 255, 0.8)');

                    $.ajax({
                        url: '/birju/optimise',
                        data: form,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            var i = res.clientId;
                            $('#loader' + i).hide();
                            $('#control-box' + i).hide();
                        },
                        error: function (error) {
                            console.log(error)
                        }
                    })
                }

                attachEventListeners();
            });
        });
    </script>
@endsection