<?php declare(strict_types=1);

namespace Roave\BackwardCompatibility;

class DefaultExcludeList extends ExcludeList
{
    public function getExcludeFilePatterns(): array
    {
        return [
            '**/Test/**'
        ];
    }
}
