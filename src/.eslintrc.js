module.exports = {
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
    extends: ['eslint:recommended', 'prettier'],
    globals: {
        jQuery: 'readonly',
        wp: 'readonly',
        lisseData: 'readonly',
    },
    parserOptions: {
        ecmaFeatures: {
            jsx: true,
        },
        ecmaVersion: 12,
        sourceType: 'module',
    },
    plugins: ['react'],
    rules: {
        'no-console': 'error',
        'react/react-in-jsx-scope': 'off',
    },
};
