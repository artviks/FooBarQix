<?php


namespace App;


use App\Models\Elements\ElementCollection;
use App\Models\Input;
use App\Services\MultiplierService;
use App\Services\OccurrenceService;

class App
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

    public function run(Input $input): string
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