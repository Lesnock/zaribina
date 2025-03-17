<?php

namespace App\Modules\Catalog\Application\UseCases\CreateOption;

use App\Modules\Catalog\Application\Repositories\OptionRepository;
use App\Modules\Catalog\Domain\Option;
use App\Modules\Catalog\Domain\ValueObjects\OptionName;

class CreateOption
{
    public function __construct(private OptionRepository $repository)
    { }

    public function execute(Input $input): int
    {
        $option = Option::create(
            name: new OptionName($input->name), 
            values: $input->values
        );
        return $this->repository->save($option);
    }
}