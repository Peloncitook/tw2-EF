<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="documents form content">
            <?= $this->Form->create($document, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Document') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('tipo', [
			    'type' => 'select',
			    'options' => [
				'Carnet de Identidad' => 'Carnet de Identidad',
				'Certificado Académico' => 'Certificado Académico',
				'Título Universitario' => 'Título Universitario',
				'Currículum Vitae' => 'Currículum Vitae',
				'Otro' => 'Otro'
			    ],
			    'empty' => 'Seleccione un tipo...' // Muestra un texto por defecto
			]);
                    echo $this->Form->control('fecha_emision');
                    echo $this->Form->control('entidad_emisora');
	            echo $this->Form->control('archivo_url', [
			    'type' => 'file', 
			    'label' => 'Subir Documento Escaneado'
			]);                   
                    echo $this->Form->control('estado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
