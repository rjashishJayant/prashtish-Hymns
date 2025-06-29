<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prastish | @yield('page-title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
{{--<nav class="navbar navbar-expand-lg navbar-light nav-bar-cus">
    <div class="container">
        <div class="navbar-brand">
            <a href="#">
                <img src="{{asset('images/prastish_logo.png')}}" alt="logo" style="height: 90px; width: 120px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Gazal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Qawwali</a>
                </li>
                <li class="nav-item" data-bs-auto-close="outside">
                    <a class="nav-link dropdown-toggle" href="#" id="GospelSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Gospel Songs</a>
                    <ul class="dropdown-menu" aria-labelledby="GospelSongsId">
                        <li><a class="dropdown-item" href="#">Christmas Songs</a></li>
                        <li><a class="dropdown-item" href="#">Commitment Songs</a></li>
                        <li><a class="dropdown-item" href="#">Communion Songs</a></li>
                        <li><a class="dropdown-item" href="#">Confession Songs</a></li>
                        <li><a class="dropdown-item" href="#">Declaration Songs</a></li>
                        <li><a class="dropdown-item" href="#">Good Friday Songs</a></li>
                        <li><a class="dropdown-item" href="#">Lent Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="WorshipSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Praise & Worship Songs</a>
                    <ul class="dropdown-menu" aria-labelledby="WorshipSongsId">
                        <li><a class="dropdown-item" href="#">Children Songs</a></li>
                        <li><a class="dropdown-item" href="#">Chorus</a></li>
                        <li><a class="dropdown-item" href="#">Offering Songs</a></li>
                        <li><a class="dropdown-item" href="#">Thanks Giving Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="MoreSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">More</a>
                    <ul class="dropdown-menu" aria-labelledby="MoreSongsId">
                        <li><a class="dropdown-item" href="#">Prayer Songs</a></li>
                        <li><a class="dropdown-item" href="#">Second Coming Songs</a></li>
                        <li><a class="dropdown-item" href="#">Wedding Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>--}}
<nav class="navbar navbar-expand-lg navbar-light nav-bar-cus">
    <div class="container">
        <div class="navbar-brand">
            <a href="#">
                <img src="{{asset('images/prastish_logo.png')}}" alt="logo" style="height: 90px; width: 120px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Gazal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Qawwali</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="GospelSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Gospel Songs</a>
                    <ul class="dropdown-menu" aria-labelledby="GospelSongsId">
                        <li><a class="dropdown-item" href="#">Christmas Songs</a></li>
                        <li><a class="dropdown-item" href="#">Commitment Songs</a></li>
                        <li><a class="dropdown-item" href="#">Communion Songs</a></li>
                        <li><a class="dropdown-item" href="#">Confession Songs</a></li>
                        <li><a class="dropdown-item" href="#">Declaration Songs</a></li>
                        <li><a class="dropdown-item" href="#">Good Friday Songs</a></li>
                        <li><a class="dropdown-item" href="#">Lent Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="WorshipSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Praise & Worship Songs</a>
                    <ul class="dropdown-menu" aria-labelledby="WorshipSongsId">
                        <li><a class="dropdown-item" href="#">Children Songs</a></li>
                        <li><a class="dropdown-item" href="#">Chorus</a></li>
                        <li><a class="dropdown-item" href="#">Offering Songs</a></li>
                        <li><a class="dropdown-item" href="#">Thanks Giving Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="MoreSongsId" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">More</a>
                    <ul class="dropdown-menu" aria-labelledby="MoreSongsId">
                        <li><a class="dropdown-item" href="#">Prayer Songs</a></li>
                        <li><a class="dropdown-item" href="#">Second Coming Songs</a></li>
                        <li><a class="dropdown-item" href="#">Wedding Songs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center" style="padding: 50px">
    <span class="content-editable">
        So whether we are at home or away, <span
                class="inner-editable-content"> we make it our aim to please him.</span> 2 Corinthians 5:9
    </span>
</div>
<div class="container main-icon-container">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <i class="fa-solid fa-globe main-icon"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 main-icon-inner-text">
                    <span class="icon-inner-text-1st">Nationwide</span> <br><span
                            class="icon-inner-text-2nd">Coverage</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <i class="fa-solid fa-user-graduate main-icon"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 main-icon-inner-text">
                    <span class="icon-inner-text-1st">Committed</span> <br><span class="icon-inner-text-2nd">To Excellence</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <i class="fa-solid fa-person-praying main-icon"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 main-icon-inner-text">
                    <span class="icon-inner-text-1st">Spiritual</span> <br><span class="icon-inner-text-2nd">Relationship </span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="why_choose_us">
    <div class="container-fluid ">
        <h1 class="text-center" style="color: #3674B5; font-size:38px; font-weight: 700;">WHY CHOOSE US?</h1>
        <p class="text-center" style="color: #122c46; font-family: Bahnschrift; font-size: large; margin-top: 20px;">We
            are committed to provide you better tool to build your relationship with loving God:</p>
        <div class="row justify-content-around why-cards">
            <div class="col-lg-3 col-md-3 card why-inner-cards col-12">
                <i class="fa-solid fa-cross why-icons"></i>
                <div class="card-body">
                    <div class="card-title">Christian devotional songs</div>
                    <div class="card-text">We are dedicated to providing you Christian devotional songs with lyrics.
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 card why-inner-cards col-12">
                <i class="fa-solid fa-shield-halved why-icons"></i>
                <div class="card-body">
                    <div class="card-title">Trusted and secure platform</div>
                    <div class="card-text">We don’t show you too many ads so you don’t get distracted and have a better
                        experience.
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 card why-inner-cards col-12">
                <i class="fa-solid fa-feather-pointed why-icons"></i>
                <div class="card-body">
                    <div class="card-title">Our Effort</div>
                    <div class="card-text">We always try to write lyrics without any grammatical error. So you can use
                        the lyrics by making slides for church services.
                    </div>
                </div>
            </div>
        </div>
        <div class="editable-why-us row justify-content-around mt-5">
            <div class="col-md-8 text-center">
                <p style="font-size: 38px; font-weight: bold;">
                    Our endeavor is to make every resource available for spiritual growth, <span
                            style="color: #3674B5;">so that everyone can enjoy intimacy with the Lord.</span>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="users-counter-js-div">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 counter">
                        <span id="users_counter">0</span>+
                    </div>
                    <div class="col-md-12 counter-title">
                        Happy Users
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 counter">
                        <span id="trust_counter">0</span>+
                    </div>
                    <div class="col-md-12 counter-title">
                        Years of Trust
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 counter">
                        <span id="satisfaction_counter">0</span>%
                    </div>
                    <div class="col-md-12 counter-title">
                        Satisfaction
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="before-whatsapp-1">
    <div class="container">
        <div class="row justify-content-around text-center">
            <div class="col-md-10" style="font-size: xx-large; font-weight: bold">
                <span style="color: #003369">“Who will not fear you, Lord, and bring glory to your name? For you alone are holy.</span>
                All
                nations will come and worship before you, for your righteous acts have been revealed.”<span
                        style="color: #003369"> – Revelation 15:4</span>
            </div>
        </div>
    </div>
</section>
<section class="before-whatsapp-2" style="background: #003369">
    <div class="container p-md-3">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <span style="font-size: xx-large; font-weight: bolder">“Your decrees are the theme of my song wherever I lodge.” Psalms 119:54</span>
            </div>
        </div>
    </div>
</section>
<section class="social_connects">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4 for-whatsapp">
                <div class="col-md-12 text-center p-2">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="col-md-12 text-center p-2">
                    <span class="social-quote">Join Our Whatsapp Channel</span>
                </div>
                <div class="col-md-12 text-center p-2">
                    <a href="" class="btn btn-rounded join-btn-whatsapp"> Join <i
                                class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4 for-youtube">
                <div class="col-md-12 text-center p-2">
                    <i class="fa-brands fa-youtube"></i>
                </div>
                <div class="col-md-12 text-center p-2">
                    <span class="social-quote">Subscribe Our Youtube Channel</span>
                </div>
                <div class="col-md-12 text-center p-2">
                    <a href="" class="btn btn-rounded join-btn-youtube"> Subscribe <i
                                class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@if(!empty($all_newly_added_lyrics) && count($all_newly_added_lyrics) > 0)
    <section class="dynamic-lyrics-cards">
        <div class="container">
            <div class="row justify-content-around why-cards">
                @foreach($all_newly_added_lyrics AS $added_lyrics)
                    <div class="col-md-3 card card-rounded dynamic-inner-cards col-sm-12">
                        <img src="{{asset('images/tere-jaisa.jpg')}}" alt="tere_jaisa" class="card-images col-md-12">
                        <div class="card-body">
                            <div class="card-title">{{ucfirst(Str::limit($added_lyrics['lyrics_title'], 15))}}</div>
                            <span class="created_category_detail">{{date('d M Y', strtotime($added_lyrics['created_at']))}} | {{$added_lyrics['cat_name']}} Song</span>
                            <div class="card-text">{!! nl2br(Str::limit($added_lyrics['lyrics_words'], 150, '....')) !!}
                            </div>
                        </div>
                    </div>
                @endforeach{{--
                <div class="col-md-3 card dynamic-inner-cards card-rounded">
                    <img src="{{asset('images/tere-jaisa.jpg')}}" alt="tere_jaisa" class="card-images col-md-12">
                    <div class="card-body">
                        <div class="card-title">Maine Dhunda Yeh Sara jahan</div>
                        <span class="created_category_detail">Oct 8 2021 | Testimonial Song</span>
                        <div class="card-text">Maine Dhundha Ye Sara Jahan Lyrics (Tere Jaisa Gautam Kumar) मैंने ढूंढा
                            ये
                            सारा जहां तेरे जैसा न कोई मिला -2 जैसे तूने किया है क्षमा तेरे जैसा न कोई मिला मैंने ढूंढा
                            ये
                            सारा जहां तेरे जैसा न कोई मिला पापों का था कर्ज़ मुझपे जो भारी दुखों में ज़िंदगी गुज़ारी थी
                            सारीमेरे...
                        </div>
                    </div>
                </div>
                <div class="col-md-3 card dynamic-inner-cards card-rounded">
                    <img src="{{asset('images/tere-jaisa.jpg')}}" alt="tere_jaisa" class="card-images col-md-12">
                    <div class="card-body">
                        <div class="card-title">Maine Dhunda Yeh Sara jahan</div>
                        <span class="created_category_detail">Oct 8 2021 | Testimonial Song</span>
                        <div class="card-text">Maine Dhundha Ye Sara Jahan Lyrics (Tere Jaisa Gautam Kumar) मैंने ढूंढा
                            ये
                            सारा जहां तेरे जैसा न कोई मिला -2 जैसे तूने किया है क्षमा तेरे जैसा न कोई मिला मैंने ढूंढा
                            ये
                            सारा जहां तेरे जैसा न कोई मिला पापों का था कर्ज़ मुझपे जो भारी दुखों में ज़िंदगी गुज़ारी थी
                            सारीमेरे...
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </section>
@endif
<section class="before-footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 last-verse">
                Therefore, I urge you, brothers and sisters, in view of God’s mercy, to offer your bodies as a living
                sacrifice, holy and pleasing to God—this is your true and proper worship. Romans 12:1-2
            </div>
        </div>
    </div>
</section>
<section class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 links">
                <span>Links</span>
                <div>
                    <ul class="footer-list">
                        <li class="list-item"><a href="#">About Us</a></li>
                        <li class="list-item"><a href="#">Contact Us</a></li>
                        <li class="list-item"><a href="#">Site Map</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 social-links">
                <div class="row justify-content-center">
                    <div class="col-md-1"><i class="fa-brands fa-whatsapp footer-icons"></i></div>
                    <div class="col-md-1"><a href="mailto:ashishjayant23@gmail.com"><i
                                class="fa fa-envelope footer-icons"></i></a></div>
                    <div class="col-md-1"><i class="fa-brands fa-youtube footer-icons"></i></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 footer-copyright">
                        &copy; We Support Original Content.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        let upto_user = 0;
        let upto_trust = 0;
        let upto_satisfaction = 0;

        // Set intervals for each counter separately
        let userInterval = setInterval(updateUser, 20);
        let trustInterval = setInterval(updateTrust, 200); // Adjusted interval for trust counter
        let satisfactionInterval = setInterval(updateSatisfaction, 20);

        function updateUser() {
            let count = $("#users_counter");
            count.text(++upto_user);
            if (upto_user === 100) {
                clearInterval(userInterval);
            }
        }

        function updateTrust() {
            let count = $('#trust_counter');
            count.text(++upto_trust);
            if (upto_trust === 6) {
                clearInterval(trustInterval);
            }
        }

        function updateSatisfaction() {
            let count = $('#satisfaction_counter');
            count.text(++upto_satisfaction);
            if (upto_satisfaction === 100) {
                clearInterval(satisfactionInterval);
            }
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        // Select all dropdown elements
        let dropdowns = document.querySelectorAll(".nav-item.dropdown");

        dropdowns.forEach(function (dropdown) {
            dropdown.addEventListener("mouseenter", function () {
                let menu = dropdown.querySelector(".dropdown-menu");
                let toggle = dropdown.querySelector(".dropdown-toggle");

                if (window.innerWidth > 991) { // Ensure it's not mobile view
                    menu.classList.add("show");
                    toggle.setAttribute("aria-expanded", "true");
                }
            });

            dropdown.addEventListener("mouseleave", function () {
                let menu = dropdown.querySelector(".dropdown-menu");
                let toggle = dropdown.querySelector(".dropdown-toggle");

                if (window.innerWidth > 991) { // Ensure it's not mobile view
                    menu.classList.remove("show");
                    toggle.setAttribute("aria-expanded", "false");
                }
            });
        });
    });
</script>
</html>
