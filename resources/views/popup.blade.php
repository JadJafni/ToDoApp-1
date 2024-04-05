<!DOCTYPE html>
<html lang="en">
<head>
<style>
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
        </style>
</head>
<body>

<div class="popup-overlay" id="addcategory">
    <div class="popup">
        <span class="popup-close" onclick="closeAddPopup()">×</span>
        <h2>Add Category</h2>
        <form class="popup-form" action="{{ route('category.add') }}" method="POST" onsubmit="submitForm(event)">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="addCategoryInput">Category Title:</label>
                <input type="text" class="form-control" id="addCategoryInput" placeholder="Add Category ..." name="category_title">
            </div>
            <div class="popup-buttons">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    function closeAddPopup() {
        document.getElementById("addcategory").style.display = "none";
    }
function openAddCategory() {
        
        document.getElementById("addcategory").style.display = "flex";
    }
</body>
</html>