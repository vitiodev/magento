<?php

namespace Demo\AuRegions\Api;

interface RegionRepositoryInterface
{
    public function save($data);

    public function delete($data);

    public function filterActive($collection);

    public function getFilterCollection();

    public function filterByStore($collection);
}
