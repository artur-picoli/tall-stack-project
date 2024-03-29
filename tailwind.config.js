const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        "./node_modules/flowbite/**/*.js",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    corePlugins: {
        aspectRatio: false,
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),

    ],
    darkMode: 'class',
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],

}
