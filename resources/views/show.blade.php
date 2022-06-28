<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Questions Options</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-5">
                    Question
                </h1>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{route('editQuestion', ['id' => $question->id])}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('deleteQuestion', ['id' => $question->id])}}">Delete</a>
                </div>


                <div class="">
                    <ol>
                        <li>
                            {{$question->question}} <br>
                            <ol type="a">
                                <li>{{$question->option1}}</li>
                                <li>{{$question->option2}}</li>
                                <li>{{$question->option3}}</li>
                                <li>{{$question->option4}}</li>
                            </ol>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br>
</body>
</html>