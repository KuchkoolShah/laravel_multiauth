@extends('admin.app')
@section('content')


    <div class="row g-5 mt-5">
      
       </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Apk insert form </h4>
        <form action="{{route('apk.countstore' , $apk->id)}}" method="POST" >
  @csrf

          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Apk Name</label>
              <input type="text" class="form-control"  name="apk_count" 
              placeholder="" >
              
            </div>

            

            

    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </form>
     
    </div>
    </div>
  
@endsection