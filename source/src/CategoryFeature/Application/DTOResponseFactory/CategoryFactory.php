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

namespace App\CategoryFeature\Application\DTOResponseFactory;

use App\CategoryFeature\Application\DTOResponse\Category;
use App\CategoryFeatureApi\DTOResponse\CategoryDTOInterface;

/**
 * Class CategoryFactory
 * @package App\CategoryFeature\Application\DTOResponseFactory
 **/
class CategoryFactory implements CategoryFactoryInterface
{
    /**
     * @return CategoryDTOInterface
     */
    public function create(): CategoryDTOInterface
    {
        return new Category();
    }
}
