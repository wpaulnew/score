<div class="box-container">
    <?php foreach ($clients as $client) : ?>
    <div class="box">
        <div class="client-info">
            <div class="client-info-list">
                <p class="client-info-id"><?=$client["id"]?></p>
                <p class="client-info-name"><?=$client["name"]?></p>
            </div>
            <div class="client-orders">
                <div class="client-statistics">
                    <p class="client-statistics-title">Статистика</p>
                </div>
            </div>
            <div class="client-info-list">
                <p class="client-info-number">+<?=$client["number"]?></p>
                <p class="client-info-email"><?=$client["email"]?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>