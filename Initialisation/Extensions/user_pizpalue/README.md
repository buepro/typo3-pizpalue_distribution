# TYPO3 user_pizpalue

[![Extension pizpalue](https://badgen.net/badge/TYPO3/pizpalue/orange)](https://extensions.typo3.org/extension/pizpalue/)
[![Extension pizpalue_distribution](https://badgen.net/badge/TYPO3/pizpalue%20distribution/orange)](https://extensions.typo3.org/extension/pizpalue_distribution/)

---

This extension serves as a base to customize a TYPO3-website using the template
[pizpalue](https://github.com/buepro/typo3-pizpalue).

## Composer

To use the extension in a composer environment different approaches are available. Following two ways are further
outlined:

### Without version control

1. Don't add `buepro/typor-user-pizpalue` as a requirement to the composer configuration
1. Copy the extension manually to the extension directory (`typo3conf/ext/user_pizpalue`)
1. Add the following autoload declaration to the composer configuration from the web site:
   ```
   "autoload": {
        "psr-4": {
            "Buepro\\UserPizpalue\\": "public/typo3conf/ext/user_pizpalue/Classes/"
        }
    }
   ```
1. Run `composer dumpautoload` to generate the autoload info

### With version control

1. Add your repository to the composer configuration from the web site:
   ```
   "repositories": [
       {
            "type": "vcs",
            "url": "https://user@domain.ch/path_to_git/typo3-user-pizpalue.git"
       }
   ],
   ```
1. Update the require section from the composer configuration from the web site:
   ```
   "require": {
       "buepro/typo3-user-pizpalue": "dev-mybranch",
   }
   ```
1. Run `composer update`

## Usage

When starting a new project create a new git-branch and just commit to that branch. The master branch should always be
used to start new projects.

To increase quality work progress might be committed and documented. Documentation has its home in the folder
[`Documentation`](Documentation). A changelog can be created with the following steps:

1. In a shell go to the `Build` directory
1. Run `npm install` (only needed, if not already done)
1. Run `grunt doc`

## Customizations

### TypoScript (TS)

Customizations typically start by adapting the [ts constants](Configuration/TypoScript/constants.typoscript) and
[ts setup](Configuration/TypoScript/setup.typoscript). Frequently used configurations are collected in the
folder [`Configuration/TypoScript/Default`](Configuration/TypoScript/Default). You might use them to get started by
copying the needed fragments to
[`Configuration/TypoScript/constants.typoscript`](Configuration/TypoScript/constants.typoscript) or
[`Configuration/TypoScript/setup.typoscript`](Configuration/TypoScript/setup.typoscript). The inclusion from the default
TS (see `@import...`) might be deleted.

### CSS/SCSS

Style declarations are maintained in the folder [`Resources/Public/Scss`](Resources/Public/Scss). For stylesheets to be
embedded TS needs to be setup. See `page.includeCSS` for further details.

### Icon font

It might become handy to create a customized icon font. Ideally it contains all used icons from the website. To generate
an icon font the icons need to be available in svg-format. Unfortunately not all svg-formats lead to the desired result
hence some testing might be needed. An icon font might be created by following these steps:

1. Copy all svg-icons to the folder `Resources/Public/Icons/Font`
1. In a shell go to the `Build` directory
1. Run `npm install` (only needed, if not already done)
1. Run `grunt iconfont`

Upon creating the icon font its resources can be found in `Resources/Public/Fonts`. Next the font needs to be embedded
with the following TS setup:

```
page {
    includeCSSLibs {
        pizpalueicon >
        upicon = EXT:user_pizpalue/Resources/Public/Fonts/upicon.min.css
        upicon {
            fontLoader {
                families {
                    0 = UpIcon
                }
                enabled = 1
            }
        }
    }
}
```

Now your ready to use the icon font in the markup: `<i class="upicon upicon-custom1"></i>` would render an icon showing
the graphic defined by `custom1.svg`.

### Layouts/Templates/Partials

They are maintained in [`Resources/Private`](Resources/Private). As an example to add a new page template follow these
steps:

1. Create the template in the directory [`Resources/Private/Templates/Page`](Resources/Private/Templates/Page)
2. Enable the template in the TS constant declaration

```
user_pizpalue {
    page.fluidtemplate {
        templateRootPath = EXT:user_pizpalue/Resources/Private/Templates/Page/
    }
}
```

## Development

For smaller projects the following workflow might be of interest:

### Setup development environment

1. Adjust the header comment in `.php_cs.php`
1. Create a ddev container: `ddev start`
1. **Enter the container:** `docker exec -it -u root -w /var/www/html ddev-up-web bash`
1. Set environment variable: `export COMPOSER=composer-dev.json && printenv | grep COMPOSER=`
1. Install composer packages: `composer install`

### Work in development environment

1. Optional, check the code: `composer check:php`
1. Correct the code: `composer fix:php`

### Remove development environment

1. Uninstall composer packages: `composer uninstall`
1. Unset the environment variable: `unset COMPOSER | grep COMPOSER=`
1. **Leave the container:** `exit`
1. Stop the container: `ddev stop`

### Available linters

- TyposScript: `composer lint:ts`
- Yml and yaml: `composer lint:yaml`
- Json: `composer lint:json`

## Coding guidelines

- Use
  the [coding guidelines defined by TYPO3](https://docs.typo3.org/typo3cms/CoreApiReference/CodingGuidelines/Index.html)
  .
- Use **up, Up, up-, upc-** as package related prefixes where `upc-` is mainly used for complementary css classes used
  together with other selectors (e.g. `.up-example .upc-red { ... }`)

## Frequently used

**For coding**

- [TypoScript reference](https://docs.typo3.org/typo3cms/TyposcriptReference/)
- [Fluid guide](https://docs.typo3.org/typo3cms/ExtbaseGuide/Fluid/)
- [Fluid view helper reference](https://docs.typo3.org/typo3cms/ViewHelperReference/)
- [VHS view helper reference](https://viewhelpers.fluidtypo3.org/fluidtypo3/vhs/)
- [TCA reference](https://docs.typo3.org/typo3cms/TCAReference/)
- [TSconfig reference](https://docs.typo3.org/typo3cms/TSconfigReference/)
- [Core API reference](https://docs.typo3.org/typo3cms/CoreApiReference/)
- [Best practice example extension](https://gitlab.typo3.org/qa/example-extension)

**For documentation**

- [Markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
- [reStructuredText & Sphinx](https://docs.typo3.org/typo3cms/HowToDocument/WritingReST/Index.html)
