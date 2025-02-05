<?php

declare(strict_types=1);

namespace Roave\BackwardCompatibility\DetectChanges\BCBreak\MethodBased;

use Roave\BackwardCompatibility\Change;
use Roave\BackwardCompatibility\Changes;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Throwable;

final class SkipMethodBasedErrors implements MethodBased
{
    private MethodBased $next;

    public function __construct(MethodBased $next)
    {
        $this->next = $next;
    }

    public function __invoke(ReflectionMethod $fromMethod, ReflectionMethod $toMethod): Changes
    {
        try {
            return ($this->next)($fromMethod, $toMethod);
        } catch (Throwable $failure) {
            return Changes::fromList(Change::skippedDueToFailure($failure));
        }
    }
}
