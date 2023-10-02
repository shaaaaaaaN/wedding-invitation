<?php

namespace App\Http\Controllers\Invite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Relationship;

class InviteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = Invite::latest();
        // $inviteCount = Invite::all();
        return view('invites.index', [
            'invites' => $data->paginate(12),
            'invitesCount' => $data->count()
        ]);
    }

    public function add()
    {
        $data = Relationship::all();
        return view('invites.add', [
            'relationships' => $data
        ]);
    }


    public function create()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'relationship_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $newInvite = new Invite;
        $newInvite->name = request()->name;
        $newInvite->relationship_id = request()->relationship_id;
        $newInvite->user_id = auth()->user()->id;
        $newInvite->save();
        return redirect('/invites');
    }

    public function delete($id)
    {
        $invite = Invite::find($id);
        $invite->delete();
        return redirect('/invites')->with('info', "Invite deleted for $invite->name");
    }

    public function addRelationship()
    {
        $relationships = Relationship::all();
        $invites = Invite::all();
        return view('invites.addRelationship', [
            'relationships' => $relationships,
            'invites' => $invites
        ]);
    }


    public function createRelationship()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $newInvite = new Relationship;
        $newInvite->relationship_name = request()->name;
        $newInvite->save();
        return redirect('/invites');
    }

    public function deleteRelationship($id)
    {
        $relationship = Relationship::find($id);
        $relationship->delete();
        return redirect('/invites')->with('info', "Relationship deleted for $relationship->relationship_name");
    }
}
