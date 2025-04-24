<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            margin: 0;
            padding: 0;
            font-size: 12px !important;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            /* padding: 5px; */
            /* background-color: #fff; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            margin: 0;
            color: #333;
        }

        .project-details {
            margin-bottom: 30px;
        }

        .project-details h2 {
            color: #444;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .project-details .details p {
            margin: 0;
            padding: 5px 0;
            font-size: 16px;
        }

        .tables .table-section {
            margin-bottom: 30px;
        }

        .table-section h2 {
            color: #444;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #f9f9f9;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Laporan Keuangan</h1>
        </header>

        <section class="project-details">
            <h2>Detail Portofolio</h2>
            <div class="details">
                <p><strong>Nama Portofolio:</strong> {{ $proyek->nama }}</p>
                <p><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</p>
                {{-- <p><strong>Tanggal Mulai:</strong> {{ $proyek->tanggal_mulai->translatedFormat('d/m/Y') }}</p> --}}
                {{-- <p><strong>Tanggal Akhir:</strong> {{ $proyek->tanggal_akhir->translatedFormat('d/m/Y') }}</p> --}}
            </div>
        </section>

        <section class="tables">
            @if ($kategori === 'semua' || $kategori === 'pemasukan')
                <div class="table-section">
                    <h2>Pemasukan</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Jumlah (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pemasukan as $pms)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pms->kode }}</td>
                                    <td>{{ $pms->tanggal }}</td>
                                    <td>{{ $pms->uraian }}</td>
                                    <td>Rp {{ number_format($pms->jumlah, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total</td>
                                <td>Rp {{ $pemasukan ? number_format($pemasukan->sum('jumlah'), 0, ',', '.') : '0' }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif

            @if ($kategori === 'semua' || $kategori === 'pengeluaran')
                <div class="table-section">
                    <h2>Pengeluaran</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Jumlah (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengeluaran as $png)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $png->kode }}</td>
                                    <td>{{ $png->tanggal }}</td>
                                    <td>{{ $png->uraian }}</td>
                                    <td>Rp {{ number_format($png->jumlah, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total</td>
                                <td>Rp
                                    {{ $pengeluaran ? number_format($pengeluaran->sum('jumlah'), 0, ',', '.') : '0' }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
        </section>
    </div>
</body>

</html>
