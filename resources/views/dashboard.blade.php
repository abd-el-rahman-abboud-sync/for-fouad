<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard</title>
    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .sidebar {
            background-color: #1E1E2E;
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow: auto;
        }
    
        .logo img {
            float: left;
            width: 100px;
            height: auto;
            margin-right: 10px;
        }
    
        .logo {
            display: flex;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -2px; 
            left: 0;
            width: 100%;
            border-bottom: 1px dashed #ecf0f1; 
        }
    
        .nav__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    
        .nav__link {
            display: flex;
            align-items: center;
            color: #ecf0f1;
            padding: 15px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .nav__link .dropdown-icon {
            margin-left: auto;
        }
    
        .nav__link:hover,
        .nav__link--active {
            background-color: #34495e;
        }
    
        .nav__sublist {
            list-style: none;
            padding-left: 20px;
            display: none;
        }

        .nav__sublist.active {
            display: block;
        }
    
        .nav__sublink {
            color: #bdc3c7;
            padding: 10px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s;
        }
    
        .nav__sublink:hover {
            background-color: #3e5060;
        }

        .profile-image-container {
    position: fixed; 
    right: 20px;
    top: 20px; 
    z-index: 1000; 
}

.profile-image {
    width: 50px; 
    height: 50px;
    border-radius: 30%;
    object-fit: cover; 
}


.main-content {
    margin-left: 250px;
    padding: 30px;
    margin-top: -30px;
    position: relative;
}

.content-header {
    display: inline-block;
}

.create-button {
    position: absolute;
    top: 0;
    right: 30px; 
    margin-top: 30px; 
}


        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th,
        .user-table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd; 
        }

        .user-table th {
            background-color: #f2f2f2;
            color: #333; 
        }

        .user-table tr:hover {
            background-color: #f5f5f5;
        }

        .user-image {
            border-radius: 50%;
            width: 30px; 
            height: 30px; 
            object-fit: cover; 
            margin-right: 10px; 
        }

        .action-btn {
    padding: 6px 12px;
    margin: 4px;
    border: none;
    background-color: ##F9F9F9;
    color: #333; 
    border-radius: 4px;
    cursor: pointer;
    position: relative; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center; 
}

.action-btn1 {
    padding: 6px 12px;
    margin: 4px;
    border: none;
    background-color: #d3d3d3; 
    color: #333; 
    border-radius: 4px;
    cursor: pointer;
    position: relative; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center; 
}

.action-btn::after {
    content: '\f0d7'; 
    font-family: 'Font Awesome 5 Free'; 
    font-weight: 900; 
    margin-left: 5px; 
}

.action-btn:hover {
    background-color: #bcbcbc; 
}


        body{
            background-color: #f5f5f5;
        }
        .header-rectangle {
    background-color: white;
    height: 100px;
    width: 100%; 
    position: fixed; 
    top: 0;
    left: 0; 
    z-index: -1;
}


.breadcrumb {
    padding: 8px 0px;
    margin-top: -20px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border-radius: 4px;
}

.breadcrumb .breadcrumb-item {
    display: inline-block;
}

.breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "-";
    padding: 0 5px;
    color: #6c757d;
}

.breadcrumb-item a {
    color: #0275d8;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #6c757d;
    pointer-events: none;
    cursor: default;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}


.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    z-index: 1;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-radius: 4px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

    </style>
