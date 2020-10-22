<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

use JWeiland\Pfprojects\Domain\Model\Category;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \JWeiland\Pfprojects\Domain\Model\Category.
 */
class CategoryTest extends UnitTestCase
{
    /**
     * @var Category
     */
    protected $subject;

    /**
     * set up class
     */
    public function setUp()
    {
        $this->subject = new Category();
    }

    /**
     * tear down class
     */
    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @return array
     */
    public function propertiesForCategoryObjectDataProvider()
    {
        $properties = [];
        $properties['property title exists in category object'] = ['title', 'getTitle', 'setTitle'];
        $properties['property description exists in category object'] = ['description', 'getDescription', 'setDescription'];
        $properties['property parent exists in category object'] = ['parent', 'getParent', 'setParent'];
        return $properties;
    }

    /**
     * There already exists a test in extbase extension
     * Here we only test if everything is available
     *
     * @test
     * @dataProvider propertiesForCategoryObjectDataProvider
     */
    public function propertiesAndItsGetterAndSetterAreDefinedInCategoryModel($property, $getter, $setter)
    {
        self::assertTrue(
            property_exists($this->subject, $property)
        );
        self::assertTrue(
            method_exists($this->subject, $getter)
        );
        self::assertTrue(
            method_exists($this->subject, $setter)
        );
    }
}
