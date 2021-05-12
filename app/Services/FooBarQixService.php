<?php


namespace App\Services;


use App\Models\Input;

class FooBarQixService
{
    private MultiplierService $multiplierService;
    private OccurrenceService $occurrenceService;

    public function __construct(
        MultiplierService $multiplierService,
        OccurrenceService $occurrenceService
    )
    {
        $this->multiplierService = $multiplierService;
        $this->occurrenceService = $occurrenceService;
    }

    public function execute(Input $input): string
    {
        $multipliers = $this->multiplierService->execute($input);
        $occurrences = $this->occurrenceService->execute($input);

        if (! $occurrences)
        {
            return $multipliers;
        }

        return $multipliers . '.' . $occurrences;
    }

}