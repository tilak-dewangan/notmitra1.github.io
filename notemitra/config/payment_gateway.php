<?php
// Payment Gateway Configuration

return [
    'gateway' => [
        'name' => 'YourPaymentGatewayName',
        'api_key' => 'your_api_key_here',
        'api_secret' => 'your_api_secret_here',
        'endpoint' => 'https://api.yourpaymentgateway.com',
        'currency' => 'INR', // Currency code
        'success_url' => 'http://yourwebsite.com/payment/success',
        'failure_url' => 'http://yourwebsite.com/payment/failure',
    ],
    'webhook' => [
        'url' => 'http://yourwebsite.com/payment/webhook',
        'secret' => 'your_webhook_secret_here',
    ],
];
