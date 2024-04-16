<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Menu</title>
    <style>
        .sidebar {
            width: 250px; /* Adjust width as needed */
            background-color: #f8f9fa; /* Sidebar background color */
            height: 100vh; /* Full height */
            position: fixed; /* Fixed position */
            top: 0;
            left: 0;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            padding-top: 57px; /* Add some padding at the top */
            border-right: 1px solid #95989c; /* Border for the entire sidebar */
        }

        .nav-link {
            padding: 10px 20px; /* Adjust padding as needed */
            display: block; /* Change display to block */
            box-sizing: border-box; /* Include padding and border in the width */
            color: #000 !important; /* Link color */
            text-decoration: none;
            transition: background-color 0.3s ease; /* Smooth transition */
            border: 1px solid #95989c; /* Border for each nav item */
            border-radius: 5px; /* Optional: Add border radius */
        }

        .nav-link:last-child {
            border-bottom: none; /* Remove border for the last nav item */
        }

        .nav-link:hover {
            background-color: #d3dde8 /* Hover background color */
            color: #000; /* Change text color on hover */
        }

        .nav-item.active {
            background-color: #9ab9d9; /* Change background color for active item */
            border-left: 3px solid #007bff; /* Add left border for active item */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">User List</a>
        </li>
    </ul>
</div>

</body>
</html>