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

namespace App\DoctrineDataFeature\Application\DTORequestFactory;

use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;
use App\DataManagerFeatureApi\DTORequestFactory\CategoryDataRequestFactoryInterface;
use App\DoctrineDataFeature\Application\DTORequest\CategoryRequest;

/**
 * Class CategoryCreateFactory
 * @package App\DoctrineDataFeature\Application\DTORequestFactory
 **/
class CategoryRequestFactory implements CategoryDataRequestFactoryInterface
{
    /**
     * @return CategoryDataRequestInterface
     */
    public function create(): CategoryDataRequestInterface
    {
        return new CategoryRequest();
    }
}
