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

/**
 * Interface CategoryRequestMapperInterface
 * Map domain object to a data object for sending to DataManagerFeature
 * @package App\CategoryFeature\Infrastructure\DataMapper
 **/
interface CategoryRequestMapperInterface
{
    /**
     * @param Category $domainEntity
     * @return CategoryDataRequestInterface
     */
    public function map(Category $domainEntity): CategoryDataRequestInterface;
}
