<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Image;

class AdminTeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team_members = TeamMember::latest('id')->get();
        return view('admin.pages.team_member.index', compact('team_members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.team_member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members',
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $team_member = TeamMember::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'designation' => $request->designation,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'biography' => $request->biography,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ]);
        $this->image_upload($request, $team_member->id);
        return redirect()->route('team_member.index')->with('success', 'Team member added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team_member = TeamMember::findOrFail($id);
        return view('admin.pages.team_member.edit', compact('team_member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team_member = TeamMember::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:team_members,slug,'.$team_member->id,
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $team_member->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'designation' => $request->designation,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'biography' => $request->biography,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ]);
        $this->image_upload($request, $team_member->id);
        return redirect()->route('team_member.index')->with('success', 'Team Member update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team_member = TeamMember::findorFail($id);
        if ($team_member->photo != 'default.jpg') {
            //delete old photo
            $photo_location = 'public/uploads/team_member/';
            $old_photo_location = $photo_location . $team_member->photo;
            unlink(base_path($old_photo_location));
        }
        $team_member->delete();
        return redirect()->back()->with('success', 'Team member delete successfully');
    }

    public function image_upload($request, $team_member_id)
    {
        $team_member = TeamMember::findorFail($team_member_id);

        if ($request->hasFile('photo')) {
            if ($team_member->photo != 'default.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/team_member/';
                $old_photo_location = $photo_location . $team_member->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/team_member/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(600, 600)->save(base_path($new_photo_location));
            $check = $team_member->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
