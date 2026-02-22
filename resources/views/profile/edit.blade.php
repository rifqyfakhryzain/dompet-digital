<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Pengaturan Profil</h2>
            <p class="text-sm text-slate-500">Kelola informasi akun dan keamanan kata sandi Anda.</p>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <div class="p-8 bg-white shadow-sm border border-slate-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow-sm border border-slate-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow-sm border border-rose-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>