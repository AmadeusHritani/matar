<?php
/**
 * 2020 Zettle Prestashop Connector
 *  @author    : Zettle
 *  @copyright : 2020 Zettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : zettle.com
 *
 */

class IzettleOnBoardingConfiguration
{
    private $module;

    public function __construct($module)
    {
        $this->module = $module;
    }

    public function getConfiguration()
    {
        $contextLink = Context::getContext()->link;

        try {
            $data = [
                'templates' => [
                    'lost',
                    'popup',
                    'tooltip',
                ],
                'steps'     => [
                    'groups' => [
                        [
                            'steps' => [
                                [
                                    'type'    => 'popup',
                                    'text'    => [
                                        'type' => 'template',
                                        'src'  => 'welcome',
                                    ],
                                    'options' => [
                                        'savepoint',
                                        'hideFooter',
                                    ],
                                    'page'    => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                ],
                            ],
                        ],
                        [
                            'title'    => $this->module->l('Let\'s configure Zettle POS'),
                            'subtitle' => [
                                '1' => $this->module->l('Getting API key is most important action'
                                                        .'in the module configuration'),
                                '2' => $this->module->l('Please, be carefully, copy full API key'
                                                        .'in Zettle backoffice.'),
                            ],
                            'steps'    => [
                                [
                                    'type'                    => 'tooltip',
                                    'text'                    => $this->module->l(
                                        'Use \'API Settings\' tab to setting Zettle API Key.'
                                    ),
                                    'page'                    => $contextLink->getAdminLink(
                                        'AdminIzettleConnectorSettings'
                                    ),
                                    'selector'                => 'a[href="#api"]',
                                    'action'                  => [
                                        'selector'    => 'a[href="#api"]',
                                        'action'      => 'click',
                                        'before_show' => true,
                                    ],
                                    'keep_going_after_action' => true,
                                    'position'                => 'right',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'api_info',
                                    ],
                                    'options'  => [
                                        'savepoint',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'action'   => [
                                        'selector' => '#configuration_form_submit_btn',
                                        'action'   => 'click',
                                    ],
                                    'selector' => '#IZETTLECONNECTOR_API_KEY',
                                    'position' => 'left',
                                ],
                                [
                                    'type'                    => 'tooltip',
                                    'text'                    => $this->module->l(
                                        'Use \'Advanced Settings\' tab to set additional property.'
                                    ),
                                    'page'                    => $contextLink->getAdminLink(
                                        'AdminIzettleConnectorSettings'
                                    ),
                                    'selector'                => 'a[href="#cron"]',
                                    'action'                  => [
                                        'selector'    => 'a[href="#cron"]',
                                        'action'      => 'click',
                                        'before_show' => true,
                                    ],
                                    'keep_going_after_action' => true,
                                    'position'                => 'right',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'sync',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'selector' => '#IZETTLECONNECTOR_SYNC',
                                    'position' => 'left',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'barcode',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'selector' => '#IZETTLECONNECTOR_BARCODE_FIELD',
                                    'position' => 'left',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'token',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'selector' => '#IZETTLECONNECTOR_CRON_CODE',
                                    'position' => 'left',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'email',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'selector' => '#IZETTLECONNECTOR_SYNC_EMAIL',
                                    'position' => 'left',
                                ],
                                [
                                    'type'     => 'tooltip',
                                    'text'     => [
                                        'type' => 'template',
                                        'src'  => 'voucher',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorSettings'),
                                    'selector' => '#IZETTLECONNECTOR_SYNC_VOUCHER',
                                    'position' => 'left',
                                    'action'   => [
                                        'selector' => '#configuration_form_submit_btn',
                                        'action'   => 'click',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title'    => $this->module->l('export'),
                            'subtitle' => [
                                '1' => $this->module->l('Congratulations! We are connected to Zettle'),
                                '2' => $this->module->l('Please follow wizard steps to export products'
                                                        .'from your store to Zettle.'),
                            ],
                            'steps'    => [
                                [
                                    'type'     => 'tooltip',
                                    'text'     => $this->module->l('Now you are connected to iZettle!'),
                                    'options'  => [
                                        'savepoint',
                                    ],
                                    'page'     => $contextLink->getAdminLink('AdminIzettleConnectorRoot'),
                                    'selector' => '#izettle-info',
                                    'position' => 'top',
                                ],
                                [
                                    'type'    => 'popup',
                                    'text'    => [
                                        'type' => 'template',
                                        'src'  => 'end',
                                    ],
                                    'options' => [
                                        'savepoint',
                                        'hideFooter',
                                    ],
                                    'page'    => $contextLink->getAdminLink('AdminIzettleConnectorRoot'),
                                ],
                            ],
                        ],
                    ],
                ],
            ];
        } catch (Exception $e) {
            $data = [
                'steps' => [
                    'groups' => []
                ]
            ];
        }
        return $data;
    }
}
