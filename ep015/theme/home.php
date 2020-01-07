<?php $v->layout("_theme", ["title" => "Meu Carrinho"]); ?>

    <section class="products">
        <div class="cart_message"></div>
        <?php if (!empty($products)): foreach ($products as $product): ?>
            <article class="products_item">
                <h1>(<span class="item_<?= $product->id; ?>">0</span>) <?= $product->name; ?></h1>
                <p>R$ <?= number_format($product->price, 2, ",", "."); ?></p>
                <div>
                    <button class="btn" data-action="<?= $router->route("cart.add", ["id" => $product->id]); ?>">+</button>
                    <button class="btn cancel" data-action="<?= $router->route("cart.remove", ["id" => $product->id]); ?>">-</button>
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

<?= $v->start("js"); ?>
    <script>
        $(function () {
            $("[data-action]").click(function (e) {
                e.preventDefault();
                var data = $(this).data();

                $.post(data.action, function (cart) {
                    ajaxCart(cart);
                }, "json");
            });

            $.post("<?= $router->route("cart.cart");?>", function (cart) {
                ajaxCart(cart);
            }, "json");

            function ajaxCart(cart) {
                var cart_message = $(".cart_message");
                var cart_amount = $(".cart_amount");
                var cart_total = $(".cart_total");
                var formater = Intl.NumberFormat("pt-BR", {
                    style: "currency",
                    currency: "BRL"
                });

                if (cart.message) {
                    cart.message.fadeOut(200, function () {
                        $(this).html(cart.message).fadeIn(200);
                    });
                } else {
                    cart_message.fadeOut(200);
                }

                $("span[class^='item_']").html("0");
                if (cart.items) {
                    $.each(cart.items, function (index, item) {
                        $(".item_" + item.id).html(item.amount);
                    });
                }

                if (cart.amount) {
                    cart_amount.html(cart.amount);
                } else {
                    cart_amount.html("0");
                }

                if (cart.total) {
                    cart_total.html(formater.format(cart.total));
                } else {
                    cart_total.html("0,00");
                }
            }
        });
    </script>
<?= $v->end(); ?>