<?php

class Order
{

    private int $id;
    private int $userId;
    private float $price;
    private int|null $couponId;
    private int|null $addressId;
    private bool $isInDelivery;
    private string $validatedAt;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCouponId(): int|null
    {
        return $this->couponId;
    }

    public function setCouponId(int|null $couponId): void
    {
        $this->couponId = $couponId;
    }

    public function getAddressId(): int|null
    {
        return $this->addressId;
    }

    public function setAddressId(int|null $addressId): void
    {
        $this->addressId = $addressId;
    }

    public function getIsInDelivery(): bool
    {
        return $this->isInDelivery;
    }

    public function setIsInDelivery(bool $isInDelivery): void
    {
        $this->isInDelivery = (int)$isInDelivery;
    }

    public function getValidatedAt(): string
    {
        return $this->validatedAt;
    }

    public function setValidatedAt(string $validatedAt): void
    {
        $this->validatedAt = $validatedAt;
    }
}
