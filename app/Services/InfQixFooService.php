<?php


namespace App\Services;


class InfQixFooService
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
}