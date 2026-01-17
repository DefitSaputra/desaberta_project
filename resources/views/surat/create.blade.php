<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-berta-cream leading-tight">
            {{ __('Buat Pengajuan Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-berta-dark border border-berta-sage/10 overflow-hidden shadow-xl sm:rounded-2xl relative">
                
                <div class="absolute top-0 right-0 w-40 h-40 bg-berta-olive/10 rounded-full blur-3xl -z-10"></div>

                <div class="p-8 text-berta-cream">
                    
                    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="letter_type_id" :value="__('Jenis Surat')" />
                            <select id="letter_type_id" name="letter_type_id" class="block mt-1 w-full bg-berta-wood/10 border-berta-sage/20 rounded-md shadow-sm text-berta-cream focus:border-berta-olive focus:ring focus:ring-berta-olive focus:ring-opacity-50" required>
                                <option value="" class="bg-berta-dark text-gray-400">-- Pilih Jenis Surat --</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" class="bg-berta-dark">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-berta-sage/60">Pilih jenis dokumen yang Anda butuhkan.</p>
                        </div>

                        <div>
                            <x-input-label for="lampiran" :value="__('Lampiran (KTP/KK)')" />
                            <input id="lampiran" name="lampiran" type="file" class="block mt-1 w-full text-sm text-berta-sage
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-berta-olive file:text-berta-cream
                                hover:file:bg-berta-wood
                                cursor-pointer bg-berta-wood/10 rounded-lg border border-berta-sage/20
                            " />
                            <p class="mt-1 text-xs text-berta-sage/60">Format: JPG, PNG, atau PDF. Maksimal 2MB.</p>
                        </div>

                        <div>
                            <x-input-label for="keterangan" :value="__('Keterangan Tambahan (Opsional)')" />
                            <textarea id="keterangan" name="keterangan" rows="4" class="block mt-1 w-full bg-berta-wood/10 border-berta-sage/20 rounded-md shadow-sm text-berta-cream focus:border-berta-olive focus:ring focus:ring-berta-olive focus:ring-opacity-50 placeholder-berta-sage/30" placeholder="Contoh: Untuk keperluan melamar pekerjaan..."></textarea>
                        </div>

                        <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-berta-sage/10">
                            <a href="{{ route('dashboard') }}" class="text-sm text-berta-sage hover:text-berta-cream transition">
                                Batal
                            </a>
                            <x-primary-button class="bg-gradient-to-r from-berta-olive to-berta-wood hover:to-berta-olive shadow-lg shadow-berta-olive/20">
                                {{ __('Kirim Pengajuan') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>