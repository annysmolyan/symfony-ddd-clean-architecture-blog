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
use App\CategoryFeature\Domain\Factory\CategoryFactory as CategoryDomainFactory;
use App\DataManagerFeatureApi\DTOResponse\CategoryDataResponseInterface;

/**
 * Class CategoryDomainMapper
 * @package App\CategoryFeature\Infrastructure\DataMapper
 **/
class CategoryDomainMapper implements CategoryDomainMapperInterface
{
    private CategoryDomainFactory $categoryDomainFactory;

    /**
     * @param CategoryDomainFactory $categoryDomainFactory
     */
    public function __construct(CategoryDomainFactory $categoryDomainFactory)
    {
        $this->categoryDomainFactory = $categoryDomainFactory;
    }

    /**
     * Map data response object to a domain object
     * @param CategoryDataResponseInterface $dataResponse
     * @return Category
     */
    public function map(CategoryDataResponseInterface $dataResponse): Category
    {
        return $this->categoryDomainFactory->create(
            $dataResponse->getId(),
            $dataResponse->getTitle(),
            $dataResponse->getContent(),
            $dataResponse->getSlug(),
            $dataResponse->isActive()
        );
    }
}
