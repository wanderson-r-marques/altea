<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="title">{{__('Pages')}}</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.cms') }}" class="nav-link "> <span class="title">{{__('List C.M.S Pages')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.cms') }}" class="nav-link "> <span class="title">{{__('Add new C.M.S Page')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('list.cmsContent') }}" class="nav-link "> <span class="title">{{__('List Translated Pages')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.cmsContent') }}" class="nav-link "> <span class="title">{{__('Add new Translate Page')}}</span> </a> </li>
    </ul>
</li>