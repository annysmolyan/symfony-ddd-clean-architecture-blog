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

namespace App\DataManagerFeatureApi\DTORequestFactory;

use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;

/**
 * @api
 * Interface CategoryDataRequestFactoryInterface
 * @package App\DataManagerFeatureApi\DTORequestFactory
 *
 * WARNING! API DOESN'T know anything about realization!
 * This interfaces provides public access for other features to a feature realization.
 **/
interface CategoryDataRequestFactoryInterface
{
    /**
     * @return CategoryDataRequestInterface
     */
    public function create(): CategoryDataRequestInterface;
}
