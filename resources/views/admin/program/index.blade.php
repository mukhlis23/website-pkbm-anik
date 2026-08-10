<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Kelola Program PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="fw-bold mb-0">
                Data Program
            </h4>

            <a href="{{ route('admin.program.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                Tambah Program

            </a>

        </div>

        <div class="card shadow border-0 rounded-4">

            <div class="card-header bg-primary text-white rounded-top-4">

                <h5 class="mb-0">

                    <i class="bi bi-mortarboard-fill me-2"></i>

                    Daftar Program PKBM ANIK

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="70">No</th>

                                <th width="180">Gambar</th>

                                <th>Nama Program</th>

                                <th>Deskripsi</th>

                                <th width="170" class="text-center">

                                    Aksi

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($programs as $program)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    @if($program->gambar)

                                        <img
                                            src="{{ asset('storage/'.$program->gambar) }}"
                                            class="rounded shadow-sm border"
                                            style="width:150px;height:95px;object-fit:cover;">

                                    @else

                                        <span class="badge bg-secondary">

                                            Tidak ada gambar

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <strong>

                                        {{ $program->nama_program }}

                                    </strong>

                                </td>

                                <td>

                                    {{ \Illuminate\Support\Str::limit($program->deskripsi,100) }}

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('admin.program.edit',$program->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.program.destroy',$program->id) }}"
                                          method="POST"
                                          class="d-inline delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
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

                                            Belum ada Program

                                        </h5>

                                        <p class="text-muted">

                                            Silakan tambahkan program terlebih dahulu.

                                        </p>

                                        <a href="{{ route('admin.program.create') }}"
                                           class="btn btn-primary">

                                            <i class="bi bi-plus-circle"></i>

                                            Tambah Program

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

            title:'Hapus Program?',

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