@extends('admin.app')
@section('content')

    

    <div class="py-5 text-center">

    
      <h2>Apk form</h2>

    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
       
       

      
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Apk insert form </h4>
        <form action="{{route('apk.update' , $apk->id)}}" method="POST" enctype="multipart/form-data">

          @csrf
           @method('PUT')
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Apk Name</label>
              <input type="text" class="form-control" name="apk_name" placeholder="" value="{{$apk->apk_name}}" >
              <input type="hidden" class="form-control" id="firstName" name="apk_count" placeholder="" value="0" required>

            </div>

            

            <div class="col-12">
              <label for="username" class="form-label">Apk url</label>
              <div class="input-group has-validation">
               <embed  width="300" height="100">
                <input type="file" class="form-control" name="apk_url" id="username" placeholder="" value="">
              
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Image <span class="text-muted"></span></label>
                            <img src= "{{asset('image/'.$apk->image) }}"  class="img-fluid" width="100px">

              <input type="file" class="form-control" name="image" placeholder="you@example.com">
              
            </div>

    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  
@endsection