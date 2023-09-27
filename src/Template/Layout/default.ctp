<!DOCTYPE html><html>
<head>
    <title>Autovermietung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <img src="https://as1.ftcdn.net/v2/jpg/04/87/78/72/1000_F_487787296_Xq2cxEBEY8wzwNUaQKgEhfqEGqaIbndK.jpg" alt="" width="130" height="30" class="d-inline-block align-top">
            <a class="navbar-brand" href="#"> CREA Autovermietung GmbH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php if (isset($isAdmin) && $isAdmin): ?>
                <li><?= $this->Html->link(__('Reservierungen'), ['controller' => 'Cars', 'action' => 'reservationsView']) ?></li>
                <?php endif; ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?= $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'nav-link']) ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Autos'), ['controller' => 'Cars', 'action' => 'index'],['class' => 'nav-link']) ?>
                    </li>
                    <?php if ($this->request->getSession()->check('Auth.User')): ?>
                    <li class="nav-item">
                        <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
            
        </div>
    </nav>
    <div class="container">
        <?= $this->Flash->render() ?>
        <div class="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
        &copy; <?= date('Y') ?> Alle Rechte gehören Arif .
    </footer>
</body>
</html>