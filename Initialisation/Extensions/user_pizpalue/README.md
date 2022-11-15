# TYPO3 site package `user_pizpalue`

[![TYPO3 11](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://get.typo3.org/version/11)
[![Extension pizpalue](https://img.shields.io/badge/Pizpalue-14-orange.svg)](https://extensions.typo3.org/extension/pizpalue/)
[![Extension pizpalue_distribution](https://img.shields.io/badge/Pizpalue--Distribution-3-orange.svg)](https://extensions.typo3.org/extension/pizpalue_distribution/)
[![Total Downloads](https://poser.pugx.org/buepro/typo3-user-pizpalue/d/total.svg)](https://packagist.org/packages/buepro/typo3-user-pizpalue)
[![Monthly Downloads](https://poser.pugx.org/buepro/typo3-user-pizpalue/d/monthly)](https://packagist.org/packages/buepro/typo3-user-pizpalue)

---

This extension serves as a site package to customize a TYPO3-website using the template
[pizpalue](https://github.com/buepro/typo3-pizpalue) in version 14.0.0 and higher.

## Installation

The following steps set up a TYPO3 website using this package as a composer root package.

1. **Get source code**
   ```
   composer create-project buepro/typo3-user-pizpalue && cd typo3-user-pizpalue && composer u
   ```

2. **Setup TYPO3**
   ```
   .build/bin/typo3cms install:setup \
   --no-interaction \
   --use-existing-database \
   --database-host-name=127.0.0.1 \
   --database-port=3306 \
   --database-name=db \
   --database-user-name=db \
   --database-user-password=db \
   --admin-user-name=admin \
   --admin-password=password \
   --site-name="Pizpalue site" \
   --web-server-config=apache \
   --skip-extension-setup
   ```
   > Extension setup is skipped due to a bug in the package `helhum/typo3-console`.

3. **Setup extensions**
   ```
   .build/bin/typo3 extension:setup
   ```

4. **Review `composer.json`**

    1. Define packages

       Remove the dependency to `"buepro/typo3-pizpalue-distribution"` and all packages not required by the
       site.
       > NOTE: Just use the needed packages. In many projects just `buepro/typo3-pizpalue` and
       `buepro/typo3-container-elements` are required.

   2. **Check PHP configuration**

       Make sure the PHP version used in the shell and for cron jobs corresponds to the PHP version used for running the
       website. In case they  differ you might need to add a platform configuration to `composer.json`. A possible
       platform configuration could look as following:
       ```
       "config": {
         "platform": {
           "php": "8.1.9"
         }
       }
       ```

5. **Finalize installation**
   ```
   composer finalize-installation
   ```

## Usage

When starting a new project create a new git-branch and just commit to that branch. The main branch should always be
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
folder [`Configuration/TypoScript/Sample`](Configuration/TypoScript/Sample). You might use them to get started by
copying the needed fragments to
[`Configuration/TypoScript/constants.typoscript`](Configuration/TypoScript/constants.typoscript) or
[`Configuration/TypoScript/setup.typoscript`](Configuration/TypoScript/setup.typoscript).

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
page {
    fluidtemplate {
        templateRootPath = EXT:user_pizpalue/Resources/Private/Templates/Page/
    }
}
```

## Development

- Install environment: `composer ddev:install`
- Uninstall environment: `composer ddev:uninstall`
- Test code: `ddev composer ci`
- Fix code: `ddev composer fix`

## Coding guidelines

- Use the [coding guidelines defined by TYPO3](https://docs.typo3.org/typo3cms/CoreApiReference/CodingGuidelines/Index.html).
- Use **up, Up, up-, upc-** as package related prefixes where `upc-` is mainly used for complementary css classes used
  together with other selectors (e.g. `.up-example .upc-red { ... }`)

## Frequently used

**For coding**

- [TypoScript reference](https://docs.typo3.org/typo3cms/TyposcriptReference/)
- [Fluid guide](https://docs.typo3.org/typo3cms/ExtbaseGuide/Fluid/)
- [Fluid view helper reference](https://docs.typo3.org/typo3cms/ViewHelperReference/)
- [TCA reference](https://docs.typo3.org/typo3cms/TCAReference/)
- [TSconfig reference](https://docs.typo3.org/typo3cms/TSconfigReference/)
- [Core API reference](https://docs.typo3.org/typo3cms/CoreApiReference/)
- [Best practice example extension](https://gitlab.typo3.org/qa/example-extension)

**For documentation**

- [Markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
- [reStructuredText & Sphinx](https://docs.typo3.org/typo3cms/HowToDocument/WritingReST/Index.html)
