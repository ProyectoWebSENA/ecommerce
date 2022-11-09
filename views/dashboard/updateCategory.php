<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body>
    <h1> Nuevo Producto </h1>
    <section class="form-register">
        <form action="<?php echo constant('URL') ?>dashboard/registerCategory" method="POST">
            <input class="controls" type="number" name="cat_code" id="cat_code" placeholder="codigo" value="<?php echo $dataForTheTable->getCatCode(); ?>">
            <input class="controls" type="text" name="name" id="name" placeholder="nombre" value="<?php echo $dataForTheTable->getCatCode(); ?>">
            <input class="botons" type="submit" value="Actualizar categoria">
        </form>
    </section>

</body>