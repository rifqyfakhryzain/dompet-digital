@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-slate-200 rounded-2xl focus:border-emerald-500 focus:ring focus:ring-emerald-500/10 text-sm font-semibold text-slate-700 px-4 py-3 transition-all']) !!}>