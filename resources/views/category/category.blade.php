<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        /* CSS for todo list */
        .todo-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .add-todo {
            margin-bottom: 10px;
        }
        .todo-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .completed {
            text-decoration: line-through;
            opacity: 0.5;
        }
        .todo-date {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        /* Additional CSS for due date */
        .due-date {
            display: inline-block;
            background-color: #ffcc00;
            color: black;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 0.8em;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="todo-container">
            <h2>My Todo-s</h2>
            <div class="add-todo">
                <input type="text" id="new-todo" placeholder="Add new...">
                <input type="date" id="due-date">
                <button type="button" class="btn btn-primary" onclick="addTodo()">ADD</button>
            </div>

            <div class="filter-sort">
                <select class="filter">
                    <option value="all">All</option>
                    <!-- Other filter options -->
                </select>
                <select class="sort">
                    <option value="date">Added date</option>
                    <!-- Other sort options -->
                </select>
            </div>

            <div class="todo-list">
                <!-- Your todo items will be dynamically added here -->
            </div>
        </div>
    </div>
    <script>
        // JavaScript for todo list
        document.addEventListener('DOMContentLoaded', function() {
            // Sample todo list data
            const todos = [
                { task: 'Buy groceries for next week', completed: false, added_date: new Date(), due_date: new Date('2024-06-28') },
                { task: 'Renew car insurance', completed: false, added_date: new Date(), due_date: new Date('2024-06-28') },
                { task: 'Sign up for online course', completed: false, added_date: new Date(), due_date: new Date('2024-06-28') }
                // Add more todos as necessary
            ];

            // Display initial todos
            const todoList = document.querySelector('.todo-list');
            todos.forEach(todo => {
                const todoItem = document.createElement('div');
                todoItem.classList.add('todo-item');
                if (todo.completed) {
                    todoItem.classList.add('completed');
                }
                const dueDateString = todo.due_date.toLocaleDateString();
                todoItem.innerHTML = `
                    <input type="checkbox" ${todo.completed ? 'checked' : ''}>
                    <span>${todo.task}</span>
                    <div class="todo-date">
                        <span>${todo.added_date.toLocaleDateString()}</span>
                        <span class="due-date" title="Due date: ${dueDateString}">${dueDateString}</span>
                    </div>
                    <button type="button" class="btn btn-edit">Edit</button>
                    <button type="button" class="btn btn-delete">Delete</button>
                `;
                todoList.appendChild(todoItem);
            });

            // Add todo functionality here
            // ...
        });

        function addTodo() {
            const newTodoInput = document.getElementById('new-todo');
            const dueDateInput = document.getElementById('due-date');
            const todoList = document.querySelector('.todo-list');

            const newTodo = {
                task: newTodoInput.value,
                completed: false,
                added_date: new Date(),
                due_date: new Date(dueDateInput.value)
            };

            const todoItem = document.createElement('div');
            todoItem.classList.add('todo-item');
            const dueDateString = newTodo.due_date.toLocaleDateString();
            todoItem.innerHTML = `
                <input type="checkbox">
                <span>${newTodo.task}</span>
                <div class="todo-date">
                    <span>${newTodo.added_date.toLocaleDateString()}</span>
                    <span class="due-date" title="Due date: ${dueDateString}">${dueDateString}</span>
                </div>
                <button type="button" class="btn btn-edit">Edit</button>
                <button type="button" class="btn btn-delete">Delete</button>
            `;
            todoList.appendChild(todoItem);

            // Clear input fields after adding todo
            newTodoInput.value = '';
            dueDateInput.value = '';
        }
    </script>
</body>
</html>
