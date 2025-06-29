<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css"
          integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Freehand&family=Noto+Sans+Devanagari:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
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
            <span><a href="{{ route('prashtish.logout') }}" class="btn btn-logout"
                     style="float: right; margin-top: 4px;" id="logout"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></span>
        </div>
    </div>
    <div class="row">
        <div class="aside_bar col-md-3">
            <div class="side_navbar row justify-content-center">
                <div class="col-md-12"
                     style="width: 84%; margin-left:22px;margin-bottom: 20px;padding: 10px; color:#ffffff; font-size: 20px;">
                    Welcome <span style="font-size: 30px">{{ Auth::user()->name }}</span>
                </div>
                <hr style="color: #ffffff; margin-top: -20px; margin-bottom: 30px">
                <a href="{{ route('homepage') }}" class="btn btn-rounded btn-sm btn-primary col-md-8 p-2">Home</a>
                <div class="accordion col-md-8" id="side_navbar_accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="my_song_book">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#song_book_list" aria-expanded="true"
                                    aria-controls="song_book_list">
                                My Song Book
                            </button>
                        </h2>
                        <div id="song_book_list" class="accordion-collapse collapse show"
                             aria-labelledby="my_song_book" data-bs-parent="#side_navbar_accordion">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="{{ route('lyrics.list') }}">My Song
                                            Book</a></li>
                                    <li class="list-group-item"><a href="{{ route('lyrics.add') }}">Add New
                                            Lyrics</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="my_song_category">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#song_category_list" aria-expanded="false"
                                    aria-controls="song_category_list">
                                Song Categories
                            </button>
                        </h2>
                        <div id="song_category_list" class="accordion-collapse collapse"
                             aria-labelledby="my_song_category" data-bs-parent="#side_navbar_accordion">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="{{ route('categories.list') }}">All Song
                                            Categories</a></li>
                                    <li class="list-group-item"><a href="{{ route('category.add') }}">Add New
                                            Category</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    {{ session('success') }} <span class="btn btn-close float-end mt-md-1 close-button"
                                                   style="font-size: 10px"></span>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}<span class="btn btn-close float-end mt-md-1 close-button"
                                                style="font-size: 10px"></span>
                </div>
            @endif
            @yield('content-area')
            <div class="overlay" id="overlay"></div>
            <div class="loader" id="loader"></div>
            <div class="final_lyrics_view"
                 style="position: relative; top: 29px; height: 500px; width: 100%; border: 2px solid black; overflow: auto; display: none;">
                <div class="row p-md-3">
                    <div class="col-md-12">
                        <ul id="records-list" class="list-group">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

{{-- <script src="{{ asset('js/sweetalert.min.js') }}"></script> --}}
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.close-button').on('click', function () {
            $('.alert').css("display", "none");
        });

        $('#search_song').on('click', function (event) {
            event.preventDefault();
            var searched_for = $('#search_box').val().trim(); // Trim whitespace from input
            if (searched_for !== '') {
                $('#overlay, #loader').show();
                $.ajax({
                    url: '{{ route('search.song') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        searched_term: searched_for // Simplified key name
                    },
                    success: function (response) {
                        setTimeout(function () {
                            $('#overlay, #loader')
                                .hide(); // Hide overlay and loader after 1 second
                        }, 1000);
                        if (response != '') {
                            $('.recently-uploaded-main').css('display', 'none');
                            $('.main-page-lyrics').css('display', 'none');
                            $('.song_book').css('display', 'none');
                            $('.final_lyrics_view').css('display', 'block');
                            $('#records-list').empty();
                            $.each(response, function (index, record) {
                                console.log(record);
                                $('#records-list').append(
                                    `<li class="list-group-item" id="list_song_${record.lyrics_id}">
                                <h4>
                                    <a href="{{ url('main-page/lyrics') }}/${record.lyrics_id}" class="song-link" data-id="${record.lyrics_id}">${record.lyrics_title}</a>
                                </h4>
                            </li><hr>`
                                );
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
                        // Handle errors
                        console.error('AJAX Error:', status, error);
                    }
                });
            } else {
                Swal.fire({
                    title: "Please Enter the Lyrics Name First....",
                    showClass: {
                        popup: `
                          animate__animated
                          animate__fadeInUp
                          animate__faster
                          `
                    },
                    hideClass: {
                        popup: `
                          animate__animated
                          animate__fadeOutDown
                          animate__faster
                        `
                    }
                });
            }
        });

        // Delegate click event for dynamically added elements
        $('#records-list').on('click', '.song-link', function (event) {
            event.preventDefault();
            var lyricsId = $(this).data('id');
            // For example, redirect to the lyrics page or perform any other action
            window.location.href = $(this).attr('href');
        });


        $('#search_box').on('input', function () {
            if ($(this).val() === '') {
                $('.recently-uploaded-main').css('display', 'block');
                $('.final_lyrics_view').css('display', 'none');
            }
        });


        $('#maximize-btn').on('click', function () {
            var elem = $('#full-screen-element')[0]; // Get the element to maximize
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            }
        });
    });
</script>

</html>
