<div class="users form content">
    <?= $this->Flash->render() ?>
    
    <h3>Iniciar Sesión</h3>
    
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, ingresa tu correo y contraseña') ?></legend>
        <?php
            // Input para el correo
            echo $this->Form->control('correo', [
                'required' => true,
                'label' => 'Correo Electrónico'
            ]);
            // Input para la contraseña
            echo $this->Form->control('password', [
                'required' => true,
                'label' => 'Contraseña'
            ]);
        ?>
    </fieldset>
    
    <?= $this->Form->button(__('Entrar')); ?>
    <?= $this->Form->end() ?>
</div>
