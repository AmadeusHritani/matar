# Hummingbird theme

This is a PrestaShop's theme we are working on. Please, if you work on this theme, use the `1.7.8.x` branch of PrestaShop to make sure this theme is compatible with the latest `1.7` version.

[Read more](https://build.prestashop.com/news/new-theme-announce/) about this theme on the blog.

## How to build assets

Same as the PrestaShop project, you need at least **NodeJS 14.x** and **NPM 7** in order to build the project.

First you need to install every node module:

`npm i`

then create a `.env` file inside the *webpack* folder by copying `webpack/.env-example` and complete it with your environment's informations. Please use a free tcp port.

then build assets:

`npm run build`

## Documentation

We use Storybook as a [documentation](https://build.prestashop.com/hummingbird/). As the theme is currently in development, there is a lot of work on documentation. Don't hesitate to add whatever you feel usefull to it.

## Contributing

Please refer to the [contributing guide](https://github.com/PrestaShop/hummingbird/blob/develop/CONTRIBUTING.md)

## Continuous Integration

The CI runs contain stylelint, eslint, TypeScript type checks.

## Continuous Deployment

When develop is merged into master, the Storybook is delivered almost instantly to his public link using a Github Pages.

## License

This theme is released under the [Academic Free License 3.0][AFL-3.0] 

[AFL-3.0]: https://opensource.org/licenses/AFL-3.0
