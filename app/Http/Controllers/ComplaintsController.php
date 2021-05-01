<?php

namespace App\Http\Controllers;

use App\complaints;
use Illuminate\Http\Request;
use App\Http\Requests\Complaints\CreateComplaintRequest;
use App\Http\Requests\Complaints\EditComplaintRequest;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=[
            'complaints'=>(auth()->user()->is_admin)?complaints::orderBy('created_at', 'desc')->paginate(9):complaints::where('user_id', auth()->user()->id)->paginate(9),
            'is_admin'=>auth()->user()->is_admin
        ];

        return view('complaints.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateComplaintRequest $request)
    {
        //create complain
        complaints::Create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id
        ]);
        //flush msg
        session()->flash('success','Complaint Added Sucessfully');
        //redirect user to complaints page
        return redirect(route('complaints.index'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //this service only available for admin to view complaints...
        return view('complaints.show')->with('complaint',complaints::find($id));;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editComplaint(EditComplaintRequest $request,$id)
    {
        complaints::where('id',$id)->update(['status'=>$request->status]);
        session()->flash('success','Complaint Updated Sucessfully');
        //Note:response can be changed to json
        //return response()->json($complaint, 201);
        return redirect(route('complaints.index'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
