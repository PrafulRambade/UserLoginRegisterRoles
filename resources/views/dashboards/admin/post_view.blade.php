@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Post') }},{{Auth::user()->name}}</div>

                <div class="card-body">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Category</td>
                            <td>Author</td>
                            <td colspan="2" style="text-align: center">Action</td>
                        </tr>
                        @foreach($data as $post)
                        <tr>
                        
                            <td>{{$post->name}}</td>
                            <td>{{$post->cat}}</td>
                            <td>{{$post->user->name}}</td>
                            <td><a href="edit_post/{{$post->id}}">Edit</a></td>
                            <td><a href="delete_post/{{$post->id}}">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
