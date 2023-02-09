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

namespace App\DoctrineDataFeature\Application\DataMapper;

use App\DoctrineDataFeature\Application\DTORequest\DataRequestInterface;
use App\DoctrineDataFeature\Application\DTOResponse\DataResponseInterface;

/**
 * Interface DataMapperInterface
 * This is common interface for data mappers.
 *
 * @package App\DoctrineDataFeature\Application\EntityMapper
 **/
interface DataMapperInterface
{
    /**
     * Map DTORequest object to Infrastructure entity
     * @param DataRequestInterface $request
     * @return object
     */
    public function toEntity(DataRequestInterface $request): object;

    /**
     * Map entity to DTOResponse
     * @param object $entity
     * @return DataResponseInterface
     */
    public function toResponse(object $entity): DataResponseInterface;
}
