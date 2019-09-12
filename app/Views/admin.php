<?= $this->extend('Layouts/page') ?>

<?= $this->section('title') ?>Admin Page<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('Partials/user_details') ?>
    <div>
        <form id="kickform" action="<?= route_to('logout') ?>">
            <button id="kick" class="button">Logout</button>
        </form>
    </div>

    <script src="<?= base_url() ?>:3000/socket.io/socket.io.js"></script>
    <script>
        $(function () {
            var socket = io('<?= base_url() ?>:3000');

            $('#kick').click(function(e){
                e.preventDefault();
                socket.emit('kick', 1);
                $('#kickform').submit();
            });
        });
    </script>
<?= $this->endSection() ?>