</head>
<body>
    <div class="header-rectangle"></div>
    <div style="text-align: right; padding-right: 30px; padding-top: 110px;"> 

    

    </div>
    <div class="profile-image-container">
        <img id="profile-image" src="{{ asset('uploads/profilepicture.jpg') }}" alt="Profile Image" class="profile-image">
    </div>
    
    <aside class="sidebar">
    <nav class="nav">
        <div class="logo">
            <img src="{{ asset('uploads/sync-logo.png') }}" alt="Logo">
        </div>
       
        <ul class="nav__list">
            <li class="nav__item">
                <div class="nav__link">
                    <i class="fas fa-th"></i> Categories
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </div>
                <ul class="nav__sublist">
                    @foreach($categories as $category)
                    <li class="nav__subitem">
                        <a href="/news" class="nav__sublink"><i class="fas fa-list"></i> {{ $category->CategoryNews }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav__item">
                <div class="nav__link">
                    <i class="fas fa-tags"></i> Tags
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </div>
                <ul class="nav__sublist">
                    <li class="nav__subitem">
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> Tag1</a>
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> Tag2</a>
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> Tag3</a>

                    </li>
                </ul>
            </li>
            <li class="nav__item">
                <div class="nav__link">
                    <i class="fas fa-newspaper"></i> News
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </div>
                <ul class="nav__sublist">
                    <li class="nav__subitem">
                        <a href="/news" class="nav__sublink"><i class="fas fa-list"></i>Check News</a>
                        <a href="/form2" class="nav__sublink"><i class="fas fa-list"></i>Create News</a>
                    </li>
                </ul>
            </li>
            <li class="nav__item">
                <div class="nav__link">
                    <i class="fas fa-language"></i> Languages
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </div>
                <ul class="nav__sublist">
                    <li class="nav__subitem">
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> Arabic</a>
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> English</a>
                    </li>
                </ul>
            </li>
            <li class="nav__item">
                <div class="nav__link nav__link--active">
                    <i class="fas fa-users"></i> User Management
                    <i class="fas fa-caret-down dropdown-icon"></i>
                </div>
                <ul class="nav__sublist active">
                    <li class="nav__subitem">
                        <a href="#" class="nav__sublink"><i class="fas fa-list"></i> Users List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>





<div class="main-content">
    <div class="content-header">
        <h1>Users List</h1>
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active">User Management</li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>
    <div class="create-button">
        <a href="/form">
            <button class="action-btn1" style="background-color: #019EF7; color: white;">Create</button>
        </a>

    </div>
 
    <form >
    <table class="user-table">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllUsers">
                </th>
                <th>USER</th>
                <th>ROLE</th>
                <th>LAST LOGIN</th>
                <th>JOINED DATE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            @if($user->Active == 1)
            <tr>
                <td>
                    <input type="checkbox" class="userCheckbox" id="user_{{ $user->IDAdmin }}">
                </td>
                <td>
                    <img src="{{ asset('uploads/profilepicture.jpg') }}" width="50px" alt="User Image" class="user-image" style="float: left; margin-right: 10px;">
                    <div style="overflow: hidden;">
                        <div style="float: left;">{{ $user->NameAdmin }}</div><br>
                        <div style="float: left;">{{ $user->EmailAdmin }}</div>
                    </div>
                </td>
                <td>{{ $user->AccessType }}</td>
                <td>{{ $user->LastLogin ? (new DateTime($user->LastLogin))->format('d M Y, h:i a') : 'N/A' }}</td>
                <td>{{ (new DateTime($user->CreatedAt))->format('d M Y, h:i a') }}</td>
                <td>
                    <div class="dropdown">
                        <button class="action-btn">Actions</button>
                        <div class="dropdown-content">
                        <a href="{{ route('user.edit', $user->IDAdmin) }}">Edit</a>

                            <a href="javascript:void(0)" onclick="deleteUser({{ $user->IDAdmin }})">Delete</a>

                        </div>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</form>
</div>


<script>

function deleteUser(userId) {

        fetch(`/delete-user/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.success) {
                window.location.reload();
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }




    document.addEventListener("DOMContentLoaded", function() {
        const dropdownIcons = document.querySelectorAll(".dropdown-icon");
        
        dropdownIcons.forEach(icon => {
            icon.addEventListener("click", function() {
                const sublist = this.parentElement.nextElementSibling;
                sublist.classList.toggle("active");
            });
        });

        const selectAllCheckbox = document.getElementById("selectAllUsers");
        const userCheckboxes = document.querySelectorAll(".userCheckbox");

        selectAllCheckbox.addEventListener("change", function() {
            userCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        userCheckboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                }
            });
        });
    });

    document.getElementById('profile-image').addEventListener('click', function() {
        window.location.href = '/logout';
    });
</script>

</body>
</html>
