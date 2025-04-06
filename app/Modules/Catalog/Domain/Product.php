<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\ProductCode;
use App\Modules\Catalog\Domain\ValueObjects\ProductName;
use App\Modules\Catalog\Domain\ValueObjects\ProductPaidPrice;
use App\Modules\Catalog\Domain\ValueObjects\ProductSellPrice;
use App\Modules\Shared\Helpers\TypeHelper;

class Product
{
    private function __construct(
        public ?int $id,
        public ?int $categoryId,
        public ProductName $name,
        public ProductCode $code,
        public ProductPaidPrice $paidPrice,
        public ProductSellPrice $sellPrice,
        public array $photos,
        public array $optionValues
    ) {
    }

    public static function create(
        ?int $categoryId,
        ProductName $name,
        ProductCode $code,
        ProductPaidPrice $paidPrice,
        ProductSellPrice $sellPrice,
        array $photos,
        array $optionValues
    ): self
    {
        TypeHelper::checkArrayTypes($photos, 'string');
        TypeHelper::checkArrayTypes($optionValues, 'integer');
        return new self(null, $categoryId, $name, $code, $paidPrice, $sellPrice, $photos, $optionValues);
    }

    public static function rebuild(
        int $id,
        int $categoryId,
        ProductName $name,
        ProductCode $code,
        ProductPaidPrice $paidPrice,
        ProductSellPrice $sellPrice,
        array $photos,
        array $optionValues
    ): self
    {
        TypeHelper::checkArrayTypes($photos, 'string');
        TypeHelper::checkArrayTypes($optionValues, 'integer');
        return new self($id, $categoryId, $name, $code, $paidPrice, $sellPrice, $photos, $optionValues);
    }

    public function update(
        ?int $categoryId,
        ProductName $name,
        ProductCode $code,
        ProductPaidPrice $paidPrice,
        ProductSellPrice $sellPrice,
        array $photos,
        array $optionValues
    ): void
    {
        TypeHelper::checkArrayTypes($photos, 'string');
        TypeHelper::checkArrayTypes($optionValues, 'integer');
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->code = $code;
        $this->paidPrice = $paidPrice;
        $this->sellPrice = $sellPrice;
        $this->photos = $photos;
        $this->optionValues = $optionValues;
    }
}