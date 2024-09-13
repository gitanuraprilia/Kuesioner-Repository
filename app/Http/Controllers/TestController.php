<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;

class TestController extends Controller
{
    public function index()
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
                $query->with(['questionOptions' => function ($query) {
                        $query->orderBy('id', 'asc'); // Order options by ID (ascending)
                    }]);
            }])
            ->whereHas('categoryQuestions')
            ->get();

        return view('client.test', compact('categories'));
    }

    public function store(StoreTestRequest $request)
    {
        
        $options = Option::find(array_values($request->input('questions')));
        
        $result = auth()->user()->userResults()->create([
            'option_text' => $options->sum('option')
        ]);
        
        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);
        
        //dd( $questions);
        return redirect()->route('client.results.show', $result->id);
    }
}
