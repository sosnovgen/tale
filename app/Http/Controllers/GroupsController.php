<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Storage;
use App\Group;
use App\Http\Requests;

class GroupsController extends Controller
{
    public function index()
        {
            $groups = Group::all();
            return view('admin.groups.groups', ['groups' => $groups]);
        }

    public function create()
        {
            return view('admin.groups.create');
        }


    public function store(Request $request)
    {
        if($request->hasFile('preview')) {
            $img_root = 'images/groups';

            $fileName = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($img_root, $fileName);

            $all = $request->all();
            $all['preview'] = "/images/groups/" . $fileName;

            Group::create($all);
        } else {
            $all = $request->all();
            $all['preview']= "placehold.it";
            Group::create($all);
        }

        Session::flash('message', 'Группа сохранена!');
        return Redirect::to('/admin');

    }

    public function destroy($id)
        {
            $group = Group::find($id);

            $fileName = ($group -> preview);
            $fileName = mb_substr($fileName,1);
            if (is_file($fileName))
            {
                unlink($fileName);
            }

            $group->delete(); //Удалить строку из БД


            Session::flash('message', 'Группа удалена!');
            return Redirect::to('/admin/groups');
        }    
    
    
    
    
    
    
    
    
}
