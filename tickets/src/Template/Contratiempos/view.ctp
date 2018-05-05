 
<div class="contratiempos view large-9 medium-8 columns content">
    <h3><?= h($contratiempo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contratiempo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contratiempo->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($contratiempo->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($contratiempo->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Archivo') ?></th>
                <th scope="col"><?= __('Prioridad Id') ?></th>
                <th scope="col"><?= __('Departamento Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Progreso') ?></th>
                <th scope="col"><?= __('Secretaria Id') ?></th>
                <th scope="col"><?= __('Tiempo Limite') ?></th>
                <th scope="col"><?= __('Contratiempo Id') ?></th>
                <th scope="col"><?= __('Completado') ?></th>
                <th scope="col"><?= __('Comprobante') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contratiempo->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->name) ?></td>
                <td><?= h($tickets->descripcion) ?></td>
                <td><?= h($tickets->fecha) ?></td>
                <td><?= h($tickets->estado_id) ?></td>
                <td><?= h($tickets->archivo) ?></td>
                <td><?= h($tickets->prioridad_id) ?></td>
                <td><?= h($tickets->departamento_id) ?></td>
                <td><?= h($tickets->user_id) ?></td>
                <td><?= h($tickets->progreso) ?></td>
                <td><?= h($tickets->secretaria_id) ?></td>
                <td><?= h($tickets->tiempo_limite) ?></td>
                <td><?= h($tickets->contratiempo_id) ?></td>
                <td><?= h($tickets->completado) ?></td>
                <td><?= h($tickets->comprobante) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
