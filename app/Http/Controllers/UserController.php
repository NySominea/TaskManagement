<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('user.create');
          return view('user.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
            $user = new User();
           // $user-> password = Hash::make($request->password);
            $user->fill($request->all());
          //  $user-> password = Hash::make($request->password);

//            $path ="";
////            if($request->hasFile('image')){
////                $path=$request->file('image')->store('img');
////                }else{
////            return "nothing";
////            }
//            $user->image = $path;


            $imagename = time();
            $request->file('image')->storeAs('/public',$imagename);
            $user->image = $imagename;
            $user->save();

            return view('user.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $manager=$user->manager;
        $project = $user->projects;
        $priority = config('constant.priority');
        //dd($project);
        $file = $user->image;
        return view('user.detail',compact('user','manager','project','priority','file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         $user = User::find($id);
         $validate = Validator::make($request->all(),[
             'name'=>'required',
             'gender'=>'required',
             'nickname'=>'required',
             'email'=>'required',
             'password'=>'required',
             'image'=>'image|mimes:jpg,jpeg,png'
         ]);
         if($validate->fails()){
             return back()->withInput();
         }
         $user->fill($request->all());
         if(isset($user)){
             $user->image;
         }else{
             $imagename = time();
             $request->file('image')->storeAs('/public',$imagename);
             $user->image = $imagename;
         }

         $user->save();
         return  view('user.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return view('user.show');
    }
}
