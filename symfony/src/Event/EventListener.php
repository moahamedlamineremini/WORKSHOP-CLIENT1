<?php

namespace App\EventListener;

use Doctrine\DBAL\Event\Listeners\MysqlSessionInit;
use Doctrine\DBAL\Connection;

class EnumTypeListener extends MysqlSessionInit
{
    public function postConnect(Connection $connection)
    {
        $platform = $connection->getDatabasePlatform();
        $platform->markDoctrineTypeCommented($platform->getDoctrineTypeMapping('enum'));
    }
}
?>