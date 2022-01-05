@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new Festival
          </div>
          <div class="card-body">
          <!-- this block is ran if the validation code in the controller fails
          this code looks after displaying the correct error message to the user -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('admin.festivals.store')  }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
              </div>
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" />
              </div>
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" />
              </div>
              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" />
              </div>
              <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name') }}" />
              </div>
              <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" />
              </div>
              <div class="form-group">
                <label for="contact_phone">Contact Phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" />
              </div>


            <div class="form-group">
                <label for="festival_image"> Festival Image </label>
                <input type="file" class="form-control" id='festival_image' name="festival_image" />
            </div>

              <a href="{{ route('admin.festivals.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
