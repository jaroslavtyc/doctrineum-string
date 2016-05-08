<?php
namespace Doctrineum\Tests\String;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\String\StringEnumType;
use Doctrineum\Tests\SelfRegisteringType\AbstractSelfRegisteringTypeTest;

class StringEnumTypeTest extends AbstractSelfRegisteringTypeTest
{

    /**
     * @test
     */
    public function I_get_null_if_fetched_from_database()
    {
        StringEnumType::registerSelf();
        $stringEnumType = Type::getType($this->getExpectedTypeName());
        self::assertNull($stringEnumType->convertToPHPValue(null, $this->createPlatform()));
    }

    /**
     * @return \Mockery\MockInterface|AbstractPlatform
     */
    private function createPlatform()
    {
        return $this->mockery(AbstractPlatform::class);
    }
}