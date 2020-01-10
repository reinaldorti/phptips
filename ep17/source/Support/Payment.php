<?php


namespace Source\Support;

use Source\Models\CreditCard;

class Payment
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var
     */
    private $endpoint;
    /**
     * @var
     */
    private $build;
    /**
     * @var
     */
    private $callback;

    /**
     * Payment constructor.
     */
    public function __construct()
    {
        $this->apiUrl = "https://api.pagar.me/1";
        $this->apiKey = PAGARME_API_KEY;
    }

    /**
     * @param string $holder_name
     * @param string $card_number
     * @param string $expiration_date
     * @param int $cvv
     * @return Payment
     */
    public function createCart(string $holder_name, string $card_number, string $expiration_date, int $cvv): Payment
    {
        $this->endpoint = "/cards";
        $this->build = [
            'holder_name' => $holder_name,
            'number' => $card_number,
            'expiration_date' => $expiration_date,
            'cvv' => $cvv
        ];

        $this->post();
        return $this;
    }

    /**
     * @param int $orderId
     * @param CreditCard $card
     * @param string $amount
     * @param int $installments
     * @return Payment
     */
    public function withCart(int $orderId, CreditCard $card, string $amount, int $installments): Payment
    {
        $this->endpoint = "/transactions";
        $this->build = [
            "payment_type" => "credit_card",
            "amount" => ($amount * 100),
            "installments" => $installments,
            "card_id" => $card->hash,
            "metadata" => [
                "orderId" => $orderId
            ]
        ];
        $this->post();
        return $this;
    }

    /**
     * @return mixed
     */
    public function callback()
    {
        return $this->callback;
    }

    /**
     *
     */
    private function post()
    {
        $url = $this->apiUrl . $this->endpoint;
        $api = ["api_key" => $this->apiKey];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array_merge($this->build, $api)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, []);
        $this->callback = json_decode(curl_close());
        curl_close($ch);
    }
}