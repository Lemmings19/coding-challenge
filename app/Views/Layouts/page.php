<!doctype html>
<html>
    <head>
        <title><?= $this->renderSection('title') ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="main.css">

        <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    </head>
    <body>
        <?php if (isset($flashMessage) && $flashMessage): ?>
            <div>
                <p>
                    <?= $flashMessage ?>
                </p>
            </div>
        <?php endif; ?>

        <div>
            <ul class="ul-inline">
                <li>
                    <a href="<?= route_to('index') ?>">index</a>
                </li>
                <li>
                    <a href="<?= route_to('admin') ?>">admin page</a>
                </li>
                <li>
                    <a href="<?= route_to('user') ?>">user page</a>
                </li>
            </ul>
        </div>

        <?= $this->renderSection('content') ?>
    </body>
</html>
