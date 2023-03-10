<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json([
                'status' => 'Success',
                'data' => Film::all()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            return response()->json([
                'status' => 'Success',
                'data' => Film::find($id)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage()
            ]);
        }
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
        try {
            $validateData = $request->validate([
                'title' => 'required',
                'category' => 'required',
                'year' => 'required',
                'poster' => 'required',
                'trailer' => 'required',
                'overview' => 'required'
            ]);

            Film::create($validateData);

            return response()->json([
                'status' => 'Success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required',
                'category' => 'required',
                'year' => 'required',
                'poster' => 'required',
                'trailer' => 'required',
                'overview' => 'required'
            ]);

            $model = Film::find($id);
            $model->update([
                'title' => $request->title,
                'year' => $request->year,
                'category' => $request->category,
                'trailer' => $request->trailer,
                'poster' => $request->poster,
                'overview' => $request->overview,

            ]);
            // save();
            // $model->title = $request->title;
            // $model->year = $request->year;
            // $model->category = $request->category;
            // $model->trailer = $request->trailer;
            // $model->poster = $request->poster;
            // $model->overview = $request->overview;
            // $model->save();

            return response()->json([
                'status' => 'Success',
                'data' => $model
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $model = Film::find($id);
            $model->delete();

            return response()->json([
                'status' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}
