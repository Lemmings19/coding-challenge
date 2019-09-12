<?= $this->extend('Layouts/page') ?>

<?= $this->section('title') ?>User Page<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('Partials/user_details') ?>

    <script src="<?= base_url() ?>:3000/socket.io/socket.io.js"></script>
    <script>
        $(function () {
            var socket = io('<?= base_url() ?>:3000');

            socket.on('kick', function(){
                // Similar behavior to a HTTP redirect
                window.location.replace("/kicked");
            });
        });
    </script>
<?= $this->endSection() ?>
