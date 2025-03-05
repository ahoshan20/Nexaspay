@extends('admin.layout.master', ['page_slug' => 'admin'])

@section('content')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title">{{__('Edit Admin')}}</h4>
        <a href="{{route('admin.index')}}" class="btn btn-primary">{{__('Back')}}</a>
      </div>
      <div class="card-body">
        <form action="{{route('admin.update', encrypt($admin->id))}}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group mb-3">
            <label for="#">{{__('Name')}}</label>
            <input type="text" class="form-control" value="{{$admin->name}}" placeholder="Enter Your Name" name="name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Email')}}</label>
            <input type="email" class="form-control" value="{{$admin->email}}" placeholder="Enter Your Email" name="email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Password')}}</label>
            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Confirm Password')}}</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
          </div>
          <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection