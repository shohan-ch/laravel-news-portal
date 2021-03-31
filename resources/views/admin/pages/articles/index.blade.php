@extends('admin.layouts.master')

@section('extra-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h1 class="m-0 text-dark">Articles</h1>
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-info ml-3">Add new</a>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Articles Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<section class="content">
    <!-- Default box -->
    <div class="card">
        <x-admin.message />
        <div class="card-header">
            <h3 class="card-title">Articles</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-2">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 30%">
                            Title
                        </th>
                        <th style="width: 3%">
                            Categoy
                        </th>
                        <th style="width: 15%">
                            Created at
                        </th>
                        <th style="width: 16%" class="text-center">
                            images
                        </th>
                        <th style="width: 17%">Tag</th>

                        <th style="width: 18%">
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($articles as $article)

                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $article->title }}
                        </td>
                        <td>
                            {{ $article->category->name }}
                        </td>
                        <td class="project_progress">
                            {{ $article->created_at }}

                            {{-- {{ Str::words($article->description, 10, '...') }} --}}
                        </td>
                        <td class="project-state ml-4">
                            {{-- @php
                            $images = $article->image;
                            $explode = explode(" ", $images);
                            @endphp
                            @foreach($explode as $image)
                            <img src="{{asset($image) }}" alt="img" width="100" class="ml-5">
                            @break
                            @endforeach --}}

                            <img src="{{asset(Helper::singeleImage($article->image)) }}" alt="img" width="100"
                                class="ml-5">


                        </td>
                        <td>{{ $article->tag }}</td>
                        <td class="project-actions text-right d-flex justify-content-between">
                            <a class="btn btn-primary btn-sm" href="{{ route('post.show', $article->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $article->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>

                            <form action="{{ route('post.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete!')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </form>

                        </td>


                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>


@endsection

@section('extra-js')
<!-- DataTables -->
<script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

    });

</script>
@endsection