@if(APAuthHelp::check(['SUP_ADM']))
<li class="heading">
    <h3 class="uppercase">{{__('Admin Users')}}</h3>
</li>
<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">{{__('Admin Users')}}</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.admin.users') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">{{__('List All Admin Users')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.admin.user') }}" class="nav-link "> <i class="icon-users"></i> <span class="title">{{__('Add Admin User')}}</span> </a> </li>
    </ul>
</li>
@endif