<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articels = Articel::latest()->paginate(6);

        return view('index',[
            'articels' => DB::table('articels')->simplePaginate(6)
        ])->with('i',(request()->input('page',1)-1)*6);
    }

    public function beranda()
    {

        return view('beranda',[
            'articels' => DB::table('articels')->simplePaginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Articel::create($input);
      
        return redirect()->route('index')
                        ->with('success','Articek created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articel  $articel
     * @return \Illuminate\Http\Response
     */
    public function show(Articel $articel)
    {
        return view('show',compact('articel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articel  $articel
     * @return \Illuminate\Http\Response
     */
    public function edit(Articel $articel)
    {
        return view('edit',compact('articel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articel  $articel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articel $articel)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $articel->update($input);
     
        return redirect()->route('index')
                        ->with('success','articel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articel  $articel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articel $articel)
    {
        $articel->delete();
      
        return redirect()->route('index')
                        ->with('success','articel deleted successfully');
    }
}