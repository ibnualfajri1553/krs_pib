<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Rencana Studi - {{ $krs->mahasiswa->nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12px;
            margin: 30px;
        }

        .kop-table {
            width: 100%;
            margin-bottom: 5px;
        }

        .kop-logo {
            width: 85px;
            height: 85px;
        }

        .kop-title {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 1px 1px 1px #999;
        }

        .kop-subtitle {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 1px 1px 1px #999;
        }

        .kop-info {
            font-size: 11px;
            margin-top: 3px;
        }

        .line-bold {
            border-bottom: 2px solid #000;
            margin-top: 4px;
        }

        .line-thin {
            border-bottom: 0.8px solid #000;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 6px;
            font-size: 12px;
            border: 1px solid #000;
        }

        .no-border td {
            border: none;
            padding: 4px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .ttd-block {
            width: 100%;
            margin-top: 50px;
        }

        .ttd-cell {
            width: 45%;
            text-align: center;
        }

        .ttd-date {
            text-align: right;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    {{-- KOP SURAT --}}
    <table class="kop-table">
        <tr>
            <td style="width: 100px;">
                <img src="{{ public_path('images/logo.png') }}" class="kop-logo" alt="Logo">
            </td>
            <td class="text-center">
                <div class="kop-title">YAYASAN PENDIDIKAN BUNGA KALIMANTAN</div>
                <div class="kop-subtitle">POLITEKNIK INDONESIA BANJARMASIN</div>
                <div class="kop-info">
                    Akta Pendirian No.78 Tanggal 17 Juli 2002 dan Kemenkumham No.C-1054.HT.01.02.TH 2005<br>
                    Alamat: Jl. Brigjend. H. Hasan Basri No. 4D RT. 14 Banjarmasin
                </div>
            </td>
        </tr>
    </table>

    <div class="line-bold"></div>
    <div class="line-thin"></div>

    {{-- JUDUL --}}
    <h3 class="text-center" style="margin-top: 20px; margin-bottom: 5px;">KARTU RENCANA STUDI (KRS)</h3>
    <p class="text-center">Tahun Akademik {{ $krs->tahunAkademik->tahun }} ({{ ucfirst($krs->tahunAkademik->semester) }})</p>

    {{-- BIODATA MAHASISWA --}}
    <table class="no-border">
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{ $krs->mahasiswa->nama }}</td>
            <td><strong>NIM</strong></td>
            <td>: {{ $krs->mahasiswa->nim }}</td>
        </tr>
        <tr>
            <td><strong>Program Studi</strong></td>
            <td>: {{ $krs->mahasiswa->prodi->nama_prodi }}</td>
            <td><strong>Semester</strong></td>
            <td>: {{ $krs->mahasiswa->semester }}</td>
        </tr>
    </table>

    {{-- TABEL MATA KULIAH --}}
    <h4 style="margin-top: 20px;">Mata Kuliah</h4>
    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 20%">Kode</th>
                <th>Nama Mata Kuliah</th>
                <th style="width: 10%">SKS</th>
            </tr>
        </thead>
        <tbody>
            @php $totalSks = 0; @endphp
            @foreach ($krs->details as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->mataKuliah->kode_mk }}</td>
                    <td>{{ $detail->mataKuliah->nama }}</td>
                    <td>{{ $detail->mataKuliah->sks }}</td>
                </tr>
                @php $totalSks += $detail->mataKuliah->sks; @endphp
            @endforeach
            <tr>
                <td colspan="3" class="text-end"><strong>Total SKS</strong></td>
                <td><strong>{{ $totalSks }}</strong></td>
            </tr>
        </tbody>
    </table>

    {{-- TANDA TANGAN DIREKTUR & WADIR --}}
    <div class="ttd-date">Banjarmasin, {{ now()->translatedFormat('d F Y') }}</div>

    <table class="ttd-block">
        <tr>
            <td class="ttd-cell">
                Mengetahui,<br>
                Direktur<br><br><br><br>
                <strong>Yerika Elok N., S.Si.T., M.M.</strong>
            </td>
            <td class="ttd-cell">
                Wadir I<br><br><br><br>
                <strong>Agus Sulistyo N., S.S.T., M.Psi</strong>
            </td>
        </tr>
    </table>

</body>
</html>
