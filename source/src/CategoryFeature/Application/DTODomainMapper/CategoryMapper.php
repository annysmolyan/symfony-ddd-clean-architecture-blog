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

namespace App\CategoryFeature\Application\DTODomainMapper;

use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeature\Domain\Factory\CategoryFactory as CategoryDomainFactory;
use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface;
use App\CategoryFeatureApi\DTORequest\CategoryUpdateRequestInterface;

/**
 * Class CategoryMapper
 * @package App\CategoryFeature\Application\DTODomainMapper
 **/
class CategoryMapper implements CategoryMapperInterface
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
     * Map DTO request to a Domain entity
     * @param CategoryUpdateRequestInterface $dtoRequest
     * @return Category
     */
    public function mapUpdateRequest(CategoryUpdateRequestInterface $dtoRequest): Category
    {
        return $this->categoryDomainFactory->create(
            $dtoRequest->getId(),
            $dtoRequest->getTitle(),
            $dtoRequest->getContent(),
            $dtoRequest->getSlug(),
            $dtoRequest->isActive()
        );
    }

    /**
     * Map DTO request to a Domain entity
     * @param CategoryCreateRequestInterface $dtoRequest
     * @return Category
     */
    public function mapCreateRequest(CategoryCreateRequestInterface $dtoRequest): Category
    {
        return $this->categoryDomainFactory->create(
            null,
            $dtoRequest->getTitle(),
            $dtoRequest->getContent(),
            $dtoRequest->getSlug(),
            $dtoRequest->isActive()
        );
    }
}
