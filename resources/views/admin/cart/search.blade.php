@extends('admin.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <h3><a href="{{route('apk.create')}}">
      Add New
        
      </a></h3>
    </div>
  </div>
</div>

<h2>Apk</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Url Name</th>
        <th scope="col">Count</th>
      
        
      </tr>
    </thead>
    <tbody>
   @if($posts->isNotEmpty())
    @foreach ($posts as $post)
        <div class="post-list">
         <td>{{$post->id}}</td>
        <td>{{$post->apk_name}}</td>
        <td><img src= "{{asset('image/'.$post->image) }}"  class="img-fluid" width="100px"></td>
        <td>{{$post->apk_url}}</td>
        <td>{{$post->apk_count}}</td>
            
           
        </div>
    @endforeach
@else
    <div>
        <h2>No posts found</h2>
    </div>
@endif
        
      </tbody>
    </table>
  </div>
 

    
@endsection


