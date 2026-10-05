<x-mail::message>
# Reset Kata Sandi

Halo **{{ $user->name }}**,

Kami menerima permintaan untuk mengatur ulang kata sandi akun **{{ config('app.name') }}** Anda. Klik tombol di bawah ini untuk membuat kata sandi baru.

<x-mail::button :url="$url">
Reset Kata Sandi
</x-mail::button>

Tautan ini akan kedaluwarsa dalam **{{ $expire }} menit**.

Jika Anda tidak meminta pengaturan ulang kata sandi, abaikan email ini dan tidak ada tindakan lebih lanjut yang diperlukan.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
