# Asset Revision plugin for Craft CMS

Include the revisioned versions of assets in your Twig templates. Designed to work with [gulp-rev](https://github.com/sindresorhus/gulp-rev), but should also work with other build tasks that produce a JSON manifest.

## Installation

To install Asset Revision, follow these steps:

1.  Upload the assetrevision/ folder to your craft/plugins/ folder.
2.  Go to Settings > Plugins from your Craft control panel and install the Asset Revision plugin.
3.  Click on the gear symbol to go to the plugin’s settings page, and configure the plugin how you’d like.

## Usage

```jinja
<link rel="stylesheet" href="dist/css/{{ 'style.css' | asset_revision }}">
```

Set the path to the JSON manifest in the plugin settings. An example manifest:

```json
{
    "app.js": "app-0aae706b3b.js",
    "style.css": "style-f43cd95205.css"
}
```

Output:

```html
<link rel="stylesheet" href="dist/css/style-f43cd95205.css">
```

## Features

* Specify the name and location of the JSON manifest file
* Choose whether to return the unrevisioned file when running in 'Dev Mode'. Useful for those who only revision their assets when building for production.

NOTE: When running Craft in 'Dev Mode', the plugin will throw useful error messages if something is configured incorrectly. Otherwise, it will simply return the unrevisioned file.

## Changelog

### 1.0.0 -- 4/5/2016

* Initial release
