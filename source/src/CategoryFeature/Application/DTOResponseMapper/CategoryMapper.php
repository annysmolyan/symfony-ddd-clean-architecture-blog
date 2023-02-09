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

namespace App\CategoryFeature\Application\DTOResponseMapper;

use App\CategoryFeature\Application\DTOResponseFactory\CategoryFactoryInterface;
use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeatureApi\DTOResponse\CategoryDTOInterface as CategoryResponseDTO;

/**
 * Class CategoryMapper
 * @package App\CategoryFeature\Application\DTOResponseMapper
 **/
class CategoryMapper implements CategoryMapperInterface
{
    private CategoryFactoryInterface $categoryDTOResponseFactory;

    /**
     * @param CategoryFactoryInterface $categoryDTOResponseFactory
     */
    public function __construct(CategoryFactoryInterface $categoryDTOResponseFactory)
    {
        $this->categoryDTOResponseFactory = $categoryDTOResponseFactory;
    }

    /**
     * Map domain entity to a Response DTO object.
     * Don't return domain entity outside the module.
     *
     * @param Category $category
     * @return CategoryResponseDTO
     */
    public function map(Category $category): CategoryResponseDTO
    {
        $dtoResponse = $this->categoryDTOResponseFactory->create();

        $dtoResponse->setActive($category->isActive()->getValue());
        $dtoResponse->setId($category->getId()->getValue());
        $dtoResponse->setContent($category->getContent()->getValue());
        $dtoResponse->setSlug($category->getSlug()->getValue());
        $dtoResponse->setTitle($category->getTitle()->getValue());

        return $dtoResponse;
    }
}
