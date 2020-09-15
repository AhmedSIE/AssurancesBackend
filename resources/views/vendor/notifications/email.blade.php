<style>
    .dl-sta dd{margin-left: 50%;  line-height:1.2rem; font-size: .9em; }
    .dl-sta dt{float:left; width:45%; padding: 0!important; overflow:hidden; clear:left; text-align:right; text-overflow:ellipsis; white-space:nowrap; line-height:1.2rem; font-size: .9em; }
    .text-danger{color:red;}
    .text-align{text-align:center;}
</style>
@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
<dl class="dl-sta">
    @foreach ($introLines as $line)
        {!! $line !!}
    @endforeach
</dl>

{{-- Outro Lines --}}
<dl class="dl-sta">
    @foreach ($outroLines as $line)
        {!! $line !!}
    @endforeach
</dl>


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Cordialement'),
<br><small><b class="text-uppercase">MINISTERE DU DEVELOPPEMENT DE L’ECONOMIE NUMERIQUE ET DES POSTES<b></small> <br>
@if (Auth::user()->role->name == "dcmef")
    <small><b>DIRECTION DE CONTROLE DES MARCHES ET ENGAGEMENTS FINANCIERS</b></small><br>
@else
    <small><b>DIRECTION GENERALE DES TECHNOLOGIES DE L'INFORMATION ET DE LA COMMUNICATION</b></small><br>
@endif
<div style="text-align:center!important">
    <img src="{{ asset('img/armoirie.png') }}" alt="Burkina Faso Officiel" style="height: 80px;" >
</div>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')

@endslot
@endisset
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
    © {{ date('Y') }} {{ config('app.name') }}. Super FOOTER!
@endcomponent
@endslot
@endcomponent
