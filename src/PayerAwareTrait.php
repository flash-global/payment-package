<?php

namespace Fei\Service\Payment\Package;

use Fei\Service\Payment\Client\Payer;

/**
 * Trait PayerAwareTrait
 *
 * @package Fei\Service\Payment\Package
 */
trait PayerAwareTrait
{
    /** @var  Payer */
    protected $payer;

    /**
     * Get Payer
     *
     * @return Payer
     */
    public function getPayer(): Payer
    {
        return $this->payer;
    }

    /**
     * Set Payer
     *
     * @param Payer $payer
     *
     * @return $this
     */
    public function setPayer(Payer $payer): self
    {
        $this->payer = $payer;

        return $this;
    }
}
