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
            text-align: left;
        }

        .todo-nav button {
            border-radius: 0;
            position:relative;
            padding: 5px 15px;
            background-color: #FFA739;
        }

        .todo-nav button.active {
            background-color: #007bff;
            color: white;
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
            margin-top:5px;
        }

        .category{
            margin-left: 40px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="category">
            <label  for="category">Category:</label>
            <select class="form-control" id="category">
                <option value="personal">Personal</option>
                <option value="work">Work</option>
                <option value="sport">Sport</option>
                <!-- Add other default categories as needed -->
            </select>
            <button class="add-button" onclick="openAddCategory()">Add Category</button>
        </div>
            <div class="card card-white">
                <div class="card-body">
                    <div>
                    <form action="javascript:void(0);">
                        <button class="add-button" onclick="openAddTask()">New Task</button>
                    </form>
                    </div>
                    <div>
                    <div class="btn-group todo-nav" role="group" aria-label="Todo Navigation">
                        <button type="button" class="btn btn-primary all-task active">All</button>
                        <button type="button" class="btn btn-primary active-task">Active</button>
                        <button type="button" class="btn btn-primary completed-task">Completed</button>
                    </div>
                    </div>
                    <div class="todo-list">
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Create theme</span>
                            <span class="tag tag-high">High</span>
                            <span class="item_left">
                            <span class="due-date">Due: 2024-04-01</span>
                            <a href="javascript:void(0);" class="float-right view-todo-item" onclick="openViewPopup()"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Work on wordpress</span>
                            <span class="tag tag-mid">Mid</span>
                            <span class="item_left">
                            <span class="due-date">Due: 2024-04-02</span>
                            <a href="javascript:void(0);" class="float-right view-todo-item" onclick="openViewPopup()"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Organize office main department</span>
                            <span class="tag tag-low">Low</span>
                            <span class="item_left">
                            <span class="due-date">Due: 2024-04-03</span>
                            <a href="javascript:void(0);" class="float-right view-todo-item" onclick="openViewPopup()"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <div class="todo-item">
                            <div class="checker"><span class=""><input type="checkbox"></span></div>
                            <span>Error solve in HTML template</span>
                            <span class="tag tag-urgent">Urgent</span>
                            <span class="item_left">
                            <span class="due-date">Due: 2024-04-04</span>
                            <a href="javascript:void(0);" class="float-right view-todo-item" onclick="openViewPopup()"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0);" class="float-right edit-todo-item" onclick="openEditPopup()"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="fas fa-trash-alt"></i></a>
                            </span>
                        </div>
                        <!-- Add more todo items here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-overlay" id="addTaskPopup">
    <div class="popup">
        <span class="popup-close" onclick="closeAddTaskPopup()">×</span>
        <h2>Add Task</h2>
        <input type="text" class="form-control" id="addTaskInput" placeholder="Add Task ..........">
        <div class="form-group">
            <label for="addDueDate">Due Date:</label>
            <input type="date" class="form-control" id="addDueDate">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="addCategory">
                <option value="personal">Personal</option>
                <option value="work">Work</option>
                <option value="sport">Sport</option>
            </select>
        </div>
        <div class="form-group">
            <label for="editTag">Tag:</label>
            <select class="form-control" id="editTag">
                <option value="high">High</option>
                <option value="mid">Mid</option>
                <option value="low">Low</option>
                <option value="urgent">Urgent</option>
            </select>
        </div>
        <div class="popup-buttons">
            <button onclick="addNewTaskButton()">Add Task</button>
        </div>
    </div>
</div>

<!-- Edit Todo Modal -->
<div class="popup-overlay" id="editTodoPopup">
    <div class="popup">
        <span class="popup-close" onclick="closeEditPopup()">×</span>
        <h2>Edit Todo</h2>
        <input type="text" class="form-control" id="editTodoInput" placeholder="Edit Todo...">
        <div class="form-group">
            <label for="editDueDate">Due Date:</label>
            <input type="date" class="form-control" id="editDueDate">
        </div>
        <div class="form-group">
            <label for="editTag">Tag:</label>
            <select class="form-control" id="editTag">
                <option value="high">High</option>
                <option value="mid">Mid</option>
                <option value="low">Low</option>
                <option value="urgent">Urgent</option>
            </select>
        </div>
        <div class="popup-buttons">
            <button onclick="updateTodo()">Save changes</button>
        </div>
    </div>
</div>

