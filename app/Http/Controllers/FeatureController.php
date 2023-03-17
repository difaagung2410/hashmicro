<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Parents;
use Illuminate\Http\Request;

class FeatureController extends Controller
{  
    /**
     * Menampilkan halaman fitur 1
     *
     */
    public function featureOne()
    {
        $parent = Parents::find(1);
        return view('feature.feature-one', ['title' => 'Fitur 1', 'parent' => $parent]);
    }

    /**
     * tambah data fitur 1
     *
     */
    public function featureOneStore(Request $request)
    {
        try {
            $parent = Parents::create([
                'name' => $request->parent_name,
                'amount' => $request->amount
            ]);

            foreach ($request->child as $key => $child) {
                $parent->childs()->create([
                    'name' => $child,
                    'percentage' => $request->percentage[$key]
                ]);
            }

            return redirect()->route('feature.one');
        } catch (\Throwable $th) {
            //throw $th;
            info($th);
            return response()->json([
                'message' => 'Gagal Ditambahkan'
            ], 500);
        }
    }

    /**
     * tambah data fitur 1
     *
     */
    public function featureOneUpdate(Request $request, Parents $parents)
    {
        try {
            $parents->update([
                'name' => $request->parent_name,
                'amount' => $request->amount
            ]);

            $parents->childs()->delete();
            foreach ($request->child as $key => $child) {
                $parents->childs()->create([
                    'name' => $child,
                    'percentage' => $request->percentage[$key]
                ]);
            }

            return redirect()->route('feature.one');
        } catch (\Throwable $th) {
            //throw $th;
            info($th);
            return response()->json([
                'message' => 'Gagal Ditambahkan'
            ], 500);
        }
    }

    /**
     * Menampilkan halaman fitur 2
     *
     */
    public function featureTwo()
    {
        return view('feature.feature-two', ['title' => 'Fitur 2']);
    }
    
    /**
     * Kalkulasi fitur 2
     *
     */
    public function calculateFeatureTwo(Request $request)
    {
        $inputOne = str_split($request->input_one);
        $inputTwo = str_split($request->input_two);

        $count = 0;
        foreach ($inputTwo as $key => $two) {
            if (in_array($two, $inputOne)) {
                $count += 1;
            }
        }

        return ($count / count($inputOne)) * 100;
    }
}
