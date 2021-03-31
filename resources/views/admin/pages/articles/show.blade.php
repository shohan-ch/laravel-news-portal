@extends('admin.layouts.master')


@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <h5> Viewing Article</h5>
                    </li>
                    <li class="list-inline-item">
                        <a type="button" class="btn btn-secondary btn-flat text-white"><i class="far fa-edit"></i>
                            Edit</a>
                    </li>
                    <li class="list-inline-item">
                        <a type="button" class="btn btn-danger btn-flat text-white "><i class="fas fa-trash-alt"></i>
                            Delete</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Article Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Article Details</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                    <div class="row">
                        <div class="col-12">

                            {{--  --}}
                            <div class="post">

                                <div class="user-block">
                                    <h4> {{ $article->title }}</h4>
                                    <span class="description m-0">{{ $article->created_at->diffForHumans() }}</span>
                                </div>
                                <!-- /.user-block -->
                                <p class="text-align-justify">
                                    {!!$article->description!!}
                                </p>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h5 class="text-primary"><i class="fas fa-paint-brush"></i> Aditional Details</h5>

                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Category
                            <b class="d-block">{{ $article->category->name }}</b>
                        </p>
                        <p class="text-sm">Article Tags
                            <b class="d-block">{{ $article->tag }}</b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Images </h5>

                    <div class="row">
                        @php
                        $images = $article->image;
                        $explode = explode(" ", $images);
                        @endphp
                        @foreach($explode as $image)
                        <div class="col-md-6 pb-4">
                            <img src="{{asset($image) }}" alt="img" width="200">
                        </div>
                        @endforeach
                    </div>





                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>







@endsection