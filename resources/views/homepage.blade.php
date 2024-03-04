<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

        body{
            background-color: whitesmoke;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            background-color: white;
            transition: padding 0.3s ease, background-color 0.3s ease; 
        }
        .logo img {
            height: 40px; 
        }
        .logo a, .navbar a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
        }
        .navbar {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            font-weight: bold; 
        }
        .search-menu {
            position: relative;
            display: flex;
            align-items: center;
        }
        .search-menu input[type="text"] {
            width: 0;
            position: absolute;
            right: 30px; 
            border: 1px solid #ccc;
            padding: 5px;
            opacity: 0;
            transition: width 0.4s ease-in-out, opacity 0.4s ease-in-out;
            border-radius: 20px;
        }
        .search-menu input[type="text"]:focus {
            outline: none;
        }
        .search-menu .fa-search {
            cursor: pointer;
            color: black;
        }
        .search-menu input[type="text"].expanded {
            width: 240px; 
            opacity: 1;
        }
        .container {
            padding-top: 100px; 
        }

        .time-badge {
    display: inline-block;
    background-color: #983895;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}


.purple-box {
    background-color:  #983895;
    color: white;
    border-radius: 5px;
    padding: 10px 7px;
    width: calc(1/24 * 100%);
    border-bottom: 2px solid  #983895; 
    
}

.latest-news-header {
    margin-bottom: 20px;
}

        .news-item h2 {
    color: #333; 
    font-size: 20px;
    margin-top: 10px; 
}

.news-item p {
    color: #666; 
    font-size: 16px; 
}

.scroll-container {
    display: flex; 
    overflow-x: auto; 
    overflow-y: hidden; 
    white-space: nowrap; 
    padding: 20px 0; 
}

.coursescard {
    background-color: #fff; 
    border: 1px solid #ddd; 
    border-radius: 5px; 
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
    width: 350px; 
    margin: 20px; 
    padding: 20px; 
    overflow: hidden; 
 
    transition: transform 0.2s; 
}

.coursescard img {
    max-height: 250px; 
}

.coursescard:hover {
    transform: scale(1.03);
}



.coursescard h2 {
    margin-top: 15px; 
    font-size: 18px; 
}

.coursescard p {
    font-size: 14px;
    color: #999; 
    margin-bottom: 0; 
}

.main-events-btn-container {
    display: flex; 
    align-items: center; 
    justify-content: space-between; 
    padding: 10px;
}

.carousel-control-btn {
    background-color: grey; 
    color: white; 
    border: none; 

    cursor: pointer; 
    font-size: 16px; 
    border-radius: 5px; 
}


.main-events-btn {
    background-color: #983895;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}

.main-events-btn:disabled {
    background-color: #983895;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}


.carousel-btn {
    position: absolute;
    top: 50%; 
    transform: translateY(-50%); 
    background-color: grey; 
    color: white; 
    border: none; 
    padding: 10px 20px; 
    cursor: pointer; 
    z-index: 10; 
}
.carousel-control-btn {
    background-color: grey; 
    color: white; 
    border: none; 
    padding: 10px 15px; 
    margin: 0; 
    cursor: pointer; 
    font-size: 16px; 
    border-radius: 5px;
    display: inline-block; 
}

.carousel-control-btn {
    box-sizing: border-box; 
}

.main-events-btn-container {
    font-size: 0; 
}

.carousel-control-btn {
    font-size: 16px; 
}



.purple-line {
    height: 5px;
    background-color: #983895; 
    width: 100%; 
}

.middle-content{
    margin-left: 200px;
}

</style>
</head>
<body>

<div class="header" id="myHeader">
    <div class="logo">
        <img src="{{ asset('uploads/alahdath-logo.png') }}" alt="Logo">
    </div>
    <nav class="navbar">
        <a href="#">Politics</a>
        <a href="#">Sports</a>
        <a href="#">Economics</a>
        <a href="#">Technology</a>
        <a href="#">Health</a>
    </nav>
    <div class="search-menu">
        <input type="text" id="searchField" placeholder="Search...">
        <i class="fas fa-search" onclick="toggleSearch()"></i>
    </div>
</div>

<table>
    <tr>
    <td>
<div class="first" style="padding-top: 100px;">
    <div class="row">
        <div class="col-lg-8 middle-content one">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <!-- Placeholder for your 3 images -->
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="latest-news">
                        <div class="main-events-btn-container">
                            <button class="main-events-btn" disabled>News for Politics</button>
                        </div>

                        <div class="purple-line"></div>

                        <br>
                        @foreach($newestNews as $news)
                            <div class="news-item" style="position: relative; display: block; margin-right: 20px; margin-bottom: 20px;">
                                <p style="position: absolute; top: 0; left: 0; color: #FFF; background-color: rgba(0, 0, 0, 0.5); padding: 5px;">{{ \Carbon\Carbon::parse($news->CreatedAt)->format('d M Y H:i') }}</p>
                                <h3 style="position: absolute; bottom: 0; left: 0; color: #FFF; background-color: rgba(0, 0, 0, 0.5); padding: 5px;">{{ $news->TitleNews }}</h3>
                                @php
                                $imagePaths = json_decode($news->ImageNews, true);
                                @endphp
                                @if($imagePaths && is_array($imagePaths))
                                    <div class="news-images">
                                        @foreach($imagePaths as $imagePath)
                                            <img src="{{ asset($imagePath) }}" alt="News Image" style="width: 400px; height: auto; display: block; margin-bottom: 10px;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</td>
<td>

<div class="oldest-news-images" style="display: flex; flex-direction: column; align-items: center;">
<br><br><br><br><br><br><br><br><br>
    @foreach($oldestNews as $news)
        @php
        $imagePaths = json_decode($news->ImageNews, true);
        @endphp
        @if($imagePaths && is_array($imagePaths))
            @foreach($imagePaths as $imagePath)
                <div class="news-item" style="display: flex; align-items: center; background-color: white; padding: 20px; margin-bottom: 20px; border: 1px solid #ddd; width: 100%; max-width: 1000px;">
                    <img src="{{ asset($imagePath) }}" alt="News Image" style="width: 150px; height: 120px; object-fit: cover; margin-right: 20px;">
                    <div>
                        <i class="fa fa-calendar" aria-hidden="true" style="margin-right: 10px;"></i>
                        <p style="margin: 0; font-size: 16px; display: inline-block;">{{ \Carbon\Carbon::parse($news->CreatedAt)->format('d M Y') }}</p>
                        <h5 style="margin: 10px 0;">{{ $news->TitleNews }}</h5>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach
</div>




</td>
<td>
        <div class="col-lg-4 middle-content two">
        <br><br><br><br>
            <div class="latest-news-header">
         
                <button class="main-events-btn" disabled>Latest News</button>
                <br><br>
                <div class="purple-line"></div>

<br>
            </div>
            @foreach($newsItems as $key => $news)
            <h5><span class="time-badge">{{ date('H:i', strtotime($news->CreatedAt)) }}</span> {{ $news->TitleNews }}</h5>
            @endforeach
        </div>
    </div>
</div>

</td>
</tr>
</table>

<div class="container">
    <div class="main-events-btn-container">
        <button class="main-events-btn" disabled>Important News</button>
       
 
    </div>
    <div class="purple-line"></div>

    <div class="scroll-container" id="newsCarousel">
        <button id="prevBtn" class="carousel-control-btn" style="height: 40px"> < </button>

     @foreach($newsItems as $news)
    <div class="coursescard">
        @php
        $imagePaths = json_decode($news->ImageNews, true);
        @endphp

        @if($imagePaths)
            @foreach($imagePaths as $imagePath)
                <img src="{{ asset($imagePath) }}" alt="News Image" style="width: 100%; height: auto;">
            @endforeach
        @endif

        <p>{!! $news->CreatedAt !!}</p>
        <h2>{{ $news->TitleNews }}</h2>
        
    </div>
@endforeach
<button id="nextBtn" class="carousel-control-btn" style="height: 40px"> > </button>

</div>
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      var header = document.getElementById("myHeader");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        header.style.padding = "10px 5%";
        header.style.backgroundColor = "rgba(255, 255, 255, 0.7)";
      } else {
        header.style.padding = "20px 5%";
        header.style.backgroundColor = "rgba(255, 255, 255, 0.9)";
      }
    }

    function toggleSearch() {
        var searchInput = document.getElementById('searchField');
        var isExpanded = searchInput.classList.contains('expanded');
        if (isExpanded) {
            searchInput.classList.remove('expanded');
            searchInput.style.width = '0';
            searchInput.style.opacity = '0';
        } else {
            searchInput.classList.add('expanded');
            searchInput.style.width = '240px'; 
            searchInput.style.opacity = '1';
            searchInput.focus();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
    const searchField = document.getElementById('searchField');
    
    searchField.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const newsItems = document.querySelectorAll('.coursescard');
        
        newsItems.forEach(item => {
            const title = item.querySelector('h2').textContent.toLowerCase();
            if (title.includes(query)) {
                item.style.display = ''; // Show items that match
            } else {
                item.style.display = 'none'; // Hide others
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const cardWidth = 350; // The width of each card
    const gap = 20; // The gap between cards
    const numberOfCards = 4; // Number of cards to display

    let currentIndex = 0; // Starting index
    const newsItems = document.querySelectorAll('.coursescard');
    const maxIndex = newsItems.length - numberOfCards;
    const scrollContainer = document.getElementById('newsCarousel');

    function updateCardDisplay() {
        newsItems.forEach((item, index) => {
            if (index >= currentIndex && index < currentIndex + numberOfCards) {
                item.style.display = 'inline-block'; // Show items within the range
            } else {
                item.style.display = 'none'; // Hide others
            }
        });
    }

    document.getElementById('prevBtn').addEventListener('click', function() {
        currentIndex = Math.max(currentIndex - numberOfCards, 0);
        updateCardDisplay();
        scrollContainer.scrollLeft -= (cardWidth + gap) * numberOfCards;
    });

    document.getElementById('nextBtn').addEventListener('click', function() {
        currentIndex = Math.min(currentIndex + numberOfCards, maxIndex);
        updateCardDisplay();
        scrollContainer.scrollLeft += (cardWidth + gap) * numberOfCards;
    });

    updateCardDisplay();
});


</script>

</body>
</html>