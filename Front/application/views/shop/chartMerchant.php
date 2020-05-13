<?php
foreach ($merchant as $mch) {
    $mchId = $mch['id'];
    $mchNama = $mch['nama'];
    $mchDesc = $mch['bio'];
    $mchFoto = $mch['foto'];
    $mchRating = $mch['rating'];
}

$totalItem = array();
$tahun =  $_POST['year'];
foreach ($allTrans as $trans) {
    if ($trans['status'] == 1) {
        foreach ($transaksiItem as $transItem) {
            if ($trans['id_transaksi'] == $transItem['id_transaksi']) {
                foreach ($item as $itm) {
                    if ($itm['id_item'] == $transItem['id_item']) {
                        if ($itm['id_merchant'] == $mchId) {
                            if (date('Y', strtotime($trans['tanggal_transaksi']))  == $tahun) {
                                if (isset($totalItem[$transItem['id_item']])) {
                                    $totalItem[$transItem['id_item']]['jumlah'] +=  $transItem['jumlah'];
                                } else {
                                    $totalItem[$transItem['id_item']]['nama'] =  $itm['nama_item'];
                                    $totalItem[$transItem['id_item']]['jumlah'] = $transItem['jumlah'];
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
usort($totalItem, function ($a, $b) {
    return $b['jumlah'] <=> $a['jumlah'];
});

?>
<div id="containerChart">
</div>
<div class="pagination">
    <div class="pageblock" id="prev10Year" style="background-color: #D7C13F;">
        <h5>-10</h5>
    </div>
    <div class="pageblock" id="prevYear" style="background-color: #D7C13F;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
            <path id="Icon_ionic-ios-arrow-round-back" data-name="Icon ionic-ios-arrow-round-back" d="M15.216,11.51a.919.919,0,0,1,.007,1.294l-4.268,4.282H27.218a.914.914,0,0,1,0,1.828H10.955L15.23,23.2a.925.925,0,0,1-.007,1.294.91.91,0,0,1-1.287-.007L8.142,18.647h0a1.026,1.026,0,0,1-.19-.288.872.872,0,0,1-.07-.352.916.916,0,0,1,.26-.64l5.794-5.836A.9.9,0,0,1,15.216,11.51Z" transform="translate(-7.882 -11.252)" fill="#ecf0f1" />
        </svg>
    </div>
    <div class="pageblock" id="y1">
        <h4><?= substr($tahun, 0, 1) ?></h4>
    </div>
    <div class="pageblock" id="y2">
        <h4><?= substr($tahun, 1, 1) ?></h4>
    </div>
    <div class="pageblock" id="y3">
        <h4><?= substr($tahun, 2, 1) ?></h4>
    </div>
    <div class="pageblock" id="y4">
        <h4><?= substr($tahun, 3, 1) ?></h4>
    </div>
    <div class="pageblock" id="nextYear" style="background-color: #D7C13F;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
            <path id="Icon_ionic-ios-arrow-round-back" data-name="Icon ionic-ios-arrow-round-back" d="M20.792,11.51a.919.919,0,0,0-.007,1.294l4.268,4.282H8.789a.914.914,0,0,0,0,1.828H25.053L20.777,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.027,1.027,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.792,11.51Z" transform="translate(-7.882 -11.252)" fill="#ecf0f1" />
        </svg>
    </div>
    <div class="pageblock" id="next10Year" style="background-color: #D7C13F;">
        <h5>+10</h5>
    </div>
</div>
<script>
    Highcharts.chart('containerChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Penjualan dari semua item'
        },
        subtitle: {
            text: '<?= $mchNama ?>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Penjualan (Pcs)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Total Penjualan: <b>{point.y:.0f} Pcs</b>'
        },
        series: [{
            name: 'Nama Item',
            data: [
                <?php
                $i = 0;
                foreach ($totalItem as $ttl) {
                    if ($i == count($totalItem) - 1) {
                        echo '[' . "'" . $ttl['nama'] . "'" . ',' . $ttl['jumlah'] . ']';
                    } else {
                        echo '[' . "'" . $ttl['nama'] . "'" . ',' . $ttl['jumlah'] . '],';
                    }
                    $i++;
                }
                ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#d7c13f',
                align: 'left',
                y: 25, // 10 pixels down from the top
                style: {
                    fontSize: '12px',
                    fontFamily: 'Roboto',
                    fontWeight: 'Bold'
                }
            }
        }]
    });
</script>