<?php
namespace Craft;

class AssetRevisionPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Asset Revision');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'newtonne';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/newtonne';
    }

    public function getPluginUrl()
    {
        return 'https://github.com/newtonne/AssetRevision';
    }

    public function getDocumentationUrl()
    {
        return $this->getPluginUrl().'/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/newtonne/AssetRevision/master/releases.json';
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('assetrevision/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

    protected function defineSettings()
    {
        return array(
            'manifestPath'          => array(AttributeType::String, 'default' => 'rev-manifest.json', 'required' => true),
            'unrevisionedInDevMode' => array(AttributeType::Bool,   'default' => '0'),
        );
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.assetrevision.twigextensions.AssetRevisionTwigExtension');

        return new AssetRevisionTwigExtension();
    }
}
