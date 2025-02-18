<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\EstateImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstateController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // Fetch estates for the authenticated user with their related images
    $estates = Estate::with('images')->where('user_id', Auth::id())->get();

    // If you need all images in a single collection, you can do:
    $images = $estates->pluck('images')->flatten();


    // Pass the data to the view
    return view('estate.index', compact('estates', 'images'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('estate.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $id = Auth::id();
    // Validate the incoming request data
    $request->validate([
      'title'         => 'required|string|max:255',
      'description'   => 'required|string',
      'location'      => 'required|string|max:255',
      'price'         => 'required|numeric',
      'property_type' => 'required|in:house,apartment,land',
      'listing_type'  => 'required|in:sale,rent',
      'images.*'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $estate = Estate::create([
      'user_id'       => $id,
      'title'         => $request->title,
      'description'   => $request->description,
      'location'      => $request->location,
      'price'         => $request->price,
      'property_type' => $request->property_type,
      'listing_type'  => $request->listing_type,
    ]);

    // Check if images were uploaded
    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $path = $image->store('estate_images', 'public');
        // Save the image path in the database
        EstateImage::create([
          'estate_id'  => $estate->id,
          'image_path' => $path,
        ]);
      }
    }

    return to_route('estate.index')->with('alert', [
      'level'   => 'success',
      'message' => 'Estate created successfully',
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Estate $estate)
  {
    $images = Estate::find(3)->images;
    $agent = Estate::find(3)->user;
    return view('estate.show', compact('estate', 'images', 'agent'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $estate = Estate::find($id);

    $estate->delete();
    return redirect()->back()->with('alert', [
      'level'   => 'success',
      'message' => 'Estate deleted successfully',
    ]);
  }
  /**
   * Browze all estates
   */
  public function browze()
  {
    $estates = Estate::with('images')->get();
    return view('estate.browze', compact('estates'));
  }

  public function search(Request $request)
  {
    // search by location you can add but im lazy ahhaha 
    $estates = Estate::with('images')->where('location', 'like', '%' . $request->location . '%')->get();
    return view('estate.browze', compact('estates'));
  }
}
