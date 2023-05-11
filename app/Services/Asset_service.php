<?php

namespace App\Services;

use App\Repository\Asset_repository;
use Illuminate\Support\Facades\Storage;

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
    public function getById($id): ?object
    {
        return $this->assetRepository->getById($id);
    }

    public function getAll(): ?object
    {
        return $this->assetRepository->getAll();
    }

    // Delete
    public function deleteById(int $id): void
    {
        $asset = $this->assetRepository->getById($id);

        Storage::disk('public_custom')->delete($asset->name);
        $this->assetRepository->deleteById($id);
    }
}
