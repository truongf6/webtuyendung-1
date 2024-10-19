<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Support\Str;
use App\Models\Job_Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CompanyController extends Controller
{
    use ValidatesRequests;

    public function postJobPage(){
        $job_categories = Job_Category::all();

        return view('company.postJobPage',compact('job_categories'),[
            'title' => 'Đăng tin tuyển dụng'
        ]);
    }

    // Đăng tin
    public function postJob(Request $request)
    {
        // Validation dữ liệu
        $this->validate($request, [
            'title' => 'required',
            'job_categories_id-select' => 'required', 
            'type' => 'required',
            'position' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'name' => 'required',
            'phone_number' => 'required|max:12',
            'location-company' => 'required',
            'thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'thumb-company' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề công việc.',
            'job_categories_id-select.required' => 'Vui lòng chọn danh mục công việc.',
            'type.required' => 'Vui lòng chọn loại hình công việc.',
            'description.required' => 'Vui lòng nhập mô tả công việc.',
            'name.required' => 'Vui lòng nhập tên công ty.',
            'salary.required' => 'Chưa điền thu nhập.',
            'position.required' => 'Vui lòng vị trí tuyển dụng.',
            'location.required' => 'Vui lòng địa chỉ nơi làm việc.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 12 ký tự.',
            'thumb.mimes' => 'Ảnh công việc phải có định dạng: jpeg, png, jpg, hoặc gif.',
            'thumb.max' => 'Ảnh công việc không được vượt quá 2MB.',
            'thumb-company.mimes' => 'Logo công ty phải có định dạng: jpeg, png, jpg, hoặc gif.',
            'thumb-company.max' => 'Logo công ty không được vượt quá 2MB.',
        ]);

        $categoryId = null;
        if ($request->input('job_categories_id-new')) {
            // Thêm danh mục mới vào database
            $newCategory = Job_Category::create([
                'title' => $request->input('job_categories_id-new'),
                'slug' => Str::slug($request->input('job_categories_id-new')), // Tạo slug từ tiêu đề
            ]);
            $categoryId = $newCategory->id;
        } else {
            // Sử dụng danh mục có sẵn
            $categoryId = $request->input('job_categories_id-select');
        }
        // Tạo slug từ tiêu đề
        $slug = Str::slug($request->input('title'));
    
        // Kiểm tra slug đã tồn tại chưa
        if (Job::where('slug', $slug)->exists()) {
            return response()->json(['error' => 'Tiêu đề đã tồn tại, vui lòng nhập tiêu đề khác.'], 422);
        }
        // Lưu thông tin công việc vào DB
        $user_id = Auth::user()->id;
        $job = new Job;
        $job->user_id = $user_id;
        $job->title = $request->input('title');  // Hoặc $request->title
        $job->slug = $slug;  // Tạo slug từ tiêu đề
        $image = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($image) {
            $fileName = $job->slug . '.jpg'; // Tên ảnh theo Slug Title
        //   $avatar->storeAs('public/images/avatars', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $image->move(public_path('temp/images/job'), $fileName); // Di chuyển ảnh vào thư mục này

            $job->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $job->job_categories_id = $categoryId;
        $job->type = $request->input('type');
        $job->position = $request->input('position');
        $job->location = $request->input('location');
        $job->salary = $request->input('salary');
        $job->gender = $request->input('gender');
        $job->Experience = $request->input('Experience');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirement');
        $job->expires_at = $request->input('expires');
        $job->save();

        $company = new Company;
        $company->user_id = $user_id;
        $company->name = $request->input('name');
        $company->phone_number = $request->input('phone_number');
        $company->location = $request->input('location-company');
        $company->description = $request->input('descriptionCompanyContent');
        $company->website = $request->input('website');
        $company->save();

        $user = User::find($user_id);
        // Xử lý ảnh logo của user (tương ứng với ảnh công ty)
        $image = $request->file('thumb-company'); // Lấy file ảnh từ file Upload
        
        if ($image) {
            // Tạo tên file theo slug của tên user (hoặc công ty) để đảm bảo tên file thân thiện
            $fileName = Str::slug($company->name) . '.jpg';  // Sử dụng Slug để tạo tên file thân thiện
        
            // Di chuyển ảnh vào thư mục lưu trữ (public/images/companys)
            $image->move(public_path('temp/images/company'), $fileName);
        
            // Cập nhật đường dẫn thumb (ảnh) trong bảng companys
            $company->thumb = $fileName; // Lưu tên file ảnh vào cột thumb trong bảng companys
            $company->save(); // Lưu lại thông tin user với đường dẫn ảnh mới
        }
        return response()->json(['success' => 'Công việc đã được đăng thành công!', 'job' => $job], 200);
    }

    // Xem preview Bài đăng
    public function jobDetail($slug){
        $job = Job::where('slug', $slug)->first();
        $user = User::find($job->user_id);
        $company = Company::where('user_id', $user->id)->first();

        return view('company.jobDetail', compact('job', 'user', 'company'),[
            'title' => 'Xem bài đăng công việc'
        ]);
    }
}
