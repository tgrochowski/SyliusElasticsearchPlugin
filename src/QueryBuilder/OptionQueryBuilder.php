<?php

/*
 * This file has been created by developers from BitBag. 
 * Feel free to contact us once you face any issues or want to start
 * another great project. 
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl. 
 */

declare(strict_types=1);

namespace BitBag\SyliusElasticsearchPlugin\QueryBuilder;

use Elastica\Query\AbstractQuery;
use Elastica\Query\Terms;

final class OptionQueryBuilder implements QueryBuilderInterface
{
    /**
     * @var string
     */
    private $optionPropertyPrefix;

    /**
     * @param string $optionPropertyPrefix
     */
    public function __construct(string $optionPropertyPrefix)
    {
        $this->optionPropertyPrefix = $optionPropertyPrefix;
    }

    /**
     * {@inheritdoc}
     */
    public function buildQuery(array $data): ?AbstractQuery
    {
        $optionQuery = new Terms();
        $optionQuery->setTerms($data['option_index'], (array) $data['options']);

        return $optionQuery;
    }
}