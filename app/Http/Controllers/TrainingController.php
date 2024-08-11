<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\TopikTraining;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class TrainingController extends Controller
{
    public function index()
    {
        $all = TopikTraining::count();
        $marketing = TopikTraining::where('divisi_id', 1)->count();
        $it = TopikTraining::where('divisi_id', 2)->count();
        $human_capital = TopikTraining::where('divisi_id', 3)->count();
        $product = TopikTraining::where('divisi_id', 4)->count();
        $redaksi = TopikTraining::where('divisi_id', 5)->count();

        return view('training.dashboard', compact('all', 'marketing', 'it', 'human_capital', 'product', 'redaksi'));
    }

    public function training()
    {
        $divisi = Divisi::all();

        return view('training.index', compact('divisi'));
    }

    public function getTopik(Request $request)
    {
        $divisi = $request->input('divisi');

        $query = TopikTraining::with(['divisi', 'courses'])->withCount('courses');

        if ($divisi !== 'semua') {
            $query->where('divisi_id', $divisi);
        }

        $topik = $query->get();

        return response()->json([
            'data' => $topik->map(function ($item) {
                return [
                    'id' => $item->id,
                    'cover' => Storage::url($item->cover),
                    'title' => $item->title,
                    'divisi_name' => $item->divisi->name,
                    'courses_count' => $item->courses_count,
                ];
            })
        ]);
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
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deteleTraining($id)
    {
        $data = TopikTraining::findOrFail($id);
        if ($data->cover) {
            Storage::disk('public')->delete($data->cover);
        }
        $data->delete();

        return redirect()->route('training.index');
    }
}