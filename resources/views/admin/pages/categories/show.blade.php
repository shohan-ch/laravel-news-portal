@extends('admin.layouts.master')


@section('content')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <h5> Viewing Category</h5>
                    </li>
                    <li class="list-inline-item">
                        <a type="button" href="{{ route('category.edit', $category->id) }}"
                            class="btn btn-secondary btn-flat text-white"><i class="far fa-edit"></i>
                            Edit</a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category Details</h3>

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
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">

                    <div class="row">
                        <div class="col-12">

                            {{--  --}}

                            <div class="user-block">
                                <h5>Category Name</h5>
                                <p> {{ $category->name }}</p>
                                <hr>
                                <h5>Created at</h5>
                                <p class="description m-0">{{ $category->created_at}}</p>
                            </div>

                            {{--  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>







@endsection