@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('error'))
            <div class="alert alert-danger alert-block" style="border-radius: 2px;">
                <button type="button" name="button" class="close" data-dismiss="alert">x</button>
                <strong>{{session()->get('error')}}</strong>
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success alert-block" style="border-radius: 2px;">
                <button type="button" name="button" class="close" data-dismiss="alert">x</button>
                <strong>{{session()->get('success')}}</strong>
            </div>
        @endif
    </div>
    <!-- some our projects -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="font-weight-bold">Our Projects</div>
                </div>
                <div class="col-md-1">
                    @can('create', App\Project::class)
                        <a href="#add" class="btn btn-success text-right" data-toggle="modal" data-target="#addProject">Add</a>
                        @include('modals.modal')
                        @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container text-center bg-grey" id="sampleproduct">
                <div class="row text-center">
                    @foreach($projects as $project)
                    <div class="col-md-2 col-sm-4 col-6">
                        <div class="img-thumbnail">
                            <!-- Admin can delete Project -->
                            @can('delete', \App\Project::class)
                                <form method="post" action="{{ route('admin.destroy', ['id' => $project->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="text-danger font-weight-bolder text-right" style="padding: 0; background-color: white;border: none; cursor: pointer; " value="&times;">
                                </form>
                            @endcan
                            <a href="{{ $project->link }}" target="_blank">
                                <img src="{{ asset($project->image) }}" alt="first" width="100" height="auto">
                                <p class="text-info">{{ $project->name }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
