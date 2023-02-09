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

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\DataManagerFeatureApi\DTORequestFactory\PostDataRequestFactoryInterface;
use App\DoctrineDataFeature\Application\DTORequest\PostRequest;

/**
 * Class PostRequestFactory
 * @package App\DoctrineDataFeature\Application\DTORequestFactory
 */
class PostRequestFactory implements PostDataRequestFactoryInterface
{
    /**
     * @return PostDataRequestInterface
     */
    public function create(): PostDataRequestInterface
    {
        return new PostRequest();
    }
}
