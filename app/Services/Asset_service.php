<?php

namespace App\Services;

use App\Repository\Asset_repository;

class Asset_service
{
    protected $assetRepository;

    function __construct(Asset_repository $asset_repository)
    {
        $this->assetRepository = $asset_repository;
    }


    // create
    public function create(string $name, string $type): void
    {
        $this->assetRepository->create($name, $type);
    }


    // Read
    public function getAll(): ?object
    {
        return $this->assetRepository->getAll();
    }
}
