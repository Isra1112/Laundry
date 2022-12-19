<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>.:: Laporan Pemasukan Harian Laundry ::.</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;

        }

        body {
            background: #fff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 20px;
            color: #666;
            margin: 1rem 2rem;
        }

        #judul {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
            margin-top: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr {
            height: 40px;
        }

        td,
        th {
            border: 1px solid #d7d7d7;
            font-size: 14px;
            text-align: left;
            padding: 10px;
        }

        th {
            color: black;
        }

        th {
            color: black;
        }
    </style>


<body>


    <div id='contentwrapper' class='contentwrapper'>
        <div id="judul">
            <br />
            <br />
            <font size="+3">LAPORAN PEMASUKAN HARIAN MS Laundry </font><br />
            Jln Raya Tapos Ruko Permata Cimanggis<br />
            Hp. 088787277 Email : outlet@isra-km.my.id Website : www.isra-km.my.id

            <hr color="#eee" />
        </div>

    </div>
    </div>
    <table>
        <tr>
            <th>Invoice</th>
            <th>Name</th>
            <th>Package Selected</th>
            <th>Total Price</th>
            <th>Paid</th>
            <th>Status Trs</th>
            <th>Date</th>
        </tr>

        <?php foreach ($transactions as $key => $transaction) : ?>
            <tr class="">
                <td><?= $transaction->invoice ?></td>
                <td><?= $transaction->name ?></td>
                <td><?= $transaction->package_selected ?> Package</td>
                <td><?= "Rp. " . number_format($transaction->total_price, 0, '', ',') ?></td>
                <td class="<?= ($transaction->total_price <= $transaction->paid) ? '' : 'text-danger font-weight-bold'; ?>"><?= ($transaction->total_price <= $transaction->paid) ? "Rp. " . number_format($transaction->paid, 0, '', ',') : "Rp. " . number_format($transaction->paid, 0, '', ','); ?></td>
                <td><?= $transaction->status ?></td>
                <td><?= $transaction->created_at ?></td>
            </tr>
        <?php endforeach ?>

    </table>
</body>

</html>