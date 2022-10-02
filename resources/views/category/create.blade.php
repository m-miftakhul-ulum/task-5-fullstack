@extends('layouts.auth')
@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{route('category.store')}}" method="post" >
                @csrf
                @include('category.__form')
            </form>
        </div>
    </div>
</div>
@endsection
