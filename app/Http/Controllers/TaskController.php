<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\ServiceTask;
use Illuminate\Support\Facades\Schema;

class TaskController extends Controller
{
    public function index()
    {
        if (empty(auth()->user())) {
            header('Location: ' . route('login'));
            exit;
        } elseif (auth()->user()->role == 'Client') {
            $tasks = auth()->user()->tasks()->orderByDesc('created_at')->paginate(4);
            return view('tasks.index', compact('tasks'));

        } else {
            $tasks = Task::orderByDesc('created_at')->where('status', 'approved')->paginate(4);
            return view('tasks.index', compact('tasks'));
        }
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $address = "$request->street $request->city $request->governorate";
        $address = trim($address);
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'city' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = Task::create([
            'customer_id' => $validatedData['customer_id'],
            'city' => $address,
            'car_model' => $validatedData['car_model'],
            'description' => $validatedData['description'],
        ]);

        if (isset($request->services)) {

            foreach ($request['services'] as $service) {
                ServiceTask::create([
                    'task_id' => $task->id,
                    'service_id' => $service
                ]);
            }
        }

        return redirect()->route('tasks')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        //
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $address = "$request->street $request->city $request->governorate";
        $address = trim($address);
        $task = Task::findOrFail($id);
        $task->update([
            'city' => $address,
            'car_model' => $request->car_model,
            'description' => $request->description
        ]);
        ServiceTask::where('task_id', $id)->delete();
        if (isset($request->services)) {
            foreach ($request['services'] as $service) {
                ServiceTask::create([
                    'task_id' => $task->id,
                    'service_id' => $service
                ]);
            }
        }
        return redirect()->route('tasks')->with('success', 'Task updated successfully');
    }


    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks')->with('success', 'Task deleted successfully');

    }

    public function search(Request $request)
    {
        $search = $request->search;
        if (empty(auth()->user())) {
            header('Location: ' . route('login'));
            exit;
        } elseif (auth()->user()->role == 'Client') {
            $tasks = auth()->user()->tasks()->orderByDesc('created_at')->where(function ($query) use ($search) {
                $columns = Schema::getColumnListing('tasks');
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            })->paginate(4);
            if (empty($tasks->all())) {
                return redirect()->route('tasks')->with('message', "We're sorry, we couldn't find any matches for your search. Would you like to try a different search term?");
            }
            return view('tasks.index', compact('tasks'));

        } else {
            $tasks = Task::orderByDesc('created_at')
                ->where(function ($query) use ($search) {
                    $columns = Schema::getColumnListing('tasks');
                    foreach ($columns as $column) {
                        $query->orWhere($column, 'LIKE', '%' . $search . '%');
                    }
                })
                ->where('status', 'approved')
                ->paginate(4);

            if (empty($tasks->all())) {
                return redirect()->route('tasks')->with('message', "We're sorry, we couldn't find any matches for your search. Would you like to try a different search term?");
            }
            return view('tasks.index', compact('tasks'));
        }
    }

    public function status($id, $status)
    {
        $status == 'approved' || $status == 'rejected' ?
            Task::where('id', $id)->update(['status' => $status]) : dd("Incorrect status");
            return back();
    }
}
