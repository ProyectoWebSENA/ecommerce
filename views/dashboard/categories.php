<div class="table-container">
    <div class="table">
        <div class="row header">
            <div class="cell">Codigo categoria</div>
            <div class="cell">Nombre</div>
            <div class="cell">Actualizar</div>
            <div class="cell">Eliminar</div>
        </div>
        <?php foreach ($dataForTheTable as $data) : ?>
            <div class="row">
                <div class="cell" data-title="Codigo categoria"><?php echo $data['cat_code']; ?></div>
                <div class="cell" data-title="Nombre"><?php echo $data['name']; ?></div>
                <div class="cell" data-title="Actualizar">
                    <a href="" class="table-btn">Actualizar</a>
                </div>
                <div class="cell" data-title="Eliminar">
                    <a href="<?php echo constant('URL')."dashboard/deleteCategory/?cat_code=".$data['cat_code']?>" class="table-btn">Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>