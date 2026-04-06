<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $document->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="documents view content">
            <h3><?= h($document->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $document->hasValue('user') ? $this->Html->link($document->user->nombre, ['controller' => 'Users', 'action' => 'view', $document->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($document->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($document->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entidad Emisora') ?></th>
                    <td><?= h($document->entidad_emisora) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archivo Url') ?></th>
                    <td><?= h($document->archivo_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($document->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($document->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Emision') ?></th>
                    <td><?= h($document->fecha_emision) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($document->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($document->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>