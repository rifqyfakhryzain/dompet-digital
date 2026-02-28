<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div class="w-full max-w-md">
            <div class="relative overflow-hidden bg-white rounded-[2.5rem] shadow-2xl border border-slate-100">
                
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 h-32 flex items-center justify-center relative">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100">
                            <circle cx="20" cy="20" r="2" /> <circle cx="40" cy="40" r="2" />
                            <circle cx="60" cy="20" r="2" /> <circle cx="80" cy="50" r="2" />
                        </svg>
                    </div>
                    <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-md shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                </div>

                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-slate-800">Sandi Baru</h2>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">
                            Silakan buat kata sandi baru yang kuat untuk mengamankan akun **E-Wallet** Anda.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <input type="hidden" name="email" value="{{ old('email', $request->email) }}">
                        
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Akun Email</label>
                            <div class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-500 shadow-inner">
                                {{ $request->email }}
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Kata Sandi Baru</label>
                            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Konfirmasi Sandi</label>
                            <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ml-1" />
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-black text-white font-extrabold rounded-2xl shadow-lg transition-all active:scale-95 flex justify-center items-center gap-2">
                                <span>Perbarui Kata Sandi</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-50" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center mt-6 text-xs text-slate-400 font-medium tracking-wide">
                © 2026 E-Wallet Kita. Sistem Keamanan Terenkripsi.
            </p>
        </div>
    </div>
</x-guest-layout>