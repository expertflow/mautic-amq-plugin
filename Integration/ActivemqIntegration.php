<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\MauticActivemqTransportBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\DefaultConfigFormTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormAuthInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\IntegrationInterface;
use MauticPlugin\MauticActivemqTransportBundle\Form\Type\ConfigAuthType;

/**
 * Class ActivemqIntegration.
 */
class ActivemqIntegration extends BasicIntegration implements IntegrationInterface, BasicInterface, ConfigFormInterface, ConfigFormAuthInterface
{
    use DefaultConfigFormTrait;

    const NAME = 'Activemq';

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon(): string
    {
        return 'plugins/MauticActivemqTransportBundle/Assets/img/amq.png';
    }

    /**
     * @return string
     */
    public function getAuthConfigFormName(): string
    {
        return ConfigAuthType::class;
    }
}
