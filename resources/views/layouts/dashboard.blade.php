<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Freehand&family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }

        .aside_bar {
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            width: 300px;
            min-height: 100vh;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 30px;
            z-index: 1030;
        }

        .main-content {
            margin-left: 300px; /* same as sidebar width */
            width: calc(100% - 300px);
        }

        .nav-bar {
            background-color: #f4f7f9;
            color: #2c3e50;
            height: 75px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content-area {
            padding: 20px;
            background-color: #E5D9F2;
            min-height: calc(100vh - 75px);
        }

        .accordion-button:not(.collapsed) {
            background-color: #e2e6ea;
            box-shadow: inset 0 -2px 0 #4ca1af;
        }

        .list-group-item:hover,
        .accordion-button:hover {
            background-color: #f1f1f1 !important;
            color: #000 !important;
            transition: all 0.2s ease-in-out;
        }

        .active-link {
            background-color: #d1ecf1 !important;
            font-weight: bold;
        }

        #search_box:focus {
            box-shadow: 0 0 5px 2px #4ca1af;
            transition: 0.2s ease-in-out;
        }

        .accordion-collapse {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease-in-out;
        }

        .accordion-collapse.show {
            max-height: 500px;
        }

    </style>
</head>
<body>

@include('sweetalert::alert')

<div class="aside_bar">
    <div class="text-center mb-4 px-3">
        <img src="{{ asset('images/prastish_logo.png') }}" alt="logo" style="height: 70px; width: 130px;">
    </div>
    <div class="text-center mb-4 px-3">
        <div style="font-size: 18px;">Welcome</div>
        <div style="font-size: 28px; font-weight: bold;">{{ Auth::user()->name }}</div>
    </div>

    <hr style="border-top: 1px solid #ffffff55; width: 80%; margin: 0 auto 25px auto;">

    <div class="accordion" id="side_navbar_accordion">
        <div class="mb-3 px-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action {{ Request::routeIs('homepage') ? 'active-link' : '' }}">
                    <a href="{{ route('homepage') }}" class="text-decoration-none text-dark">
                        <i class="fa-solid fa-house me-1"></i> Home
                    </a>
                </li>
            </ul>
        </div>

        <!-- My Song Book -->
        <div class="accordion-item bg-transparent border-0 mb-3 px-3">
            <h2 class="accordion-header" id="my_song_book">
                <button class="accordion-button collapsed bg-light text-dark fw-bold rounded" type="button"
                        data-bs-toggle="collapse" data-bs-target="#song_book_list"
                        aria-expanded="false" aria-controls="song_book_list">
                    <i class="fa-solid fa-music me-1"></i> My Song Book
                </button>
            </h2>
            <div id="song_book_list" class="accordion-collapse collapse"
                 aria-labelledby="my_song_book" data-bs-parent="#side_navbar_accordion">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('lyrics.list') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-book-bible me-1 fw-bolder"></i> View Song Book</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('lyrics.add') }}" class="text-decoration-none text-dark">
                                <i class="fa-solid fa-plus me-1 fw-bolder"></i> Add New Lyrics
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Song Categories -->
        <div class="accordion-item bg-transparent border-0 mb-3 px-3">
            <h2 class="accordion-header" id="my_song_category">
                <button class="accordion-button collapsed bg-light text-dark fw-bold rounded" type="button"
                        data-bs-toggle="collapse" data-bs-target="#song_category_list"
                        aria-expanded="false" aria-controls="song_category_list">
                    <i class="fa-solid fa-folder-tree me-1"></i> Song Categories
                </button>
            </h2>
            <div id="song_category_list" class="accordion-collapse collapse"
                 aria-labelledby="my_song_category" data-bs-parent="#side_navbar_accordion">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('categories.list') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-icons"></i> All Categories</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="{{ route('category.add') }}" class="text-decoration-none text-dark">
                                <i class="fa-solid fa-plus me-1 fw-bolder"></i> Add New Category
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class=" ">

    </div>
    <!-- Navbar -->
    <div class="nav-bar row">
        <div class="col-md-10">
            <div class="row search-box-div justify-content-center">
                <div class="col-md-8 p-md-3">
                    <input type="search" name="search_box" id="search_box" class="form-control border-success" autocomplete="off">
                </div>
                <div class="col-md-2 p-md-3">
                    <a href="" class="btn btn-success" id="search_song">Search</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-end">
            <a href="{{ route('prashtish.logout') }}"
               class="btn btn-outline-dark btn-sm"
               id="logout"
               data-bs-toggle="tooltip"
               title="Click to log out">
                <i class="fa-solid fa-right-from-bracket"></i> Log Out
            </a>
        </div>
    </div>

    <!-- Content Area -->
    <div class="content-area">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="btn btn-close float-end mt-md-1 close-button" style="font-size: 10px"></span>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <span class="btn btn-close float-end mt-md-1 close-button" style="font-size: 10px"></span>
            </div>
        @endif

        @yield('content-area')

        <div class="final_lyrics_view d-none" style="height: 500px; border: 2px solid black; overflow: auto;">
            <div class="row p-md-3">
                <div class="col-md-12">
                    <ul id="records-list" class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();

        $('.close-button').on('click', function () {
            $('.alert').hide();
        });

        $('.list-group-item').on('click', function () {
            $('.list-group-item').removeClass('active-link');
            $(this).addClass('active-link');
        });

        $('#search_song').on('click', function (event) {
            event.preventDefault();
            let searched_for = $('#search_box').val().trim();
            if (searched_for !== '') {
                $('#overlay, #loader').show();
                $.ajax({
                    url: '{{ route('search.song') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: { searched_term: searched_for },
                    success: function (response) {
                        setTimeout(() => $('#overlay, #loader').hide(), 1000);
                        if (response && response.length) {
                            $('.final_lyrics_view').removeClass('d-none');
                            $('#records-list').empty();
                            $.each(response, function (index, record) {
                                $('#records-list').append(`
                                    <li class="list-group-item">
                                        <h4><a href="{{ url('main-page/lyrics') }}/${record.lyrics_id}" class="song-link">${record.lyrics_title}</a></h4>
                                    </li><hr>
                                `);
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "The Song You Search, Does not exist!",
                                footer: '<a href="/">Go Back</a>'
                            });
                        }
                    },
                    error: function () {
                        console.error('Search error');
                    }
                });
            } else {
                Swal.fire({
                    title: "Please Enter the Lyrics Name First....",
                    showClass: { popup: 'animate__animated animate__fadeInUp' },
                    hideClass: { popup: 'animate__animated animate__fadeOutDown' }
                });
            }
        });

        $('#search_box').on('keypress', function (e) {
            if (e.which === 13) {
                $('#search_song').click();
            }
        });

        $('#records-list').on('click', '.song-link', function (e) {
            e.preventDefault();
            window.location.href = $(this).attr('href');
        });
    });
</script>

</body>
</html>
