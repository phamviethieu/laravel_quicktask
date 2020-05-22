<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $task = $user
            ->tasks()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index', [
            'tasks' => $task,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vld = $this->validate($request,[
                'name' => 'required',
            ],[
                'name.required'=>'Tên task không được để trống',
            ]);
        $task['name'] = $request->input('name');
        $task['user_id'] = $request->user()->id;
        Task::create($task);

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if(isset($task)){
            return view('update',[
                'task'=>$task,
            ]);
        }
        else return view('404');
        
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
        $vld = $this->validate($request,[
                'name' => 'required',
            ]);
        $task = Task::find($id);
        $task->name = $request->name;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    /**
     * Change language
     */
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
