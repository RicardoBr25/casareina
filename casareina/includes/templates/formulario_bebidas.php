<fieldset>
    <legend>Informacion De La Bebida</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="bebida[titulo]" placeholder="Nombre de la bebida" value="<?php echo s($bebida->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="bebida[precio]" placeholder="Precio" min="0" value="<?php echo s($bebida->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="bebida[imagen]">

    <?php if ($bebida->imagen) { ?>
        <img src="../../imagenes/<?php echo $bebida->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="bebida[descripcion]"> <?php echo s($bebida->descripcion); ?> </textarea>
</fieldset>

