<?php


namespace App\Services;


use App\Models\Input;

class InfQixFooService
{
    private MultiplierService $multiplierService;
    private OccurrenceService $occurrenceService;
    private string $separator;

    public function __construct(
        MultiplierService $multiplierService,
        OccurrenceService $occurrenceService,
        string $separator
    )
    {
        $this->multiplierService = $multiplierService;
        $this->occurrenceService = $occurrenceService;
        $this->separator = $separator;
    }

    public function execute(Input $input): string
    {
        $multipliers = $this->multiplierService->execute($input);
        $occurrences = $this->occurrenceService->execute($input);
        $sumMultiplier = $this->multiplierService->sumMultiplier();
        $this->multiplierService->setSumMultiplier();

        if (! $occurrences)
        {
            return $multipliers;
        }

        return $multipliers . $this->separator . $occurrences . $sumMultiplier;
    }
}