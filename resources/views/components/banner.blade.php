@props(['style', 'display', 'fixed'])

@if(app('impersonate')->isImpersonating())

@php
$style = $style ?? config('filament-impersonate.banner.style');
$display = $display ?? Filament\Facades\Filament::getUserName(auth()->user());
$fixed = $fixed ?? config('filament-impersonate.banner.fixed');
@endphp

<style>
    html {
        margin-top: 50px;
    }

    #impersonate-banner {
        position: {{ $fixed ? 'fixed' : 'absolute' }};
        height: 50px;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        @if($style == 'dark')
        background-color: #1f2937;
        color: #f3f4f6;
        border-bottom: 1px solid #374151;
        @else
        background-color: #f3f4f6;
        color: #1f2937;
        @endif
    }

    #impersonate-banner a {
        display: block;
        margin-left: 20px;
        padding: 4px 20px;
        background-color: #d1d5db;
        color: #000;
        border-radius: 5px;
    }

    #impersonate-banner a:hover {
        @if($style == 'dark')
        background-color: #f3f4f6;
        @else
        background-color: #9ca3af;
        @endif
    }

    @media print{
        html {
            margin-top: 0;
        }

        #impersonate-banner {
            display: none;
        }
    }
</style>

<div id="impersonate-banner">
    <div>
        {{ __('Impersonating user') }} <strong>{{ $display }}</strong>
    </div>

    <a href="{{ route('filament-impersonate.leave') }}">{{ __('Leave') }}</a>
</div>
@endIf