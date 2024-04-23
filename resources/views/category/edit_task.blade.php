<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="/dashboard/{{$tasks->id}}/update" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="addTaskInput">Title:</label>
                <input type="text" class="form-control" id="addTaskInput" placeholder="Add Task .........." name="task_title" value="{{ $tasks->task_title }}">
            </div>
            <div class="form-group">
                <label for="addDueDate">Due Date:</label>
                <input type="date" class="form-control" id="addDueDate" name="due_date" value="{{ $tasks->due_date }}">
            </div>
            <div class="form-group">
                <label for="addDueTime">Due Time:</label>
                <input type="time" class="form-control" id="addDueTime" name="time" value="{{ $tasks->time }}">
            </div>
            <div class="form-group">
                <label for="editTag">Tag:</label>
                <select class="form-control" id="editTag" name="tag">
                <option value="high" {{ $tasks->tag == 'high' ? 'selected' : '' }}>High</option>
                    <option value="mid" {{ $tasks->tag == 'mid' ? 'selected' : '' }}>Mid</option>
                    <option value="low" {{ $tasks->tag == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="urgent" {{ $tasks->tag == 'urgent' ? 'selected' : '' }}>Urgent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="note">Notes:</label>
                <input type="text" class="form-control" id="note" placeholder="Add Notes .........." name="notes" value="{{ $tasks->notes }}">
            </div>
            <div>
                <button class="button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
</x-app-layout>