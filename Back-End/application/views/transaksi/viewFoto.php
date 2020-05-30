<body>
    <div class="foto" style="width: 1000px; height: 1000px;">
        <?php
        foreach ($transItem as $transItemm) :
            if ($transItemm['id_transaksi'] == $_SESSION['id_transaksi'] && $transItemm['id_item'] == $_SESSION['id_item']) { ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($transItemm['foto']) ?>" style="width: 1000px;height: 1000px;" alt="" />
        <?php
            }
        endforeach; ?>

    </div>
</body>

</html>