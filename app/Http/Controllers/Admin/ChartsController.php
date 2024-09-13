<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('results.option')->paginate(10); // Mengambil semua pertanyaan beserta hasilnya

        foreach ($questions as $question) {
            $option_counts = [
                'Sangat tidak setuju' => 0,
                'Tidak setuju' => 0,
                'Cukup tidak setuju' => 0,
                'Netral' => 0,
                'Cukup setuju' => 0,
                'Setuju' => 0,
                'Sangat setuju' => 0,
            ];

            foreach ($question->results as $result) {
                $option_text = $result->option->option_text ?? null;
                if (array_key_exists($option_text, $option_counts)) {
                    $option_counts[$option_text]++;
                }
            }

            // Menggunakan setAttribute untuk menyimpan option_counts
            $question->setAttribute('option_counts', $option_counts);
        }

        return view('admin.charts.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
