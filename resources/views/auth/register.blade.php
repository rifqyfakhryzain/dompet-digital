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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">E-Wallet Kita</span>
                    </div>
                    <h1 class="text-4xl font-extrabold text-white leading-tight">Mulai Perjalanan Finansial Anda.</h1>
                    <p class="mt-4 text-emerald-50 text-lg">Bergabunglah dengan ribuan pengguna lainnya yang telah cerdas mengelola pengeluaran mereka.</p>
                </div>

                <div class="relative z-10 bg-white/10 p-6 rounded-2xl border border-white/20 backdrop-blur-sm shadow-xl italic text-emerald-50 text-sm">
                    "Satu langkah lagi menuju pengelolaan keuangan yang lebih rapi dan terukur."
                </div>
            </div>

            <div class="w-full md:w-1/2 bg-white p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800">Buat Akun</h2>
                    <p class="text-gray-500 mt-2">Daftar gratis hanya dalam beberapa detik.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full px-4 py-2.5 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="Masukkan nama lengkap">
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-2.5 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="Minimal 8 karakter">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-2.5 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none"
                            placeholder="Ulangi password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-4 bg-[#0f172a] hover:bg-black text-white font-bold rounded-xl shadow-xl transition-all active:scale-[0.98]">
                            DAFTAR SEKARANG
                        </button>
                    </div>

                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-500">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-emerald-600 font-bold hover:underline">Masuk di Sini</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>