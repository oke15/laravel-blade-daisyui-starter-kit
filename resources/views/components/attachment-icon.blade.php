@props(['icon' => 'file', 'color' => 'text-base-content/60'])

<svg
    xmlns="http://www.w3.org/2000/svg"
    class="shrink-0 size-5 {{ $color }}"
    viewBox="0 0 24 24"
    stroke-width="2"
    stroke="currentColor"
    fill="none"
    stroke-linecap="round"
    stroke-linejoin="round"
>
    @switch ($icon)
        @case ('file-text')
            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path>
            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
            <path d="M10 9H8"></path>
            <path d="M16 13H8"></path>
            <path d="M16 17H8"></path>
            @break
        @case ('file-spreadsheet')
            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path>
            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
            <path d="M8 13h2"></path>
            <path d="M14 13h2"></path>
            <path d="M8 17h2"></path>
            <path d="M14 17h2"></path>
            @break
        @case ('image')
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <circle cx="9" cy="9" r="2"></circle>
            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
            @break
        @default
            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path>
            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
            @break
    @endswitch
</svg>
