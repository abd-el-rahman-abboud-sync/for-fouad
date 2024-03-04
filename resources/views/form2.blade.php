<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Entry</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
        }
        .ck-content {
            height: 250px; 
        }

        #title {
            width: 99%;
            height: 30px;
        }
        body{
            font-family: 'Arial', sans-serif;
        }

        .tab {
            background: white;
            overflow: hidden;
            border-top: 1px solid #ccc;
            border-right: 1px solid #ccc;
            border-left: 1px solid #ccc;
        }

        .tab button {
            
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        text-decoration: none;
    }

    .tab button.active {
        border-bottom: 3px solid #00AAF4;
        color: #00AAF4

    }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
            background: white;
        }


.fileInputWrapper {
    white-space: nowrap;
    position: relative;
    display: inline-block;
    margin-right: 30px; 
    margin-left: 100px;
}


.fauxInput {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 12px 20px;
    border-radius: 4px; 
    cursor: pointer;
    width: 250px; 
}

.fileInputLabel {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 12px 20px; 
    background-color: #eee;
    border-radius: 4px; 
    cursor: pointer;
    font-size: 14px;
}

.fileInputWrapper input[type="file"] {
    display: none; /* Hide the input element */
}

.flex-container {
  display: flex;s
  flex-direction: row; 
  align-items: center; 
  justify-content: flex-start;
}

.required::after {
            content: " *" ;
            color: red ;
        }
    
    </style>
</head>
<body>
    <h2>News Entry</h2>
    
    <!-- Tabs -->
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'page1')" id="defaultOpen"><i class="fas fa-home"></i> Information</button>

        <button class="tablinks" onclick="openTab(event, 'page2')"><i class="fas fa-images"></i> Media</button>
    </div>
    <form action="{{ route('form2.store') }}" method="POST" id="categoryForm" enctype="multipart/form-data">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <!-- Information content -->
    <div id="page1" class="tabcontent">
            @csrf

            <div>
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" required>
            </div>
            <br>
            <div>
                <label for="content">Content</label><br>
                <textarea id="content" name="content"></textarea>
            </div>

            <br>
            <select name="category" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->CategoryID }}">{{ $category->CategoryNews }}</option>
                @endforeach
            </select>
            

            <br>


        <script>
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>

<div id="page2" class="tabcontent" >
    <div id="fileInputsContainer" >
      
        <div class="fileInputWrapper">
        <label for="imageUpload0" style="font-size: 14px">Image</label><br>
        <div class="flex-container">
        <label for="imageUpload0" class="fileInputLabel">Choose File</label>
    <span id="fauxInput0" class="fauxInput">no file selected</span>

    <input type="file" id="imageUpload0" class="imageUpload" name="imageUpload[]" style="display:none" onchange="updateFileName(this, 'fauxInput0')">

            </div>
    <br>
            <i class="fas fa-trash-alt deleteBin" onclick="deleteImage(this)" style="margin-top:20px"></i>
        </div>

        <div class="fileInputWrapper">
        <label for="imageUpload1" style="font-size: 14px">Image</label><br>
        <div class="flex-container">
        <label for="imageUpload1" class="fileInputLabel">Choose File</label>
    <span id="fauxInput1" class="fauxInput">no file selected</span>

    <input type="file" id="imageUpload1" class="imageUpload" name="imageUpload[]" style="display:none" onchange="updateFileName(this, 'fauxInput1')">

            </div>
    <br>
            <i class="fas fa-trash-alt deleteBin" onclick="deleteImage(this)" style="margin-top:20px"></i>
        </div>


        <div class="fileInputWrapper">
        <label for="imageUpload2" style="font-size: 14px">Image</label><br>
        <div class="flex-container">
        <label for="imageUpload2" class="fileInputLabel">Choose File</label>
    <span id="fauxInput2" class="fauxInput">no file selected</span>

    <input type="file" id="imageUpload2" class="imageUpload" name="imageUpload[]" style="display:none" onchange="updateFileName(this, 'fauxInput2')">

            </div>
    <br>
            <i class="fas fa-trash-alt deleteBin" onclick="deleteImage(this)" style="margin-top:20px"></i>
        </div>

        
    </div>
    
    
    <button type="button" onclick="addMore(event)" style="background-color: #00AAF4; color: #fff;  padding: 13px 18px; font-size: 16px; border: none; border-radius: 5px; margin-top:25px; margin-bottom: 40px">Add More</button>

</div>

<button type="submit" id="submitButton" style="display: none; float: right; background-color: #00AAF4; color: #fff; padding: 15px 20px; font-size: 18px; border: none; border-radius: 5px; margin-top: 10px">Save</button>


</form>
    


    <script>

function updateFileName(inputElement, fauxInputId) {
    var fileName = inputElement.value.split('\\').pop();
    document.getElementById(fauxInputId).textContent = fileName ? fileName : 'no file selected';
}




        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();

        function deleteImage(deleteBin) {
        var container = deleteBin.parentNode;
        container.parentNode.removeChild(container);
    }

    //test
   // let counter= 1;

    // Function to add more file inputs
    let fileInputCounter = 3; 

function addMore(event) {
    event.preventDefault(); // Prevent default form submission behavior

    // Increment the counter for each new input
    fileInputCounter++;

    // Create a new file input element with unique IDs
    var newInputWrapper = $(`
        <div class="fileInputWrapper">
            <label for="imageUpload${fileInputCounter}" style="font-size: 14px">Image</label><br>
            <div class="flex-container">
                <label for="imageUpload${fileInputCounter}" class="fileInputLabel">Choose File</label>
                <span id="fauxInput${fileInputCounter}" class="fauxInput">no file selected</span>
                <input type="file" id="imageUpload${fileInputCounter}" class="imageUpload" name="imageUpload[]" style="display:none" onchange="updateFileName(this, 'fauxInput${fileInputCounter}')">
            </div>
            <br>
            <i class="fas fa-trash-alt deleteBin" onclick="deleteImage(this)" style="margin-top:20px"></i>
        </div>
    `);

    $('#fileInputsContainer').append(newInputWrapper);
}





    function submitForm() {
    document.getElementById("categoryForm").submit();
}



function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";

    // Show submit button only on page 2
    if (tabName === "page2") {
        document.getElementById("submitButton").style.display = "block";
    } else {
        document.getElementById("submitButton").style.display = "none";
    }
}

document.getElementById("defaultOpen").click();

    </script>
</body>
</html>
