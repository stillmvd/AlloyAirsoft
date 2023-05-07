<?php

namespace App\Modules\Config\Service;

final class ConfigService
{
    public function getConfig(string $path, string $nameArray): array
    {
        $allConfig = include(dirname(__DIR__, 4) . '/app/Infrastructure/config/' . $path);
        return $allConfig[$nameArray];
    }
}
