<?php

namespace App\Modules\Catalog\Application\UseCases\UpdateOption;

use App\Modules\Catalog\Application\Repositories\OptionRepository;
use App\Modules\Catalog\Domain\ValueObjects\OptionName;

class UpdateOption
{
    public function __construct(private OptionRepository $repository)
    { }

    public function execute(Input $input): int
    {
        $option = $this->repository->get($input->id);
        $option->update(
            name: new OptionName($input->name),
            values: $input->values
        );
        return $this->repository->save($option);
    }
}