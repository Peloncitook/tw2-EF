<?php

/**

 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 *

 * Licensed under The MIT License

 * For full copyright and license information, please see the LICENSE.txt

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 * @link          https://cakephp.org CakePHP(tm) Project

 * @since         0.10.0

 * @license       https://opensource.org/licenses/mit-license.php MIT License

 * @var \App\View\AppView $this

 */



$cakeDescription = 'CakePHP: the rapid development php framework';

?>

<!DOCTYPE html>

<html>

<head>

    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>

        <?= $cakeDescription ?>:

        <?= $this->fetch('title') ?>

    </title>

    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>



    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>

</head>

<body>

    <nav class="top-nav">

        <div class="top-nav-title">

            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>

        </div>

        <div class="top-nav-links">
           <?php 
                
                $identity = $this->request->getAttribute('identity'); 
                
                $esAdmin = ($identity && $identity->get('role_id') === 1);
            ?>

            <?php if ($identity) : ?>
                
                <?php if ($esAdmin) : ?>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>" class="button float-center" style="color: white;">Users</a>
    		    <a href="<?= $this->Url->build(['controller' => 'Documents', 'action' => 'index']) ?>" class="button float-center" style="color: white;">Documents</a>

                <?php endif; ?>

                <span style="margin-right: 15px; margin-left: 15px; font-weight: bold;">
                    <?= h($identity->get('correo')) ?>
                </span>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" style="color: #d33c43;">
                    Cerrar Sesión
                </a>
                
            <?php else : ?>
                
                <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Documentation</a>
                <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
                 
                
            <?php endif; ?>
        </div>

    </nav>

    <main class="main">

        <div class="container">

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>

        </div>

    </main>

    <footer>

    </footer>

</body>

</html>