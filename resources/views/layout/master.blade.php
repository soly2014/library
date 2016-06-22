
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LearnCloud</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.js') }}"></script>
</head>

<body>
    <div class="container-fluid width">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1 class="whitecolor">
                    LearnCloud<small>It's Easy To Achieve Success</small>
                </h1>
            </div>

        </div>
        <div class="col-md-3">
            <ul class="list-unstyled space">
                <li>
                        <a href="/library" class="lisp">home</a>                
                </li>

                        @if(Auth::check())

                                <li>
                                        <a href="/library/admin" class="lisp">{{ Auth::user()->name }}</a>                
                                </li>

                                <li>
                                        <a href="/library/summery" class="lisp">summery</a>                
                                </li>
                                <li>
                                        <a href="/auth/logout" class="lisp">Log out</a>                
                                </li>
                        @else
                                <li>
                                        <a href="/auth/register" class="lisp">register</a>                
                                </li>
                                <li>
                                        <a href="/auth/login" class="lisp">login</a>                
                                </li>  

                         @endif       
                                
            </ul>        </div>

        </div>
    </div>
</div>

        </div>
    </div>

    @yield('content')

</div></div>