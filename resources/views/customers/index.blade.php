@extends('customers.layout')
    <meta name="_token" content="{{ csrf_token() }}">
@section('content')
<div class="container"></div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!-- <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2> -->
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Add Customer</a>
            </div>
        </div>
    </div>
    
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div align="center" class="panel-body">
<div class="form-group">
    <label for="search">Search:</label>
<input type="text" class="form-controller" id="search" name="search"></input>
</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>full_name</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>address</th>
            <th>gender</th>
            <th>Hobby</th>
            <th>Mobile</th>
            <th>Profession</th>
            <th>image</th>   
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$customer->first_name}}</td>
            <td>{{$customer->last_name}}</td>
            <td>{{$customer->full_name}}</td>
            <td>{{ date('d/m/Y',strtotime($customer->birthdate)) }}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->gender}}</td>
            <td>{{$customer->hobby}}</td>
            <td>{{$customer->mobile['mobile']}}</td>
            {{--echo ($customer->mobile)--}}
            <td>{{$customer->profession}}</td>
            <td><img src="/customer_image/{{ $customer->image }}" width="100px"></td>
            <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        
         @endforeach
    </table>

    {!! $customers->links() !!}
        
@endsection

</div>
<!-- 
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

        -->
       