@extends('layouts.app')
@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card card-default">
    <div class="card-header">
        <span>Complaints</span>
        @if(!$is_admin)
            <a href="{{route('complaints.create')}}" class="btn btn-success btn-sm" style="float:right" title="Add New Complaint">Add New Complains</a>
        @endif
        </div>
    <div class="card-body"></div>
        <div class="card-body">
            <table class="table">
                <head>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Creation Time</th>
                </head>
                <tbody>
                    @if($complaints->count()>0)
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{$complaint->title}}</td>
                            <td>{{$complaint->description}}</td>
                            <td>{{$complaint->status}}</td>
                            <td>{{$complaint->created_at}}</td>
                            @if($is_admin)
                            <td><a href="{{route('complaints.show',$complaint->id)}}" class="btn btn-info btn-sm">Details</a></td>
                            @endif
                        </tr>
                        @endforeach
                        @else
                        <h3 class='text-center'>No Data To Display</h3>
                        @endif
                </tbody>
            </table>
        </div>
         {{$complaints->links()}}
</div>
@endsection