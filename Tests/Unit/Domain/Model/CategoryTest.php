<?php
namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

/*
 * This file is part of the pfprojects project..
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

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
        $properties['property icon exists in category object'] = ['icon', 'getIcon', 'setIcon'];
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
        $this->assertSame(
            true,
            property_exists($this->subject, $property)
        );
        $this->assertSame(
            true,
            method_exists($this->subject, $getter)
        );
        $this->assertSame(
            true,
            method_exists($this->subject, $setter)
        );
    }
}
