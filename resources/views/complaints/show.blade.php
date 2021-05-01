@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card card-header">Complaint Details</div>
    <div class="card-body">
        <form action="{{route('complaints.status',['id'=>$complaint->id])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{isset($complaint)?$complaint->title :''}}" disabled="disabled">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" disabled="disabled">{{isset($complaint)?$complaint->description :''}}</textarea>
                <label for="status">Status</label>
                <select class="form-control" aria-label="Status" name="status" id="status">
                    <option value="resolved">Resolved</option>
                    <option value="dismissed">Dismissed</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection