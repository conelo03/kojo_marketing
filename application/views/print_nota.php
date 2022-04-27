<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-size: 8px;
            font-family: 'Times New Roman';
        }

        table thead th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }

        table tbody th {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 30px;
            max-width: 30px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
    <title>Cetak Struk</title>
</head>

<body>
    <div class="ticket">
        <!-- <img src="<?= base_url() ?>/assets/images/logo2.png" alt="Logo"> -->
        <p class="centered">TB LIMA ABADI
            <br>Cirebon</p>
        <br>
        <table width="100%" border="0">
            <tr>
                <td>Transaksi</td>
                <td>:</td>
                <td><?= $bk['id_penjualan'] ?></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><?= $bk['atas_nama'] ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= date('d-m-Y', strtotime($bk['tanggal'])) ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $bk['keterangan'] ?></td>
            </tr>
        </table>

        <table width="100%">
            <thead>
                <tr>
                    <th class="description">Item</th>
                    <th class="quantity">Qty</th>
                    <th class="price">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $data) { ?>
                    <tr>
                        
                        <td class="description"><?= $data['nama_bolu'] ?></td>
                        <td class="quantity" style="text-align: center;"><?= $data['jumlah'] .' '.$data['satuan'] ?></td>
                        <td class="quantity" style="text-align: right;"><?= number_format($data['harga_subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th class="description">Total</th>
                    <th class="quantity"></th>
                    <th class="price" style="text-align: right;"><?= number_format($bk['harga_total'], 0, ',', '.') ?></th>
                </tr>
                <tr>
                    <th class="description">Bayar</th>
                    <th class="quantity"></th>
                    <th class="price" style="text-align: right;"><?= number_format($bk['bayar'], 0, ',', '.') ?></th>
                </tr>
                <tr>
                    <th class="description">Sisa</th>
                    <th class="quantity"></th>
                    <th class="price" style="text-align: right;"><?= number_format($bk['harga_total']-$bk['bayar'], 0, ',', '.') ?></th>
                </tr>
            </tbody>
        </table>
        <br>
        <p class="centered">POWERED By TB LIMA ABADI</p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>
</body>

</html>