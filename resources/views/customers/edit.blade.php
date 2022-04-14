    @extends('customers.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
{{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}
    
    <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
            
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="first_name"> <strong>Firstname <span class="text-danger">*</span></strong></label>
                <input type="text" name="fname" class="form-control" placeholder="Enter your First_Name" value="{{ $customer->first_name }}">
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <label for="last_name"><strong>Lastname <span class="text-danger">*</span></strong></label>
                <input type="text" name="lname" class="form-control" placeholder="Enter your Last_Name" value="{{ $customer->last_name }}">
                @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <label for="birthdate"> <strong>Birthdate <span class="text-danger">*</span></strong></label>
                <input type="date" id="birthday" class="form-control" name="birthdate" value="{{ $customer->birthdate }}" /><br>   
                @if ($errors->has('birthdate'))
                    <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <label for="email"> <strong>Email <span class="text-danger">*</span></strong></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$customer->email}}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="address"><strong>address <span class="text-danger">*</span></strong></label>
                <input type="text" name="add" class="form-control" placeholder="Enter Address" value="{{$customer->address}}">
                @if ($errors->has('add'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <label for="gender"><strong>Gender <span class="text-danger">*</span></strong></label>
                <input type="radio"  name="gender" value="male" {{$customer->gender == 'male' ? 'checked' : ''}}> Male
                <input type="radio"  name="gender" value="female"{{$customer->gender == 'female' ? 'checked' : ''}}>Female
                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Hobby</strong>
                <label for="hobby"><strong>Hobby <span class="text-danger">*</span> </strong></label>
                <input type="checkbox"  name="hobby[]" value="cricket" {{ (in_array("cricket" , $customer->hobby))? 'checked' : ''}}>Cricket
                <input type="checkbox"  name="hobby[]" value="football" {{ (in_array("football" ,$customer->hobby))? 'checked' : ''}}>Football
                <input type="checkbox"  name="hobby[]" value="badminton" {{ (in_array("badminton" ,$customer->hobby))? 'checked' : ''}}>badminton
                @if ($errors->has('hobby'))
                    <span class="text-danger">{{ $errors->first('hobby') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group">
                <strong>Mobile</strong>
                <label for="Mobile"><strong>Mobile<span class="text-danger">*</span></strong></label>
                <input type="text" id="Mobile" name="Mobile" value="{{$customer->Mobile}}">
                @if ($errors->has('Mobile'))
                    <span class="text-danger">{{ $errors->first('Mobile') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="image"><strong>Image:<span class="text-danger">*</span></strong></label>
                <input type="file" name="image" class="form-control" placeholder="image">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <img width="200" height="200" src="/customer_image/{{ $customer->image }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="profession"><strong>Select your Profession <span class="text-danger">*</span></strong></label>
                <select id="profession" name="profession">
                <option value="Self-employed" {{$customer->profession == 'Self-employed' ? 'selected' : ''}}>Self-employed</option>
                <option value="doctor" {{$customer->profession == 'doctor' ? 'selected' : ''}}>doctor</option>
                <option value="teacher" {{$customer->profession == 'teacher' ? 'selected' : ''}}>Teacher</option>
                <option value="engineer" {{$customer->profession == 'engineer' ? 'selected' : ''}}>engineer</option>
                <option value="other" {{$customer->profession == 'other' ? 'selected' : ''}}>Other</option>
                @if ($errors->has('profession'))
                    <span class="text-danger">{{ $errors->first('profession') }}</span>
                @endif
                </select>


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" name="old_image" value="{{ $customer->image }}" />

                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>
       
    </form>
@endsection