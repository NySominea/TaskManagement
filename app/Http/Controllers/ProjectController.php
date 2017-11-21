<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Module;
use App\Project;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a form for creating new project.
     *
     * @return projects.create.blade.php
     */

    public function index()
    {
        $users = User::pluck('name','id');
        return view('projects.create',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created project in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $modules = $request->input('module');
        $tasks   = $request->input('task');
        $member  = $request->input('project_member');
        $project = Project::create([
            'name'          => $request->project_title,
            'description'   => $request->project_desc,
            'start_date'    => date('Y-m-d',strtotime($request->project_startdate)),
            'end_date'      => date('Y-m-d',strtotime($request->project_enddate)),
            'user_id'       => Auth::user()->id,
        ]);

        for($i=0;$i<count($modules);$i++){
            $mod=Module::create([
                'name'          => $modules[$i]['name'],
                'start_date'    => date('Y-m-d',strtotime($modules[$i]['startdate'])),
                'end_date'      => date('Y-m-d',strtotime($modules[$i]['enddate'])),
                'priority'      => $modules[$i]['priority']
            ]);
            $project->modules()->save($mod);

            for($j=0;$j<count($tasks[$i]);$j++){
                $ta=Task::create([
                    'name'      => $tasks[$i][$j]['name'],
                    'user_id'   => $tasks[$i][$j]['developer'],
                ]);
                $mod->tasks()->save($ta);
            }

            foreach($member as $member){
                $project->users()->attach($member);
            }
            $project->users()->attach(Auth::user()->id);
        }
    }
    /**
     * Display a project detail.
     *
     * @param  int  project->$id
     * @return project.show.blade.php
     */
    public function show($id)
    {
        $project  = Project::find($id);
        $modules  = $project->modules;
        $alltasks = array();
        $module_developers = array();
        $module_progress_percent = array();
        $task_developer = array();

        foreach($modules as $module){
            $taskOfMoudle = $module->tasks;
            $alltasks[$module->id] = $taskOfMoudle;
            for($i=0;$i<count($taskOfMoudle);$i++){
                $module_developers[$module->id][] = $alltasks[$module->id][$i]->user;
                $module_developers[$module->id] = array_values(array_unique($module_developers[$module->id]));
            }
            $module_progress_percent[$module->id] = count(Task::where('module_id',$module->id)->where('status','=',5)->get())/count($taskOfMoudle)*100;
        }
        $manager = $project->manager;
        $developers = $project->users;
        $module_priority = config('constant.priority');
        $module_priority_color = config('constant.priority_color');

        $task_status = config('constant.task_status');
        $task_status_color = config('constant.task_status_class_color');



        return view('projects.show',compact('project','modules','alltasks','manager',
                                                        'developers','module_developers','module_priority','module_priority_color',
                                                        'task_status','task_status_color','module_progress_percent'));
    }

    /**
     * Show the form for editing the project.
     *
     * @param  int  $id
     * @return projects.update.blade.php
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $project->start_date = date('m/d/Y',strtotime($project->start_date));
        $project->end_date = date('m/d/Y',strtotime($project->end_date));
        $users = User::pluck('name','id');
        $project_users = $project->users;

        $modules = $project->modules;
        $tasks=array();
        foreach ($modules as $module) {
            $module->start_date = date('m/d/Y',strtotime($module->start_date));
            $module->end_date = date('m/d/Y',strtotime($module->end_date));
            $tasks[$module->id]=$module->tasks;
        }

        return view('projects.update',compact('project','users','project_users','modules','tasks'));
    }

    /**
     * Update the project in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return projects.show.blade.php
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $members = $request->input('project_member');
        $members[] = Auth::user()->id;
        $modules = $request->input('module');

        $project->name = $request->input('project_title');
        $project->description = $request->input('project_desc');
        $project->start_date = date('Y-m-d',strtotime($request->input('project_startdate')));
        $project->end_date = date('Y-m-d',strtotime($request->input('project_enddate')));
        $project->save();
        $project->users()->sync($members);

        for($i=0;$i<count($modules);$i++){
            //dd($modules[$i]);
            //$modules->s($project);
        }
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

    /**
     * Get images of users
     *
     * @param $request
     *
     * @return response
     */
    public function getUsersImage(Request $request){
        $users = User::whereIn('id',$request->input('users_id'));
        $users_image = $users->pluck('image')->toArray();
        return response()->json([
            'users' => $users_image,
        ]);

    }

    /**
     * Get image of a developer for a task
     *
     * @param $request
     * @return response
     */
    public function getDeveloperImage(Request $request){
        $user = User::find($request->input('user_id'));
        $user_image = $user->image;
        return response()->json([
            'user' => $user_image,
        ]);

    }

    /**
     * Display the projects of current user.
     *
     * @return project.index.blade.php
     */
    public function myProject(){
        $user = User::find(Auth::user()->id);
        $projects = $user->projects;
        $developers = array();
        $managers = array();
        $day_remain = array();
        $progress_percent=array();
        foreach($projects as $project){
            $membersOfProject = $project->users;
            $developers[$project->id] = $membersOfProject;
            $managers[$project->id] = $project->manager;

            $today = Carbon::createFromFormat('Y-m-d',date('Y-m-d'));
            $end = Carbon::createFromFormat('Y-m-d',$project->end_date);
            ($today<$end)?$day_remain[$project->id]=$today->diffInDays($end):$day_remain[$project->id]='Over';

            //Get Completed Percentage of Project Based on Completed Tasks
            $modules = $project->modules;
            $alltasks=0;
            $tasks_completed=0;
            foreach($modules as $module){
                $alltasks += count(Task::where('module_id',$module->id)->get());
                $tasks_completed += count(Task::where('module_id',$module->id)->where('status','=',5)->get());
            }
            $progress_percent[$project->id] = $tasks_completed / $alltasks * 100;
        }

        return view('projects.index',compact('projects','developers','managers','day_remain','progress_percent'));
    }

}
