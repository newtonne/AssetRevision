<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class AssetRevisionTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'assetRevision';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('asset_revision', array($this, 'getAssetRevision')),
        );
    }

    public function getAssetRevision($filename)
    {
        $settings = craft()->plugins->getPlugin('assetrevision')->getSettings();

        $manifestPath          = $settings->manifestPath;
        $unrevisionedInDevMode = $settings->unrevisionedInDevMode;

        if (file_exists($manifestPath)) {
            $revPath = json_decode(file_get_contents($manifestPath), true);
        }

        if (craft()->config->get('devMode') == 1)
        {
            if ($unrevisionedInDevMode == 1) {
                return $filename;
            }
            elseif (!file_exists($manifestPath)) {
                throw new \Exception(sprintf('Cannot find manifest file at "%s". Make sure the (relative) path is set correctly in the plugin settings', UrlHelper::getSiteUrl($manifestPath)));
            }
            elseif (!isset($revPath[$filename])) {
                throw new \Exception(sprintf('There is no "%s" file in the manifest.', $filename));
            }
            else {
                return $revPath[$filename];
            }
        }
        else
        {
            if (!file_exists($manifestPath) || !isset($revPath[$filename])) {
                return $filename;
            }
            else {
                return $revPath[$filename];
            }
        }
    }
}
