<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Kelola Informasi PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        {{-- Judul --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold mb-0">

                Data Informasi

            </h4>

            <a href="{{ route('admin.informasi.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                Tambah Informasi

            </a>

        </div>

        {{-- Card --}}
        <div class="card shadow border-0 rounded-4">

            <div class="card-header bg-primary text-white rounded-top-4">

                <h5 class="mb-0">

                    <i class="bi bi-newspaper me-2"></i>

                    Daftar Informasi PKBM ANIK

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="70">
                                    No
                                </th>

                                <th>
                                    Judul
                                </th>

                                <th width="170">
                                    Kategori
                                </th>

                                <th width="170">
                                    Tanggal
                                </th>

                                <th width="180" class="text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($informasis as $informasi)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    <strong>

                                        {{ $informasi->judul }}

                                    </strong>

                                </td>

                                <td>

                                    @if($informasi->kategori=='Berita')

                                        <span class="badge bg-primary">

                                            Berita

                                        </span>

                                    @elseif($informasi->kategori=='Pengumuman')

                                        <span class="badge bg-success">

                                            Pengumuman

                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">

                                            Kegiatan

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('admin.informasi.edit',$informasi->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.informasi.destroy',$informasi->id) }}"
                                          method="POST"
                                          class="d-inline delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                                class="btn btn-danger btn-sm btn-delete">

                                            <i class="bi bi-trash"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5">

                                    <div class="text-center py-5">

                                        <i class="bi bi-folder-x display-4 text-secondary"></i>

                                        <h5 class="mt-3">

                                            Belum ada Informasi

                                        </h5>

                                        <p class="text-muted">

                                            Silakan tambahkan informasi terlebih dahulu.

                                        </p>

                                        <a href="{{ route('admin.informasi.create') }}"
                                           class="btn btn-primary">

                                            <i class="bi bi-plus-circle"></i>

                                            Tambah Informasi

                                        </a>

                                    </div>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

<script>

document.querySelectorAll('.btn-delete').forEach(function(button){

    button.addEventListener('click',function(){

        Swal.fire({

            title:'Hapus Informasi?',

            text:'Data yang dihapus tidak dapat dikembalikan.',

            icon:'warning',

            showCancelButton:true,

            confirmButtonColor:'#dc3545',

            cancelButtonColor:'#6c757d',

            confirmButtonText:'Ya, Hapus',

            cancelButtonText:'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                button.closest('form').submit();

            }

        });

    });

});

</script>

</x-app-layout>