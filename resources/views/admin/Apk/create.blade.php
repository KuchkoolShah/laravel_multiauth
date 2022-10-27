@extends('admin.app')
@section('content')

 

    <div class="row g-5">
    
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Apk insert form </h4>
        <form action="{{route('apk.store')}}" method="POST" enctype="multipart/form-data">

          @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Apk Name</label>
              <input type="text" class="form-control" id="firstName" name="apk_name" placeholder="" value="" required>
              <input type="hidden" class="form-control" id="firstName" name="apk_count" placeholder="" value="0" required>

              
            </div>

            

            <div class="col-12">
              <label for="username" class="form-label">Apk url</label>
              <div class="input-group has-validation">
              
                <input type="file" class="form-control" name="apk_url" id="username" placeholder="Username" required>
              
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Image <span class="text-muted"></span></label>
              <input type="file" class="form-control" name="image" id="email" placeholder="you@example.com">
              
            </div>

    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection