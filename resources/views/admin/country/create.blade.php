@extends('admin.app')
@section('content')

 

    <div class="row g-5">
    
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Country insert form </h4>
        <form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">

          @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Country Name</label>
              <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required> 
            </div>

            

            <div class="col-12">
              <label for="username" class="form-label">symbol</label>
              <div class="input-group has-validation">
              
              <input type="text" class="form-control" id="firstName" name="symbol" placeholder="" value="" required> 
              
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Code<span class="text-muted"></span></label>
              <input type="text" class="form-control" id="firstName" name="code" placeholder="" value="" required> 
              
            </div>

    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection