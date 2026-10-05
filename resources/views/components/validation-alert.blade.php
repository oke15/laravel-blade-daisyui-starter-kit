@if ($errors->any())
    <div role="alert" class="alert alert-error alert-vertical sm:alert-horizontal mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        <div>
            <h3 class="font-bold">Periksa kembali isian Anda</h3>
            <ul class="list-disc space-y-1 ps-4 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
