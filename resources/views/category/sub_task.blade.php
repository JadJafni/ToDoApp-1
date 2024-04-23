<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3wDpgfTgo4JhXQtgM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin-top: 20px;
            background: #f8f8f8;
        }

        .todo-nav {
            margin-top: 10px;
        }

        .todo-list {
            margin: 10px 0;
        }

        .todo-list .todo-item {
            padding: 15px;
            margin: 5px 0;
            border-radius: 0;
            background: #f7f7f7;
            position: relative;
        }

        .todo-list .todo-item .tag {
            top: 50%;
            transform: translateY(-50%);
            right: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .tag-high { background-color: #FF5C5C; color: white; }
        .tag-mid { background-color: #FFD700; color: white; }
        .tag-low { background-color: #87CEFA; color: white; }
        .tag-urgent { background-color: #DC143C; color: white; }

        .todo-list .todo-item .due-date {
            font-size: 12px;
            color: #555;
        }

        .todo-list .todo-item.complete span {
            text-decoration: line-through;
        }

        .remove-todo-item {
            color: #FF5C5C;
            visibility: hidden;
        }

        .remove-todo-item:hover {
            color: #5f5f5f;
        }

        .todo-item:hover .remove-todo-item {
            visibility: visible;
        }

        .view-todo-item {
            color: #007bff;
            margin-right: auto;
        }

        .view-todo-item:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        div.checker {
            width: 18px;
            height: 18px;
        }

        div.checker input,
        div.checker span {
            width: 18px;
            height: 18px;
        }

        div.checker span {
            display: -moz-inline-box;
            display: inline-block;
            zoom: 1;
            text-align: center;
            background-position: 0 -260px;
        }

        div.checker, div.checker input, div.checker span {
            width: 19px;
            height: 19px;
        }

        div.checker, div.radio, div.uploader {
            position: relative;
        }

        div.button, div.button *, div.checker, div.checker *, div.radio, div.radio *, div.selector, div.selector *,
        div.uploader, div.uploader * {
            margin: 0;
            padding: 0;
        }

        div.button, div.checker, div.radio, div.selector, div.uploader {
            display: -moz-inline-box;
            display: inline-block;
            zoom: 1;
            vertical-align: middle;
        }

        .card {
            padding: 25px;
            margin-bottom: 20px;
            border: initial;
            background: #fff;
            border-radius: calc(.15rem - 1px);
            box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04), 0 1px 6px rgba(0, 0, 0, 0.04);
        }
        .item_left {
            text-align: right;
            margin-left: auto;
            float: right;
        }

        /* Pop-up Styling */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            position:relative;
        }

        .popup-buttons {
            margin-top: 20px;
        }

        .popup-buttons button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 10px;
        }
        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            color: #999;
            cursor: pointer;
        }

        .popup-close:hover {
            color: #555;
        }
        .add-button{
            background-color: #fff;
            border-radius: 4px;
            position:relative;
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            float: right;
            margin: 0 10px;
            margin-top: 3 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-white">
            <button class=" add-button" onclick="openAddSub_Task()">Add Sub Task</button>
                <div class="card-body">
                    <div class="todo-list">
                    @foreach($task as $task)
                    <h2>{{ $task->task_title }}</h2>
                    
                        @foreach($sub_task as $sub_task)
                        @if($sub_task->taskID == $task->id)
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>{{ $sub_task->title }}</span>
                            <span class="item_left">
                            <a href="{{route('sub_task.edit', $sub_task['id'])}}" class="float-right edit-todo-item" onclick="openEditPopup({{ $sub_task->id }})"><i class="fas fa-edit"></i></a>
                            <a href="{{route('sub_task.delete', $sub_task['id'])}}" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        @endif
                        @endforeach
                        <!-- <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Work on wordpress</span>
                            <span class="item_left">
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Organize office main department</span>
                            <span class="item_left">
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Error solve in HTML template</span>
                            <span class="item_left">
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div> -->
                        <div class="todo-item">
                            
                            <span>{{ $task->notes }}</span>
                            
                        </div>
                    @endforeach
                        <!-- Add more todo items here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-overlay" id="AddSub_Task">
    <div class="popup">
        <span class="popup-close" onclick="closeAddPopup()">×</span>
        <h2>Add Sub Task</h2>
        <form class="popup-form" action ="{{ route('sub_task.add',['id' => $task->id])}}" method="POST" onsubmit="submitForm(event)">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $task->id }}">
        <input type="text" class="form-control" id="addcategory" placeholder="Add Sub Task..." name="title">
        <div class="popup-buttons">
        <button type="submit">Submits</button>
        </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script>
    

    function closeAddPopup() {
        document.getElementById("AddSub_Task").style.display = "none";
    }
    function openAddSub_Task() {
        document.getElementById("AddSub_Task").style.display = "flex";
    }
</script>
</body>
</html>
</x-app-layout>
