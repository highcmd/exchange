<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exchange
 *
 * @ORM\Table(name="exchange")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeRepository")
 */
class Exchange
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=2)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="foregin_currency", type="string", length=3)
     */
    private $foreginCurrency;

    /**
     * @var int
     *
     * @ORM\Column(name="amount_after_exchange", type="decimal", precision=15, scale=2)
     */
    private $amountAfterExchange;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Exchange
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Exchange
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Exchange
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set foreginCurrency
     *
     * @param string $foreginCurrency
     *
     * @return Exchange
     */
    public function setForeginCurrency($foreginCurrency)
    {
        $this->foreginCurrency = $foreginCurrency;

        return $this;
    }

    /**
     * Get foreginCurrency
     *
     * @return string
     */
    public function getForeginCurrency()
    {
        return $this->foreginCurrency;
    }

    /**
     * Set amountAfterExchange
     *
     * @param integer $amountAfterExchange
     *
     * @return Exchange
     */
    public function setAmountAfterExchange($amountAfterExchange)
    {
        $this->amountAfterExchange = $amountAfterExchange;

        return $this;
    }

    /**
     * Get amountAfterExchange
     *
     * @return int
     */
    public function getAmountAfterExchange()
    {
        return $this->amountAfterExchange;
    }
}

