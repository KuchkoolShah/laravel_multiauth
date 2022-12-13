<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Profile;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->paginate(35);
        return view('admin.profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $countries = Country::all();
       return view('admin.profile.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                  
           if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
                            }
        $user = User::create([
            'email' => $request->email,
             'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);
        if ($user) {
            $profile = Profile::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'thumbnail' => $imageName,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'phone' => $request->phone,
                'slug' => $request->slug,
            ]);
        }
        if ($user && $profile) {
            return redirect(route('profile.index'))->with('message', 'User Created Successfully');
        } else {
            return back()->with('message', 'Error Inserting new User');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

        public function getStates(Request $request, $id) {
        if ($request->ajax()) {
            return State::where('country_id', $id)->get();
        } else {
            return 0;
        }
    }
    public function getCities(Request $request, $id) {
        if ($request->ajax()) {
            return City::where('state_id', $id)->get();
        } else {
            return 0;
        }
    }
}
