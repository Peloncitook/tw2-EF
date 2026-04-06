<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Document> $documents
 */
?>
<div class="documents index content">
    <?php if ($esAdmin): ?>
        <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    
    <h3><?= __('Documents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('fecha_emision') ?></th>
                    <th><?= $this->Paginator->sort('entidad_emisora') ?></th>
                    <th><?= $this->Paginator->sort('archivo_url') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    
                    <?php if ($esAdmin): ?>
                        <th class="actions"><?= __('Actions') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?= $this->Number->format($document->id) ?></td>
                    <td><?= $document->hasValue('user') ? $this->Html->link($document->user->nombre, ['controller' => 'Users', 'action' => 'view', $document->user->id]) : '' ?></td>
                    <td><?= h($document->titulo) ?></td>
                    <td><?= h($document->tipo) ?></td>
                    <td><?= h($document->fecha_emision) ?></td>
                    <td><?= h($document->entidad_emisora) ?></td>
                    <td>
                    <?php if (!empty($document->archivo_url)): ?>
                        <?= $this->Html->link(
                            'Descargar / Ver', 
                            '/' . $document->archivo_url, 
                            [
                                'target' => '_blank',
                                'download' => true
                            ]
                        ) ?>
                    <?php else: ?>
                        <span class="text-muted">Sin archivo</span>
                    <?php endif; ?>
                    </td>
                    <td><?= h($document->estado) ?></td>
                    <td><?= h($document->created) ?></td>
                    <td><?= h($document->modified) ?></td>
                    
                    <?php if ($esAdmin): ?>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $document->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->id]) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $document->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $document->id),
                                ]
                            ) ?>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>