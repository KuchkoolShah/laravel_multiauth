@extends('admin.app')

@section('content' )
<style type="text/css">
  #loader{
  position: fixed;
  width: 100%;
  height: 100vh;
  background: #21242d url('https://cssauthor.com/wp-content/uploads/2018/06/Bouncy-Preloader.gif') no-repeat center;
  z-index: 999;
}
</style>

 <div id="loader">
    <div></div>
    <div></div>
    <div></div>
   </div>

<h3 class="mt-5 text-center"><a href="{{route('state.create')}}">
      Add New
        
      </a></h3>
<div class="table-responsive" >
  <table class="table table-striped table-sm" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Country-Name</th>
        
       
        
      </tr>
    </thead>
    <tbody>
      @if($state->count() > 0)
      @foreach($state as $state)
      <tr>
        <td>{{$state->id}}</td>
        <td>{{$state->name}}</td>
        <td>{{$state->country->name}}</td>
        
        
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="alert alert-info">No States Found..</td>
        </tr>
        @endif
        
      </tbody>
    </table>
  
  </div>
 <script>
      var preloader = document.getElementById('loader');
      function preLoaderHandler(){
          preloader.style.display = 'none';
      }
    </script>
  @endsection
