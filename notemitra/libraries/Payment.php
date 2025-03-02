<?php
class Payment {
    private $gatewayUrl;
    private $apiKey;
    private $apiSecret;

    public function __construct() {
        $this->loadConfig();
    }

    private function loadConfig() {
        // Load payment gateway configuration
        $config = include_once __DIR__ . '/../config/payment_gateway.php';
        $this->gatewayUrl = $config['gateway_url'];
        $this->apiKey = $config['api_key'];
        $this->apiSecret = $config['api_secret'];
    }

    public function initiatePayment($amount, $currency, $orderId) {
        // Prepare payment data
        $data = [
            'amount' => $amount,
            'currency' => $currency,
            'order_id' => $orderId,
            'api_key' => $this->apiKey,
        ];

        // Send request to payment gateway
        $response = $this->sendRequest($this->gatewayUrl, $data);
        return $response;
    }

    private function sendRequest($url, $data) {
        // Use cURL to send a POST request to the payment gateway
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function verifyPayment($paymentId) {
        // Verify payment status with the payment gateway
        $data = [
            'payment_id' => $paymentId,
            'api_key' => $this->apiKey,
        ];

        $response = $this->sendRequest($this->gatewayUrl . '/verify', $data);
        return $response;
    }
}
?>