<?php $v->layout("_theme"); ?>

    <div class="contact">
        <h2>Fale Conosco</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, nesciunt?</p>

        <form action="<?= url(); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Seu nome"/>
            <input type="text" name="email" placeholder="Seu E-mail"/>
            <textarea name="message" placeholder="Mensagem" rows="3"></textarea>
            <button>Enviar Mensagem</button>
        </form>

    </div>

<?= $v->start("scripts"); ?>
    <script>
        $(function () {
            $("button").after('<button type="reset">Limpar</button>');
        })
    </script>
<?= $v->end(); ?>