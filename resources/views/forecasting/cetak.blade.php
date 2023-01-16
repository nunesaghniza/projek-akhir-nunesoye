<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cetak Forecasting</title>
</head>
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    tr:nth-child(even) {
        background-color: #D6EEEE;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #a0a0a0;
        color: black;
    }
</style>
<script language="JavaScript">
    var tgl = new Date();
    var tahun = tgl.getFullYear() + 1;
    tanggallengkap = tahun;
</script>

<body>
    <div class="container">
        <div class="col">
            <center>
                <h3><b>
                        Laporan Peramalan Obat Bulan <?php
                        $bln = date('m');
                        $nbln = '';
                        if ($bln == '01') {
                            $nbln = 'Februari';
                        } elseif ($bln == '02') {
                            $nbln = 'Maret';
                        } elseif ($bln == '03') {
                            $nbln = 'April';
                        } elseif ($bln == '04') {
                            $nbln = 'Mei';
                        } elseif ($bln == '05') {
                            $nbln = 'Juni';
                        } elseif ($bln == '06') {
                            $nbln = 'Juli';
                        } elseif ($bln == '07') {
                            $nbln = 'Agustus';
                        } elseif ($bln == '08') {
                            $nbln = 'September';
                        } elseif ($bln == '09') {
                            $nbln = 'Oktober';
                        } elseif ($bln == '10') {
                            $nbln = 'November';
                        } elseif ($bln == '11') {
                            $nbln = 'Desember';
                        } elseif ($bln == '12') {
                            $nbln = 'Januari';
                        }
                        echo $nbln;
                        ?>
                        @if (date('m') == 12)
                            <script language='JavaScript'>
                                document.write(tanggallengkap);
                            </script>
                        @else
                            {{ date('Y') }}
                        @endif
                    </b></h3>
                <h2><b>Pada Puskesmas Karanganyar</b></h2>
            </center>
            <hr><br>
            <table class="center">
                <thead class>
                    <tr>
                        <th> No </th>
                        <th> Kode Obat </th>
                        <th> Nama Obat </th>
                        <th> Jenis Satuan </th>
                        <th> Forecasting </th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($tampil as $v)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $v['kd_obat'] }}</td>
                            <td>{{ $v['nama_obat'] }}</td>
                            <td>{{ $v['jenis_satuan'] }}</td>
                            <td>{{ $v['forecasting'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
