<?php

namespace Fei\Service\Payment\Package;

use Fei\Service\Payment\Client\Payer;
use Fei\Service\Payment\Package\Config\PaymentParam;
use ObjectivePHP\Application\ApplicationInterface;

/**
 * Class PaymentPackage
 *
 * @package Fei\Service\Payment\Package
 */
class PaymentPackage
{
    const DEFAULT_IDENTIFIER = 'payment.client';

    /** @var  string */
    protected $identifier;

    /**
     * PaymentPackage constructor.
     *
     * @param string $identifier
     */
    public function __construct($identifier = self::DEFAULT_IDENTIFIER)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param ApplicationInterface $app
     */
    public function __invoke(ApplicationInterface $app)
    {
        $config = $app->getConfig();

        /** @var PaymentParam $params */
        $params = $config->get(PaymentParam::class);

        $service = [
            'id' => $this->identifier,
            'class' => Payer::class,
            'params' => [
                [
                    Payer::OPTION_BASEURL => $params->getBaseUrl()
                ],
            ],
            'setters' => [
                'setTransport' => $params->getTransport(),
            ]
        ];

        $app->getServicesFactory()->registerService($service);
    }

    /**
     * Set Identifier
     *
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }
}
