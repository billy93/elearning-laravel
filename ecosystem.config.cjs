module.exports = {
  apps: [
    {
      name: 'elearning-laravel',
      cwd: '/home/development/apps/elearning',
      script: 'php',
      args: 'artisan serve --host=127.0.0.1 --port=8000',
      interpreter: 'none',
      autorestart: true,
      watch: false,
      env: {
        APP_ENV: 'production',
        APP_DEBUG: 'false',
      },
    },
  ],
};
