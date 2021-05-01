@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card card-header">Create New Complaint</div>
    <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
            {{$error}}
            </li>
            @endforeach

        </ul>
    </div>
    @endif
        <form action="{{route('complaints.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection