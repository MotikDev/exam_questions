<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allQuestions = Question::all();

        return view('index', ['questions' => $allQuestions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createQuestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [$request->question, $request->category, $request->option1, $request->option2, $request->option3, $request->option4];
        Validator::make($data, [
            'question' => 'required|string',
            'category' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
        ]);

        $createQuestion = Question::create([
            'question' => $request->question,
            'category' => $request->category,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
        ]);
        
        return response()->json(['success' => "Question successfully created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, $id)
    {
        //
        $currentQuestion = Question::find($id);
        // dd($currentQuestion);

        return view('show', ['question' => $currentQuestion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, $id)
    {
        //
        $currentQuestion = Question::find($id);

        return view('edit', ['question' => $currentQuestion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, $id)
    {
        $data = [$request->question, $request->category, $request->option1, $request->option2, $request->option3, $request->option4];
        Validator::make($data, [
            'question' => 'required|string',
            'category' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
        ]);

        Question::where('id', $id)->update($request->all());
        
        return response()->json(['success' => "Question successfully updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, $id)
    {
        Question::destroy($id);

        $allQuestions = Question::all();

        return view('index', ['questions' => $allQuestions]);
    }
}
