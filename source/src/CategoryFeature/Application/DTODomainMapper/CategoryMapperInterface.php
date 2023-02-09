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
use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface;
use App\CategoryFeatureApi\DTORequest\CategoryUpdateRequestInterface;

/**
 * Interface CategoryMapperInterface
 * Map DTO request to a Domain entity
 *
 * @package App\CategoryFeature\Application\DTODomainMapper
 **/
interface CategoryMapperInterface
{
    /**
     * @param CategoryUpdateRequestInterface $dtoRequest
     * @return Category
     */
    public function mapUpdateRequest(CategoryUpdateRequestInterface $dtoRequest): Category;

    /**
     * @param CategoryCreateRequestInterface $dtoRequest
     * @return Category
     */
    public function mapCreateRequest(CategoryCreateRequestInterface $dtoRequest): Category;
}
