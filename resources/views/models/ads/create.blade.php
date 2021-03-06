@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/tags.css" />
<link rel="stylesheet" href="{!! asset('dropzone/dropzone.css') !!}" /> @endsection @section('scripts')
<script type="text/javascript" src="{{ asset('dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sziveslatas.js') }}"></script>
<script>
$('#county').on('change', function(e) {
var county = e.target.value;
//ajax
$.get('{{ url('/') }}/city-dropdown?county=' + county, function(data) {
$('#city').empty();
$.each(data, function(index, cityObj) {
$('#city').append('<option value="' + cityObj.id + '">' + cityObj.name + '</option>');
});
});
});
$('#parent_id').on('change', function(e) {
var parent_id = e.target.value;
//ajax
$.get('{{ url('/') }}/category-dropdown?parent_id=' + parent_id, function(data) {
$('#categories_id').empty();
$.each(data, function(index, categoryObj) {
$('#categories_id').append('<option value="' + categoryObj.id + '">' + categoryObj.name + '</option>');
});
});
toggleElements(parent_id);
});
$('#price').on('change', function(e) {
    var price = e.target.value;
    var discountprice = document.getElementById("discountprice").value;
    if (discountprice == null || discountprice == undefined || discountprice == '') {
        $('#discount').val(null);
    } else {
        var discount = -(100 - discountprice / price * 100);
        $('#discount').val(discount);
    }
});
$('#discountprice').on('change', function(e) {
    var discountprice = e.target.value;
    var price = document.getElementById("price").value;
    if (price == null || price == undefined || price == '') {
        $('#discount').val(null);
    } else {
        var discount = -(100 - discountprice / price * 100);
        $('#discount').val(discount);
    }
});
$(document).ready(function() {
    toggleElements($('#parent_id').val());
});
</script>
<script type="text/javascript">
var baseUrl = "{{ url('/') }}";
var token = "{{ Session::getToken() }}";
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#dropzoneFileUpload", {
    url: baseUrl + "/dropzone/uploadFiles",
    addRemoveLinks: true,
    maxFiles: 15,
    filesizeBase: 100,
    acceptedFiles: "image/*",
    dictRemoveFile: "Eltávolítás",
    dictCancelUpload: "Mégsem",
    dictCancelUploadConfirmation: "Biztos?",
    dictDefaultMessage: "Húzd ide a képeket",
    dictFallbackMessage: "A böngésződ nem támogatja a drag'n'drop fájl feltöltést.",
    dictFallbackText: "Kattints ide a feltöltéshez.",
    dictInvalidFileType: "Nem támogatott fájltípus.",
    dictRemoveFileConfirmation: null,
    dictMaxFilesExceeded: "Nem tölthetsz fel több fájlt.",
    params: {
        _token: token
    }
});
Dropzone.options.myDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {

    },
};
</script>
@endsection @section('content')
<div id="page-content-wrapper" style="padding-top: 10em">
    <div class="container mbr-section-full">
    <div style="padding: 3em; background-color: #ffffff">
        <div class="row">
            @if (Auth::guest()) @include('auth.login') @else @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Hirdetés feladás</div>
                <div class="panel-body">
                    @include('core-templates::common.errors') {!! Form::open(['route' => 'ads.store']) !!} @include('models.ads.fields') {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
