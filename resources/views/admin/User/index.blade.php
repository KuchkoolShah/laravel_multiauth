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

<h3 class="mt-5 text-center"><a href="{{route('user.create')}}">
      Add New
        
      </a></h3>
<div class="table-responsive" >
  <table class="table table-striped table-sm" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        
        <th scope="col" colspan="3">Operation</th>
        
      </tr>
    </thead>
    <tbody>
      @if($user->count() > 0)
      @foreach($user as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td> <a href="{{route('user.edit' , $user->id)}}"><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit"></span>Edit</a>|<a href="#"><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit"></span></a>|
        
        <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy',$user->id) }}" style="display: none">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        </form>
        <a href="" onclick="
          if(confirm('Are you sure, You Want to delete this?' ))
          {
          event.preventDefault();
          document.getElementById('delete-form-{{ $user->id }}').submit();
          }
          else{
          event.preventDefault();
          }" ><span  data-toggle="tooltip" data-placement="top" title="Delete" class="glyphicon glyphicon-trash"></span>Delete</a></td>
         
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="alert alert-info">No user Found..</td>
        </tr>
        @endif
        
      </tbody>
    </table>
    <div class="d-flex justify-content-center" >
     
              
               
            </div> 
  </div>
 <script>
      var preloader = document.getElementById('loader');
      function preLoaderHandler(){
          preloader.style.display = 'none';
      }
    </script>
  @endsection
