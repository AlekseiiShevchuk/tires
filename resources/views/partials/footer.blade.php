  <div class="small-footer">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <!-- <div class="pull-left"> -->
              <div class="col-m-6 col-md-6 small-footer__left">
                <span class="content-footer-span">Nyhedsbrev</span>
                <form class="small-footer-wrap-input">
                    <input class="input-footer" type="text" placeholder="Din e-mail">
                    <button type="submit" class="btn btn-default button input-footer-btn">
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                </form>
              </div>
            <!-- </div> -->
            <!-- <div class="pull-right"> -->
              <div class="col-md-6 small-footer__right">
                <span class="content-footer-span">Følg os</span>
                <div class="small-footer__social">
                  <a href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-rss" aria-hidden="true"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                  </a>
                </div>
            <!-- </div> -->
        </div>
    </div>
    </div>
  </div>

    <footer class="footer">
      <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-2 footer-wrap">
                <ul class="footer-list">
                    <li class="footer-list__caption">Kategorier</li>
                    <li class="footer-list__item"><a href="#">Sommerdæk</a></li>
                    <li class="footer-list__item"><a href="#">Vinterdæk</a></li>
                    <li class="footer-list__item"><a href="#">Helårsdæk</a></li>
                </ul>
            </div>
            <div class="col-sm-2 col-md-2 footer-wrap">
                <ul class="footer-list">
                    <li class="footer-list__caption">Information</li>
                    <li class="footer-list__item"><a href="{{ action('ContactController@index') }}">Kontakt os</a></li>
                    <li class="footer-list__item"><a href="{{ action('StaticPagesController@handels') }}">Handelsbetingelser</a></li>
                    <li class="footer-list__item"><a href="{{ action('StaticPagesController@about') }}">Om Os</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-md-4 footer-wrap">
                <ul class="footer-list">
                    <li class="footer-list__caption">Min konto</li>
                    <li class="footer-list__item"><a href="{{ Auth::check() ? action('UsersOrderController@index') : action('UserAuthController@index') }}">Mine ordrer</a></li>
                    <li class="footer-list__item"><a href="#">Mine kreditnotaer</a></li>
                    <li class="footer-list__item"><a href="{{ Auth::check() ? action('AccountAddressController@index') : action('UserAuthController@index') }}">Mine adresser</a></li>
                    <li class="footer-list__item"><a href="{{ Auth::check() ? action('AccountController@index') : action('UserAuthController@index') }}">Mine oplysninger</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-md-4 footer-border-left footer-wrap">
                <ul class="footer-list">
                    <li class="footer-list__caption">Butiksinformation</li>
                    <li class="footer-list__item">
                        <span class="light-grey-color">Fire Dæk, Smedeland 7, st. 2600 Glostrup</span>
                    </li>
                    <li class="footer-list__item">
                        <span class="light-grey-color">Ring til os:</span>
                        <span class="white-color-bold">32203218</span>
                    </li>
                    <li class="footer-list__item">
                        <span class="light-grey-color">E-mail:</span>
                        <span class="white-color-bold">info@fire-daek.dk</span>
                    </li>
                </ul>
            </div>
        </div>
      </div>
  </footer>
