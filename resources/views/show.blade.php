<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Binus Movie</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/plyr.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img') }}/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="text-white"><a>Edit<span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('editThumbnail',$data->id) }}">Edit Thumbnail</a></li>
                                        <li><a href="{{ url('editVideo',$data->id) }}">Edit Video</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li>
                                    <form class="d-inline" action="{{ url('delete',$data->id) }}"
                                        onsubmit="return confirm('Are You Sure Delete This ?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-white" type="submit" name="submit">Delete Video</button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- video Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__details__episodes">
                        <div class="anime__video__player">
                            <video id="player" playsinline controls>
                                <source src="/video/{{ $data->video }}" type="video/mp4" />
                                <!-- Captions are optional -->
                                <track kind="captions" label="English captions" src="#" srclang="en" default />
                            </video>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer position-fixed fixed-bottom">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('img') }}/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved </a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

</body>

<!-- Js Plugins -->
<script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js') }}/bootstrap.min.js"></script>
<script src="{{ asset('js') }}/player.js"></script>
<script src="{{ asset('js') }}/jquery.nice-select.min.js"></script>
<script src="{{ asset('js') }}/mixitup.min.js"></script>
<script src="{{ asset('js') }}/jquery.slicknav.js"></script>
<script src="{{ asset('js') }}/owl.carousel.min.js"></script>
<script src="{{ asset('js') }}/main.js"></script>

</html>
