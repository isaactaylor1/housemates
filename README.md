# Housemates app

## Setup Instructions:
- Copy .env.local to .env
- Laravel dependencies: composer install
- Make sure your Laravel Valet uses the domain ".laravel"
- Run valet secure in the root of the project
- Node project dependencies: npm install
- Build assets: npm run watch

## Workflow Instructions:
- Commits to master are disabled for all users, even Adminstrators, please commit to the development branch and create a pull request into master.
- Pull requests into master will need to be reviewed by at least one other user before they can be merged.
- When a commit is made to development, a GitHub action is triggered and composer pulls the latest commits from the modules & packages
- If the development pipeline completes, the updated composer.lock file is committed, this will be used by the master pipeline.
- Pull requests into master trigger a GitHub action that pulls the module & package versions from the last successful development pipeline run.

# ** DO NOT ALTER THE PROJECT COMPOSER.JSON WITH THE LOCAL MODULES PATH **