<!-- View Todo Modal -->
<div class="popup-overlay" id="addcategory">
    <div class="popup">
        <span class="popup-close" onclick="closeAddPopup()">×</span>
        <h2>Add Category</h2>
        <input type="text" class="form-control" id="addcategory" placeholder="Add Category...">
        <div class="popup-buttons">
            <button onclick="updateTodo()">Save changes</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script>
    function openEditPopup() {
        // Get the current todo item's text, due date, and tag
        const todoText = $(this).closest('.todo-item').find('span:first').text();
        const dueDate = $(this).closest('.todo-item').find('.due-date').text().split(': ')[1];
        const tag = $(this).closest('.todo-item').find('.tag').text().toLowerCase();

        // Set the values in the edit popup
        $('#editTodoInput').val(todoText);
        $('#editDueDate').val(dueDate);
        $('#editTag').val(tag);
        document.getElementById("editTodoPopup").style.display = "flex";
    }

    function closeEditPopup() {
        document.getElementById("editTodoPopup").style.display = "none";
    }

    function openViewPopup() {
        window.location.href = 'subtask';
    }

    function openAddCategory() {
        document.getElementById("addCategoryPopup").style.display = "none";
    }

    function openAddCategory() {
        
        const todoText = $(this).closest('.todo-item').find('span:first').text();

        $('#addcategory').val(todoText);
        document.getElementById("addcategory").style.display = "flex";
    }

    function openAddTask() {
        // Get the current todo item's text, due date, and tag
        const todoText = $(this).closest('.todo-item').find('span:first').text();
        const dueDate = $(this).closest('.todo-item').find('.due-date').text().split(': ')[1];
        const tag = $(this).closest('.todo-item').find('.tag').text().toLowerCase();
        const category = $("#category").val();

        // Set the values in the edit popup
        $('#editTodoInput').val(todoText);
        $('#editDueDate').val(dueDate);
        $('#editTag').val(tag);
        $('#addCategory').val(category); 
        document.getElementById("addTaskPopup").style.display = "flex";
    }

    function closeAddPopup() {
        document.getElementById("addcategory").style.display = "none";
    }
    function closeAddTaskPopup() {
        document.getElementById("addTaskPopup").style.display = "none";
    }

    function closeViewPopup() {
        document.getElementById("viewTodoPopup").style.display = "none";
    }

    function updateTodo() {
        const editedTodo = $('#editTodoInput').val();
        const editedDueDate = $('#editDueDate').val();
        const editedTag = $('#editTag').val();
        const category = $('#category').val();

        // Update the todo item with the edited content
        // For example, you can update the text, due date, and tag of the todo item
        $('.todo-list .todo-item').each(function() {
            if ($(this).hasClass('editing')) {
                $(this).find('span:first').text(editedTodo);
                $(this).find('.due-date').text('Due: ' + editedDueDate);
                if (editedTag === 'none') {
                    $(this).find('.tag').remove();
                } else {
                    $(this).find('.tag').text(editedTag.charAt(0).toUpperCase() + editedTag.slice(1));
                }
                $(this).removeClass('editing');
                closeEditPopup();
            }
        });

        function addNewTaskButton() {
    const todoText = $("#addTaskInput").val();
    const dueDate = $("#addDueDate").val();
    const category = $("#addCategory").val();
    const tag = $("#editTag").val();

    if (todoText.trim() === "") {
        alert("Please enter a task.");
    } else {
        const newTask = `
            <div class="todo-item">
                <div class="checker"><span class=""><input type="checkbox"></span></div>
                <span>${todoText}</span>
                <span class="due-date">Due Date: ${dueDate}</span>
                <span class="tag">Tag: ${tag}</span>
                <span class="category">Category: ${category}</span>
                <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a>
            </div>`;
        $(newTask).insertAfter('.todo-list .todo-item:last-child');
        $("#addTaskInput").val('');
        $("#addDueDate").val('');
        $("#addCategory").val('');
        $("#editTag").val('');
        closeAddTaskPopup();
    }
}
    }

    $( document ).ready(function() {
    
    "use strict";
    
    var todo = function() { 
        $('.todo-list .todo-item input').click(function() {
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().toggleClass('complete');
        } else {
            $(this).parent().parent().parent().toggleClass('complete');
        }
    });

    $('.todo-nav button').click(function() {
        $('.todo-nav button').removeClass('active');
        $(this).addClass('active');

        var filter = $(this).text().toLowerCase();
        if (filter === 'all') {
            $('.todo-list .todo-item').show();
        } else if (filter === 'active') {
            $('.todo-list .todo-item').hide();
            $('.todo-list .todo-item:not(.complete)').show();
        } else if (filter === 'completed') {
            $('.todo-list .todo-item').hide();
            $('.todo-list .todo-item.complete').show();
        }
    });
    
    $('.todo-nav .all-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').removeClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .active-task').click(function() {
        $('.todo-list').removeClass('only-complete');
        $('.todo-list').addClass('only-active');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .completed-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').addClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#uniform-all-complete input').click(function() {
        if($(this).is(':checked')) {
            $('.todo-item .checker span:not(.checked) input').click();
        } else {
            $('.todo-item .checker span.checked input').click();
        }
    });
    
    $('.remove-todo-item').click(function() {
        $(this).parent().remove();
    });
    };
    
    todo();
    
    $(".add-task").keypress(function (e) {
        if ((e.which == 13)&&(!$(this).val().length == 0)) {
            $('<div class="todo-item"><div class="checker"><span class=""><input type="checkbox"></span></div> <span>' + $(this).val() + '</span> <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a></div>').insertAfter('.todo-list .todo-item:last-child');
            $(this).val('');
        } else if(e.which == 13) {
            alert('Please enter new task');
        }
        $(document).on('.todo-list .todo-item.added input').click(function() {
            if($(this).is(':checked')) {
                $(this).parent().parent().parent().toggleClass('complete');
            } else {
                $(this).parent().parent().parent().toggleClass('complete');
            }
        });
        $('.todo-list .todo-item.added .remove-todo-item').click(function() {
            $(this).parent().remove();
        });
    });
});
</script>
</body>
</html>

</x-app-layout>
