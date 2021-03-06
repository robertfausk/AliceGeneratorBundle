<?php

namespace Trappar\AliceGeneratorBundle\Tests;

use PHPUnit\Framework\TestCase;
use Trappar\AliceGeneratorBundle\FixtureGenerationContext;
use Trappar\AliceGeneratorBundle\ReferenceNamer\NamespaceNamer;

class FixtureGenerationContextTest extends TestCase
{
    public function test()
    {
        $context = FixtureGenerationContext::create()
            ->setReferenceNamer(new NamespaceNamer())
            ->setMaximumRecursion(0)
            ->addEntityConstraint($this);
        
        $this->assertInstanceOf(NamespaceNamer::class, $context->getReferenceNamer());
        $this->assertSame(0, $context->getMaximumRecursion());
        $this->assertTrue($context->getEntityConstraints()->checkValid($this));
    }
}