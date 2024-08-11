<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\TopikTraining;
use PhpParser\Node\Stmt\TryCatch;

class TrainingController extends Controller
{
    public function index()
    {
        return view('training.dashboard');
    }

    public function training()
    {
        $topik = TopikTraining::with(['divisi', 'courses'])->withCount('courses')->get();
        $divisi = Divisi::all();

        return view('training.index', compact('divisi', 'topik'));
    }

    public function courseTraining($id)
    {
        $topik = TopikTraining::with('divisi')->findOrFail($id);
        $courses = Course::where('topik_id', $id)->get();

        return view('training.detail', compact('topik', 'courses'));
    }

    public function storeTopik(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'divisi' => 'required|exists:divisis,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('training_covers', 'public');
            } else {
                $imagePath = null;
            }
    
            TopikTraining::create([
                'title' => $validatedData['title'],
                'divisi_id' => $validatedData['divisi'],
                'cover' => $imagePath,
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Topik Training berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }
}