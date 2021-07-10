<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-question-circle" aria-hidden="true"></i> <span class="title">{{__('FAQs')}}</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.faqs') }}" class="nav-link "> <span class="title">{{__('List FAQs')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.faq') }}" class="nav-link "> <span class="title">{{__('Add new FAQ')}}</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.faqs') }}" class="nav-link "> <span class="title">{{__('Sort FAQs')}}</span> </a> </li>
    </ul>
</li>