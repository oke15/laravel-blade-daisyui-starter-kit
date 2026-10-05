@props(['category' => null])

@php
    $selectedColor = old('badge_color', $category?->badge_color?->value ?? 'neutral');
    $selectedVariant = old('badge_variant', $category?->badge_variant?->value ?? 'soft');
    $badgeColor = \App\Enums\BadgeColor::tryFrom($selectedColor) ?? \App\Enums\BadgeColor::Neutral;
    $badgeVariant = \App\Enums\BadgeVariant::tryFrom($selectedVariant) ?? \App\Enums\BadgeVariant::Soft;
@endphp

<div {{ $attributes->class('space-y-4') }}>
    <div class="space-y-2">
        <span class="label font-medium">Warna Badge</span>
        <div class="flex flex-wrap gap-x-4 gap-y-2">
            @foreach (\App\Enums\BadgeColor::cases() as $color)
                <label class="flex cursor-pointer items-center gap-2">
                    <input
                        type="radio"
                        name="badge_color"
                        value="{{ $color->value }}"
                        class="radio radio-sm {{ $color->radioClass() }}"
                        @checked($selectedColor === $color->value)
                    />
                    <span class="text-sm">{{ $color->label() }}</span>
                </label>
            @endforeach
        </div>
        <x-input-error :messages="$errors->get('badge_color')" class="mt-1" />
    </div>

    <div class="space-y-2">
        <span class="label font-medium">Varian Badge</span>
        <div class="flex flex-wrap gap-x-4 gap-y-2">
            @foreach (\App\Enums\BadgeVariant::cases() as $variant)
                <label class="flex cursor-pointer items-center gap-2">
                    <input
                        type="radio"
                        name="badge_variant"
                        value="{{ $variant->value }}"
                        class="radio radio-sm"
                        @checked($selectedVariant === $variant->value)
                    />
                    <span class="badge {{ $variant->badgeClass() }} badge-neutral text-xs">{{ $variant->label() }}</span>
                </label>
            @endforeach
        </div>
        <x-input-error :messages="$errors->get('badge_variant')" class="mt-1" />
    </div>

    <div class="space-y-2">
        <span class="label font-medium">Pratinjau</span>
        <div class="rounded-box border-base-content/10 bg-base-200 flex flex-wrap items-center gap-3 border p-4">
            <span
                id="badge-preview"
                class="badge {{ $badgeVariant->badgeClass() }} {{ $badgeColor->badgeClass() }} font-mono font-semibold"
            >{{ old('code', $category?->code) ?: 'KODE' }}</span>
            <span class="text-base-content/60 text-sm">Pratinjau badge kategori.</span>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        (function () {
            const preview = document.getElementById('badge-preview');
            const variantInputs = document.querySelectorAll('input[name="badge_variant"]');
            const codeInput = document.getElementById('code');
            if (!preview || variantInputs.length === 0) return;

            const syncBadge = () => {
                const color = document.querySelector('input[name="badge_color"]:checked')?.value ?? 'neutral';
                const variant = document.querySelector('input[name="badge_variant"]:checked')?.value ?? 'soft';
                preview.className =
                    'badge font-mono font-semibold badge-' + color + (variant === 'solid' ? '' : ' badge-' + variant);
            };

            const syncCode = () => {
                preview.textContent = (codeInput?.value || 'KODE').toUpperCase();
            };

            document
                .querySelectorAll('input[name="badge_color"]')
                .forEach((el) => el.addEventListener('change', syncBadge));
            variantInputs.forEach((el) => el.addEventListener('change', syncBadge));
            codeInput?.addEventListener('input', syncCode);
            syncBadge();
            syncCode();
        })();
    </script>
@endpush
