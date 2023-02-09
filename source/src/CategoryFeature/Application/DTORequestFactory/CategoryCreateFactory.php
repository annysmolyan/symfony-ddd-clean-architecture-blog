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

namespace App\CategoryFeature\Application\DTORequestFactory;

use App\CategoryFeature\Application\DTORequest\CategoryCreate;
use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface;
use App\CategoryFeatureApi\DTORequestFactory\CategoryCreateDTOFactoryInterface;

/**
 * Class CategoryCreateFactory
 * @package App\CategoryFeature\Application\DTORequestFactory
 */
class CategoryCreateFactory implements CategoryCreateDTOFactoryInterface
{
    /**
     * @return CategoryCreateRequestInterface
     */
    public function create(): CategoryCreateRequestInterface
    {
        return new CategoryCreate();
    }
}
