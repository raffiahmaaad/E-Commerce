module.exports = { 
  root: true,
  parser: '@typescript-eslint/parser',
  parserOptions: { 
    ecmaVersion: 2020, 
    sourceType: 'module',
    ecmaFeatures: { jsx: true }
  },
  settings: { 
    react: { version: 'detect' }
  },
  env: { 
    browser: true,
    node: true,
    es2021: true
  },
  plugins: ['react', 'react-hooks', '@typescript-eslint', 'import'],
  extends: [
    'eslint:recommended',
    'plugin:react/recommended',
    'plugin:@typescript-eslint/recommended',
    'plugin:react-hooks/recommended',
    'plugin:import/errors',
    'plugin:import/warnings',
    'plugin:import/typescript',
    'prettier'
  ],
  rules: {
    'react/prop-types': 'off'
  }
}
