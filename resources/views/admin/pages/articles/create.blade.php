@extends('admin.layouts.master')


@section('content')


@section('extra-css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.css') }}">

<!-- Dropzone -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/dropzone/dropzone.min.css') }}">

{{-- <style>
 /*  -- Single Image Preview Style  -- */
  #output_image
{
 max-width:300px;
}
</style> --}}

@endsection

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Articles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Article Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    {{-- Form  --}}
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="mainform">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Article</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- {{ dump($errors) }} --}}
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" name="title" id="Title" class="form-control" value="{{old('title')}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Description">Article Description</label>
                            <textarea id="Description" name="description"
                                class="form-control textarea">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



            <div class="col-md-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Article Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <label for="Categories">Categories</label>
                            <select class="form-control custom-select" name="category">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category')==$category->id) {{ 'selected' }}
                                    @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tag">Tag </label>
                            <span> <small>*Give space for mulitiple tags. </small> </span>
                            <input type="text" name="tag" id="inputClientCompany" class="form-control"
                                value="{{ old('tag') }}">
                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-secondary">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Article image</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">

                            {{--   ////// Code for Single image preview
                              <label for="image">Images</label>
                            <input type="file" name="image"  id="image" class="form-control" onchange="preview_image(event)" >
                            <img id="output_image" /> --}}

                            {{-- Code for multiple image preview  --}}
                            <label for="image">Images</label>
                            <input id="file-input" name="image[]" type="file" multiple>
                            <div id="preview"></div>

                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            @error('image.0')
                            <span class="text-danger">{{$message}}</span>
                            @enderror



                            {{-- @foreach($errors->image as $value)
                              {{ $value }}
                            @endforeach --}}


                        </div>

                    </div>

                    <!-- /.card-body -->
                </div>


            </div>








        </div>
        <div class="row p-3">
            <div class="col-12">
                <a href="{{ route('article.index') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Post" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>

@endsection


@section('extra-js')
<!-- Summernote -->
<script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Dropzone -->
<script src="{{ asset('admin-assets/plugins/dropzone/dropzone.min.js') }}"></script>


<script>
    $(function () {

        // Summernote
        $('.textarea').summernote({
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                        .getData('Text');

                    e.preventDefault();

                    // Firefox fix
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        })


        // Images Preview Single image
        /* 
        function preview_image(event) 
        {
        var reader = new FileReader();
        reader.onload = function()
        {
        var output = document.getElementById('output_image');
        output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        }
        */


        // Images Preview Multiple images
        function previewImages() {

            var $preview = $('#preview').empty();
            if (this.files) $.each(this.files, readAndPreview);

            function readAndPreview(i, file) {

                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...
                var reader = new FileReader();
                $(reader).on("load", function () {
                    $preview.append($("<img/>", {
                        src: this.result,
                        height: 100
                    }));
                });

                reader.readAsDataURL(file);

            }

        }
        $('#file-input').on("change", previewImages);
        // Images Preview Multiple images

    })

</script>

@endsection