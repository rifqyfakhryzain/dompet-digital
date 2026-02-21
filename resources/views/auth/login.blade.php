<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#0f172a] relative overflow-hidden">
        
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-emerald-500/20 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-cyan-500/20 blur-[120px]"></div>

        <div class="relative w-full max-w-[1100px] flex flex-col md:flex-row m-4 shadow-2xl rounded-[32px] overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md">
            
            <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-emerald-600 to-teal-700 p-12 flex-col justify-between relative">
                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-8">
                        <div class="p-2 bg-white/20 rounded-lg backdrop-blur-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">E-Wallet Kita</span>
                    </div>
                    <h1 class="text-4xl font-extrabold text-white leading-tight">Kelola Keuangan dalam Genggaman.</h1>
                    <p class="mt-4 text-emerald-50 text-lg">Pantau pemasukan dan pengeluaran Anda secara real-time dengan sistem keamanan berlapis.</p>
                </div>
            </div>

            <div class="w-full md:w-1/2 bg-white p-8 md:p-16 flex flex-col justify-center">
                <div class="mb-10 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang</h2>
                    <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda</p>
                </div>

                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <label class="text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Lupa?</a>
                            @endif
                        </div>
                        <input type="password" name="password" required
                            class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </div>

                    <button type="submit" class="w-full py-4 bg-[#0f172a] hover:bg-black text-white font-bold rounded-xl shadow-xl transition-all active:scale-[0.98]">
                        MASUK KE DASHBOARD
                    </button>

                    <div class="text-center mt-8">
                        <p class="text-sm text-gray-500">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-emerald-600 font-bold hover:underline">Daftar Sekarang</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>