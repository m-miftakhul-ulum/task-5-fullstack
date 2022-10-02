@extends('layouts.auth')
@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('article.__form')
            </form>
        </div>
    </div>
</div>
@endsection
