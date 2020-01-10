<?php
require __DIR__ . "/vendor/autoload.php";

$client = (new \Source\Models\User())->findById(1);
$pagarme = new PagarMe\Client(PAGARME_API_KEY);

$newCart = false;
if ($newCart) {
    $getCreditCart = $pagarme->cards()->create([
        'holder_name' => 'Reinaldo Dorti',
        'number' => '5346774254733969',
        'expiration_date' => '0820',
        'cvv' => '521'
    ]);

    if (!$getCreditCart->valid) {
        echo "<h3>Cartão inválido!</h3>";
    } else {
        $createCreditCart = new \Source\Models\CreditCard();
        $createCreditCart->user = $client->id;
        $createCreditCart->hash = $getCreditCart->id;
        $createCreditCart->brand = $getCreditCart->brand;
        $createCreditCart->last_digits = $getCreditCart->last_digits;
        $createCreditCart->save();
    }
}

$newTransaction = false;
if ($newTransaction) {
    $creditCart = (New \Source\Models\CreditCard())->findById(1);

    $transaction = $pagarme->transactions()->create([
        "amount" => (55.80 * 100),
        "card_id" => $creditCart->hash,
        "metadata" => [
            "orderId" => 1555
        ]
    ]);
}

$pay = new \Source\Support\Payment();
$pay->createCart(
    "Reinaldo Dorti",
    "5346774254733969",
    "0820",
    "521"
);

if ($pay->callback()->valid) {
    echo "<h1>Cartão obtido!</h1>";

    $pay->withCart(
        1250,
        (new \Source\Models\CreditCard())->findById(1),
        1230.34,
        2
    );

    if ($pay->callback()->status == "paid") {
        echo "<h1>Liberar pedido!</h1>";
    }
}