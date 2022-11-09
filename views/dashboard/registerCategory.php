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
  <h1> Nuevo Categoria </h1>
  <section class="form-register">
    <form action="<?php echo constant('URL') ?>dashboard/registerCategory" method="POST">
      <input class="controls" type="number" name="cat_code" id="cat_code" placeholder="codigo">
      <input class="controls" type="text" name="name" id="name" placeholder="nombre">
      <input class="botons" type="submit" value="Agregar categoria">
    </form>
  </section>

</body>