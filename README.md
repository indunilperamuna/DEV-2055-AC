## About InertiaJS CRUD

This is a simple CRUD operation demo build using Laravel 8, Vue3 and Inertia JS.

## Prerequisites

Docker Desktop installed on development computer.

## Installation

```
git clone https://github.com/indunilperamuna/DEV-2055-AC inertiaJSCrud

# docker Setup
cd inertiaJSCrud
docker compose up -d

#register sail as alias
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

# Javascript packages installation
sail npm i

# run in dev environment
sail npm watch
```

## Disclaimers

For the ABN validation used function from
https://github.com/adamroyle/abn-validator/blob/master/src/AbnValidator.php

