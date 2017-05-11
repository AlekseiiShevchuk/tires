@extends('layouts.index')

@section('content')
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('{{asset('slider/loading.gif')}}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
            <div>
                <img data-u="image" src="{{asset('slider/' . 'slider1.jpg')}}" />
            </div>
            <div>
                <img data-u="image" src="{{asset('slider/' . 'slider2.jpg')}}" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
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
                <li class="first-link wrap-links"><a class="white-color-bold" href="#">Kontakt os</a></li>
                <li class="link wrap-links"><a class="white-color-bold" href="#">Log ind</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 tire-img">
                <img src="{{ asset('index-page/fire-daek-logo-1490775043.jpg') }}">
            </div>
            <div class="col-md-3 col-md-offset-2 search-content">
                <input class="search" type="text" placeholder="Søg">
                <button class="search-btn"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 wrap-collection-2">
                <ul class="links-collection">
                    <li class="wrap-links-2"><a href="#">Sommerdæk</a></li>
                    <li class="wrap-links-2 links-2"><a href="#">Vinterdæk</a></li>
                    <li class="wrap-links-2 links-2-last"><a href="#">Helårsdæk</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 wrap-collection-2">
                <ul class="links-collection">
                    <li class="wrap-links-2"><a href="#">Populær</a></li>
                    <li class="wrap-links-2 links-2"><a href="#">Mest solgte</a></li>
                    <li class="wrap-links-2 links-2-last"><a href="#">Tilbud</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section container wrap-tires">
        <div class="row text-center">
            @foreach($tires as $tire)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="thumbnail-img" src="{{asset('uploads/' . $tire->image_1)}}">
                        </a>
                        <div class="caption">
                        <h4 style="height: 38px;overflow: hidden;"><strong>{{ $tire->name }}</strong></h4>
                        <p class="caption-description">{!! mb_substr($tire->description, 0, 50) !!} ... </p>
                        <div class="price">
                            @if($tire->price && $tire->special_price)
                                <span class="text-danger"><strike>KR {{ $tire->price }}</strike></span>
                                <span class="text-primary"> KR {{$tire->special_price}} </span>
                            @endif
                        </div>
                        <p class="thumbnail-category"><storng>Brand: </storng><a href="{{route('tire_brands.show',['id' =>$tire->brand->id])}}">{{ $tire->brand->name }}</a></p>
                        <hr>
                        <p>
                            <a href="#" class="btn btn-default">Mere Info</a>
                            <a href="#" class="btn btn-primary" style="padding-left:30px;padding-right:30px;">Bestil nu!</a>
                        </p>
                    </div>
                </div>
                </div>
            @endforeach
        <div class="clearfix"></div>
        <div class="row text-center">
                <div class="container"> {{ $tires->links() }}</div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="information information-img">
                            </div>
                            <div class="information">
                                <h3 class="content-header-3">Levering</h3>
                                <p class="information-p">Vi leverer i egen varevogn</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="information information-img">
                            </div>
                            <div class="information">
                                <h3 class="content-header-3">Kundeservice</h3>
                                <p class="information-p">
                                    Vores kundeservice sidder klar til at svar på <br> spørgsmål og hjælpe dig med din ordre
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="information information-img">
                            </div>
                            <div class="information">
                                <h3 class="content-header-3">Kreditkort</h3>
                                <p class="information-p">Vi tager imod alle kreditkort</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="content-header-3">Fire Dæk</h3>
                <p class="bold">Billige dæk til folket</p>
                <p class="light-grey-color">
                    Fire Dæk er skabt med den simple idé, at du kan få leveret <br> fire billige dæk hjem til døren. Vi er specialister <br> i Lassa mærket, som skaber dæk af høj kvalitet <br> til en konkurrencedygtig pris. Gennem vores <br> gode kontakter kan vi skaffe Lassa dæk <br> billigere end nogen andre på det danske marked.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('index-page/1.jpg') }}">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('index-page/2.jpg') }}">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('index-page/3.jpg') }}">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12"><h2 class="content-header">Fire Gode og Billige Dæk til Alle</h2></div>
            <div class="col-md-9">
                <p class="content-p">
                    Fire-daek.dk blev startet på idéen om at tilbyde 4 gode og billige dæk til alle. Det er vigtigt altid at have de rigtige dæk på sin bil. Dækkenes kvalitet og tilstand er afgørende for en sikker køreoplevelse. Dæk bliver slidt ned, og det giver dårligere vejgreb og øger benzinforbruget. Det er derfor vigtigt både for sikkerheden og økonomien at være opmærksom på sine dæks tilstand. Der er også forskel på sommer og vinterdæk. Det er ikke alle i Danmark der tænker over dette, men vores nordiske naboer ved udmærket hvor vigtigt det er. Vinteren er ikke så regelmæssig her i landet, men den kan komme pludseligt, og så er det ikke til at opdrive vinterdæk. Man bør derfor være forberedt, så man ikke ender med at skøjte rundt på de isglatte veje. Det kan dog hurtigt blive dyrt med alle de dæk. Derfor arbejder vi hårdt på at skaffe de billigste dæk, så alle har råd til altid at have det optimale dæk på deres bil. Din personlige kørestil og vaner har også betydning for, hvilke dæk der er bedst til dig. Hvis du mest kører mindre ture rundt i byen, så vil økonomi og sikkerhed være de vigtigste faktorer. For personer der kører mange lange ture på motorvej, er især støjen fra dækkene, komfort og brændstoføkonomien vigtig. Folk, der har investeret i en luksus eller sportsbil, skal have dæk, som kan matche den og sikre et godt vejgreb og styring selv ved høje hastigheder.
                </p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('index-page/cover1.jpg') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 cover">
                <img src="{{ asset('index-page/cover2.jpg') }}">
            </div>
            <div class="col-md-8">
                <h2 class="content-header">Sommerdæk</h2>
                <p class="content-p">
                    Det er vigtigt at have de rette sommerdæk, men der er mange forhold at overveje i sit valg. Det vigtigste er, at man altid har et godt vejgreb. I dårligt vejr er det vigtigt, at dækkene har det rette mønster, så det leder vand korrekt og effektivt væk fra dækkene. På den måde kan man undgå akvaplaning, som fører til, at man mister kontrollen med bilen. Her er det vigtigt at holde øje med dybden i mønsteret. Som udgangspunkt har de fleste nye dæk en mønsterdybde på omkring en 8-9 mm. Denne slides dog ned efterhånden, og det er vigtigt at holde øje med, at den ikke bliver så lille, at mønsteret ikke længere kan lede vand væk effektivt. Loven kraver at mønsteret på sommerdæk er over 1,6 mm med de fleste eksperter, heriblandt FDM, anbefaler at skifte, når dybden er omkring 3 mm. En anden ting at holde øje med er holdbarheden. Dæk er produceret af forskellige typer og kvaliteter af gummi. Det har stor betydning for, hvor længe et dæk holder. Den sidste ting at overveje er dækkets rullemodstand, som har stor betydning for bilens benzinforbrug, og dette hjælpe selvfølgelig også økonomisk.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="content-header">Vinterdæk</h2>
                <p class="content-p">
                    Det er ikke lovpligtigt at have vinterdæk på i Danmark, men det er stærkt anbefalet af blandt andet FDM. Vinterdæk har en gummiblanding designet til at kunne fungere ved lave temperaturer og et dækmønster bestående af mange dele, der bevæger sig i forhold til hinanden, så det er selvrensende. Alt dette give bedre vejgreb og kortere bremselængder i sne og isglat føre. Dermed har man øget sin egen, sine passagerer og medtrafikanters sikkerhed. Man kan være fristet til at springe vinterdækkene over, men sne og is kan komme pludseligt i Danmark. Når vinteren først for alvor er sat ind, så er der rigtigt mange, der skal have skiftet dæk. Så det er en meget god idé at få skiftet i god tid. Vinterdæk er mærket med “M+S” og et bjerg- og snesymbol. Det er et lovkrav, at alle fire dæk er vinterdæk, så man skal skifte alle på samme tid, og kan ikke nøjes med et eller to. Hvis man skal udenfor landets grænser i vinteren, så er det nødvendigt at undersøge landenes regler for vinterdæk. F.eks. skal man i mange lande have vinterdæk på afhængigt en bestemt periode af året eller under nogle vejrforhold. Der kan også gælde andre forhold omkring pigdæk, som i Danmark er tilladt mellem den 1. November og 15. April. 
                </p>
            </div>
            <div class="col-sm-4 cover-2">
                <img src="{{ asset('index-page/cover3.jpg') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="content-header">Lassa - kvalitetsdæk som ikke ødelægger budgettet</h2>
                <p class="content-p">
                    Lassa blev grundlagt i 1974 og har produceret dæk i over 40 år, og er vokset fra Tykiets ledende dækproducent til nu at levere dæk til over 60 lande. I 1988 begynde Lassa et samarbejde med Japanske Bridgestone om produktion og udvikling af dækteknologi. De to mærker bliver i dag produceret i samme fabrikker. Dette foregår blandt andet en af verdens største på 361.000 m2 i Kocaeli. Lassa sig opdateret med den nyeste teknologi og udvikler konstant på deres dæk. Produktion i så stor skala og samarbejdet med nogle af de bedste i branchen gør, at Lassa kan levere dæk til en meget lav pris trods den høje kvalitet. De har et stort udbud af dæk til både sommer og vinter og til de fleste bilmærker.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid small-footer">
        <div class="row">
            <div class="col-md-6 col-md-offset-1 small-footer-wrap">
                <span class="content-footer-span">Nyhedsbrev</h3>
                <div class="small-footer-wrap-input">
                    <input class="input-footer" type="text" placeholder="Din e-mail">
                    <span class="input-footer-btn">></span>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-2 small-footer-wrap-2">
                <span class="content-footer-span">Følg os</span>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-md-1 footer-wrap">
                <ul class="footer-ul">
                    <li class="first-li">Kategorier</li>
                    <li class="li"><a href="#">Sommerdæk</a></li>
                    <li class="li"><a href="#">Vinterdæk</a></li>
                    <li class="li"><a href="#">Helårsdæk</a></li>
                </ul>
            </div>
            <div class="col-md-1 col-md-offset-1 footer-wrap">
                <ul class="footer-ul">
                    <li class="first-li">Information</li>
                    <li class="li"><a href="#">Nyheder</a></li>
                    <li class="li"><a href="#">Kontakt os</a></li>
                    <li class="li"><a href="#">Handelsbetingelser</a></li>
                    <li class="li"><a href="#">Om Os</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-md-offset-1 footer-wrap">
                <ul class="footer-ul">
                    <li class="first-li">Min konto</li>
                    <li class="li"><a href="#">Mine ordrer</a></li>
                    <li class="li"><a href="#">Mine kreditnotaer</a></li>
                    <li class="li"><a href="#">Mine adresser</a></li>
                    <li class="li"><a href="#">Mine oplysninger</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-md-offset-2">
                <div class="big-footer-wrap-info">
                    <ul class="footer-ul">
                        <li class="first-li">Butiksinformation</li>
                        <li class="li">
                            <span class="light-grey-color">Fire Dæk, Smedeland 7, st. 2600 Glostrup</span>
                        </li>
                        <li class="li">
                            <span class="light-grey-color">Ring til os:</span>
                            <span class="white-color-bold">32203218</span>
                        </li>
                        <li class="li">
                            <span class="light-grey-color">E-mail:</span>
                            <span class="white-color-bold">info@fire-daek.dk</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
