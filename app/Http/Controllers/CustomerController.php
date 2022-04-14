<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
                   
        $customers = Customer::latest()->paginate(5);

        return view('customers.index',compact('customers')) 
        ->with  ('i',(request()->input('page',1)-1)*5);
        

    }



    //     public function search(Request $request)
    //     {
    //         if($request->ajax())
    //          {
    //         $output="";
    //         $customers=DB::table('customers')->where('first_name','LIKE','%'.$request->search."%")->get();
    //         if($customers)
    //             {
    //         foreach ($customers as $key => $customer) {
    //         $output.='<tr>'.
    //         '<td>'.$customer->first_name.'</td>'.
    //         '<td>'.$customer->last_name.'</td>'.
    //         // '<td>'.$customer->description.'</td>'.
    //         // '<td>'.$customer->price.'</td>'.
    //         '</tr>';
    //             }
    //         return Response($output);
    //         }
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('customers.create'); 
        return view ('customers.add_edit');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
     

           
        $request->validate([    

            'first_name'=>'required|max:20',
            'last_name'=>'required|max:25',
            'birthdate'=>'required',
            'email'=>'required|string|email|max:255|unique:customers',
            'address'=>'required    ',
            'gender'=>'required',
            'hobby'=>'required',
            'mobile'=>'required|digits:10|numeric',
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'profession'=>'required',

        ]);
        // dump($input);
        $input = $request->all();
       // $input['profession']=$request->{'profession'};
// dd($input);
           
        $input['hobby']=implode(",",$request->hobby);
        //dd($input);
    //     if($image = $request->file('image')) {
    //         $destinationPath = 'customer_image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['image'] = "$profileImage";
    //     }
    //   $profileImage= $request->image;
      if($image = $request->file('image')) {
        $input['image'] = insert_image($image);
        }
        // dd($input);
    //    $input['image'] = "$profileImage";
    // dd($input);
    // Customer::create($input); only for input
        $customer=Customer::create($input);  // this is for join  $customer is object(variable)
        // dd($customer);
        $input['customer_id']=$customer->id;// pass krava mate $input 
        // dd($input);  
        Mobile::create($input);
        // dd($input);
        // Post::create($input);
        return redirect()->route('customers.index')
                        ->with('success','customer created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)// whatever parameter is passes here you have to call this into our edit-form
    {
    //    dd ($customer['hobby']);
       $customer['hobby']=explode(",",$customer['hobby']);
    //    dd(date('d-m-Y',strtotime($customer['birthdate'])));
    //    $customer['birthday']=date('d-m-Y',strtotime($customer['birthdate']));
        return view('customers.add_edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        
        $request->validate([

            'first_name'=>'required',
            'last_name'=>'required',
            'birthdate'=>'required',
            'email'=>'required|email|unique:customers,email,'.$customer->id,
            'address'=>'required',
            'gender'=>'required',
            'hobby'=>'required',
            'mobile'=>'required|digits:10|numeric',
            // 'title'=>'required',
            // 'description'=>'required',
            'image'=>'sometimes',
            'profession'=>'required',

        ]);
        $input = $request->all();
       
            // dump($input);
            // dd($input->Customer);

        $input['hobby']=implode(",",$request->hobby);
        // dd($input);
            if ($image = $request->file('image')) {
            $destinationPath = 'customer_image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //$customer = Customer::find($customer->id);           
            unlink("customer_image/".$input['old_image']);
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $customer->update($input);

        // dd($customer);   
        $input['customer_id']=$customer->id;
        // dd($customer->mobile);
        $mobile=$customer->mobile;
       
        $mobile->update($input);
        // $input= Mobile::create($customer);
        // dd($input);
        return redirect()->route('customers.index')
                        ->with('success','customer updated successfully');
    
    }
   
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
       
        $customer = Customer::find($customer->id);
dd($customer->id);
        unlink("customer_image/".$customer->image);

        Customer::where("id", $customer->id)->delete();
       
          
        //$customer->delete();
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}



