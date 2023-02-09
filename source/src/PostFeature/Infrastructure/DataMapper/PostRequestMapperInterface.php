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

namespace App\PostFeature\Infrastructure\DataMapper;

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\PostFeature\Domain\Entity\Post;

/**
 * Interface PostRequestMapperInterface
 * Map domain object to a data object for sending to DataManagerFeature
 * @package App\PostFeature\Infrastructure\DataMapper
 */
interface PostRequestMapperInterface
{
    /**
     * @param Post $domainEntity
     * @return PostDataRequestInterface
     */
    public function map(Post $domainEntity): PostDataRequestInterface;
}
