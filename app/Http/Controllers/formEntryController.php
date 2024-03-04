<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class FormEntryController extends Controller
{
    public function showForm()
    {
        try {
            $categories = DB::table('NewsCategory')->get();
            return view('form2', ['categories' => $categories]);
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error showing form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while loading the form');
        }
    }

    public function store(Request $request)
    {
        try {
            $adminId = Session::get('admin_id');
            //you can use auth()->id()
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'category' => 'required',
            ]);
        
            $imagePaths = [];
            if ($request->hasFile('imageUpload')) {
                foreach ($request->file('imageUpload') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $destinationPath = public_path('uploads');
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $image->move($destinationPath, $filename);
                    $imagePaths[] = 'uploads/' . $filename;
                }
            }
        
            $newsId = DB::table('news')->insertGetId([
                'TitleNews' => $validatedData['title'],
                'ContentNews' => $validatedData['content'],
                'CategoryNews' => $validatedData['category'],
                'ImageNews' => json_encode($imagePaths),
                'CreatedAt' => now(),
            ]);

            DB::table('adminnews')->insert([
                'IDAdmin' => $adminId,
                'IDNews' => $newsId,
            ]);
            
            return redirect()->back()->with('success', 'Form entry submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing form entry: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while submitting the form');
        }
    }
}
