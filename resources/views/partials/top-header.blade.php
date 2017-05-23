<div class="top-header">
  <div class="container">
    <div class="pull-left">
      <div class="top-header__phone">
        <i class="glyphicon glyphicon-earphone earphone-icon"></i>
        <span class="light-grey-color">Ring til os:</span>
        <span class="white-color-bold">+45 32203218</span>
      </div>
    </div>
    <div class="pull-right">
      <div class="top-header__nav">
        <a class="white-color-bold" href="{{ action('ContactController@index') }}">Kontakt os</a>
              @if(Auth::check())
        <a href="#logout" class="white-color-bold" onclick="$('#logout').submit();">
          Log af
        </a>
        <a class="white-color-bold" href="{{ action('AccountController@index') }}">{{ Auth::user()->name }}</a>
              @else
        <a class="white-color-bold" href="{{ action('UserAuthController@index') }}">Log ind</a>
              @endif
      </div>
    </div>
  </div>
</div>
