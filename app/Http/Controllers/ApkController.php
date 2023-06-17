<?php

namespace App\Http\Controllers;

use App\Models\Apk;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ApkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Apk::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.apk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     // dd($request->all());
        $apk =  new Apk();
        if ($request->hasFile('image')) {
          $imageName =$request->image->getClientOriginalName();
          $request->image->move(public_path('image'), $imageName);
                          }
                          else{
                            $imageName = 'noimage.jpg';
                          }

        //                   if ($request->hasFile('apk_url')) {
        //   $apkurl = $request->apk_url->getClientOriginalName();
        //   $request->apk_url->move(public_path('apk_url'), $apkurl);
        //                   }
     
         $apk->image = $imageName ;
         //$apk->apk_url = $apkurl;
         $apk->username=$request->username;
         $apk->title=$request->title;
         $apk->age=$request->age;
         $apk->address=$request->address;
         $saved = $apk->save();
         return response()->json([
            'status'=>200,
            'Stc-data'=>$apk,
            'message'=>'Store data  Added Successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apk  $apk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apk  $apk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $apk = Apk::find($id);
        return view('admin.Apk.edit',compact('apk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apk  $apk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
         $apk = Apk::find($id);
          if ($request->hasFile('image')) {
            $imageName =$request->image->getClientOriginalName();
            $request->image->move(public_path('image'), $imageName);
                            }

                            if ($request->hasFile('apk_url')) {
            $apkurl = $request->apk_url->getClientOriginalName();
            $request->apk_url->move(public_path('apk_url'), $apkurl);
                            }
            $apk->image = $imageName ;
            $apk->apk_url = $apkurl;
            $apk->apk_name=$request->apk_name;
            $saved = $apk->save();
            if($saved){
             Alert::toast('apk add Successfully!');
            return redirect()->route('showall.apk');
        }
            else{
            return back()->with('message', 'Error Updating apk');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apk  $apk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apk = Apk::find($id);
        $apk->delete();
        return redirect()->route('showall.apk'); 
    }

     public function Show_allapk()
    {
        $apks= Apk::paginate(3);
        return view('admin.Apk.index' , compact('apks'));
    }

    public function increment_form($id)
    {
         $apk = Apk::find($id);
         return view('admin.Apk.apk' , compact('apk'));
    }

        public function increment(Request $request  ,$id)
        {
          $apk= Apk::find($id);
         //$apk = Apk::where('id', $id)->increment('apk_count');
          $apk->apk_count=$request->apk_count;
          $apk->increment('apk_count');
          $saved = $apk->save();
         return redirect()->route('showall.apk')->with('message','apk update Successfully!');

        }

public function increment_count(Request $request  ,$id)
{
  $apk= Apk::find($id);
 //$apk = Apk::where('id', $id)->increment('apk_count');
   $apk->apk_count=$request->apk_count;
   $apk->increment('apk_count');
     $saved = $apk->save();
         
           return redirect()->route('showall.apk')->with('message','apk update Successfully!');

}

            public function apk_index()
                {
                    $apk= Apk::all();
                return view('apkView', compact('apk'));
                }


        public function search(Request $request){
        $search = $request->input('search');
        $posts = Apk::query()
                    ->where('apk_name', 'LIKE', "%{$search}%")
                    ->orWhere('apk_url', 'LIKE', "%{$search}%")
                    ->get();
      //  dd($posts);
       return view('admin.Apk.search', compact('posts'));
    }

}
