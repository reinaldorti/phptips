<?php $v->layout("_theme"); ?>

<div class="users">
    <?php
    if ($users):
        foreach ($users as $user):
            ?>
            <article class="users_user">
                <h1> <?= $user->first_name, " ", $user->last_name ?></h1>
            </article>
        <?php
        endforeach;
    else:
        ?>
        <h4>Não existm usuários cadastrados!</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptates!</p>
    <?php
    endif;
    ?>
</div>
