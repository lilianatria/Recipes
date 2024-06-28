<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    private function validateRegionData(Request $request)     {
        return $request->validate([
            'name' => 'required|string|max:255',            
            
                   
        ]);    
}

    public function index()
    {
        $regions = Region::orderBy('name')->paginate(10);
        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateRegionData($request);
        
        $region = new Region();
        
        $region->fill($validateData);

        $region->save();

        return redirect()->route('regions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::findOrFail($id);
        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $this->validateRegionData($request);
        $region = Region::findOrFail($id);
        $region->fill($validateData);

    

        $region->save();
           

        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);
        if (!$region) {
            return redirect()->route('regions.index')->with('error', 'località non presente');
        }
        $region->delete();

        return redirect()->route('regions.index')->with('success', 'località eliminata');
    }
}
