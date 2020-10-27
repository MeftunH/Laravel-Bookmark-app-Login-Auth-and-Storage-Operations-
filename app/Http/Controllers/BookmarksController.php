<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;
use SebastianBergmann\Comparator\Book;
use Symfony\Component\Console\Input\Input;
class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        return view('home')->with('bookmarks', $bookmarks);
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'url' => 'required'
            ]);
        //create
        $bookmark = new Bookmark;
        $bookmark->name = $request->input('name');
        $bookmark->url = $request->input('url');
        $bookmark->description = $request->input('description');

        $bookmark->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $filename= Storage::putFile('public/images/bookmarks',$request->file('image'));
            $bookmark->image = $filename;
        }
        $bookmark->save();
        return redirect("/home")->with('success', 'Bookmark Added');
    }

    protected function edit($bookmark)
    {
        $bookmarks = Bookmark::all();
        $bookmark = Bookmark::find($bookmark);
        return view('/edit', compact('bookmarks'));
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $image_path = $bookmark->image;
        $path = str_replace('\\', '/', public_path());
        //dd($image_path);
        if (file_exists($image_path).$path) {
            Storage::delete($bookmark->image);
             $bookmark->delete();
            return;
        }
        else {
            $bookmark->delete();
            return;
        }
    }

    public function update(Request $request, $bookmark)
    {
        $bookmark = Bookmark::find($bookmark);
        $bookmark->name = $request->input('name');
        $bookmark->url = $request->input('url');
        $bookmark->description = $request->input('description');
        if ($request->hasFile('image')) {
            Storage::delete($bookmark->image);
           $filename= Storage::putFile('public/images/bookmarks',$request->file('image'));
            $bookmark->image = $filename;
            $bookmark->save();
        }
        return redirect("/");
    }
}
