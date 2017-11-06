# Payment Package

This package provide Payment Client integration for Objective PHP applications.

## Installation

Payment Package needs **PHP 7.0** or up to run correctly.

You will have to integrate it to your Objective PHP project with `composer require fei/payment-package`.

## Integration

As shown below, the Payment Package must be plugged in the application initialization method.
The Payment Package create a Payer Client service that will be consumed by the application's middleware.

```php
<?php

use ObjectivePHP\Application\AbstractApplication;
use Fei\Service\Payment\Package\PaymentPackage;

class Application extends AbstractApplication
{
    public function init()
    {
        // Define some application steps
        $this->addSteps('bootstrap', 'init', 'auth', 'route', 'rendering');
        
        // Initializations...

        // Plugging the Payment Package in the bootstrap step
        $this->getStep('bootstrap')
        ->plug(PaymentPackage::class);

        // Another initializations...
    }
}
```

The name of the service will be `payment.client`. If you want to rename it, you can plug the package like this:

```
			// Plugging the Payment Package in the bootstrap step
			$this->getStep('bootstrap')
			->plug(new PaymentPackage('my_service'));
```

### Application configuration
``
Create a file in your configuration directory and put your Payment configuration as below:

```php
<?php
use Fei\ApiClient\Transport\BasicTransport;
use Fei\Service\Payment\Package\Config\PaymentParam;

return [
    (new PaymentParam())
        ->setBaseUrl('http://payment.dev')
        ->setTransport(new BasicTransport())
];
```

In the previous example you need to set these configurations:

* `PaymentParam` : represent the URL where the API can be contacted in order to send and retrieve the payments

Please check out `payment-client` documentation for more information about how to use this client.