<article class="users_user">
    <h3><?= $user->first_name; ?> <?= $user->last_name; ?></h3>
    <a class="remove" href="#" data-action="<?= $router->route("form.delete"); ?>" data-id="<?= $user->id; ?>">Deletar</a>
</article>