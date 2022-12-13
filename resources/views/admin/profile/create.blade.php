@extends('admin.app')
@section('content')

 
<h2 class="modal-title">Add/Edit users</h2>
<form  action="{{route('profile.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <div class="row">
    @csrf
   
    <div class="col-lg-9">
      <div class="form-group row">
        <div class="col-sm-12">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
        <div class="col-sm-12">
          @if (session()->has('message'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
          @endif
        </div>
        <div class="col-sm-12 col-md-6">
          <label class="form-control-label">Name: </label>
          <input type="text" id="txturl" name="name" class="form-control "  />
         
      </div>
      <div class="col-sm-12 col-md-6">
        <label class="form-control-label">Email: </label>
        <input type="text" id="email" name="email" class="form-control "  />

      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 col-md-6">
        <label class="form-control-label">Password: </label>
        <input type="password" id="password" name="password" class="form-control "  />

      </div>
      <div class="col-sm-12 col-md-6">
        <label class="form-control-label">Image </label>
        <input type="file" id="password_confirm" name="image" class="form-control " value="" />

      </div>
    <div class="col-sm-6">
        <label class="form-control-label">Status</label>
        <div class="input-group mb-3">
          <select class="form-control" id="status" name="status">
            <option value="0" @if(isset($user) && $user->status == 0) {{'selected'}} @endif >Blocked</option>
            <option value="1" @if(isset($user) && $user->status == 1) {{'selected'}} @endif>Active</option>
          </select>
        </div>
      </div>

          <div class="col-sm-6">
        <label class="form-control-label">Slug</label>
        <div class="input-group mb-3">
                  <input type="text"   name="slug" class="form-control " value="" />

        </div>
      </div>
    </div>
            <div class="col-12">
              <div class="form-group row">
      <div class="col-sm-6 col-md-3">
        <label class="form-control-label">Country: </label>
        <div class="input-group mb-3">
          <select name="country_id" class="form-control" id="countries">
            <option value="0">Select a Country</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <label class="form-control-label">State: </label>
        <div class="input-group mb-3">
          <select name="state_id" class="form-control" id="states">
            <option value="0">Select a State</option>
          </select>
        </div>
      </div>

      <div class="col-sm-6 col-md-3">
        <label class="form-control-label">City: </label>
        <div class="input-group mb-3">
          <select name="city_id" class="form-control" id="cities">

          </select>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <label class="form-control-label">Phone: </label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{@$user->phone}}" />
        </div>
      </div>
    </div>
            </div>


    
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-md" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(function(){
   

// Set up the Select2 control
$('#countries').select2().trigger('change');
$('#states').select2();
$('#cities').select2();
//On Country Change
$('#countries').on('change', function(){
  var id = $('#countries').select2('data')[0].id;
  $('#states').val(null);
  $('#states option').remove();
  // Fetch the preselected item, and add to the control
var studentSelect = $('#states');
$.ajax({
type: 'GET',
url: "{{route('profile.states')}}/" + id
}).then(function (data) {
  // create the option and append to Select2
  for(i=0; i< data.length; i++){
    var item = data[i]
    var option = new Option(item.name, item.id, true, true);
    studentSelect.append(option);
  }
studentSelect.trigger('change');
  });
})
//On state Change
$('#states').on('change', function(){
  var id = $('#states').select2('data')[0].id;
  // Fetch the preselected item, and add to the control
  var studentSelect = $('#cities');
  $('#cities').val(null);
  $('#cities option').remove();
$.ajax({
type: 'GET',
url: "{{route('profile.cities')}}/" + id
}).then(function (data) {
  // create the option and append to Select2
  for(i=0; i< data.length; i++){
    var item = data[i]
    var option = new Option(item.name, item.id, false, false);
    studentSelect.append(option);
  }
  });
studentSelect.trigger('change');
})
})
</script>
@endsection