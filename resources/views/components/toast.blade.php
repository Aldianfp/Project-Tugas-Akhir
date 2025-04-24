@push('scripts')
    @if (session('success'))
        <script>
            $(function() {
                toastr.success('{{ session('success') }}', 'Berhasil!')
            })
        </script>
    @elseif(session('error'))
        <script>
            $(function() {
                toastr.error('{{ session('error') }}', 'Gagal!')
            })
        </script>
    @endif
    <script>
        $(function() {
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Menekan tombol ini akan menghilangkan data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
@endpush
