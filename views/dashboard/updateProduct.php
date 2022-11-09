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
    <h1> Modificar Producto </h1>
    <section class="form-register">
        <form action="<?php echo constant('URL') ?>dashboard/updateProduct" method="POST">
            <input class="controls" type="number" name="prod_code" id="prod_code" placeholder="codigo" value="<?php echo $dataForTheTable->getProdCode(); ?>">
            <input class="controls" type="text" name="name" id="name" placeholder="nombre" value="<?php echo $dataForTheTable->getName(); ?>">
            <input class="controls" type="number" name="price" id="price" placeholder="precio" value="<?php echo $dataForTheTable->getPrice(); ?>">
            <input class="controls" type="text" name="description" id="description" placeholder="descripción" value="<?php echo $dataForTheTable->getDescription(); ?>">
            <input class="controls" type="text" name="prod_pic_url" id="prod_pic_url" placeholder="url-img" value="<?php echo $dataForTheTable->getProdPicUrl(); ?>">
            <input class="botons" type="submit" value="Modificar Producto">
        </form>
    </section>

</body>