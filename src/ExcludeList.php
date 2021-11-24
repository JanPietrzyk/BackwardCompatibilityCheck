<?php declare(strict_types=1);

namespace Roave\BackwardCompatibility;

abstract class ExcludeList
{
    private function __construct() {}

    public static function create()
    {
        return new static;
    }

    /** @return string[] */
    abstract public function getExcludeFilePatterns(): array;

    public function isExcluded(?string $file): bool
    {
        if(null === $file) {
            return false;
        }

        foreach($this->getExcludeFilePatterns() as $pattern) {
            if(fnmatch($pattern, $file)) {
                return true;
            }
        }

        return false;
    }
}