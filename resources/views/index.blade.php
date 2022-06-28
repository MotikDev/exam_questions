<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> CRUD Examination Questions</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    Questions
                </h1>
                <div>
                    <a href="{{route('createQuestion')}}">Create</a>
                    <a href="{{route('createQuestion')}}">Edit</a>
                </div>


                <div class="mt-5">
                    <h3>Technical Examination</h3>
                    <ol>
                        @foreach ($questions as $question)
                            @if ($question->category == 'technical')                            
                                <li>
                                    <a href="" class="text-dark">
                                        {{$question->question}} <a href="{{route('showQuestion', ['id' => $question->id])}}" class="btn btn-secondary">More Action</a> <br>
                                    </a>
                                    <ol type="a">
                                        <li>{{$question->option1}}</li>
                                        <li>{{$question->option2}}</li>
                                        <li>{{$question->option3}}</li>
                                        <li>{{$question->option4}}</li>
                                    </ol>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>

                <div class="mt-5">
                    <h3>Aptitude Examination</h3>
                    <ol>
                        @foreach ($questions as $question)
                            @if ($question->category == 'aptitude')                            
                                <li>
                                    <a href="" class="text-dark">
                                        {{$question->question}} <a href="{{route('showQuestion', ['id' => $question->id])}}" class="btn btn-secondary">More Action</a> <br>
                                    </a>
                                    <ol type="a">
                                        <li>{{$question->option1}}</li>
                                        <li>{{$question->option2}}</li>
                                        <li>{{$question->option3}}</li>
                                        <li>{{$question->option4}}</li>
                                    </ol>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>


                <div class="mt-5">
                    <h3>Logical Examination</h3>
                    <ol>
                        @foreach ($questions as $question)
                            @if ($question->category == 'logical')                            
                                <li>
                                    <a href="" class="text-dark">
                                        {{$question->question}} <a href="{{route('showQuestion', ['id' => $question->id])}}" class="btn btn-secondary">More Action</a> <br>
                                    </a>
                                    <ol type="a">
                                        <li>{{$question->option1}}</li>
                                        <li>{{$question->option2}}</li>
                                        <li>{{$question->option3}}</li>
                                        <li>{{$question->option4}}</li>
                                    </ol>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br>
</body>
</html>