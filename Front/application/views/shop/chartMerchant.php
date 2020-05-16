<?php
foreach ($merchant as $mch) {
    $mchId = $mch['id'];
    $mchNama = $mch['nama'];
    $mchDesc = $mch['bio'];
    $mchFoto = $mch['foto'];
    $mchRating = $mch['rating'];
}

$totalItem = array();
$start =  $_POST['startDate'];
$end =  $_POST['endDate'];

foreach ($allTrans as $trans) {
    if ($trans['status'] == 1) {
        foreach ($transaksiItem as $transItem) {
            if ($trans['id_transaksi'] == $transItem['id_transaksi']) {
                foreach ($item as $itm) {
                    if ($itm['id_item'] == $transItem['id_item']) {
                        if ($itm['id_merchant'] == $mchId) {
                            if ((date('d/m/Y', strtotime($trans['tanggal_transaksi']))  >= $start && date('d/m/Y', strtotime($trans['tanggal_transaksi'])) <= $end)) {
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
<div class="waktu">
    <div class="form-group mb-4" style="margin: 0!important;">
        <div class="datepicker date input-group p-0 shadow-sm">
            <input type="text" placeholder="Start Date" class="form-control" name="startDate" id="startDate">
            <div class="input-group-append" style="overflow: visible;">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
                    <g id="Group_190" data-name="Group 190" transform="translate(-6632 2629)">
                        <path id="Rectangle_348" data-name="Rectangle 348" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6632 -2629)" fill="#d7c13f" />
                        <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(6644.3 -2624)" fill="#1e2126" />
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <button class="showGraph">Update Graph</button>
    <div class="form-group mb-4" style="margin: 0!important;">
        <div class="datepicker date input-group p-0 shadow-sm">
            <input type="text" placeholder="End Date" class="form-control" name="endDate" id="endDate">
            <div class="input-group-append" style="overflow: visible;">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
                    <g id="Group_190" data-name="Group 190" transform="translate(-6632 2629)">
                        <path id="Rectangle_348" data-name="Rectangle 348" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6632 -2629)" fill="#d7c13f" />
                        <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(6644.3 -2624)" fill="#1e2126" />
                    </g>
                </svg>
            </div>
        </div>
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
            text: 'Between  <?= $start ?>  and <?= $end ?>'
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

    $(".showGraph").click(function() {
        startDate = $("#startDate").val();
        endDate = $("#endDate").val();
        $.ajax({
            url: "<?= base_url(); ?>Shop/modifYear",
            method: "post",
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(result) {
                $(".chartWrapper").html(result);
            }
        });
    });

    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        orientation: "left bottom"
    });
</script>