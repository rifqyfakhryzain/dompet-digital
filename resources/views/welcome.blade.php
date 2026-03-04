<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Wallet Kita - Kelola Keuangan Modern</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-[#0f172a] text-white">
    <nav class="fixed w-full z-50 bg-[#0f172a]/80 backdrop-blur-lg border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-emerald-500 p-2 rounded-xl shadow-lg shadow-emerald-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight text-white">E-Wallet<span
                        class="text-emerald-500">Kita</span></span>
            </div>

            <div class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm font-bold text-slate-400 hover:text-emerald-400 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold text-slate-400 hover:text-emerald-400 transition">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="bg-emerald-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-emerald-600 transition shadow-lg shadow-emerald-500/20">Daftar</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="relative pt-40 pb-20 px-6 overflow-hidden">
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-emerald-500/10 blur-[120px] rounded-full -z-10">
        </div>

        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div
                    class="inline-flex items-center gap-2 bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6 border border-emerald-500/20">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    Sistem Keuangan Terenkripsi
                </div>
                <h1 class="text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6">
                    Kelola Uang <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400 italic">Makin
                        Sat-Set.</span>
                </h1>
                <p class="text-lg text-slate-400 leading-relaxed mb-10 max-w-lg">
                    Pantau arus kas Anda dengan tampilan **Clean & Modern**. Sama persis seperti yang Anda lihat di
                    dashboard pribadi Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 items-center">
                    <a href="{{ route('register') }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold rounded-2xl shadow-xl shadow-emerald-500/20 transition-all hover:-translate-y-1">
                        Mulai Sekarang — Gratis
                    </a>
                    <div class="flex items-center gap-3 px-6 py-4">
                        <div class="flex -space-x-2">
                            <img class="w-9 h-9 rounded-full border-2 border-[#0f172a] bg-slate-700"
                                src="https://ui-avatars.com/api/?name=R&background=10b981&color=fff" alt="">
                            <img class="w-9 h-9 rounded-full border-2 border-[#0f172a] bg-slate-700"
                                src="https://ui-avatars.com/api/?name=Z&background=0f172a&color=fff" alt="">
                        </div>
                        <span class="text-xs font-semibold text-slate-400 leading-tight">Bergabung dengan<br>1,000+
                            Pengguna</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative bg-white/5 rounded-[3rem] p-4 shadow-2xl border border-white/10 backdrop-blur-sm">
                    <div class="bg-slate-50 rounded-[2.5rem] overflow-hidden shadow-inner">
                        <div class="p-6 bg-white border-b border-slate-100 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                            </div>
                            <div class="h-6 w-20 bg-slate-100 rounded-full"></div>
                        </div>

                        <div class="p-6 space-y-6 bg-white">
                            <div class="bg-[#1e293b] rounded-[2rem] p-6 text-white relative overflow-hidden">
                                <div class="relative z-10">
                                    <p class="text-[10px] opacity-60 uppercase tracking-widest font-bold">Saldo Tersedia
                                    </p>
                                    <p class="text-3xl font-bold mt-1">Rp 613.000</p>
                                    <div
                                        class="mt-4 flex items-center gap-2 text-[10px] text-emerald-400 font-bold uppercase">
                                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                        Aktif & Aman
                                    </div>
                                </div>
                                <svg class="absolute right-[-20px] bottom-[-20px] w-32 h-32 opacity-10"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z" />
                                </svg>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                                    <div
                                        class="w-6 h-6 bg-emerald-500 rounded-lg mb-2 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                        </svg>
                                    </div>
                                    <p class="text-[8px] font-bold text-emerald-600 uppercase">Pemasukan</p>
                                    <p class="text-sm font-black text-emerald-900 mt-0.5">Rp 1.000k</p>
                                </div>
                                <div class="p-4 bg-red-50 rounded-2xl border border-red-100">
                                    <div class="w-6 h-6 bg-red-500 rounded-lg mb-2 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                        </svg>
                                    </div>
                                    <p class="text-[8px] font-bold text-red-600 uppercase">Pengeluaran</p>
                                    <p class="text-sm font-black text-red-900 mt-0.5">Rp 387k</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 border-t border-white/5 text-center relative overflow-hidden">
        <p class="text-sm text-slate-500 font-medium tracking-wide">
            © 2026 <span class="text-white">E-Wallet Kita</span>
        </p>
    </footer>

</body>

</html>
