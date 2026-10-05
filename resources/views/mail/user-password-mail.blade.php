<x-mail::message>
# Kredensial Akun Pengguna

Halo **{{ $user->name }}**,

Akun pengguna Anda untuk **{{ config('app.name') }}** telah berhasil dibuat. Berikut adalah detail akun Anda:

<x-mail::panel>
<x-mail::table>
| | |
|:-------------|:---------|
| **Email** | {{ $user->email }} |
| **Kata Sandi** | {{ $password }} |
</x-mail::table>
</x-mail::panel>

Silakan masuk di [{{ config('app.url') }}]({{ config('app.url') }}) dan segera ubah kata sandi Anda demi keamanan akun.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>