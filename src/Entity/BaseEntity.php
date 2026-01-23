<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Serializer\Filter\GroupFilter;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Common\Filter\DateFilterInterface;
use ApiPlatform\Serializer\Filter\PropertyFilter;

#[ORM\MappedSuperclass]
#[ApiFilter(OrderFilter::class)]
#[ApiFilter(BooleanFilter::class)]
#[ApiFilter(GroupFilter::class, arguments: ['parameterName' => 'groups', 'overrideDefaultGroups' => true])]
#[ApiFilter(PropertyFilter::class, arguments: ['parameterName' => 'p', 'overrideDefaultProperties' => false, 'whitelist' => null ])]
#[ApiFilter(DateFilter::class, strategy: DateFilterInterface::EXCLUDE_NULL)]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false)]
abstract class BaseEntity
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields.
     */
    use TimestampableEntity;

    /**
     * Hook SoftDeleteable behavior
     * updates deletedAt field.
     */
    use SoftDeleteableEntity;

}
