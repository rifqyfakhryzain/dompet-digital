<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div class="w-full max-w-md">
            
            <div class="relative overflow-hidden bg-white rounded-[2.5rem] shadow-2xl border border-slate-100">
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 h-32 flex items-center justify-center relative">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100">
                            <circle cx="10" cy="10" r="2" /> <circle cx="30" cy="20" r="2" />
                            <circle cx="50" cy="10" r="2" /> <circle cx="70" cy="30" r="2" />
                            <circle cx="90" cy="10" r="2" />
                        </svg>
                    </div>
                    <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>

                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-slate-800">Lupa Kata Sandi?</h2>
                        <p class="mt-3 text-sm text-slate-500 leading-relaxed">
                            {{ __('Masukkan email Anda dan kami akan mengirimkan tautan pemulihan.') }}
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-xs font-bold animate-pulse text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Alamat Email</label>
                            <x-text-input 
                                id="email" 
                                class="block w-full focus:ring-emerald-500" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                placeholder="nama@email.com"
                                required autofocus 
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
                        </div>

                        <div class="flex flex-col gap-4">
                            <button type="submit" class="w-full flex justify-center py-4 bg-slate-900 hover:bg-black text-white font-extrabold rounded-2xl shadow-lg transition-all active:scale-95">
                                {{ __('Kirim Tautan') }}
                            </button>

                            <a href="{{ route('login') }}" class="text-center text-xs font-bold text-slate-400 hover:text-emerald-600 transition-colors uppercase tracking-widest">
                                ← Kembali ke Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>