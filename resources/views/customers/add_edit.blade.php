@extends('customers.layout')
     
     @section('content')
     <style>
        label.error {
            color: #dc3545;
            font-size: 20px;
        }
    </style>
         <div class="row">
             <div class="col-lg-12 margin-tb">
                 <div class="pull-left">
                     @if(isset($customer))
                     <h2>Edit Customer Details</h2>
                     @else
                     <h2>Add Customer Details</h2>
                     @endif
                 </div>
                 <div class="pull-right">
                     <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                 </div>
             </div>
         </div>
          
         <form id="@if(isset($customer)){!! 'editForm' !!}@else{!! 'regForm' !!}@endif" action="@if(isset($customer)){{ route('customers.update',$customer->id) }} @else {{ route('customers.store') }} @endif" method="POST" enctype="multipart/form-data"> 
             @csrf
                @if(isset($customer))
                     @method('PUT')
                @endif
          <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                 <label for="first_name"> <strong> first_name <span class="text-danger">*</span></strong></label>
                     <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your First_Name" value="@if(isset($customer)){{ $customer->first_name }}@else{{ old('first_name') }}@endif">
                     @if ($errors->has('first_name')) 
                         <span class="text-danger">{{ $errors->first('first_name') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
             <label for="last_name"><strong>Lastname <span class="text-danger">*</span></strong></label>
                     <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your Last_Name" value="@if(isset($customer)){{ $customer->last_name }}@else{{ old('last_name') }}@endif">
                     @if ($errors->has('last_name'))
                         <span class="text-danger">{{ $errors->first('last_name') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
             <label for="birthdate"> <strong>Birthdate <span class="text-danger">*</span></strong></label>
                     <input type="date" id="birthdate" class="form-control" name="birthdate" value="@if(isset($customer)){{ $customer->birthdate }}@else{{old('birthdate')}}@endif"  /><br>   
                     @if ($errors->has('birthdate'))
                         <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
             <label for="email"> <strong>Email <span class="text-danger">*</span></strong></label>
                     <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="@if(isset($customer)){{$customer->email}}@else{{ old('email') }}@endif">
                     @if ($errors->has('email'))
                         <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                 </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                 <label for="address"><strong>address <span class="text-danger">*</span></strong></label>
                     <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="@if(isset($customer)){{$customer->address}}@else{{ old('address') }}@endif">
                     @if ($errors->has('address'))
                         <span class="text-danger">{{ $errors->first('address') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
             <label for="gender"><strong>Gender <span class="text-danger">*</span></strong></label>
                     <input type="radio"  name="gender" id="gender" value="male" @if(isset($customer)) {{(old('gender',$customer->gender) == 'male') ? "checked" : ""}} @else {{ (old('gender')=="male")?"checked":"" }} @endif> Male&nbsp;&nbsp;
                     <input type="radio"  name="gender" id="gender" value="female" @if(isset($customer)){{(old('gender',$customer->gender) == 'female') ? "checked" : ""}} @else {{ (old('gender')=="female")?"checked":"" }} @endif> Female&nbsp;&nbsp;
                     @if ($errors->has('gender'))
                         <span class="text-danger">{{ $errors->first('gender') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">    
             <div class="form-group">
                     <strong>Hobby</strong>
                     <!-- <input type="checkbox" id="hobbies1" name="hobbies[]" value="Reading" @if(isset($student)){{ (in_array("Reading",old('hobbies',$student->hobbies))?"checked":"") }}@else{{ (in_array("Reading",(array)old('hobbies'))?"checked":"") }}@endif>Reading&nbsp;&nbsp; -->

                     <label for="hobby"><strong>Hobby <span class="text-danger">*</span> </strong></label>
                     <input type="checkbox" id="hooby"  name="hobby[]" value="cricket" @if(isset($customer)){{ (in_array("cricket",old('hobby',$customer->hobby))?"checked":"") }} @else {{ (in_array("cricket",(array)old('hobby'))?"checked":"") }}@endif>Cricket&nbsp;&nbsp;
                     <input type="checkbox" id="hobby"  name="hobby[]" value="football" @if(isset($customer)){{ (in_array("football",old('hobby',$customer->hobby))?"checked":"") }} @else {{ (in_array("football",(array)old('hobby'))?"checked":"") }}@endif>Football&nbsp;&nbsp;
                     <input type="checkbox" id="hobby" name="hobby[]" value="badminton" @if(isset($customer)){{ (in_array("badminton",old('hobby',$customer->hobby))?"checked":"") }} @else {{ (in_array("badminton",(array)old('hobby'))?"checked":"") }}@endif>badminton&nbsp;&nbsp;
                     @if ($errors->has('hobby'))
                         <span class="text-danger">{{ $errors->first('hobby') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12"> 
             <div class="form-group">
                     <label for="mobile"><strong>Mobile <span class="text-danger">*</span></strong></label>
                     <input type="text" id="Mobile" name="mobile" class="form-control" placeholder="Enter Mobile" value="@if(isset($customer)){{$customer->mobile['mobile']}}@else{{ old('mobile') }}@endif">
                     @if ($errors->has('mobile'))
                         <span class="text-danger">{{ $errors->first('mobile') }}</span>
                     @endif
                 </div>
             </div> 
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                 <label for="image"><strong>Image:<span class="text-danger">*</span></strong></label>
                     <input type="file" id="image" name="image" class="form-control" placeholder="image">
                     @if(isset($customer))
                        <img src="{{ asset('/customer_image/'.$customer->image) }}" width="300px">
                     @endif
                     @if($errors->has('image'))
                         <span class="text-danger">{{ $errors->first('image') }}</span>
                     @endif                     
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                 <label for="profession"><strong>Select your Profession <span class="text-danger">*</span></strong></label>
                     <select id="profession" name="profession">
                        <option disabled selected>--Select Profession--</option>
                        <option value="Self-employed" @if(isset($customer)) {{ (old('profession',$customer->profession)=='Self-employed')?"selected":"" }}@else{{ (old('profession')=='Self-employed')?"selected":""; }}@endif>Self-employed</option>
                        <option value="doctor" @if(isset($customer)) {{ (old('profession',$customer->profession)=='doctor')?"selected":"" }}@else{{ (old('profession')=='doctor')?"selected":""; }}@endif>Doctor</option>
                        <option value="teacher" @if(isset($customer)) {{ (old('profession',$customer->profession)=='teacher')?"selected":"" }}@else{{ (old('profession')=='teacher')?"selected":""; }}@endif>teacher</option>
                        <option value="engineer" @if(isset($customer)) {{ (old('profession',$customer->profession)=='engineer')?"selected":"" }}@else{{ (old('profession')=='engineer')?"selected":""; }}@endif>engineer</option>
                        <option value="other" @if(isset($customer)) {{ (old('profession',$customer->profession)=='other')?"selected":"" }}@else{{ (old('profession')=='other')?"selected":""; }}@endif>other</option>
                     </select>
                     @if ($errors->has('profession'))
                         <span class="text-danger">{{ $errors->first('profession') }}</span>
                     @endif
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    @if(isset($customer))
                        <input type="hidden" name="old_image" value="{{ $customer->image }}" />
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
             </div>
        </div>
            
         </form>
         <script src="{{ asset('Jquery/crud_validation.js') }}?t={{time()}}"></script>
@endsection        
        