<?php $v->layout("_theme"); ?>

<div class="error">
    <h2>Ooooops erro <?= $error; ?></h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque error esse ex inventore labore magni non
        odio optio placeat possimus!</p>
</div>

<?php $v->start("sidebar"); ?>
<a href="<?= url(); ?>" title="Voltar ao inicio">Voltar</a>
<?php $v->end(); ?>
