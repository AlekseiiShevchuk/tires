<div class="wrap-under-slider">
        <div class="phone inline-block">
            <span class="shop-phone">
                <i class="glyphicon glyphicon-earphone white-color-bold"></i>
                <span class="light-grey-color">Ring til os:</span>
                <span class="white-color-bold">+45 32203218</span>
            </span>
        </div>
        <div class="wrap-link inline-block">
            <ul class="links-collection">
                <li class="first-link wrap-links"><a class="white-color-bold" href="{{ action('ContactController@index') }}">Kontakt os</a></li>
                @if(Auth::check())
                <li class="link wrap-links"><a href="#logout" class="white-color-bold" onclick="$('#logout').submit();">
                    Log af
                </a></li>
                <li class="link wrap-links"><a class="white-color-bold" href="{{ action('AccountController@index') }}">{{ Auth::user()->name }}</a></li>
                @else
                <li class="link wrap-links"><a class="white-color-bold" href="{{ action('UserAuthController@index') }}">Log ind</a></li>
                @endif
            </ul>
        </div>
    </div>