#!make
.ONESHELL:

.run-composer-%:
	$(info [+] Make: Running composer $*...)
	docker compose run --rm --remove-orphans "${PHP_CONTAINER}" composer $*;

.install-quiet:
	@[ "$${SKIP_COMPOSER_PREINSTALL:-}" = "true" ] || { \
	  echo "[+] Make: Running install"; \
	  docker compose --profile php run --rm --remove-orphans "${PHP_CONTAINER}" composer install --no-interaction  --quiet --no-scripts; \
	}

# This interim target ensures that install is run first
.composer-run-%: .auth .install-quiet
	$(MAKE) --no-print-directory .run-composer-$*;

install:
	$(MAKE) --no-print-directory .run-composer-install;

update:
	$(info [+] Make: Running composer update...)
	$(MAKE) --no-print-directory .run-composer-update;

phplint:
	$(info [+] Make: Running phplint...)
	$(MAKE) --no-print-directory .composer-run-lint;

phpmnd:
	$(info [+] Make: Running Magic Numbers Deteector...)
	$(MAKE) --no-print-directory .composer-run-phpmnd;

magic-numbers: phpmnd

metrics:
	$(info [+] Make: Generating metrics...)
	$(MAKE) --no-print-directory .composer-run-metrics;

phpcs:
	$(info [+] Make: Running Codesniffer)
	$(MAKE) --no-print-directory .composer-run-phpcs;

phpcbf:
	$(info [+] Make: Running Codesniffer Fixes)
	$(MAKE) --no-print-directory .composer-run-phpcbf;

phpstan:
	$(info [+] Make: Running phpstan...)
	$(MAKE) --no-print-directory .composer-run-phpstan;

.test:
	$(MAKE) --no-print-directory .composer-run-test;

.setup:
	$(MAKE) --no-print-directory .composer-run-setup;
