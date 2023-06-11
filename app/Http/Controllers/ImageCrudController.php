<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Type;
use App\Models\Category;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Facades\File;

class ImageCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('crud.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all()->mapWithKeys(function (Type $item, int $key) {
            return [$item->id => $item->name];
        });
        $categories = Category::all()->mapWithKeys(function (Category $item, int $key) {
            return [$item->id => $item->name];
        });
        return view('crud.images.create', compact('types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'producto' => 'required'
        ]);

        $imageName = $this->saveImage($request->file('image'));
        // Create the type
        $image = Image::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'producto' => $validatedData['producto'],
            'image' => $imageName,
        ]);



        // Redirect to the categories list
        return redirect()->route('img.index');
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
        $image = Image::findOrFail($id);

        $types = Type::all()->mapWithKeys(function (Type $item, int $key) {
            return [$item->id => $item->name];
        });
        $categories = Category::all()->mapWithKeys(function (Category $item, int $key) {
            return [$item->id => $item->name];
        });
        return view('crud.images.edit', compact('image','types','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Image::findOrFail($id);

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'producto' => 'required'
        ]);

        $file =   $request->file('image');

        if(!empty($file)){
            File::delete(public_path('upload/'.$image->image));
            $image->image = $this->saveImage($file);

        }

        // Update the type
        $image->name = $validatedData['name'];
        $image->producto = $validatedData['producto'];
        $image->category = $validatedData['category'];
        $image->save();

        // Redirect to the categories page
        return redirect()->route('img.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        File::delete(public_path('upload/'.$image->image));
        $image->delete();
        return redirect()->route('img.index');
    }

    private function saveImage($imageFile): string{
        $imgFile = ImageManager::make($imageFile->getRealPath());
        $destinationPath = public_path('upload');
        File::isDirectory($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
        $name = time() . '.' . $imageFile->getClientOriginalExtension();
        $imgFile->save($destinationPath . '/' . $name);

        return $name;
    }
}
