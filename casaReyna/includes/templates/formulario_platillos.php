<fieldset>
    <legend>Informacion Del Platillo</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="platillo[titulo]" placeholder="Nombre del platillo" value="<?php echo s($platillo->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="platillo[precio]" placeholder="Precio" min="0" value="<?php echo s($platillo->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="platillo[imagen]">

    <?php if ($platillo->imagen) { ?>
        <img src="../../imagenes/<?php echo $platillo->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="platillo[descripcion]"> <?php echo s($platillo->descripcion); ?> </textarea>
</fieldset>

