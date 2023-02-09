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

use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeatureApi\DTOResponse\CategoryDTOInterface as CategoryResponseDTO;

/**
 * Interface CategoryMapperInterface
 * Map domain entity to a Response DTO object.
 * Don't return domain entity outside the module.
 *
 * @package App\CategoryFeature\Application\DTOResponseMapper
 **/
interface CategoryMapperInterface
{
    /**
     * @param Category $category
     * @return CategoryResponseDTO
     */
    public function map(Category $category): CategoryResponseDTO;
}
