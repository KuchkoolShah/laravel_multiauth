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

<h3 class="mt-5 text-center"><a href="{{route('apk.create')}}">
      Add New
        
      </a></h3>
<div class="table-responsive" >
  <table class="table table-striped table-sm" >
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Url Name</th>
        <th scope="col">Count</th>
        <th scope="col" colspan="3">Operation</th>
        
      </tr>
    </thead>
    <tbody>
      @if($apks->count() > 0)
      @foreach($apks as $apk)
      <tr>
        <td>{{$apk->id}}</td>
        <td>{{$apk->apk_name}}</td>
        <td><img src= "{{asset('image/'.$apk->image) }}"  class="img-fluid" width="100px"></td>
        <td>{{$apk->apk_url}}</td>
        <td>{{$apk->apk_count}}</td>
        <td> <a href="{{route('apk.edit' , $apk->id)}}"><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit"></span>Edit</a>|<a href="#"><span data-toggle="tooltip" data-placement="top" title="Edit" class="glyphicon glyphicon-edit"></span></a>|
        
        <form id="delete-form-{{ $apk->id }}" method="post" action="{{ route('apk.destroy',$apk->id) }}" style="display: none">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        </form>
        <a href="" onclick="
          if(confirm('Are you sure, You Want to delete this?' ))
          {
          event.preventDefault();
          document.getElementById('delete-form-{{ $apk->id }}').submit();
          }
          else{
          event.preventDefault();
          }" ><span  data-toggle="tooltip" data-placement="top" title="Delete" class="glyphicon glyphicon-trash"></span>Delete</a></td>
         
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="alert alert-info">No apks Found..</td>
        </tr>
        @endif
        
      </tbody>
    </table>
    <div class="d-flex justify-content-center" >
     
                {{ $apks->links('vendor.pagination.bootstrap-4') }}
               
            </div> 
  </div>
 <script>
      var preloader = document.getElementById('loader');
      function preLoaderHandler(){
          preloader.style.display = 'none';
      }
    </script>
  @endsection
