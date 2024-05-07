<?php

namespace App\Http\Controllers\Api\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\AboutUsUpdateRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        if (!$aboutUs) {
            return response()->json(['message' => 'About Us data not found'], 404);
        }
        return response()->json(['data' => $aboutUs], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        if (AboutUs::count() > 0) {
            return response()->json(['message' => 'AboutUs record already exists.'], 409);
        }
        $data = $request->except('header_photo', 'description_photo');
        if ($request->hasFile('header_photo')) {
            $data['header_photo'] = $request->file('header_photo')->store('aboutUs', 'public');
        }
        if ($request->hasFile('description_photo')) {
            $data['description_photo'] = $request->file('description_photo')->store('aboutUs', 'public');
        }
        $aboutUs=AboutUs::create($data);
        return response()->json(['data' => $aboutUs,'message' => 'About Us record created successfully'], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAboutUs(AboutUsUpdateRequest $request)
    {
        $aboutUs = AboutUs::findOrFail($request->id);
    
        if (!$aboutUs) {
            return response()->json(['message' => 'AboutUs record not found.'], 404);
        }
    
        $data = $request->except('header_photo', 'description_photo');
        if ($request->hasFile('header_photo')) {
            $data['header_photo'] = $request->file('header_photo')->store('aboutUs', 'public');
        }
        if ($request->hasFile('description_photo')) {
            $data['description_photo'] = $request->file('description_photo')->store('aboutUs', 'public');
        }
        $aboutUs->update($data);
        return response()->json(['data' => $aboutUs,'message' => 'AboutUs record updated successfully'], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aboutUs= AboutUs::findOrfail($id);
        if (!$aboutUs) {
            return response()->json(['message' => 'AboutUs record not found.'], 404);
        }
        if ($aboutUs->header_photo) {
            Storage::disk('public')->delete($aboutUs->header_photo);
        }
        if ($aboutUs->description_photo) {
            Storage::disk('public')->delete($aboutUs->description_photo);
        }
        $aboutUs->delete();
        return response()->json(['message' => 'AboutUs record deleted successfully'], 200);
    }
}
