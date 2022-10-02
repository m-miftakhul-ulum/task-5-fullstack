@extends('layouts.auth')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        category
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{route('category.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            Create new category
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created By</th>
                            <th>Date</th>
                            <th class="w-1"></th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $key)
                        <tr>
                            <td class="text-muted">{{$key->nama}}</td>
                            <td class="text-muted"><a href="#" class="text-reset"> {{$key->user->name}} </a></td>
                            <td class="text-muted">{{$key->created_at}}</td>
                            <td>
                                <a class="btn btn-primary ms-auto" href="{{route('category.edit', $key)}}">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('category.destroy', $key)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary ms-auto">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
