<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdminJobController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 20;
    
        // Tạo query cơ bản để lấy các công việc chưa bị xóa
        $query = Job::query();
    
        // Kiểm tra điều kiện tìm kiếm theo từng trường
        if ($request->filled('search_poster')) {
            $query->whereHas('User', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search_poster . '%');
            });
        }
        
        if ($request->filled('search_company')) {
            $query->whereHas('Company', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search_company . '%');
            });
        }
        
        if ($request->filled('search_title')) {
            $query->where('title', 'LIKE', '%' . $request->search_title . '%');
        }
        
        if ($request->filled('search_position')) {
            $query->where('position', 'LIKE', '%' . $request->search_position . '%');
        }
        
        if ($request->filled('search_location')) {
            $query->where('location', 'LIKE', '%' . $request->search_location . '%');
        }
        
        if ($request->filled('search_type')) {
            $query->where('type', 'LIKE', '%' . $request->search_type . '%');
        }
        
        if ($request->filled('search_salary')) {
            $query->where('salary', 'LIKE', '%' . $request->search_salary . '%');
        }
    
        // Lấy danh sách công việc với phân trang và giữ các tham số tìm kiếm trong liên kết phân trang
        $Jobs = $query->orderByDesc('id')->paginate($perPage)->appends($request->all());
    
        return view('admin.Job.index', compact('Jobs'), [
            'title' => 'Quản lý công việc'
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:Jobs',
        ], [
            'title.required' => 'Vui lòng nhập tên Danh mục!',
            'slug.required' => 'Vui lòng nhập Slug!',
            'slug.unique' => 'SLug này đã bị trùng!',
        ]);
    
        $Job = new Job();
        $Job->title = $request->title;
        $Job->slug = $request->slug;
        $Job->desc = $request->desc;
        $Job->parent_id = $request->parent_id;
        $Job->save();
    
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Job::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục với ID: ' . $id
            ], 404); 
        }

        return response()->json($category); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job_Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('Jobs')->ignore($id),
            ],
        ], [
            'title.required' => 'Vui lòng nhập tên Danh mục!',
            'slug.required' => 'Vui lòng nhập Slug!',
            'slug.unique' => 'Slug này đã bị trùng!',
        ]);
        $job_Category = Job::find($id);
        $job_Category->title = $request->title;
        $job_Category->slug = $request->slug;
        $job_Category->desc = $request->desc;
        $job_Category->parent_id = $request->parent_id;
        $job_Category->save();
    
        return redirect()->back();
    }
    
    
    
    
    /**
     * Remove the specified resource from storage.
     */    public function destroy(string $id)
    {
        $Job = Job::find($id);

        if (!$Job) {
            return response()->json([
               'message' => 'Không tìm thấy danh mục với ID: '. $id
            ], 404); 
        }
        $Job->delete();
        return response()->json([
           'message' => 'Đã xóa danh mục ID: '. $id
        ], 200);
    }
}
