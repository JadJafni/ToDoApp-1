<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <style>
        /* Edit Form Styles */
        .container {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
            background-color: #28a745; /* Bootstrap's green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Todo</h2>
        <form action="/subtask/{{$sub_task->id}}/update" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="addTaskInput">Title:</label>
                <input type="text" class="form-control" id="addTaskInput" placeholder="Add Task .........." name="title">
            </div>
                <button class="button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
</x-app-layout>