<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Edit Examination Questions</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>
                    Edit question
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{route('index')}}">Home</a>
                </div>

                <form class="px-8 pt-6 pb-8 mb-4" style="max-width: 575.98px" onsubmit="event.preventDefault();submitQuestion();" action="{{route('storeQuestion')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
          
                    <div class="mb-4">
                        <select name="category" id="category" class="form-select my-3" required>
                          <option value="{{$question->category}}" selected>{{$question->category}}</option>
                          <option value="technical">Technical</option>
                          <option value="aptitude">Aptitude</option>
                          <option value="logical">Logical</option>
                        </select> 
                    </div>
          
                    <div class="">
                      <label class="form-label" for="question">Question</label>
                      <textarea class="form-control" name="question" id="question" rows="5" required> {{$question->question}} </textarea>
                    </div>  
                    
                    <div class="mb-2 mt-4">
                        <label class="form-label" for="option1">
                          Option 1
                        </label>
                        <input class="form-control" id="option1" name="option1" type="text" placeholder="Option 1" value="{{$question->option1}}" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="option2">
                          Option 2
                        </label>
                        <input class="form-control" id="option2" name="option2" type="text" placeholder="Option 2" value="{{$question->option2}}" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="option3">
                          Option 3
                        </label>
                        <input class="form-control" id="option3" name="option3" type="text" placeholder="Option 3" value="{{$question->option3}}" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="option4">
                          Option 4
                        </label>
                        <input class="form-control" id="option4" name="option4" type="text" placeholder="Option 4" value="{{$question->option4}}" required>
                    </div>



                    <div class="text-center">
                      <button type="submit" class="btn btn-primary px-5 mx-auto">
                        Update
                      </button>
                    </div>
                  </form>


            </div>
        </div>
    </div>

    <br><br><br><br>


    <script>

        let submitQuestion = () => {
            let questionObj = {
                question: document.getElementById("question").value,
                category: document.getElementById("category").value,
                option1: document.getElementById("option1").value,
                option2: document.getElementById("option2").value,
                option3: document.getElementById("option3").value,
                option4: document.getElementById("option4").value,
            };
    
            let question = JSON.stringify(questionObj);
            const url = "{{ route('updateQuestion', ['id' => $question->id])}}";
            var token = document.querySelector('meta[name="csrf-token"]').content;
    
            let xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader("X-CSRF-TOKEN", token);
            xhr.onreadystatechange = function (data){
                if (xhr.readyState == 2){
                    console.log("Sent");
                }
                if (xhr.readyState == 3){
                    console.log("In progress");
                }
                if (xhr.readyState == 4 && xhr.status == 200){  
                    let result = JSON.parse(data.target.response).success; 
                    console.log(result);
                }
            }
            xhr.send(question);
        };

    </script>

</body>
</html>