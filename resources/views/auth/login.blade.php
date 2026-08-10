<x-guest-layout>


<div class="text-center mb-4">

    <h4 class="fw-bold">
        PKBM ANIK
    </h4>

    <p class="text-muted">
        Pusat Kegiatan Belajar Masyarakat
    </p>

</div>


<p class="text-center text-muted mb-4">

    Silakan login menggunakan akun administrator
    untuk mengelola website PKBM ANIK.

</p>



@if (session('status'))

<div class="alert alert-success">

    {{ session('status') }}

</div>

@endif



<form method="POST" action="{{ route('login') }}">

@csrf



<div class="mb-3">

    <label class="form-label">

        Email

    </label>


    <input 
        type="email"
        name="email"
        class="form-control"
        value="{{ old('email') }}"
        required
        autofocus>


    @error('email')

    <small class="text-danger">

        {{ $message }}

    </small>

    @enderror


</div>




<div class="mb-3">


    <label class="form-label">

        Password

    </label>


    <div class="input-group">


        <input 
            type="password"
            name="password"
            id="password"
            class="form-control"
            required>


        <button 
            type="button"
            class="btn btn-outline-secondary"
            onclick="togglePassword()">

            <i class="bi bi-eye"></i>

        </button>


    </div>



    @error('password')

    <small class="text-danger">

        {{ $message }}

    </small>

    @enderror


</div>





<div class="form-check mb-4">


<input 
    class="form-check-input"
    type="checkbox"
    name="remember"
    id="remember">


<label 
    class="form-check-label"
    for="remember">

    Ingat saya

</label>


</div>





<button class="btn btn-primary w-100 py-2">
    Masuk ke Dashboard
</button>

<div class="mt-8 text-center">

    <p class="font-semibold text-blue-700 mb-3">
        🔑 Lupa Akses Admin?
    </p>

    <p class="text-sm text-gray-600 leading-relaxed">
        Akun admin digunakan untuk mengelola informasi website PKBM ANIK.
        Jika mengalami kendala akses, silakan hubungi pengembang website.
    </p>

</div>

</form>


<script>

function togglePassword(){

    let password = document.getElementById('password');

    if(password.type === "password"){

        password.type="text";

    }else{

        password.type="password";

    }

}

</script>



</x-guest-layout>