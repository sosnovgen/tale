<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
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
        if($request->hasFile('preview')) //Проверяем была ли передана картинка 
        {
            $root = $_SERVER['DOCUMENT_ROOT']."/tale/public/images"; //Путь к папке 'image'
            $img_root = ($root.'/groups'); //Путь к папке с для категорий.

            if (!file_exists($img_root)) //Если такой папки нет, то
            {
                mkdir($img_root); //создать её.
            }

            $f_name = $request -> file('preview') -> getClientOriginalName();//определяем оригин.имя файла
            $request -> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку /images/groups/
            $all = $request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/tale/public/images/groups/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            Group::create($all); //сохраняем массив в базу*/
        }
        else
        {
            //var_dump($request-> file('preview'));
            Group::create($request ->all()); // если картинка не передана, то сохраняем запрос
        }

        Session::flash('message', 'Группа сохранена!');
        return Redirect::to('/admin');

    }

    public function destroy($id)
        {
            $group = Group::find($id);
            $group -> delete();

            Session::flash('message', 'Группа удалена!');
            return Redirect::to('/admin/groups');
        }    
    
    
    
    
    
    
    
    
}
