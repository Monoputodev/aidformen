@if(!empty(Auth::guard()->user()) > 0)

<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <a href="{{URL::to(config('global.prefix_name').'/dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>{{__('messages.Home')}}</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">settings_applications</i>
                    <span>{{__('messages.configuration')}}</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.settings.index') }}">{{__('messages.systemSetting')}}</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">Role</a></li>
                    <li><a href="{{ route('admin.permission.index') }}">Permission</a></li>
                    <li><a href="{{ route('admin.roles.permission.index') }}">Role Permission</a></li>
                    <li><a href="{{ route('admin.user.index') }}">{{__('messages.user')}}</a></li>
                    <li><a href="{{ route('admin.roles.user.index') }}">Role User</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">edit</i>
                    <span>Blog</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.category.index')}}">Category</a></li>
                    <li><a href="{{route('admin.blog.index')}}">Post</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>{{__('messages.HomeMenu')}}</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin.slider.index') }}">
                            {{__('messages.Slider')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.generalpages.index') }}">
                            {{__('messages.GeneralPages')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.team.index') }}">
                            Our People
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.notice.index') }}">
                            Notice
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonial.index') }}">
                            {{__('messages.Testimonial')}}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.media.index') }}">
                            Media Gallery
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.team.index') }}">
                            Team
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.donation.index') }}">
                            Donation Information
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.legal.index') }}">
                            Legal Status
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.location.index') }}">
                            Location Information
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.partner.index') }}">
                            Partner Information
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faq.index') }}">
                            {{__('messages.Faq')}}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>From Data</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{route('admin.forlegalaid.index')}}">For Legal Aid</a></li>
                    <li><a href="{{route('admin.legalaidpanel.index')}}">Legal Aid Panel</a></li>
                    <li><a href="{{route('admin.membership.index')}}">Membership</a></li>
                </ul>
            </li>
        </ul>
    </div>

</aside>
@endif