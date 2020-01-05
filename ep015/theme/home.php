<?php $v->layout("_theme", ["title" => "Meu Carrinho"]); ?>

<section class="products">
    <div class="cart_message"></div>
    <?php if (!empty($products)): foreach ($products as $product): ?>
        <article class="products_item">
            <h1>(<span class="item_<?= $product->id; ?>">0</span>) <?= $product->name; ?></h1>
            <p>R$ <?= number_format($product->price, 2, ",", "."); ?></p>
            <div>
                <button class="btn" data-action="<?= $router->route("cart.add", ["id" => $product->id]); ?>">+</button>
                <button class="btn cancel" data-action="<?= $router->route("cart.remove", ["id" => $product->id]); ?>">
                    -
                </button>
            </div>
        </article>
    <?php endforeach; else: ?>
        <div class="message error">Ainda Não Existem Produtos Cadastrados</div>
    <?php endif; ?>
</section>

<div class="cart_resume">
    <p>Item: <span class="cart_amount">0</span></p>
    <p>Total: R$ <span class="cart_total">0,00</span></p>
    <button class="btn cancel" data-action="<?= $router->route("cart.clear"); ?>">Limpar</button>
    <a class="btn" href="<?= $router->route("web.order"); ?>">Concluir</a>
</div>
