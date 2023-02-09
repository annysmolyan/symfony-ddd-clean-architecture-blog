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

namespace App\PostFeature\Application\DTORequestFactory;

use App\PostFeature\Application\DTORequest\PostUpdate;
use App\PostFeatureApi\DTORequest\PostUpdateDTOInterface;
use App\PostFeatureApi\DTORequestFactory\PostUpdateDTOFactoryInterface;

/**
 * Class PostUpdateFactory
 * @package App\PostFeature\Application\DTORequestFactory
 */
class PostUpdateFactory implements PostUpdateDTOFactoryInterface
{
    /**
     * @return PostUpdateDTOInterface
     */
    public function create(): PostUpdateDTOInterface
    {
        return new PostUpdate();
    }
}
