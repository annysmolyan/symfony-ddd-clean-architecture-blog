<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3 (GPL 3.0)
 * It is available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License v3 (GPL 3.0)
 */

declare(strict_types=1);

namespace App\CategoryFeature\Infrastructure\DataMapper;

use App\CategoryFeature\Domain\Entity\Category;
use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;
use App\DataManagerFeatureApi\DTORequestFactory\CategoryDataRequestFactoryInterface;

/**
 * Class CategoryRequestMapper
 * @package App\CategoryFeature\Infrastructure\DataMapper
 **/
class CategoryRequestMapper implements CategoryRequestMapperInterface
{
    private CategoryDataRequestFactoryInterface $categoryDataRequestFactory;

    /**
     * @param CategoryDataRequestFactoryInterface $categoryDataRequestFactory
     */
    public function __construct(CategoryDataRequestFactoryInterface $categoryDataRequestFactory)
    {
        $this->categoryDataRequestFactory = $categoryDataRequestFactory;
    }

    /**
     * Map domain object to a data object for sending to DataManagerFeature
     * @param Category $domainEntity
     * @return CategoryDataRequestInterface
     */
    public function map(Category $domainEntity): CategoryDataRequestInterface
    {
        $requestModel = $this->categoryDataRequestFactory->create();

        $requestModel->setId($domainEntity->getId()->getValue());
        $requestModel->setTitle($domainEntity->getTitle()->getValue());
        $requestModel->setSlug($domainEntity->getSlug()->getValue());
        $requestModel->setContent($domainEntity->getContent()->getValue());
        $requestModel->setActive($domainEntity->isActive()->getValue());

        return $requestModel;
    }
}
