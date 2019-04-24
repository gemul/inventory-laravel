<html>

<head>
    <title>Laporan Stok Barang (Sistem Manajemen Inventory Labkom)</title>
    <meta name="author" content="Gema Ulama Putra">
    <meta name="keywords" content="Laporan Stok Barang. Dicetak pada <?php echo date('Y-m-d_H:i:s'); ?>">
</head>

<body>
    <div class='judul'>Laporan Stok</div>
    <div class='subjudul'>Sistem Informasi Inventaris Labkom</div>
    <div class='tanggal'>Dicetak : <?php echo date('Y-m-d H:i:s'); ?></div>
    <table class='tabeldata'>
        <thead>
            <tr>
                <th width=20>No</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th width=40 align='right'>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($data as $item) {
                echo "
                    <tr>
                        <td>" . $i . "</td>
                        <td>" . $item['kategori'] . "</td>
                        <td>" . $item['nama'] . "</td>
                        <td align='right'>" . $item['stok'] . "</td>
                    </tr>
                ";
                $i++;
            }
            ?>
        </tbody>
    </table>
    <div class='jarak'></div>
</body>
<style>
    .judul {
        font-family: 'Helvetica';
        text-align: center;
        font-size: 2em;
    }

    .subjudul {
        font-family: 'Helvetica';
        text-align: center;
    }

    .tanggal {
        font-family: 'Helvetica';
        text-align: right;
        font-size: 0.6em;
    }

    table.tabeldata {
        width: 100%;
        border-collapse: collapse;
    }

    table.tabeldata th,
    table.tabeldata td {
        font-size: 0.8em;
        font-family: 'Helvetica';
        border: 1px solid #605ca8;
        padding: 4px;
    }

    table.tabeldata th {
        background-color: #605ca8;
        color: #ffffff;
    }

    table.tabeldata td {}

    .jarak {
        height: 20px;
    }

    table.tabelttd {
        border-collapse: collapse;
        width: 100%;
    }

    table.tabelttd td {
        border: 1px solid #000;
        font-size: 0.8em;
        font-family: 'Helvetica';
    }

    table.tabelttd td:nth-child(1) {
        width: 30%;
        font-size: 0.8em;
        font-family: 'Helvetica';
    }

    table.tabelttd td:nth-child(2) {
        width: 40%;
    }

    table.tabelttd td:nth-child(3) {
        width: 30%;
        text-align: center;
    }
</style>

</html>