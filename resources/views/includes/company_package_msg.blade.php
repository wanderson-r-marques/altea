<div class="instoretxt">
    <div class="credit">{{__('Your Package is')}}: <strong>{{$package->package_title}} - {{ ($siteSetting->default_currency_code == 'BRL') ? 'R$' : '$siteSetting->default_currency_code' }} {{number_format($package->package_price,2,",",".")}}</strong></div>
    <div class="credit">{{__('Package Duration')}} : <strong>{{Auth::guard('company')->user()->package_start_date->format('d/m/Y')}}</strong> - <strong>{{Auth::guard('company')->user()->package_end_date->format('d/m/Y')}}</strong></div>
    <div class="credit">{{__('Availed quota')}} : <strong>{{Auth::guard('company')->user()->availed_jobs_quota}}</strong> / <strong>{{Auth::guard('company')->user()->jobs_quota}}</strong></div>
</div>
