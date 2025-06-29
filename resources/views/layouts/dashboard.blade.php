<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Freehand&family=Noto+Sans+Devanagari:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Sidebar/UX Styles -->
    <style>
        .list-group-item:hover,
        .accordion-button:hover {
            background-color: #f1f1f1 !important;
            color: #000 !important;
            transition: all 0.2s ease-in-out;
        }

        .accordion-button:not(.collapsed) {
            background-color: #e2e6ea;
            box-shadow: inset 0 -2px 0 #4ca1af;
        }

        .active-link {
            background-color: #d1ecf1 !important;
            font-weight: bold;
        }

        #search_box:focus {
            box-shadow: 0 0 5px 2px #4ca1af;
            transition: 0.2s ease-in-out;
        }

        .btn[title] {
            position: relative;
        }

        .accordion-collapse {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease-in-out;
        }

        .accordion-collapse.show {
            max-height: 500px; /* Adjust as needed depending on content */
        }
    </style>
</head>

<body>
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="nav-bar row">
        <div class="Title_name">
            <a href="#">
                <img src="{{asset('images/prastish_logo.png')}}" alt="logo"
                     style="margin-top:-12px; height: 70px; width: 135px;">
            </a>
            <span>
                <a href="{{ route('prashtish.logout') }}"
                   class="btn btn-logout"
                   style="float: right; margin-top: 4px;"
                   id="logout"
                   data-bs-toggle="tooltip"
                   title="Click to log out">
                   <i class="fa-solid fa-right-from-bracket"></i> Log Out
                </a>
            </span>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar -->
        <div class="aside_bar col-md-3"
             style="background: linear-gradient(135deg, #2c3e50, #4ca1af); min-height: 100vh; padding-top: 30px; color: white;">
            <div class="side_navbar row justify-content-center">
                <div class="col-md-12 text-center mb-4" style="padding: 10px;">
                    <div style="font-size: 18px;">Welcome</div>
                    <div style="font-size: 28px; font-weight: bold;">{{ Auth::user()->name }}</div>
                </div>

                <hr style="border-top: 1px solid #ffffff55; width: 80%; margin: 0 auto 25px auto;">

                <!-- Home -->
                <div class="col-10">
                    <div class="list-group mb-3">
                        <a href="{{ route('homepage') }}" class="list-group-item list-group-item-action text-dark fw-bold">
                            <i class="fa-solid fa-house me-1"></i> Home
                        </a>
                    </div>
                </div>

                <!-- Accordion -->
                <div class="accordion col-10" id="side_navbar_accordion">

                    <!-- My Song Book -->
                    <div class="accordion-item bg-transparent border-0 mb-3">
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
                                        <a href="{{ route('lyrics.list') }}" class="text-decoration-none text-dark">📚 View Song Book</a>
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
                    <div class="accordion-item bg-transparent border-0 mb-3">
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
                                        <a href="{{ route('categories.list') }}" class="text-decoration-none text-dark">📋 All Categories</a>
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

                </div> <!-- Accordion End -->
            </div>
        </div>

        <!-- Content Area -->
        <div class="col-md-9 content-area" style="background-color: #E5D9F2">
            <div class="row search-box-div mt-md-4" style="justify-content: center;">
                <div class="col-md-6 p-md-3">
                    <input type="search" name="search_box" id="search_box" class="form-control border-success"
                           autocomplete="off">
                </div>
                <div class="col-md-2 p-md-3">
                    <a href="" class="btn btn-success" id="search_song">Search</a>
                </div>
            </div>

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

            <div class="overlay" id="overlay"></div>
            <div class="loader" id="loader"></div>

            <div class="final_lyrics_view"
                 style="position: relative; top: 29px; height: 500px; width: 100%; border: 2px solid black; overflow: auto; display: none;">
                <div class="row p-md-3">
                    <div class="col-md-12">
                        <ul id="records-list" class="list-group"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS Dependencies -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom Script -->
<script>
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();

        $('.close-button').on('click', function () {
            $('.alert').hide();
        });

        // Highlight active link
        $('.list-group-item').on('click', function () {
            $('.list-group-item').removeClass('active-link');
            $(this).addClass('active-link');
        });

        // Search button and enter key
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
                            $('.recently-uploaded-main, .main-page-lyrics, .song_book').hide();
                            $('.final_lyrics_view').show();
                            $('#records-list').empty();
                            $.each(response, function (index, record) {
                                $('#records-list').append(`
                                    <li class="list-group-item" id="list_song_${record.lyrics_id}">
                                        <h4><a href="{{ url('main-page/lyrics') }}/${record.lyrics_id}" class="song-link" data-id="${record.lyrics_id}">${record.lyrics_title}</a></h4>
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
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            } else {
                Swal.fire({
                    title: "Please Enter the Lyrics Name First....",
                    showClass: { popup: 'animate__animated animate__fadeInUp animate__faster' },
                    hideClass: { popup: 'animate__animated animate__fadeOutDown animate__faster' }
                });
            }
        });

        $('#search_box').on('keypress', function (e) {
            if (e.which === 13) {
                $('#search_song').click();
            }
        });

        $('#search_box').on('input', function () {
            if ($(this).val() === '') {
                $('.recently-uploaded-main').show();
                $('.final_lyrics_view').hide();
            }
        });

        $('#records-list').on('click', '.song-link', function (event) {
            event.preventDefault();
            window.location.href = $(this).attr('href');
        });

    });
</script>
</body>
</html>
