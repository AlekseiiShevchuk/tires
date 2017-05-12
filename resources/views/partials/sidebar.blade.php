@inject('request', 'Illuminate\Http\Request')
<ul class="nav" id="side-menu">

    <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
        <a href="{{ url('/') }}">
            <i class="fa fa-wrench"></i>
            <span class="title">@lang('quickadmin.qa_dashboard')</span>
        </a>
    </li>

    
            @can('user_management_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('find_tires_by_car_number_access')
            <li class="{{ $request->segment(1) == 'find_tires_by_car_numbers' ? 'active' : '' }}">
                <a href="{{ route('find_tires_by_car_numbers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.find-tires-by-car-number.title')</span>
                </a>
            </li>
            @endcan
            
            @can('car_brand_access')
            <li class="{{ $request->segment(1) == 'car_brands' ? 'active' : '' }}">
                <a href="{{ route('car_brands.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.car-brands.title')</span>
                </a>
            </li>
            @endcan
            
            @can('car_model_access')
            <li class="{{ $request->segment(1) == 'car_models' ? 'active' : '' }}">
                <a href="{{ route('car_models.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.car-models.title')</span>
                </a>
            </li>
            @endcan
            
            @can('car_number_access')
            <li class="{{ $request->segment(1) == 'car_numbers' ? 'active' : '' }}">
                <a href="{{ route('car_numbers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.car-numbers.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tire_access')
            <li class="{{ $request->segment(1) == 'tires' ? 'active' : '' }}">
                <a href="{{ route('tires.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tires.title')</span>
                </a>
            </li>
            @endcan
            
            @can('shop_block_access')
            <li class="{{ $request->segment(1) == 'shop_blocks' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-angle-right"></i>
                    <span class="title">@lang('quickadmin.shop-block.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tire_brand_access')
            <li class="{{ $request->segment(1) == 'tire_brands' ? 'active' : '' }}">
                <a href="{{ route('tire_brands.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tire-brands.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tire_size_access')
            <li class="{{ $request->segment(1) == 'tire_sizes' ? 'active' : '' }}">
                <a href="{{ route('tire_sizes.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tire-sizes.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tire_product_access')
            <li class="{{ $request->segment(1) == 'tire_products' ? 'active' : '' }}">
                <a href="{{ route('tire_products.index') }}">
                    <i class="fa fa-dot-circle-o"></i>
                    <span class="title">@lang('quickadmin.tire-products.title')</span>
                </a>
            </li>
            @endcan


            @can('contact_subject_access')
            <li class="{{ $request->segment(1) == 'contacts-subjects' ? 'active' : '' }}">
                <a href="{{ route('contacts-subjects.index') }}">
                    <i class="fa fa-dot-circle-o"></i>
                    <span class="title">@lang('quickadmin.contacts-subjects.title')</span>
                </a>
            </li>
            @endcan
            

    

    

    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
        <a href="{{ route('auth.change_password') }}">
            <i class="fa fa-key"></i>
            <span class="title">Change password</span>
        </a>
    </li>

    <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
</ul>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
