@if(!Auth::user() && !Auth::guard('company')->user())
<div class="emploginbox">
	<div class="container">		
		<div class="titleTop">
			<div class="subtitle">{{__('Are You Looking For Candidates?')}}</div>
           <h3>{{__('Post a Job Today')}}  </h3>
			<h4>{{__('and hire the right Candidates')}}</h4>
        </div>
		<p>{{__('We have incredible candidates with the most diverse skills. Do not doubt that it will be a great hiring!')}}</p>
		<div class="viewallbtn"><a href="{{route('register')}}">{{__('Post a Job')}}</a></div>
	</div>
</div>
@endif