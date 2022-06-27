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

class IzettleOnBoarding
{
    /** @var array */
    private $configuration;



    private $smarty;
    private $module;


    public function __construct($smarty, $module)
    {
        $this->smarty = $smarty;
        $this->module = $module;

        $this->loadConfiguration();
    }

    /**
     * Show the OnBoarding module content.
     */
    public function showModuleContent($link)
    {
        $templates = array();
        foreach ($this->configuration['templates'] as $template) {
            $templates[] = array(
                'name'    => $template,
                'content' => str_replace(array("\n", "\r", "\t"), "", $this->getTemplateContent("$template")),
            );
        }

        return $this->getTemplateContent('content', array(
            'currentStep' => $this->getCurrentStep(),
            'totalSteps'  => $this->getTotalSteps(),
            'percent_real' => ($this->getCurrentStep() / $this->getTotalSteps()) * 100,
            'percent_rounded' => round(($this->getCurrentStep() / $this->getTotalSteps())*100),
            'isShutDown'  => $this->isShutDown(),
            'steps'       => $this->configuration['steps'],
            'jsonSteps'   => addslashes(json_encode($this->configuration['steps'])),
            'templates'   => $templates,
            'link' => $link->getAdminLink('AdminIzettleConnectorOnBoarding'),
        ));
    }

    /**
     * Set the current step.
     *
     * @param int $step Current step ID
     *
     * @return bool Success of the configuration update
     */
    public function setCurrentStep($step)
    {
        return Configuration::updateValue('IZETTLEONBOARD_CURRENT_STEP', $step);
    }

    /**
     * Set the shut down status.
     *
     * @param bool $status Onboarding shut downed or not
     *
     * @return bool Success of the configuration update
     */
    public function setShutDown($status)
    {
        return Configuration::updateValue('IZETTLEONBOARD_SHUT_DOWN', $status);
    }

    /**
     * Return true if the OnBoarding is finished.
     *
     * @return bool True if the OnBoarding is finished
     */
    public function isFinished()
    {
        return $this->getCurrentStep() >= $this->getTotalSteps();
    }

    /**
     * Load all the steps with the localized texts.
     *
     * @param string $configPath Path where the configuration can be loaded
     */
    private function loadConfiguration()
    {
        $configuration = new IzettleOnBoardingConfiguration($this->module);
        $configuration = $configuration->getConfiguration();

        foreach ($configuration['steps']['groups'] as &$currentGroup) {
            if (isset($currentGroup['title'])) {
                $currentGroup['title'] = $this->getTextFromSettings($currentGroup['title']);
            }
            if (isset($currentGroup['subtitle'])) {
                foreach ($currentGroup['subtitle'] as &$subtitle) {
                    $subtitle = $this->getTextFromSettings($subtitle);
                }
            }
            foreach ($currentGroup['steps'] as &$currentStep) {
                $currentStep['text'] = $this->getTextFromSettings($currentStep['text']);
            }
        }

        $this->configuration = $configuration;
    }

    /**
     * Return a text from step text configuration.
     *
     * @param array $text Step text configuration
     *
     * @return string|null Text if it exists
     */
    private function getTextFromSettings($text)
    {
        if (is_array($text)) {
            switch ($text['type']) {
                case 'template':
                    return $this->getTemplateContent('contents/'.$text['src']);
            }
        }

        return $text;
    }

    /**
     * Echoes a template.
     *
     * @param string $templateName Template name
     */
    public function showTemplate($templateName)
    {
        echo $this->getTemplateContent($templateName);
    }

    /**
     * Return a template.
     *
     * @param string $templateName          Template name
     * @param array  $additionnalParameters Additionnal parameters to inject on the Twig template
     *
     * @return string Parsed template
     */
    private function getTemplateContent($templateName, $additionnalParameters = array())
    {
        $this->smarty->assign($additionnalParameters);
        $tpl = _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/onboarding/'.$templateName.'.tpl';
        return $this->module->fetch($tpl);
    }

    /**
     * Return the current step.
     *
     * @return int Current step
     */
    private function getCurrentStep()
    {
        return (int)Configuration::get('IZETTLEONBOARD_CURRENT_STEP');
    }

    /**
     * Return the steps count.
     *
     * @return int Steps count
     */
    private function getTotalSteps()
    {
        $total = 0;

        if (null != $this->configuration) {
            foreach ($this->configuration['steps']['groups'] as &$group) {
                $total += count($group['steps']);
            }
        }

        return $total;
    }

    /**
     * Return the shut down status.
     *
     * @return bool Shut down status
     */
    private function isShutDown()
    {
        return (int)Configuration::get('IZETTLEONBOARD_SHUT_DOWN');
    }
}
