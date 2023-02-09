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

namespace App\DoctrineDataFeature\Application\DTOResponseFactory;

use App\DataManagerFeatureApi\DTOResponse\CategoryDataResponseInterface;
use App\DoctrineDataFeature\Application\DTOResponse\CategoryResponse;

/**
 * Class CategoryResponseFactory
 * @package App\DoctrineDataFeature\Application\DTOResponseFactory
 **/
class CategoryResponseFactory implements CategoryResponseFactoryInterface
{
    /**
     * @return CategoryDataResponseInterface
     */
    public function create(): CategoryDataResponseInterface
    {
        return new CategoryResponse();
    }
}
