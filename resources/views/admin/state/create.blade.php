@extends('admin.app')
@section('content')

 

    <div class="row g-5">
    
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">State form </h4>
        <form action="{{route('state.store')}}" method="POST" enctype="multipart/form-data">

          @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">State Name</label>
              <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>

              
            </div>

            

            <div class="col-12">
              <label for="username" class="form-label">Country Name</label>
              <div class="input-group has-validation">
                                
                    <select name="country_id" class="form-control" id="countries">
                              <option value="0">Select a Country</option>
                              @foreach($countries as $country)
                              <option value="{{$country->id}}">{{$country->name}}</option>
                              @endforeach
                            </select>              
              </div>
            </div>


    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection