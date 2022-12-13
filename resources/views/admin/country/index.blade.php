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

<h3 class="mt-5 text-center"><a href="{{route('country.create')}}">
      Add New
        
      </a></h3>
<div class="table-responsive" >
  <table class="table table-striped table-sm" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">code</th>
        <th scope="col">Symbal</th>
       
        
      </tr>
    </thead>
    <tbody>
      @if($country->count() > 0)
      @foreach($country as $country)
      <tr>
        <td>{{$country->id}}</td>
        <td>{{$country->name}}</td>
        <td>{{$country->symbol}}</td>
        <td>{{$country->code}}</td>
        
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="alert alert-info">No countrys Found..</td>
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
