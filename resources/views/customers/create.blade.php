@extends('customers.layout')
  
@section('content')
<style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
<!-- <script src="{{ asset('js/crud_validation.js') }}"></script> -->

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> New Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
        </div>
    </div>
</div>
     
{{--@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}
     
<form action="{{ route('customers.store') }}" method="POST" id="regForm" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="first_name"> <strong>Firstname <span class="text-danger">*</span></strong></label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your First Name" value="{{ old('first_name') }}">
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="last_name"><strong>Lastname <span class="text-danger">*</span></strong></label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your Last Name" value="{{ old('last_name') }}">
                @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
               <label for="birthdate"> <strong>Birthdate <span class="text-danger">*</span></strong></label>
                <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                @if ($errors->has('birthdate'))
                    <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
               <label for="email"> <strong>Email <span class="text-danger">*</span></strong></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}"  >
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="address"><strong>address <span class="text-danger">*</span></strong></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="gender"><strong>Gender <span class="text-danger">*</span></strong></label>
                <input type="radio"  name="gender" id="gender" value="male" {{old('gender') == 'male' ? 'checked' : ''}} >Male
                <input type="radio"  name="gender" id="gender"  value="female" {{old('gender') == 'female' ? 'checked' : ''}}>Female
                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">     
        <div class="form-group">
                <label for="hobby"><strong>Hobby <span class="text-danger">*</span> </strong></label>
                <input type="checkbox"  name="hobby[]" id="hobby" value="cricket" {{ (in_array("cricket" ,(array   ) old('hobby'))? 'checked' : '')}}>Cricket
                <input type="checkbox"  name="hobby[]" id="hobby" value="football" {{ (in_array("football" ,(array   ) old('hobby'))? 'checked' : '')}}>Football
                <input type="checkbox"  name="hobby[]" id="hobby" value="badminton" {{ (in_array("badminton" ,(array   ) old('hobby'))? 'checked' : '')}}>badminton
                @if ($errors->has('hobby'))
                    <span class="text-danger">{{ $errors->first('hobby') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group">
                <label for="Mobile"><strong>Mobile<span class="text-danger">*</span></strong></label>
                <input type="text" id="mobile" name="mobile" class="form-control"  value="{{ old('mobile') }}">
                @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="image"><strong>Image:<span class="text-danger">*</span></strong></label>
                <input type="file" id="image" name="image" class="form-control" placeholder="image" value="">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="profession"><strong>Select your Profession <span class="text-danger">*</span></strong></label>
                <select name="profession" id="profession" >
                <option disabled selected>--Select type--</option>
                <option value="Self-employed" {{ old('profession') == 'Self-employed' ? 'selected' : '' }}>Self-employed</option>
                <option value="doctor"{{ old('profession') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="teacher" {{ old('profession') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="engineer" {{ old('profession') == 'engineer' ? 'selected' : '' }}>engineer</option>
                <option value="other" {{ old('profession') == 'other' ? 'selected' : '' }}>Other</option>
                
                </select>
            @if ($errors->has('profession'))
                    <span class="text-danger">{{ $errors->first('profession') }}</span>
                @endif
                 </div>
                 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endsection

    