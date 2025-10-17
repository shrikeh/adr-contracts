#!make
ROOT_DIR:=$(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))

.EXPORT_ALL_VARIABLES:
.ONESHELL:
.DEFAULT: help
.PHONY: help
ifndef VERBOSE
.SILENT:
endif

-include .dev/make/docker.mk
-include .dev/make/php.mk

.auth:
	@.dev/sh/auth.sh;

auth:
	$(info [+] Make: Checking for token for composer)
	${MAKE} --no-print-directory .auth;

init: auth
	$(info [+] Make: Installing all host dependencies and configuring project)
	brew bundle install --quiet;
	mise trust > /dev/null 2>&1;
	direnv allow > /dev/null 2>&1;
	${MAKE} --no-print-directory dotenv-local envrc-local;
	direnv reload
	pre-commit install

dotenv-local:
	bash -c "[ -f './.env.local' ] || ${MAKE} .create-env-local";

envrc-local:
	bash -c "[ -f './.envrc.local' ] || ${MAKE} .create-envrc-local";

.create-env-local:
	$(info [+] Make: Creating .env.local from template)
	docker compose run --quiet --remove-orphans --rm gomplate --file "/templates/.env.local.tmpl" --out "/output/.env.local"
.create-envrc-local:
	$(info [+] Make: Creating .envrc.local from template)
	docker compose run --quiet --remove-orphans --rm gomplate --file "/templates/.envrc.local.tmpl" --out "/output/.envrc.local"


test: .test
