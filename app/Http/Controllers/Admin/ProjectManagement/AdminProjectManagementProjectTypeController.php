<?php

namespace App\Http\Controllers\Admin\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class AdminProjectManagementProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectTypes = ProjectType::all();
        return view('admin.pages.project-management.project-type.index', compact('projectTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.project-management.project-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => ['required', 'string', 'max:255'],
        ]);

        ProjectType::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.project-management.project-types.index')->with('success', 'Project Type created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projectType = ProjectType::findOrFail($id);

        return view('admin.pages.project-management.project-type.edit', compact('projectType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projectType = ProjectType::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $projectType->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.project-management.project-types.index')->with('success', 'Project Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projectType = ProjectType::findOrFail($id);

        if($projectType->projects->count() > 0) {
            return redirect()->back()->with('error', 'This project type has projects associated with it. Please delete the projects first');
        }
        else {
            $projectType->delete();

            return redirect()->route('admin.project-management.project-types.index')->with('success', 'Project Type deleted successfully');
        }
    }
}
