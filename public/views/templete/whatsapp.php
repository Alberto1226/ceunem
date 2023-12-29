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

<a class="whatsapp" target="_blank" id="whats">
    <img class="whatsapp-icon" src="<?php echo constant('URL') . 'assets/img/whatsapp.png'; ?>" alt="">
</a>

<script src="<?php echo constant('URL') ?>assets/js/whats.js"></script>