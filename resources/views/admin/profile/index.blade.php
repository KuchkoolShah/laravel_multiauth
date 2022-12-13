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

<h3 class="mt-5 text-center"><a href="{{route('profile.create')}}">
      Add New
        
      </a></h3>
<div class="table-responsive" >
  <table class="table table-striped table-sm" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">Address</th>
         <th scope="col">slug</th>
          <th scope="col">Image</th>
       
        
      </tr>
    </thead>
        <tbody>
      @if(isset($users) && $users->count() > 0)
      @foreach($users as $user)
      <tr>
        <td>{{@$user->id}}</td>

        <td>{{@$user->name}}</td>
        <td>{{@$user->email}}</td>
        <td>{{@$user->profile->country->name}},{{@$user->profile->state->name}} {{@$user->profile->city->name}}</td>
         <td>{{@$user->profile->slug}}</td>
        <td><img src="{{asset('uploads/'.@$user->profile->thumbnail)}}" alt="{{@$user->profile->name}}" class="img-responsive"
         height="50px;" width="50px;"/></td>
      
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="7" class="alert alert-info">No users Found..</td>
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
