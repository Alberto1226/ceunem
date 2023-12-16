<style>
    .whatsapp {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 100px;
        right: 25px;
        z-index: 100;
    }

    .whatsapp-icon {
        margin-top: 13px;
    }
</style>

<a href="https://api.whatsapp.com/send?phone=<?= urlencode($this->tel->numero); ?>&text=<?= urlencode($this->tel->mensaje); ?>" class="whatsapp" target="_blank">
    <img class="whatsapp-icon" src="<?php echo constant('URL') . 'assets/img/whatsapp.png'; ?>" alt="">
</a>