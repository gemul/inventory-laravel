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
    <table>
        <thead>
            <tr>
                <th width=20>No</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        font-size:0.8em;
        font-family: 'Helvetica';
        border: 1px solid #605ca8;
    }

    table th {
        background-color: #605ca8;
        color: #ffffff;
        padding:2px;
    }
</style>

</html>