<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-slate-800">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-2 text-sm text-slate-500 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    {{-- Tombol Pemicu Modal --}}
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 rounded-2xl shadow-lg shadow-rose-100 font-bold tracking-wide"
    >
        {{ __('Hapus Akun Saya') }}
    </x-danger-button>

    {{-- Modal Konfirmasi --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-[2.5rem]">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-slate-800">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-3 text-sm text-slate-500 leading-relaxed">
                {{ __('Tindakan ini tidak dapat dibatalkan. Harap masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full md:w-3/4"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="justify-center py-3 rounded-2xl border-slate-200 font-bold text-slate-600">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="justify-center py-3 rounded-2xl shadow-lg shadow-rose-100 font-bold">
                    {{ __('Ya, Hapus Permanen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>